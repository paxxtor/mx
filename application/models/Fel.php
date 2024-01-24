<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fel extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }
    
    public function newDocument($document)
    {
        //CERTIFICAR UNA FACTURA CON SAT
        $Data1       = "POST_DOCUMENT_SAT";
        $xml         = base64_encode($document);
        $Entity      = '50206109'; //es la variable del nit del emisor de la factura.
        $url_ws      = "https://app.corposistemasgt.com/webservicefrontTEST/factwsfront.asmx?WSDL";// 
        $Requestor   = '4379A29A-C438-43D7-8DE5-57DB732D49C6'; //es la variable del requestor asignado 
        $retornar    = array();
        $UserName    = 'ADMINISTRADOR'; //es la variable del usuario para certificar el documento
        $fecha       = new DateTime();
        $fecha_d_m_y = $fecha->format('dd-m-yyyy-HH-mm-ss');                                  
        $Data3       = $fecha_d_m_y."-msbox";
        require_once('public/soap/lib/nusoap.php');
        $client      = new nusoap_client($url_ws,true);
        $err         = $client->getError();
        if ($err) {
            echo '<h2>Constructor error</h2>' . $err;
            exit();
        }
        try {
             $response = $client->call('RequestTransaction', array(
                'Requestor'     => $Requestor,
                'Transaction'   => "SYSTEM_REQUEST",
                'Country'       => "GT",
                'Entity'        => $Entity,
                'User'          => $Requestor,
                'UserName'      => $UserName,
                'Data1'         => $Data1,
                'Data2'         => $xml,
                'Data3'         => $Data3
            ));
            if ($client->fault) {
                $retornar['Fallo'] = $retornar;
    	        echo($response."<- response");
    	    } else {
                $retornar['Response'] = $response;	
                $Result=$response['RequestTransactionResult']['Response']['Result'];
                if($Result=='false')
                {           
                    $TimeStamp=$response['RequestTransactionResult']['Response']['TimeStamp'];
                    $LastResult=$response['RequestTransactionResult']['Response']['LastResult'];
                    $Code= $response['RequestTransactionResult']['Response']['Code'];
                    $Description=$response['RequestTransactionResult']['Response']['Description'];
                    $Hint=$response['RequestTransactionResult']['Response']['Hint'];
                    $Data=$response['RequestTransactionResult']['Response']['Data'];
                    echo '$Data: ' .$Data."  ".$Description;
                    $retornar['Data']= $Data;
                }
                else {
                    $Description= $response['RequestTransactionResult']['Response']['Description'];
                    $Batch=$response['RequestTransactionResult']['Response']['Identifier']['Batch'];
                    $Serial=$response['RequestTransactionResult']['Response']['Identifier']['Serial'];
                    $DocumentGUID=$response['RequestTransactionResult']['Response']['Identifier']['DocumentGUID'];
                    $TimeStamp=$response['RequestTransactionResult']['Response']['TimeStamp'];
                    $retornar = array(
                        'Batch' => $Batch,
                        'Serial' => $Serial,
                        'Guid' => $DocumentGUID,
                        'Description' => $Description,
                        'TimeStamp' => $TimeStamp,
                        'BaseXML' => $response['RequestTransactionResult']['ResponseData']['ResponseData1'],
                    );
                }
    	    }
        }
        catch(Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $numeracion   = $retornar['Batch'];
        $serial       = $retornar['Serial'];
        $autorizacion = $retornar['Guid'];
        $fechahora    = $retornar['TimeStamp'];
        $bxml    = $retornar['BaseXML'];
        $respuesta = array('response' => $bxml, 'guid' => $autorizacion, 'date' => $fechahora);
        return $respuesta;
    }
    
    
    function requestDocument()
    {
        $id_venta  = $this->input->post('sale_id');
        $id_estab  = $this->input->post('estab_id');
        $clienteId = $this->db->get_where('venta', array('venta_id' => $id_venta))->row()->cliente_id;
        $Qnit      = $this->db->get_where('cliente', array('cliente_id' => $clienteId))->row()->nit;
        if($Qnit == '' || $Qnit == 'cf' || $Qnit == 'CF' || $Qnit == 'c/f' || $Qnit == 'C/F'){ 
            $nit = 'CF';
            $nombre = 'Consumidor Final';
            $direccion = 'Ciudad';    
        }else{
            $nit       = $Qnit;
            $nombre    = $this->db->get_where('cliente', array('cliente_id' => $clienteId))->row()->apellido.' '.$this->db->get_where('cliente', array('cliente_id' => $clienteId))->row()->nombre;
            $direccion = $this->db->get_where('cliente', array('cliente_id' => $clienteId))->row()->direccion;
        }
        $items     = $this->db->get_where('producto_venta', array('venta_id' => $id_venta))->result_array();
        $estab     = $this->db->get_where('establecimiento', array('establecimiento_id' => $id_estab))->row_array();
        //log_message("error", $Qnit);
        $xml= '<?xml version="1.0" encoding="utf-8"?>
        <dte:GTDocumento xmlns:cex="http://www.sat.gob.gt/face2/ComplementoExportaciones/0.1.0"
            xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
            xmlns:cfe="http://www.sat.gob.gt/face2/ComplementoFacturaEspecial/0.1.0"
            xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:cfc="http://www.sat.gob.gt/dte/fel/CompCambiaria/0.1.0"
            xmlns:cno="http://www.sat.gob.gt/face2/ComplementoReferenciaNota/0.1.0" Version="0.1"
            xmlns:dte="http://www.sat.gob.gt/dte/fel/0.2.0">
            <dte:SAT ClaseDocumento="dte">
                <dte:DTE ID="DatosCertificados">
                    <dte:DatosEmision ID="DatosEmision">
                        <dte:DatosGenerales Tipo="FACT"
                            FechaHoraEmision="'.date('Y').'-'.date('m').'-'.date('d').'T'.date('H').':'.date('i').':'.date('s').'"
                            CodigoMoneda="GTQ" />
                        <dte:Emisor NITEmisor="'.$estab['nit'].'"
                            NombreEmisor="'.$estab['nombre_personal'].'"
                            CodigoEstablecimiento="'.$estab['codigo'].'" NombreComercial="'.$estab['nombre'].'" AfiliacionIVA="'.$estab['afiliacion'].'">
                            <dte:DireccionEmisor>
                                <dte:Direccion>'.strtoupper($estab['direccion']).'</dte:Direccion>
                                <dte:CodigoPostal>'.$estab['postal'].'</dte:CodigoPostal>
                                <dte:Municipio>'.strtoupper($estab['municipio']).'</dte:Municipio>
                                <dte:Departamento>'.strtoupper($estab['departamento']).'</dte:Departamento>
                                <dte:Pais>GT</dte:Pais>
                            </dte:DireccionEmisor>
                        </dte:Emisor>
                        <dte:Receptor IDReceptor="'.$nit.'" NombreReceptor="ESCOBAR BARRIENTOS, JUAN CARLOS">
                            <dte:DireccionReceptor>
                                <dte:Direccion>'.$direccion.'</dte:Direccion>
                                <dte:CodigoPostal>01000</dte:CodigoPostal>
                                <dte:Municipio>Guatemala</dte:Municipio>
                                <dte:Departamento>Guatemala</dte:Departamento>
                                <dte:Pais>GT</dte:Pais>
                            </dte:DireccionReceptor>
                        </dte:Receptor>
                        <dte:Frases>
                            <dte:Frase TipoFrase="1" CodigoEscenario="1" />
                        </dte:Frases>
                        <dte:Items>';
                            $totalImpuesto = 0;
                            $GranTotal     = 0;
                            $n             = 1; 
                            foreach($items as $key)
                            { 
                                $regimen = 12/100;
                                $marcaId = $this->db->get_where('producto', array('producto_id' => $key['producto_id']))->row()->marca_id;
                                $marca = $this->db->get_where('marca', array('marca_id' => $marcaId))->row()->nombre;
                                $nomProd = $this->db->get_where('producto', array('producto_id' => $key['producto_id']))->row()->nombre.' ('.$marca.')';
                                $totalp  = $key['precio']*$key['cantidad'];
                                $montoGravable = number_format($totalp/($regimen + 1), 6, ".", "");
                                $montoImpuesto = number_format($montoGravable*$regimen, 6, ".", "");
                                $totalImpuesto += $montoImpuesto;
                                $GranTotal += $montoGravable + $montoImpuesto;
                                $xml.='<dte:Item NumeroLinea="'.$n++.'" BienOServicio="B">
                                    <dte:Cantidad>'.rtrim($key['cantidad']).'</dte:Cantidad>
                                    <dte:UnidadMedida>UNI</dte:UnidadMedida>
                                    <dte:Descripcion>'.rtrim($nomProd).'</dte:Descripcion>
                                    <dte:PrecioUnitario>'.rtrim(number_format($key['precio'], 6, ".", "")).'</dte:PrecioUnitario>
                                    <dte:Precio>'.rtrim(number_format($totalp, 6, ".", "")).'</dte:Precio>
                                    <dte:Descuento>'.rtrim(number_format($ke['descuento'], 6, ".", "")).'</dte:Descuento>
                                    <dte:Impuestos>
                                        <dte:Impuesto>
                                            <dte:NombreCorto>IVA</dte:NombreCorto>
                                            <dte:CodigoUnidadGravable>1</dte:CodigoUnidadGravable>
                                            <dte:MontoGravable>'.rtrim($montoGravable).'</dte:MontoGravable>
                                            <dte:MontoImpuesto>'.rtrim($montoImpuesto).'</dte:MontoImpuesto>
                                        </dte:Impuesto>
                                    </dte:Impuestos>
                                    <dte:Total>'.rtrim(number_format($totalp, 6, ".", "")).'</dte:Total>
                                </dte:Item>';
                                }
                                $xml.='</dte:Items>
                        <dte:Totales>
                            <dte:TotalImpuestos>
                                <dte:TotalImpuesto NombreCorto="IVA" TotalMontoImpuesto="'.rtrim(number_format($totalImpuesto, 6, ".", "")).'"/>
                            </dte:TotalImpuestos>
                            <dte:GranTotal>'.rtrim(number_format($GranTotal, 6, ".", "")).'</dte:GranTotal>
                        </dte:Totales>
                    </dte:DatosEmision>
                </dte:DTE>
            </dte:SAT>
        </dte:GTDocumento>';
        log_message("error", $xml);
        $response = $this->newDocument($xml);
        if($response['guid'] != '')
        {
            $xml = simplexml_load_string(base64_decode($response['response']));
            $ns = $xml->getNamespaces(true);
            $xml->registerXPathNamespace('dte', $ns['dte']);
            $descr = get_object_vars($xml->xpath('//dte:NumeroAutorizacion')[0]);
            $no_serie = $descr['@attributes']['Serie'];
            $numero   = $descr['@attributes']['Numero'];
            $autorizacion = $xml->xpath('//dte:NumeroAutorizacion')[0][0];
            $emision = $xml->xpath('//dte:FechaHoraCertificacion')[0][0];
            $timestamp = strtotime($emision); 
            $new_date = date('d/m/Y', $timestamp);
            $db_insert['documento']       = $response['response'];
            $db_insert['fecha']           = $response['date'];
            $db_insert['estado']          = 1;
            $db_insert['mes']             = date('M');
            $db_insert['anio']            = date('Y');
            $db_insert['venta_id']        = $id_venta;
            $db_insert['guid']            = $response['guid'];
            $db_insert['no_autorizacion'] = $autorizacion;
            $db_insert['no_serie']        = $no_serie;
            $db_insert['fecha_emision']   = $emision;
            $db_insert['numero_factura']  = $numero;
            $emision_id = $this->db->insert('emision', $db_insert);
            $varXML = base64_decode($response['response']);
            $admin = $this->crud_model->nombresUsuario("admin", $this->session->userdata('login_user_id'));
            $info = $this->crud_model->emisionInfo($emision_id);
            $this->crud_model->bitacora("<strong>".$admin."</strong> creó una nueva factura ".$response['guid']." a <b>".$info['nombre']."</b>");
            return 1;
        }else{
            $this->crud_model->bitacora("No se ha logrado firmar la factura de la venta con ID: ".$id_venta, 1, 1);
            return 0;
        }
    }

    function manualDocument(){
        $id_trans  = $this->input->post('trans_id');
        $id_estab  = $this->input->post('estab_id');
        $clienteId = $this->db->get_where('transaccion', array('transaccion_id' => $id_trans))->row()->cliente_id;
        if ($clienteId != 0) {
            $Qnit      = $this->db->get_where('cliente', array('cliente_id' => $clienteId))->row()->nit;
            $nit       = $Qnit;
            $nombre    = $this->db->get_where('cliente', array('cliente_id' => $clienteId))->row()->apellido.' '.$this->db->get_where('cliente', array('cliente_id' => $clienteId))->row()->nombre;
            $direccion = $this->db->get_where('cliente', array('cliente_id' => $clienteId))->row()->direccion;
        }else {
            $nit = 'CF';
            $nombre = 'Consumidor Final';
            $direccion = 'Ciudad';    
        }
        $items     = $this->db->get_where('detalle_transaccion', array('transaccion_id' => $id_trans))->result_array();
        $estab     = $this->db->get_where('establecimiento', array('establecimiento_id' => $id_estab))->row_array();
        //log_message("error", $Qnit);
        $xml= '<?xml version="1.0" encoding="utf-8"?>
        <dte:GTDocumento xmlns:cex="http://www.sat.gob.gt/face2/ComplementoExportaciones/0.1.0"
            xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
            xmlns:cfe="http://www.sat.gob.gt/face2/ComplementoFacturaEspecial/0.1.0"
            xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:cfc="http://www.sat.gob.gt/dte/fel/CompCambiaria/0.1.0"
            xmlns:cno="http://www.sat.gob.gt/face2/ComplementoReferenciaNota/0.1.0" Version="0.1"
            xmlns:dte="http://www.sat.gob.gt/dte/fel/0.2.0">
            <dte:SAT ClaseDocumento="dte">
                <dte:DTE ID="DatosCertificados">
                    <dte:DatosEmision ID="DatosEmision">
                        <dte:DatosGenerales Tipo="FACT"
                            FechaHoraEmision="'.date('Y').'-'.date('m').'-'.date('d').'T'.date('H').':'.date('i').':'.date('s').'"
                            CodigoMoneda="GTQ" />
                        <dte:Emisor NITEmisor="'.$estab['nit'].'"
                            NombreEmisor="'.$estab['nombre_personal'].'"
                            CodigoEstablecimiento="'.$estab['codigo'].'" NombreComercial="'.$estab['nombre'].'" AfiliacionIVA="'.$estab['afiliacion'].'">
                            <dte:DireccionEmisor>
                                <dte:Direccion>'.strtoupper($estab['direccion']).'</dte:Direccion>
                                <dte:CodigoPostal>'.$estab['postal'].'</dte:CodigoPostal>
                                <dte:Municipio>'.strtoupper($estab['municipio']).'</dte:Municipio>
                                <dte:Departamento>'.strtoupper($estab['departamento']).'</dte:Departamento>
                                <dte:Pais>GT</dte:Pais>
                            </dte:DireccionEmisor>
                        </dte:Emisor>
                        <dte:Receptor IDReceptor="'.$nit.'" NombreReceptor="'.$nombre.'">
                            <dte:DireccionReceptor>
                                <dte:Direccion>'.$direccion.'</dte:Direccion>
                                <dte:CodigoPostal>01000</dte:CodigoPostal>
                                <dte:Municipio>Guatemala</dte:Municipio>
                                <dte:Departamento>Guatemala</dte:Departamento>
                                <dte:Pais>GT</dte:Pais>
                            </dte:DireccionReceptor>
                        </dte:Receptor>
                        <dte:Frases>
                            <dte:Frase TipoFrase="1" CodigoEscenario="1" />
                        </dte:Frases>
                        <dte:Items>';
                            $totalImpuesto = 0;
                            $GranTotal     = 0;
                            $n             = 1; 
                            foreach($items as $key)
                            { 
                                $regimen = $estab['valor'];
                                $nomProd = $key['descripcion'];
                                $totalp  = $key['precio']*$key['cantidad'];
                                $montoGravable = number_format($totalp/($regimen + 1), 6, ".", "");
                                $montoImpuesto = number_format($montoGravable*$regimen, 6, ".", "");
                                $totalImpuesto += $montoImpuesto;
                                $GranTotal += $montoGravable + $montoImpuesto;
                                $xml.='<dte:Item NumeroLinea="'.$n++.'" BienOServicio="B">
                                    <dte:Cantidad>'.rtrim($key['cantidad']).'</dte:Cantidad>
                                    <dte:UnidadMedida>UNI</dte:UnidadMedida>
                                    <dte:Descripcion>'.rtrim($nomProd).'</dte:Descripcion>
                                    <dte:PrecioUnitario>'.rtrim(number_format($key['precio'], 6, ".", "")).'</dte:PrecioUnitario>
                                    <dte:Precio>'.rtrim(number_format($totalp, 6, ".", "")).'</dte:Precio>
                                    <dte:Descuento>'.rtrim(number_format($key['descuento'], 6, ".", "")).'</dte:Descuento>
                                    <dte:Impuestos>
                                        <dte:Impuesto>
                                            <dte:NombreCorto>IVA</dte:NombreCorto>
                                            <dte:CodigoUnidadGravable>1</dte:CodigoUnidadGravable>
                                            <dte:MontoGravable>'.rtrim($montoGravable).'</dte:MontoGravable>
                                            <dte:MontoImpuesto>'.rtrim($montoImpuesto).'</dte:MontoImpuesto>
                                        </dte:Impuesto>
                                    </dte:Impuestos>
                                    <dte:Total>'.rtrim(number_format($totalp, 6, ".", "")).'</dte:Total>
                                </dte:Item>';
                                }
                                $xml.='</dte:Items>
                        <dte:Totales>
                            <dte:TotalImpuestos>
                                <dte:TotalImpuesto NombreCorto="IVA" TotalMontoImpuesto="'.rtrim(number_format($totalImpuesto, 6, ".", "")).'"/>
                            </dte:TotalImpuestos>
                            <dte:GranTotal>'.rtrim(number_format($GranTotal, 6, ".", "")).'</dte:GranTotal>
                        </dte:Totales>
                    </dte:DatosEmision>
                </dte:DTE>
            </dte:SAT>
        </dte:GTDocumento>';
        log_message("error", $xml);
        $response = $this->newDocument($xml);
        if($response['guid'] != '')
        {
            $xml = simplexml_load_string(base64_decode($response['response']));
            $ns = $xml->getNamespaces(true);
            $xml->registerXPathNamespace('dte', $ns['dte']);
            $descr = get_object_vars($xml->xpath('//dte:NumeroAutorizacion')[0]);
            $no_serie = $descr['@attributes']['Serie'];
            $numero   = $descr['@attributes']['Numero'];
            $autorizacion = $xml->xpath('//dte:NumeroAutorizacion')[0][0];
            $emision = $xml->xpath('//dte:FechaHoraCertificacion')[0][0];
            $timestamp = strtotime($emision); 
            $new_date = date('d/m/Y', $timestamp);
            $db_insert['documento']       = $response['response'];
            $db_insert['fecha']           = $response['date'];
            $db_insert['estado']          = 1;
            $db_insert['dia']             = date('d');
            $db_insert['mes']             = date('M');
            $db_insert['anio']            = date('Y');
            $db_insert['transaccion_id']  = $id_trans;
            $db_insert['guid']            = $response['guid'];
            $db_insert['no_autorizacion'] = $autorizacion;
            $db_insert['no_serie']        = $no_serie;
            $db_insert['fecha_emision']   = $emision;
            $db_insert['numero_factura']  = $numero;
            $emision_id = $this->db->insert('emision', $db_insert);
            $varXML = base64_decode($response['response']);
            $admin = $this->crud_model->nombresUsuario("admin", $this->session->userdata('login_user_id'));
            $info = $this->crud_model->emisionInfo($emision_id);
            $this->crud_model->bitacora("<strong>".$admin."</strong> creó una nueva factura ".$response['guid']." a <b>".$info['nombre']."</b>");
            return 1;
        }else{
            $this->crud_model->bitacora("No se ha logrado firmar la factura de la transacción con ID: ".$id_trans, 1, 1);
            return 0;
        }
    }

    function anulacionFactura()
    {
        $emision_id = $this->input->post('emision_id');
        $motivo = trim($this->input->post('motivo'));
        $emi = $this->db->get_where('emision', array("emision_id" => $emision_id))->row_array();
        $info = $this->crud_model->emisionInfo($emision_id);
        $admin = $this->crud_model->nombresUsuario("admin", $this->session->userdata('login_user_id'));
        $nit = "CF";
        if ($info['nit'] != "" && $info['nit'] != null) {
            $nit = $info['nit'];
        }
        $jwt = $this->crud_model->getInfo("jwt");
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
        <dte:GTAnulacionDocumento xmlns:dte="http://www.sat.gob.gt/dte/fel/0.1.0"
            xmlns:ds="http://www.w3.org/2000/09/xmldsig#"
            xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" Version="0.1"
            xsi:schemaLocation="http://www.sat.gob.gt/dte/fel/0.1.0 GT_AnulacionDocumento-
            0.1.0.xsd">
            <dte:SAT>
                <dte:AnulacionDTE ID="DatosCertificados">
                    <dte:DatosGenerales FechaEmisionDocumentoAnular="'.$emi['fecha_emision'].'"
                        FechaHoraAnulacion="'.date('Y').'-'.date('m').'-'.date('d').'T'.date('H').':'.date('i').':'.date('s').'.'.date('u').'-06:00"
                        ID="DatosAnulacion"
                        IDReceptor="'.$nit.'" MotivoAnulacion="'.$motivo.'"
                        NITEmisor="'.$info['nit_emisor'].'"
                        NumeroDocumentoAAnular="'.$emi['no_autorizacion'].'"/>
                </dte:AnulacionDTE>
            </dte:SAT>
        </dte:GTAnulacionDocumento>';
        log_message("error", $xml);

        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apis.mayansource.com/dte/anularDTE.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'document='.urlencode($xml).'&product=msbox',
            CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer'.' '.$jwt,
            'Content-Type: application/x-www-form-urlencoded'),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err){
            $this->crud_model->bitacora("<strong>".$admin."</strong> no ha logrado anular la factura ".$emi['guid'], 1, 1);
            return 0;
        }
        else{
            if($response != 'null'){
                $data['estado'] = 0;
                $data['motivo'] = $motivo;
                $this->db->where('emision_id', $emision_id);
                $this->db->update('emision', $data);
                $this->crud_model->bitacora("<strong>".$admin."</strong> anuló la factura ".$emi['guid']." de <b>".$info['nombre']."</b>");
                return 1;
            } else {
                $this->crud_model->bitacora("<strong>".$admin."</strong> no ha logrado anular la factura ".$emi['guid'], 1, 1);
                return 0;
            }
        }
    }
}
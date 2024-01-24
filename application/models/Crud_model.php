<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Crud_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
////////////////////////////////////////////////////////////

    //Funciton to get the full name to any user
    function get_table_name($table, $id){

        return $this->db->get_where($table, array($table.'_id' => $id))->row()->name;
    }

//////////////////////////////////////////////////////////


public function proceedings_add()
{
    $data['phase_id']      = $this->input->post('phase_id');
    $data['derivative']      = $this->input->post('derivative') == ""? 0:1 ;
    $data['proceeding_clasification_id	']   = $this->input->post('proceeding_clasification');
    $data['carpet'] = $this->input->post('carpet');
    $data['manager_id']   = $this->input->post('manager_id');
    $data['nic']   = $this->input->post('nic');
    $data['nue']   = $this->input->post('nue');
    $data['discharge_date']   = $this->input->post('discharge_date');
    $data['finish_date']   = $this->input->post('finish_date');
    $data['description']   = $this->input->post('description');
    $data['proceeding_category_id']   = $this->input->post('proceeding_category');
    $data['proceeding_type']   = $this->input->post('proceeding_type');
    $data['proceeding_razon']   = $this->input->post('proceeding_razon');
    $data['proceeding_status']   = $this->input->post('proceeding_status');
    $data['proccess']   = $this->input->post('proccess');
    $data['client_id']   = $this->input->post('client_id');
    $data['proceeding_part']   = $this->input->post('proceeding_part');
    $data['amount']   = $this->input->post('amount');
    $data['interests']   = $this->input->post('interests');
    $data['total']   = $this->input->post('total');
    $data['turn']   =  $this->input->post('turn') == ""? 0:1 ;
    $data['confidential']   =  $this->input->post('confidential') == ""? 0:1 ;
    $data['public']   = $this->input->post('public') == ""? 0:1 ;
    $data['year']   = date('Y');
    $data['type']   = $this->input->post('type');
  

    $response = $this->db->insert('proceeding', $data);

    $proceeding_id = $this->db->insert_id();

    $this->binnacle_model->binnacle_insert('proceeding','Expedientes ','Agrego','Agrego el expediente '.$this->input->post('nic'),$proceeding_id);
    
    return  $response;
}


public function proceedings_edit($proceeding_id)
{
    $data['phase_id']      = $this->input->post('phase_id');
    $data['derivative']      = $this->input->post('derivative') == ""? 0:1 ;
    $data['proceeding_clasification_id	']   = $this->input->post('proceeding_clasification');
    $data['carpet'] = $this->input->post('carpet');
    $data['manager_id']   = $this->input->post('manager_id');
    $data['nic']   = $this->input->post('nic');
    $data['nue']   = $this->input->post('nue');
    $data['discharge_date']   = $this->input->post('discharge_date');
    $data['finish_date']   = $this->input->post('finish_date');
    $data['description']   = $this->input->post('description');
    $data['proceeding_category_id']   = $this->input->post('proceeding_category');
    $data['proceeding_type']   = $this->input->post('proceeding_type');
    $data['proceeding_razon']   = $this->input->post('proceeding_razon');
    $data['proceeding_status']   = $this->input->post('proceeding_status');
    $data['proccess']   = $this->input->post('proccess');
    $data['client_id']   = $this->input->post('client_id');
    $data['proceeding_part']   = $this->input->post('proceeding_part');
    $data['amount']   = $this->input->post('amount');
    $data['interests']   = $this->input->post('interests');
    $data['total']   = $this->input->post('total');
    $data['turn']   =  $this->input->post('turn') == ""? 0:1 ;
    $data['confidential']   =  $this->input->post('confidential') == ""? 0:1 ;
    $data['public']   = $this->input->post('public') == ""? 0:1 ;
    $data['year']   = date('Y');
    $data['type']   = $this->input->post('type');
  
    $this->db->where('proceeding_id', $proceeding_id);
    $response = $this->db->update('proceeding', $data);
    $this->binnacle_model->binnacle_insert('proceeding','Expedientes ','Actualizó ','Modifico el expediente '.$this->input->post('nic'),$proceeding_id);
    return  $response;
}


public function proceedings_delete($proceeding_id)
{
    
    $data['status'] = 0;
  
    $this->db->where('proceeding_id',$proceeding_id);
    $response = $this->db->update('proceeding', $data);
   
    $this->binnacle_model->binnacle_insert('proceeding','Expedientes ','Elimino','Elimino el expediente '.$this->input->post('nic'),$proceeding_id);
    return  $response;
}




public function proceeding_code()
{
    $result ='';

    $cont = $this->db->get_where('proceeding', array('year'=>date('Y'),'status'=>1))->num_rows()+1;

    if(strlen((string) $cont) == 4) {
        $result = date('Y').'/'.$cont;
    } elseif(strlen((string) $cont) == 3) {
        $result = date('Y').'/'.'0'.$cont;
    } else {
        $result = date('Y').'/'.'00'.$cont;
    }

    return $result;
}

public function user_proceedings($directory_id)
{

    return $this->db->get_where('proceeding', array('year'=>date('Y'),'status'=>1,'manager_id'=>$directory_id))->num_rows();

}
////////////////////////////////////////////////////////// Folders functions


public function folder_code($type)
{
    $result ='';

    $cont = $this->db->get_where('folder', array('year'=>date('Y'),'type'=>$type,'status'=>1))->num_rows()+1;

    if(strlen((string) $cont) == 4) {
        $result = date('Y').'/'.$cont;
    } elseif(strlen((string) $cont) == 3) {
        $result = date('Y').'/'.'0'.$cont;
    } else {
        $result = date('Y').'/'.'00'.$cont;
    }

    return $result;
}

public function folder_add()
{
    $data['type']           = $this->input->post('type');
    $data['phase_id']      = $this->input->post('phase_id');
    $data['derivative']      = $this->input->post('derivative') == ""? 0:1 ;
    $data['proceeding_clasification_id	']   = $this->input->post('proceeding_clasification');
    $data['nuc'] = $this->input->post('nuc');
    $data['manager_id']   = $this->input->post('manager_id');
    $data['nic']   = $this->input->post('nic');
    $data['discharge_date']   = $this->input->post('discharge_date');
    $data['finish_date']   = $this->input->post('finish_date');
    $data['description']   = $this->input->post('description');
    $data['proceeding_category_id']   = $this->input->post('proceeding_category');
    $data['proceeding_type']   = $this->input->post('proceeding_type');
    $data['proceeding_razon']   = $this->input->post('proceeding_razon');
    $data['proceeding_status']   = $this->input->post('proceeding_status');
    $data['proccess']   = $this->input->post('proccess');
    $data['client_id']   = $this->input->post('client_id');
    $data['proceeding_part']   = $this->input->post('proceeding_part');
    $data['amount']   = $this->input->post('amount');
    $data['interests']   = $this->input->post('interests');
    $data['total']   = $this->input->post('total');
    $data['turn']   =  $this->input->post('turn') == ""? 0:1 ;
    $data['confidential']   =  $this->input->post('confidential') == ""? 0:1 ;
    $data['public']   = $this->input->post('public') == ""? 0:1 ;
    $data['year']   = date('Y');
    $data['arrested']   = $this->input->post('arrested') == ""? 0:1;
    $data['prision']   = $this->input->post('prision') == ""? 0:1;
    $data['prision_type']   = $this->input->post('prision_type');
    $data['domiciliary']   = $this->input->post('domiciliary') == ""? 0:1;
    $data['domiciliary_type']   = $this->input->post('domiciliary_type');
    $data['domiciliary_name']   = $this->input->post('domiciliary_name');
    $data['domiciliary_name1']   = $this->input->post('domiciliary_name1');
    $data['crime_id']   = $this->input->post('crime_id');
    $data['imputed_id']   = $this->input->post('imputed_id');
    $data['complainant_id']   = $this->input->post('complainant_id');
    $data['victim_id']   = $this->input->post('victim_id');
    $data['cp_victim']   = $this->input->post('cp_victim') == ""? 0:1;
  
    $response = $this->db->insert('folder', $data);
    $proceeding_id = $this->db->insert_id();
    $this->binnacle_model->binnacle_insert('folder','Carpeta ','Agrego ','Agrego la carpeta '.$this->input->post('nic'),$folder_id);
    return  $response;
}

public function folder_edit($folder_id)
{
    $data['phase_id']      = $this->input->post('phase_id');
    $data['derivative']      = $this->input->post('derivative') == ""? 0:1 ;
    $data['proceeding_clasification_id	']   = $this->input->post('proceeding_clasification');
    $data['nuc'] = $this->input->post('nuc');
    $data['manager_id']   = $this->input->post('manager_id');
    $data['nic']   = $this->input->post('nic');
    $data['discharge_date']   = $this->input->post('discharge_date');
    $data['finish_date']   = $this->input->post('finish_date');
    $data['description']   = $this->input->post('description');
    $data['proceeding_category_id']   = $this->input->post('proceeding_category');
    $data['proceeding_type']   = $this->input->post('proceeding_type');
    $data['proceeding_razon']   = $this->input->post('proceeding_razon');
    $data['proceeding_status']   = $this->input->post('proceeding_status');
    $data['proccess']   = $this->input->post('proccess');
    $data['client_id']   = $this->input->post('client_id');
    $data['proceeding_part']   = $this->input->post('proceeding_part');
    $data['amount']   = $this->input->post('amount');
    $data['interests']   = $this->input->post('interests');
    $data['total']   = $this->input->post('total');
    $data['turn']   =  $this->input->post('turn') == ""? 0:1 ;
    $data['confidential']   =  $this->input->post('confidential') == ""? 0:1 ;
    $data['public']   = $this->input->post('public') == ""? 0:1 ;
    $data['year']   = date('Y');
    $data['arrested']   = $this->input->post('arrested') == ""? 0:1;
    $data['prision']   = $this->input->post('prision') == ""? 0:1;
    $data['prision_type']   = $this->input->post('prision_type');
    $data['domiciliary']   = $this->input->post('domiciliary') == ""? 0:1;
    $data['domiciliary_type']   = $this->input->post('domiciliary_type');
    $data['domiciliary_name']   = $this->input->post('domiciliary_name');
    $data['domiciliary_name1']   = $this->input->post('domiciliary_name1');
    $data['crime_id']   = $this->input->post('crime_id');
    $data['imputed_id']   = $this->input->post('imputed_id');
    $data['complainant_id']   = $this->input->post('complainant_id');
    $data['victim_id']   = $this->input->post('victim_id');
    $data['cp_victim']   = $this->input->post('cp_victim') == ""? 0:1;
  
    $this->db->where('folder_id',$folder_id);
    $response = $this->db->update('folder', $data);
    $proceeding_id = $this->db->insert_id();
    $this->binnacle_model->binnacle_insert('folder','Carpeta ','Actualizó ','Actualizó la carpeta '.$this->input->post('nic'),$folder_id);
    return  $response;
}


public function folder_delete($folder_id)
{
    
    $data['status'] = 0;
  
    $this->db->where('folder_id',$folder_id);
    $response = $this->db->update('folder', $data);
    $this->binnacle_model->binnacle_insert('folder','Carpeta ','Elimino ','Elimino la carpeta '.$this->input->post('nic'),$folder_id);
    return  $response;
}


//////////////////////////////////////////////////////////
    public function update_system()
    {
        $md5 = md5(date('d-m-y H:i:s'));

        $data['description'] = $this->input->post('system_title');
        $this->db->where('type', 'system_title');
        $this->db->update('settings', $data);

        if($_FILES['logo']['name'] != '') {
            $data['description'] = $md5.str_replace(' ', '', $_FILES['logo']['name']);
            $this->db->where('type', 'logo');
            $this->db->update('settings', $data);
        }
        move_uploaded_file($_FILES['logo']['tmp_name'], 'public/assets/images/logo/' . $md5.str_replace(' ', '', $_FILES['logo']['name']));
    }
    
      public function update_system_sheet_docs()
    {
        $md5 = md5(date('d-m-y H:i:s'));

        if($_FILES['sheet_docs']['name'] != '') {
            $data['description'] = $md5.str_replace(' ', '', $_FILES['sheet_docs']['name']);
            $this->db->where('type', 'sheet_docs');
            $this->db->update('settings', $data);
        }
        move_uploaded_file($_FILES['sheet_docs']['tmp_name'], 'public/assets/images/' . $md5.str_replace(' ', '', $_FILES['sheet_docs']['name']));
    }
    
    
    public function update_system_sheet_docs_of()
    {
        $md5 = md5(date('d-m-y H:i:s'));

        if($_FILES['sheet_docs']['name'] != '') {
            $data['description'] = $md5.str_replace(' ', '', $_FILES['sheet_docs']['name']);
            $this->db->where('type', 'sheet_docs_of');
            $this->db->update('settings', $data);
        }
        move_uploaded_file($_FILES['sheet_docs']['tmp_name'], 'public/assets/images/' . $md5.str_replace(' ', '', $_FILES['sheet_docs']['name']));
    }


    public function update_info()
    {
        $data['description'] = $this->input->post('system_name');
        $this->db->where('type', 'system_name');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('system_phone');
        $this->db->where('type', 'system_phone');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('system_email');
        $this->db->where('type', 'system_email');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('system_address');
        $this->db->where('type', 'system_address');
        $this->db->update('settings', $data);

        $data['description'] = $this->input->post('about_us');
        $this->db->where('type', 'about_us');
        $this->db->update('settings', $data);
        
        $data['description'] = $this->input->post('system_interest');
        $this->db->where('type', 'interest');
        $this->db->update('settings', $data);
    }

    public function getCurrency()
    {
        return $this->db->get_where('settings', array('type'=>'currency'))->row()->description;
    }

    
    function get_now()
    {
        $this->db->order_by('event_id','asc');
        $events = $this->db->get('event')->result_array();
        return $events;
    }

    function get_status($status)
    {
        $return = '';
        if($status == 0)
        {
            $return = 'fc-event-warning fc-event-solid-pending';
        }
        else if($status == 1){
            $return = 'fc-event-warning fc-event-solid-confirmed';
        }
        else if($status == 2){
            $return = 'fc-event-warning fc-event-solid-cancelled';
        }
        else if($status == 3){
            $return = 'fc-event-warning fc-event-solid-repro';
        }else if($status == 4){
            $return = 'fc-event-danger fc-event-solid-warning';
        }else {
            $return = 'bg-pending';
        }
        return $return;
    }

///////////////////////////////////////////////////////////////////


    function create_invoice()
    {
        
        $data['type']            = $this->input->post('type');
        $data['client_id']       = $this->input->post('client_id');
        $data['proceeding_id']   = $this->input->post('proceeding_id');
        $data['invoice']         = $this->input->post('invoice');
        $data['date']            = $this->input->post('date');
        $data['expire_date']     = $this->input->post('expire_date');
        $data['invoice_date']    = $this->input->post('invoice_date');
        $data['invoice_clasification_id']    = $this->input->post('invoice_clasification_id');
        $data['amount']          = $this->input->post('amount');
        $data['description']     = $this->input->post('description');
        $data['observation']     = $this->input->post('observation');
        $data['status']          = $this->input->post('status') == ""? 0:1 ;

        $this->db->insert('invoice',$data);
    }

    function edit_invoice($param2)
    {
        
        $data['client_id']       = $this->input->post('client_id');
        $data['proceeding_id']   = $this->input->post('proceeding_id');
        $data['invoice']         = $this->input->post('invoice');
        $data['date']            = $this->input->post('date');
        $data['expire_date']     = $this->input->post('expire_date');
        $data['invoice_date']    = $this->input->post('invoice_date');
        $data['invoice_clasification_id']    = $this->input->post('invoice_clasification_id');
        $data['amount']          = $this->input->post('amount');
        $data['description']     = $this->input->post('description');
        $data['observation']     = $this->input->post('observation');
        $data['status']          = $this->input->post('status') == ""? 0:1 ;
        
        $this->db->where('invoice_id',$param2);
        $this->db->update('invoice',$data);
    }


    function delete_invoice($param2)
    {
        
        $this->db->where('invoice_id',$param2);
        $this->db->delete('invoice');
    }


    function pay_invoice($param2)
    {
        
        $data['invoice_date']    = $this->input->post('invoice_date');
        $data['invoice_clasification_id']    = $this->input->post('invoice_clasification_id');
        $data['status']          = 1 ;

        $this->db->where('invoice_id',$param2);
        $this->db->update('invoice',$data);
       
    }


    function get_total_invoice($type)
    {
        
        $total = $this->db->query('SELECT SUM(amount) as total FROM `invoice` where status = 1 and type ='.$type )->row()->total;
        if($total != "")
        return $total;
        else
        return '0.00';
    }

    function get_pending_invoice($type)
    {
        
        $total = $this->db->query('SELECT SUM(amount) as total FROM `invoice` where status = 0 and type ='.$type)->row()->total;
        if($total != "")
        return $total;
        else
        return '0.00';
    }

    function get_expire_invoice($type)
    {
        
        $total = $this->db->query('SELECT SUM(amount) as total FROM `invoice` where expire_date < "'.date('Y-m-d').'" and type ='.$type)->row()->total;
        if($total != "")
        return $total;
        else
        return '0.00';
    }


    ///////////////////////////////////////////////////////////////////
    function get_total_proforma_invoice()
    {
        
        $total = $this->db->query('SELECT SUM(amount) as total FROM `proforma_invoice` where status = 1')->row()->total;
        if($total != "")
        return $total;
        else
        return '0.00';
    }

    function get_pending_proforma_invoice()
    {
        
        $total = $this->db->query('SELECT SUM(amount) as total FROM `proforma_invoice` where status = 0')->row()->total;
        if($total != "")
        return $total;
        else
        return '0.00';
    }

    function get_expire_proforma_invoice()
    {
        
        $total = $this->db->query('SELECT SUM(amount) as total FROM `proforma_invoice` where expire_date < "'.date('Y-m-d').'"')->row()->total;
        if($total != "")
        return $total;
        else
        return '0.00';
    }
    
    function get_permission($permission)
    {
        return $this->db->get_where('admin_permission',array('directory_id'=>$this->session->userdata('login_user_id')))->row()->$permission;
        
    }


    function hasfiles($parent_id)
    {
       
        $proceeding_in = $this->db->order_by('proceeding_files_id','desc')->get_where('proceeding_files',array('parent_id'=>$parent_id))->result_array();
        $html ='<ul>';
        foreach( $proceeding_in as $row){
            
            
            $html .=' <li>
                            <div class="files" style="display:flex;cursor:pointer">
                                <b onclick="modalLgRequest(\''.base_url().'modal/popup/modal_show_files/'.$row['proceeding_files_id'].'\');">'.$row['name'].'</b>
                                <div class="file-actions" style="display:none;margin: 0px 15px 7px 15px;">
                                    <a style="font-size:20px" onclick="modalLgRequest(\''.base_url().'modal/popup/modal_add_files_file2/'.$row['proceeding_id'].'/'.$row['proceeding_files_id'].'\');" href="javascript:void(0)"><i class="fa fa-plus-circle"></i></a>
                                    <a style="font-size:20px" onclick="modalLgRequest(\''.base_url().'modal/popup/modal_show_files/'.$row['proceeding_files_id'].'\');");" href="javascript:void(0)"><i class="fa fa-file-text"></i></a>
                                    <a style="font-size:20px" onclick="modalLgRequest(\''.base_url().'modal/popup/modal_edit_files/'.$row['proceeding_files_id'].'\');" href="javascript:void(0)"><i class="fa fa-edit"></i></a>
                                    <a style="font-size:20px" onclick="deleteFile('.$row['proceeding_files_id'].');" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
                                </div>
                           </div>';
            $li = $this->hasfiles($row['proceeding_files_id']);

            $html .= $li ;
            $html .= '</li>';
        }
        $html .='</ul>';
        
        return $html;
    }

    function hasfilesfolders($parent_id)
    {
        $proceeding_in = $this->db->order_by('folder_files_id','asc')->get_where('folder_files',array('parent_id'=>$parent_id))->result_array();
        $html ='<ul>';
        foreach( $proceeding_in as $row){
            
            
            $html .=' <li>
                            <div class="files" style="display:flex;cursor:pointer">
                                <b onclick="modalLgRequest(\''.base_url().'modal/popup/modal_show_files_folder/'.$row['folder_files_id'].'\');">'.$row['name'].'</b>
                                <div class="file-actions" style="display:none;margin: 0px 15px 7px 15px;">
                                    <a style="font-size:20px" onclick="modalLgRequest(\''.base_url().'modal/popup/modal_add_files_file/'.$row['proceeding_id'].'/'.$row['proceeding_files_id'].'\');" href="javascript:void(0)"><i class="fa fa-plus-circle"></i></a>
                                    <a style="font-size:20px" onclick="modalLgRequest(\''.base_url().'modal/popup/modal_show_files_folder/'.$row['proceeding_files_id'].'\');");" href="javascript:void(0)"><i class="fa fa-file-text"></i></a>
                                    <a style="font-size:20px" onclick="modalLgRequest(\''.base_url().'modal/popup/modal_edit_files_folder/'.$row['proceeding_files_id'].'\');" href="javascript:void(0)"><i class="fa fa-edit"></i></a>
                                    <a style="font-size:20px" onclick="deleteFile('.$row['folder_files_id'].');" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
                                </div>
                           </div>';
            $li = $this->hasfilesfolders($row['folder_files_id']);

            $html .= $li ;
            $html .= '</li>';
        }
        $html .='</ul>';
        
        return $html;
    }

function hasfilestable($parent_id)
    {
       
        $proceeding_in = $this->db->order_by('proceeding_files_id','desc')->get_where('proceeding_files',array('parent_id'=>$parent_id))->result_array();
        $html ='</tr><tr>';
        foreach( $proceeding_in as $row){
            
            if($row['phase_id'] != '' )
                $phase = $row['phase_id'];
            else
                $phase = $this->db->get_where('proceeding_files', array('proceeding_files_id'=>$row['parent_id']))->row()->phase_id;
            
              if($row['parent_id'] != '' )
                $type = 'Secundario';
            else
                $type = 'Primario';
            
            $arreglo = explode(",",$row['files']);
            
            $html .='<td>'.$row['date'].'</td> 
                     <td>'.$row['name'].'</td> 
                     <td>'.$this->db->get_where('phase',array('phase_id'=>$phase))->row()->name.'</td>
                     <td>'.$this->db->get_where('files_type',array('files_type_id'=>$row['files_type_id']))->row()->name.'</td>
                     <td>'.$type.'</td>
                     <td>
                        <a style="font-size:20px" target="_blanck" href="'.base_url().'public/uploads/files/'.$row['proceeding_files_id'].'/'.$arreglo[0].'"><i class="fa fa-eye"></i></a>
                        <a style="font-size:20px" target="_blanck" href="'.base_url().'admin/force_download/'.$row['proceeding_files_id'].'/'.base64_encode($arreglo[0]).'"><i class="fa fa-download"></i></a>
                        <a style="font-size:20px" onclick="modalLgRequest(\''.base_url().'modal/popup/modal_edit_files/'.$row['proceeding_files_id'].'\');" href="javascript:void(0)"><i class="fa fa-edit"></i></a>
                        <a style="font-size:20px" onclick="deleteFile(\''.$row['proceeding_files_id'].'\');" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
                    </td>';
                     
            $li = $this->hasfilestable($row['proceeding_files_id']);

            $html .= $li ;
            $html .= '</td>';
        }
        $html .='';
        
        return $html;
    }
    
//<---------------------------------------->

function total_movment_economic_payment($proceeding_economic_id)
{
    
    $total = $this->db->query("SELECT SUM(import) as total FROM economic_payment where movment_economic_id ='".$proceeding_economic_id."'  and status = 1")->row()->total;
    
    if($total > 0)
        return $total;
    else
        return 0;
    
}

    
}
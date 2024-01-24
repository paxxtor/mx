<?php 
    $system_name        =	$this->db->get_where('settings' , array('type' =>'system_name'))->row()->description;
    $system_title       =	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
    $account_type = $this->session->userdata('login_type'); 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title><?php echo $page_title;?> | <?php echo $system_title;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Software jurídico a la medida">
    <meta name="keywords" content="software, web">
    <meta name="author" content="MAYANSOURCE - mayansource.com"> 
    <?php include 'topcss.php';?>
</head>

<body class="<?php if($this->session->userdata('dark_mode')) echo 'dark-only'?>">
    <?php 
    $move = $this->db->get_where('movment_economic',array('movment_economic_id'=>$movment_economic_id))->result_array(); 
    foreach ($move as $row):
        
    ?> 
    <div class="card-body post-about">
                        <img class="img-fluid" style="position:absolute;right:0px;width: 100px;height: 100px;" src="<?php echo base_url();?>public/assets/images/logo/<?php echo $this->db->get_where('settings', array('type' => 'logo'))->row()->description;?>" alt="" width="100%">
                        <h2><?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;?></h2>
    </div>
    
    <div class="row">
        <div class="col-md-8 row">
            <div class="col-md-12">
                <p><span style=""><?php echo $this->crud_model->get_table_name('economic_type',$row['type']);?></span> <?php echo $row['date'];?></p>
            </div>
            <div class="col-md-12">
                <h2>$<?php echo number_format($row['import'],2,'.',',');?></h2>
            </div>
            <div class="col-md-12">
                <h3><?php echo $row['description'];?></h3>
            </div>
            <div class="col-md-8 mb-3">
                <div class="details" style="    margin-top: 10px;">
                    <div>
                        <p ><span style="color: #999;">Número Único de Expediente (NUE): </span><b><?php echo $this->db->get_where('proceeding',array('proceeding_id'=>$row['proceeding_id']))->row()->nue;?></b></p>
                        <p ><span style="color: #999;">Cliente: </span><span><?php echo  $this->account_model->getUserFullName('directory',$row['client_id']);?></span></p>
                        <p ><span style="color: #999;">Responsable </span> <span><?php echo  $this->account_model->getUserFullName('directory',$row['manager_id']);?></span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <hr>
            <div>
                <h2>Pagos</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-padded dataTable no-footer economic_payments">
                                <thead>
                                    <tr>
                                        <th style="width:100px;">Fecha</th>
                                        <th style="width:100px;">Tipo</th>
                                        <th style="width:100px;">Monto</th>
                                        <th style="width:100px;">Concepto</th>
                                        <th style="width:100px;">Metodo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $proceeding_in = $this->db->get_where('economic_payment',array('movment_economic_id'=>$movment_economic_id,'status'=>1))->result_array();
                                        foreach( $proceeding_in as $row2):
                                    ?>
                                    <tr>
                                        <td style="width:100px;"><?php echo $row2['date'];?></td>
                                        <td style="width:100px;"><?php echo $this->crud_model->get_table_name('economic_payment_type',$row2['type']);?></td>
                                        <td style="width:100px;">$<?php echo number_format($row2['import'],2,'.',',');?></td>
                                        <td style="width:100px;"><?php echo $row2['description'];?></td>
                                        <td style="width:100px;"><?php echo $this->crud_model->get_table_name('payment_method',$row2['method']).$row2['status'];?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</body>

</html>
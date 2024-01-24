<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>FACTURACIÓN A PROVEEDORES</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Facturación a proveedores</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <a class="floated-chat-btn " style="text-decoration: none;" href="<?php echo base_url();?>admin/provaider_invoice_add/<?php echo base64_encode($action_type); ?>"><i class="icofont icofont-plus"></i></a>
    <div class="col-xl-12 col-lg-12 col-md-12 xl-65">
        <div class="row">
            <div class="col-sm-12 box-col-12">
                <div class="card">
                    <div class="social-tab">
                        <ul class="nav nav-tabs" id="top-tab" role="tablist">
                            <li class="nav-item"><a href="<?php echo base_url();?>admin/provaider_invoice" class="nav-link <?php  if($status == "") echo 'active'; ?>"><i class="fa fa-users"></i>Todos</a></li>
                            <li class="nav-item"><a href="<?php echo base_url();?>admin/provaider_invoice/1" class="nav-link <?php  if($status == 1) echo 'active'; ?>"><i class="fa fa-money"></i>Cobrados </a></li>
                            <li class="nav-item"><a href="<?php echo base_url();?>admin/provaider_invoice/2" class="nav-link <?php  if($status == 2) echo 'active'; ?>"><i class="fa fa-clock-o"></i>Pendientes</a></li>
                            <li class="nav-item"><a href="<?php echo base_url();?>admin/provaider_invoice/3" class="nav-link <?php  if($status == 3) echo 'active'; ?>"><i class="fa fa-calendar"></i>Vencidos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- profile post start-->
            <div class="col-sm-12" id="result">

            </div>
            <!-- profile post end                           -->
        </div>
    </div>

    <div class="container-fluid user-card">
        <!-- Zero Configuration  Starts-->

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0" style="align-self: center;display:flex;">
                    <!-- profile post end                           -->
                    <div class="col-sm-12 " style="text-align: center;display:flex;">
                        <div style="margin:10px 25px;color:green">
                            <h3><?php echo $this->crud_model->getCurrency().$this->crud_model->get_total_invoice(4); ?></h3>
                            <p style="font-weight:bold">TOTAL COBRADO</p>
                        </div>
                        <div style="margin:10px 25px;;">
                            <h3><?php echo $this->crud_model->getCurrency().$this->crud_model->get_pending_invoice(4); ?></h3>
                            <p style="font-weight:bold">PENDIENTE DE COBRO</p>
                        </div>
                        <div style="margin:10px 25px;;color:red">
                            <h3><?php echo $this->crud_model->getCurrency().$this->crud_model->get_expire_invoice(4); ?></h3>
                            <p style="font-weight:bold">EXPIRADO</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-padded dataTable no-footer " id="basic-1">
                            <thead>
                                <tr>
                                    <th>Factura</th>
                                    <th>Cliente</th>
                                    <th>Fecha de emisión</th>
                                    <th>Fecha de vencimiento</th>
                                    <th>Fecha cobrado</th>
                                    <th>Descripción</th>
                                    <th>Importe</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                $this->db->order_by('invoice_id','DESC');
                                if($status == 1)
                                {
                                    $this->db->where('status', 1);
                                }

                                if($status == 2)
                                {
                                    $this->db->where('status', 0);
                                }

                                if($status == 3)
                                {
                                    $this->db->where('expire_date <', date('Y-m-d'));
                                    $this->db->where('status',0);
                                }
                                $this->db->where('type', 4);
                                $invoice = $this->db->get('invoice')->result_array(); 


                                  foreach($invoice as $row):
                                    $directory = $this->db->get_where('directory',array('directory_id'=>$row['client_id']))->row_array(); 
                                  ?>
                                <tr>
                                    <td><?php echo $row['invoice'];   ?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>/admin/contact_profile/<?php echo base64_encode($directory['directory_id'])?>">
                                            <div class="user-with-avatar">
                                                <img alt="" src="<?php echo $this->account_model->get_photo('directory',$directory['directory_id']);?>">
                                                <span><?php echo $directory['name'].' '.$directory['first_last_name'].' '.$directory['second_last_name']?></span>
                                            </div>
                                        </a>
                                    </td>
                                    <td><?php echo date('d/m/Y', strtotime($row['date']));;?></td>
                                    <td><?php echo date('d/m/Y', strtotime($row['expire_date']));?></td>
                                    <td><?php if($row['invoice_date'] != "0000-00-00"):?><span><?php  echo date('d/m/Y', strtotime($row['invoice_date'])); ?></span> <?php endif;?></td>
                                    <td><?php echo $row['description'];?></td>
                                    <td><?php echo $this->crud_model->getCurrency().$row['amount'];?></td>
                                    <td><?php if($row['status']):?><span class="btn btn-success">Cobrado</span><?php else: ?><span class="btn btn-danger">Pendiente</span> <?php endif;?></td>
                                    <td>
                                        <a style="font-size:20px" onclick="modalLgRequest('<?php echo base_url();?>modal/popup/modal_provaider_invoice_pay/<?php echo $row['invoice_id'];?>');" href="javascript:void(0)"><i class="fa fa-file-text"></i></a>
                                        &nbsp
                                        <a style="font-size:20px;color:#00B8E9" href="<?php echo base_url();?>admin/provaider_invoice_edit/<?php echo base64_encode( $row['invoice_id']); ?>"><i class="fa fa-pencil-square"></i></a>
                                        &nbsp
                                        <a style="font-size:20px;color:#E52727" href="javascript:void(0)" onclick="deleteInvoice('<?php echo $row['invoice_id']; ?>')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Zero Configuration  Ends-->
    </div>
</div>
<script>
function deleteInvoice(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "También se eliminará toda la información asociada.",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#9fd13b',
        cancelButtonColor: '#fd4f57',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            location.href = "<?php echo base_url(); ?>admin/invoice/delete/" + id;

        }
    })
}
</script>
<!-- footer start-->
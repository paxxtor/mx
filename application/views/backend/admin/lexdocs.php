<a class="floated-chat-btn " style="text-decoration: none;" href="<?php echo base_url();?>admin/contract_add"><i class="icofont icofont-plus"></i></a>
<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 style="  text-transform: uppercase;">LexPapaers
                    </h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">LexPapaers</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid user-card">
        <!-- Zero Configuration  Starts-->

        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-padded dataTable no-footer " id="basic-1">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Identificación del contrato</th>
                                    <th>Tipo</th>
                                    <th>Fecha del contrato</th>
                                    <th>Cliente</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    $this->db->where('status',1);
                                    $contracts = $this->db->get('contract')->result_array(); 
                                    foreach($contracts as $row):
                                    
                                ?>
                                <tr>
                                    <td><?php echo $row['name'];   ?></td>
                                    <td><?php echo $row['no_contract'];   ?></td>
                                    <td><?php echo $row['tipo'];   ?></td>
                                    <td><?php echo $row['date'];   ?></td>
                                    <?php if($row['principal_client'] == 0):?>
                                    <td>
                                        <a href="<?php echo base_url();?>/admin/contact_profile/<?php echo base64_encode($row['client1'])?>">
                                            <div class="user-with-avatar">
                                                <img alt="" src="<?php echo $this->account_model->get_photo('directory',$row['client1']);?>">
                                                <span><?php echo $this->account_model->getUserFullName('directory',$row['client1']);?></span>
                                            </div>
                                        </a>
                                    </td>
                                    <?php else: ?>
                                    <td>
                                        <a href="<?php echo base_url();?>/admin/contact_profile/<?php echo base64_encode($row['client2'])?>">
                                            <div class="user-with-avatar">
                                                <img alt="" src="<?php echo $this->account_model->get_photo('directory',$row['client2']);?>">
                                                <span><?php echo $this->account_model->getUserFullName('directory',$row['client2']);?></span>
                                            </div>
                                        </a>
                                    </td>
                                    <?php endif;?>

                                    <td><?php if($row['status']):?><span class="btn btn-success">Cobrado</span><?php else: ?><span class="btn btn-danger">Pendiente</span> <?php endif;?></td>
                                    <td>
                                        <a style="font-size:20px" href="<?php echo base_url();?>admin/contract_details/<?php echo base64_encode( $row['contract_id']); ?>"><i class="fa fa-file-text"></i></a>
                                        &nbsp
                                        <a style="font-size:20px;color:#00B8E9" href="<?php echo base_url();?>admin/contract_edit/<?php echo base64_encode( $row['contract_id']); ?>"><i class="fa fa-pencil-square"></i></a>
                                        &nbsp
                                        <a style="font-size:20px;color:#E52727" href="javascript:void(0)" onclick="deleteContract('<?php echo $row['contract_id']; ?>')"><i class="fa fa-trash"></i></a>
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
function deleteContract(id) {
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
            location.href = "<?php echo base_url(); ?>admin/lexdocs/delete/" + id;

        }
    })
}
</script>
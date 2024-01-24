<!-- Page Sidebar Ends-->
<?php if( $this->crud_model->get_permission('folder_add') == 1):?>
<a class="floated-chat-btn " style="text-decoration: none;" href="<?php echo base_url();?>admin/folders_add/<?php echo  $type; ?>"><i class="icofont icofont-plus"></i></a>
<?php endif; ?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Carpeta <?php echo $type=="1"?'Judicial':'Investigación'; ?></h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Carpeta <?php echo $type=="1"?'Judicial':'Investigación'; ?></li>
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
                <div class="card-header pb-0">

                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-padded dataTable no-footer " id="pf">
                            <thead>
                                <tr>
                                    <th>Descripción</th>
                                    <th>Responsable</th>
                                    <th>NIC</th>
                                    <th>Fecha de Alta</th>
                                    <th>Situación</th>
                                    <th>Procedimiento</th>
                                    <th>Cliente</th>
                                    <th style="    text-align: center;"><i><img class="img-public" src="<?php echo base_url(); ?>public/uploads/public_title.svg" /></i></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $folders = $this->db->order_by('folder_id','DESC')->get_where('folder',array('type'=>$type,'status'=>1))->result_array(); 
                                  foreach($folders as $folder):
                                  ?>
                                <tr>
                                    <td><?php echo $folder['description'];?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>admin/folders_details/<?php echo base64_encode($folder['folder_id'])?>">
                                            <div class="user-with-avatar">
                                                <img alt="" src="<?php echo $this->account_model->get_photo('directory',$folder['manager_id']);?>">
                                                <span><?php echo $this->account_model->getUserFullName('directory',$folder['manager_id'])?></span>
                                            </div>
                                        </a>
                                    </td>
                                    <td><a href="<?php echo base_url();?>admin/folders_details/<?php echo base64_encode($folder['folder_id'])?>"><?php echo $folder['nic'];?> </a></td>
                                    <td><?php echo $folder['discharge_date'];?></td>
                                    <td><?php echo $this->crud_model->get_table_name('proceeding_status',$folder['proceeding_status']);?></td>
                                    <td><?php echo $folder['proccess'];?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>admin/folders_details/<?php echo base64_encode($folder['folder_id'])?>">
                                            <div class="user-with-avatar">
                                                <img alt="" src="<?php echo $this->account_model->get_photo('directory',$folder['client_id']);?>">
                                                <span><?php echo $this->account_model->getUserFullName('directory',$folder['client_id'])?></span>
                                            </div>
                                        </a>
                                    </td>
                                    <td style="text-align: -webkit-center;">
                                        <?php if($folder['public'] == 1):?><i><img src="<?php echo base_url(); ?>public/uploads/public.svg" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Público" /></i><?php endif;?>
                                        <?php if($folder['public'] == 0):?><i><img src="<?php echo base_url(); ?>public/uploads/confidential.svg" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Confidencial" /></i> <?php endif;?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="<?php echo base_url();?>admin/folders_details/<?php echo base64_encode($folder['folder_id'])?>"><i class="fa fa-file-text"></i></a>
                                        <?php if( $this->crud_model->get_permission('folder_delete') == 1):?>
                                        <a class="btn btn-primary" href="javascript:void(0)" onclick="deleteFolder('<?php echo $folder['folder_id']; ?>')"><i class="fa fa-trash"></i></a>
                                        <?php endif;?>
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
let timerInterval

function deleteFolder(folder_id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Toma en cuenta que solo se eliminará la copia de tu mensaje.",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#9fd13b',
        cancelButtonColor: '#fd4f57',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'Eliminando mensaje',
                titleTextColor: '#000',
                html: 'Esta ventana se cerrará en <strong></strong>.',
                timer: 2000,
                onBeforeOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                        Swal.getContent().querySelector('strong').textContent = Swal
                            .getTimerLeft()
                    }, 100)
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
            })
            location.href = "<?php echo base_url();?>admin/folders/delete/" + folder_id;
        }
    })
}
</script>
<!-- footer start-->
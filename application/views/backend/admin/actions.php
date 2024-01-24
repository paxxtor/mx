<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3><?php echo $this->db->get_where('action_type',array('action_type_id'=>$action_type))->row()->name;?></h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"><?php echo $this->db->get_where('action_type',array('action_type_id'=>$action_type))->row()->name;?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <?php if($action_type == 1):?>

    <div class="container-fluid user-card">
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">

                    <a class="btn btn-primary" style="margin:10px;" href="<?php echo base_url();?>admin/send_mail/<?php echo base64_encode($action_type); ?>">Enviar email</a>

                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-padded dataTable no-footer " id="basic-1">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Enviado a</th>
                                    <th>Asunto</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $actions = $this->db->order_by('action_id','desc')->get_where('action',array('action_type'=>$action_type))->result_array(); 
                                  foreach($actions as $action):
                                    $directory = $this->db->get_where('directory',array('directory_id'=>$action['send_to']))->row_array(); 
                                  ?>
                                <tr>
                                    <td><?php echo $this->db->get_where('action_type',array('action_type_id'=>$action['action_type']))->row()->name;   ?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>/admin/contact_profile/<?php echo base64_encode($directory['directory_id'])?>">
                                            <div class="user-with-avatar">
                                                <img alt="" src="<?php echo $this->account_model->get_photo('directory',$directory['directory_id']);?>">
                                                <span><?php echo $directory['name'].' '.$directory['first_last_name'].' '.$directory['second_last_name']?></span>
                                            </div>
                                        </a>
                                    </td>
                                    <td><?php echo $action['razon'];?></td>
                                    <td>Enviado</td>
                                    <td><a class="btn btn-primary" style="font-size: 12px;padding: 5px;" href="<?php echo base_url();?>admin/email_details/<?php echo base64_encode($action['action_id'])?>"><i data-feather="mail"></i></a></td>
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
    <?php  elseif($action_type == 4):?>
    <a class="floated-chat-btn " style="text-decoration: none;" href="<?php echo base_url();?>admin/actions_add/<?php echo base64_encode($action_type); ?>"><i class="icofont icofont-plus"></i></a>

    <div class="container-fluid user-card">
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-padded dataTable no-footer " id="t_acctions">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Contacto</th>
                                    <th>Clase</th>
                                    <th>NIC</th>
                                    <th>Inicio</th>
                                    <th>Fin</th>
                                    <th>Tiempo</th>
                                    <th>Estado</th>
                                    <th><i><img class="img-public" src="<?php echo base_url().'public/uploads/public_title.svg';  ?>" /></i></th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $actions = $this->db->get_where('action',array('action_type'=>$action_type,'status != '=>0))->result_array(); 
                                  foreach($actions as $action):
                                    $directory = $this->db->get_where('directory',array('directory_id'=>$action['directory_id']))->row_array(); 
                                  ?>
                                <tr>
                                    <td><?php echo $this->db->get_where('action_type',array('action_type_id'=>$action['action_type']))->row()->name   ?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>/admin/contact_profile/<?php echo base64_encode($directory['directory_id'])?>">
                                            <div class="user-with-avatar">
                                                <img alt="" src="<?php echo $this->account_model->get_photo('directory',$directory['directory_id']);?>">
                                                <span><?php echo $directory['name'].' '.$directory['first_last_name'].' '.$directory['second_last_name']?></span>
                                            </div>
                                        </a>
                                    </td>
                                    <td><?php echo $action['type'] == 1 ? "Expediente":'Carpeta '; if($action['type'] == 2) echo $action['folder_type'] == 1 ? "Judicial":'de Investigación ';?></td>
                                    <td>
                                        <?php if($action['type'] == 1) echo $this->db->get_where('proceeding',array('proceeding_id'=>$action['proceeding_id']))->row()->nic; ?>
                                        <?php if($action['type'] == 2) echo $this->db->get_where('folder',array('folder_id'=>$action['folder_id']))->row()->nic; ?>
                                    </td>
                                    <td style="white-space:nowrap;"><?php echo $action['date']; ?></td>
                                    <td style="white-space:nowrap;"><?php echo $action['discharge_date']; ?></td>
                                    <td><?php echo $action['time']; ?></td>
                                    <td>
                                        <?php if ($action['status'] == 1) echo '<span class="btn btn-info">Sin Iniciar</span>'; ?>
                                        <?php if ($action['status'] == 2) echo '<span class="btn btn-success">Iniciado</span>'; ?>
                                        <?php if ($action['status'] == 3) echo '<span class="btn btn-danger">Finalizado</span>';?>
                                        <?php if ($action['status'] == 4) echo '<span class="btn btn-warning">Vencido</span>';  ?>
                                        <?php if ($action['status'] == 5) echo '<span class="btn btn-warning">Cancelado</span>';?>
                                    </td>
                                    <td style="text-align: -webkit-center;">
                                        <?php if($action['public'] == 1):?><i><img src="<?php echo base_url(); ?>public/uploads/public.svg" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Público" /></i><?php endif;?>
                                        <?php if($action['public'] == 0):?><i><img src="<?php echo base_url(); ?>public/uploads/confidential.svg" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Confidencial" /></i> <?php endif;?>
                                    </td>
                                    <td style="white-space:nowrap;">
                                        <a class="btn btn-primary" href="<?php echo base_url();?>admin/actions_edit/<?php echo base64_encode($action['action_id'])?>"><i class="fa fa-file-text"></i></a>
                                        <?php if( $this->crud_model->get_permission('actions_delete') == 1):?>
                                        <a class="btn btn-primary" href="javascript:void(0)" onclick="deleteAction('<?php echo $action['action_id']; ?>')"><i class="fa fa-trash"></i></a>
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
    <?php else: ?>
    <a class="floated-chat-btn " style="text-decoration: none;" href="<?php echo base_url();?>admin/actions_add/<?php echo base64_encode($action_type); ?>"><i class="icofont icofont-plus"></i></a>

    <div class="container-fluid user-card">
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-padded dataTable no-footer " id="t_acctions">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Contacto</th>
                                    <th>Clase</th>
                                    <th>NIC</th>
                                    <th>Inicio</th>
                                    <th>Fin</th>
                                    <th>Tiempo</th>
                                    <th>Estado</th>
                                    <th><i><img class="img-public" src="<?php echo base_url().'public/uploads/public_title.svg';  ?>" /></i></th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $actions = $this->db->get_where('action',array('action_type'=>$action_type,'status != '=>0))->result_array(); 
                                  foreach($actions as $action):
                                    $directory = $this->db->get_where('directory',array('directory_id'=>$action['directory_id']))->row_array(); 
                                  ?>
                                <tr>
                                    <td><?php echo $this->db->get_where('action_type',array('action_type_id'=>$action['action_type']))->row()->name   ?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>/admin/contact_profile/<?php echo base64_encode($directory['directory_id'])?>">
                                            <div class="user-with-avatar">
                                                <img alt="" src="<?php echo $this->account_model->get_photo('directory',$directory['directory_id']);?>">
                                                <span><?php echo $directory['name'].' '.$directory['first_last_name'].' '.$directory['second_last_name']?></span>
                                            </div>
                                        </a>
                                    </td>
                                    <td><?php echo $action['type'] == 1 ? "Expediente":'Carpeta '; if($action['type'] == 2) echo $action['folder_type'] == 1 ? "Judicial":'de Investigación ';?></td>
                                    <td>
                                        <?php if($action['type'] == 1) echo $this->db->get_where('proceeding',array('proceeding_id'=>$action['proceeding_id']))->row()->nic; ?>
                                        <?php if($action['type'] == 2) echo $this->db->get_where('folder',array('folder_id'=>$action['folder_id']))->row()->nic; ?>
                                    </td>
                                    <td style="white-space:nowrap;"><?php echo $action['date']; ?></td>
                                    <td style="white-space:nowrap;"><?php echo $action['discharge_date']; ?></td>
                                    <td><?php echo $action['time']; ?></td>
                                    <td>
                                        <?php if ($action['status'] == 1) echo '<span class="btn btn-info">Planificada</span>'; ?>
                                        <?php if ($action['status'] == 2) echo '<span class="btn btn-success">Realizada</span>'; ?>
                                        <?php if ($action['status'] == 3) echo '<span class="btn btn-danger">Cancelada</span>'; ?>
                                        <?php if ($action['status'] == 4) echo '<span class="btn btn-warning">Vencido</span>'; ?>
                                    </td>
                                    <td style="text-align: -webkit-center;">
                                        <?php if($action['public'] == 1):?><i><img src="<?php echo base_url(); ?>public/uploads/public.svg" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Público" /></i><?php endif;?>
                                        <?php if($action['public'] == 0):?><i><img src="<?php echo base_url(); ?>public/uploads/confidential.svg" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Confidencial" /></i> <?php endif;?>
                                    </td>
                                    <td style="white-space:nowrap;">
                                        <a class="btn btn-primary" href="<?php echo base_url();?>admin/actions_edit/<?php echo base64_encode($action['action_id'])?>"><i class="fa fa-file-text"></i></a>
                                        <?php if( $this->crud_model->get_permission('actions_delete') == 1):?>
                                        <a class="btn btn-primary" href="javascript:void(0)" onclick="deleteAction('<?php echo $action['action_id']; ?>')"><i class="fa fa-trash"></i></a>
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
    <?php endif;?>
</div>
<script>
let timerInterval


function deleteAction(action_id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Se eliminara toda la informacion relacionada.",
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
            location.href = "<?php echo base_url();?>admin/actions/delete/" + action_id;
        }
    })
}
</script>
<!-- footer start-->
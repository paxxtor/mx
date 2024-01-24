<div class="card">
    <div class="profile-post">
        <div class="post-header">
            <div class="media">
                <div class="media-body align-self-center">
                    <a href="social-app.html">
                        <h3 class="user-name2">Actuaciones</h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="post-body">
            <div class="table-responsive">
                <table class="table table-padded dataTable no-footer show-case">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Contacto</th>
                            <th>Para</th>
                            <th>NIC</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Tiempo</th>
                            <th>Estado</th>
                            <th><i ><img class="img-public" src="<?php echo base_url().'public/uploads/public_title.svg';  ?>" /></i></th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $proceeding_in = $this->db->get_where('action',array('proceeding_id'=>$proceeding_id))->result_array();
                            foreach( $proceeding_in as $action):
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
                            <td><?php echo $action['type'] == 1 ? "Expediente":'Carpeta '; if($action['type'] == 2) echo $action['folder_type'] == 1 ? "Judicial":'de Investigaci贸n ';?></td>
                            <td>
                                <?php if($action['type'] == 1) echo $this->db->get_where('proceeding',array('proceeding_id'=>$action['proceeding_id']))->row()->nic; ?>
                                <?php if($action['type'] == 2) echo $this->db->get_where('folder',array('folder_id'=>$action['folder_id']))->row()->nic; ?>
                            </td>
                            <td><?php echo $action['date']; ?></td>
                            <td><?php echo $action['discharge_date']; ?></td>
                            <td><?php echo $action['time']; ?></td>
                            <td>
                                <?php 
                                if($action['action_type'] == 4 )
                                {
                                    if($action['status'] == 0)
                                    {
                                        echo '<span class="btn btn-danger btn-small">Sin asignar</span>';
                                    }else if($action['status'] == 1)
                                    {
                                        echo '<span class="btn btn-info">Iniciado</span>';
                                    }else if($action['status'] == 2)
                                    {
                                        echo '<span class="btn btn-warning">Finalizado</span>';
                                    }else if($action['status'] == 3)
                                    {
                                        echo '<span class="btn btn-success">Vencido</span>';
                                    }else if($action['status'] == 4)
                                    {
                                        echo '<span class="btn btn-light">Cancelado</span>';
                                    }

                                }else
                                {
                                    if($action['status'] == 0)
                                    {
                                        echo '<span class="btn btn-danger">Sin asignar</span>';
                                    }else if($action['status'] == 1)
                                    {
                                        echo '<span class="btn btn-success">Sin asignar</span>';
                                    }else if($action['status'] == 2)
                                    {
                                        echo '<span class="btn btn-success">Sin asignar</span>';
                                    }
                                };
                                ?>
                            
                            </td>
                           <td style="text-align: -webkit-center;">
                                          <?php if($action['public'] == 1):?><i><img src="<?php echo base_url(); ?>public/uploads/public.svg" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Público"/></i><?php endif;?>
                                          <?php if($action['public'] == 0):?><i><img src="<?php echo base_url(); ?>public/uploads/confidential.svg" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Confidencial"/></i> <?php endif;?>
                                    </td>
                            <td>
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
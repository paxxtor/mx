<div class="card">
    <div class="profile-post">
        <div class="post-header">
            <div class="media">
                <div class="media-body align-self-center">
                    <a href="social-app.html">
                        <h3 class="user-name2">Carpetas de Investigación </h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="post-body"> 
            <div class="table-responsive">
                <table class="table table-padded dataTable no-footer show-case">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th>NIC</th>
                            <th style="white-space: nowrap;" >Fecha de Alta</th>
                            <th>Situación</th>
                            <th>Procedimiento</th>
                            <th>Cliente</th>
                            <th style="width:250px"><i ><img class="img-public" style="width:35px" src="<?php echo base_url().'public/uploads/public_title.svg';  ?>" /></i></th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $folders = $this->db->order_by('folder_id','DESC')->get_where('folder',array('type'=>1,'status'=>1,'manager_id'=>$directory_id))->result_array(); 
                          foreach($folders as $folder):
                          ?>
                        <tr>
                            <td><?php echo $folder['description'];?></td>
                            <td style="white-space: nowrap;"><a href="<?php echo base_url();?>admin/folders_details/<?php echo base64_encode($folder['folder_id'])?>"><?php echo $folder['nic'];?> </a></td>
                            <td style="white-space: nowrap;"><?php echo $folder['discharge_date'];?></td>
                            <td style="white-space: nowrap;"><?php echo $this->crud_model->get_table_name('proceeding_status',$folder['proceeding_status']);?></td>
                            <td style="white-space: nowrap;"><?php echo $folder['proccess'];?></td>
                            <td style="white-space: nowrap;">
                                <a href="<?php echo base_url();?>admin/folders_details/<?php echo base64_encode($folder['folder_id'])?>">
                                    <div class="user-with-avatar">
                                        <img alt="" src="<?php echo $this->account_model->get_photo('directory',$folder['client_id']);?>">
                                        <span><?php echo $this->account_model->getUserFullName('directory',$folder['client_id'])?></span>
                                    </div>
                                </a>
                            </td>
                            <td style="text-align: -webkit-center;">
                                <?php if($folder['public'] == 1):?><i><img src="<?php echo base_url(); ?>public/uploads/public.svg" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Público"/></i><?php endif;?>
                                <?php if($folder['public'] == 0):?><i><img src="<?php echo base_url(); ?>public/uploads/confidential.svg" width="30px" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Confidencial" /></i> <?php endif;?>
                            </td>
                            <td style="white-space: nowrap;">
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
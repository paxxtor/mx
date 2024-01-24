<div class="card">
    <div class="profile-post">
        <div class="post-header">

            <div class="media">
                <div class="media-body align-self-center">
                    <a href="social-app.html">
                        <h3 class="user-name2">Intervinientes </h3>
                    </a>
                </div>
            </div>

            <a style="float:right" class="btn btn-primary mb-3" onclick="modalRequest('<?php echo base_url();?>modal/popup/modal_add_inter/<?php echo $proceeding_id;?>');" href="javascript:void(0)">+ </a>
        </div>
        <div class="post-body">
            <div class="table-responsive">
                <table class="table table-padded dataTable no-footer show-case">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Nombre</th>
                            <th>RFC</th>
                            <th>Direccion</th>
                            <th>Télefono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                            $proceeding_in = $this->db->get_where('proceeding_interveners',array('proceeding_id'=>$proceeding_id))->result_array();
                            foreach( $proceeding_in as $row):
                        ?>
                        <tr>
                            <?php 
                                $directory = $this->db->get_where('directory',array('directory_id'=>$row['directory_id']))->result_array();
                                foreach( $directory as $dr):
                            ?>
                            <td><b><?php echo $this->db->get_where('directory_rol',array('directory_rol_id'=>$dr['directory_rol_id']))->row()->name;?></b></td>
                            <td>
                                <a href="<?php echo base_url();?>/admin/contact_profile/<?php echo base64_encode($dr['directory_id'])?>">
                                    <div class="user-with-avatar">
                                        <img alt="" src="<?php echo $this->account_model->get_photo('directory',$dr['directory_id']);?>">
                                        <span><?php echo $dr['name'].' '.$dr['first_last_name'].' '.$dr['second_last_name']?></span>
                                    </div>
                                </a>
                            </td>
                            <td><?php echo $dr['rfc'];?></td>
                            <td><?php echo $dr['street'].' '.$dr['colony'].' '.$dr['municipallity'];?></td>
                            <td><?php echo $dr['phone'];?></td>
                            <td><?php echo $dr['email'];?></td>
                            <td style="font-size:20px">
                                <a class="" href="<?php echo base_url();?>/admin/contact_profile/<?php echo base64_encode($dr['directory_id'])?>"><i class="fa fa-user"></i></a>
                                <a href="javascript:void(0)" onclick="deleteElement('proceeding_interveners','<?php echo $row['proceeding_interveners_id']?>');"><i class="fa fa-trash m-r-5"></i></a>
                            </td>
                            <?php endforeach;?>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
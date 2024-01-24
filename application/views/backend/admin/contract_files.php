<div class="card">
    <div class="profile-post">
        <div class="post-header">
            <div class="media">
                <div class="media-body align-self-center">
                    <a href="social-app.html">
                        <h3 class="user-name2">Documentos</h3>
                    </a>
                </div>
            </div>
            <a style="float:right" class="btn btn-primary mb-3" onclick="modalLgRequest('<?php echo base_url();?>modal/popup/modal_contract_file/<?php echo $contract_id;?>');" href="javascript:void(0)">+ </a>
        </div>
        <div class="post-body">
            <div class="table-responsive">
                <table class="table table-padded dataTable no-footer show-case">
                    <thead>
                        <tr>
                            <th>Última modificación</th>
                            <th>Archivos</th>
                            <th>Propietario</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $contract_files = $this->db->get_where('contract_file',array('contract_id'=>$contract_id))->result_array();
                            foreach( $contract_files as $file):
                                  ?>
                        <tr>
                            <td style="width:20%"><?php echo $file['date'];   ?></td>
                            <td><?php echo $file['name'];   ?></td>
                            <td style="width:20%"><?php echo $this->account_model->getUserFullName('directory',$file['manager_id']);?></td>
                            <td><?php echo $file['status'];   ?></td>
                            <td style="width:10%">
                            <a href="<?php echo base_url(); ?>admin/contract_details/download_content1/<?php echo $file['contract_file_id']; ?>" target="_blanck"><i class="fa fa-eye"></i></a>
                            <a  href="javascript:void(0)" onclick="getDetails('files_details',<?php echo $file['contract_file_id'];?>)"><i class="fa fa-file-text"></i></a>
                            <a  href="javascript:void(0)" onclick="modalLgRequest('<?php echo base_url();?>modal/popup/modal_contract_edit_file/<?php echo $file['contract_file_id'];?>');" ><i class="fa fa-pencil-square"></i></a>
                            <a href="" ><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>

                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
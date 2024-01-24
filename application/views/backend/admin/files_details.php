<?php $contract_id = $this->db->get_where('contract_file',array('contract_file_id'=>$contract_file_id))->row()->contract_id;?>
<div class="card">
    <div class="profile-post">
        <div style="cursor:pointer;font-size:20px" onclick="getDetails('files',<?php echo $contract_id; ?>)"><i class="fa fa-arrow-circle-left"></i></div>
        <div class="post-header">
            <div class="media">
          
                <div class="media-body align-self-center">
                    <h3 class="user-name2"> Versiones</h3>
                </div>
            </div>
            <a style="float:right" class="btn btn-primary mb-3" onclick="modalLgRequest('<?php echo base_url();?>modal/popup/modal_contract_file_versions/<?php echo $contract_file_id;?>');" href="javascript:void(0)">+ </a>
        </div>
        <div class="post-body">
            <?php  
                $contract_file = $this->db->get_where('contract_file_rev',array('contract_file_id'=>$contract_file_id))->result_array();
            ?>
            <ul class="file-tree">

                <?php 
                          
                            foreach( $contract_file as $row):
                        ?>
                <li >
                    <div class="files" style="display:flex;cursor:pointer">
                        <b onclick="getDetails('files_edit',<?php echo $row['contract_file_rev_id'];?>)"><?php echo $this->db->get_where('contract_file',array('contract_file_id'=>$contract_file_id))->row()->name;?></b>
                        <br>
                     
                        <div class="file-actions" style="display:none;margin: 0px 15px 7px 15px; ">
                            <a style="font-size:20px" onclick="deleteFile('<?php echo $row['proceeding_files_id'];?>');" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
                        </div>
                       
                      
                    </div>
                    <p><?php echo $row['date']?> | <?php echo $this->account_model->getUserFullName('directory',$row['directory_id']);?></p>
                  
                </li>
                <?php endforeach; ?>


            </ul>

        </div>
    </div>
</div>
<link href="<?php echo base_url();?>public/assets/js/folding_tree/css/file-explore.css" rel="stylesheet">
<script src="<?php echo base_url();?>public/assets/js/folding_tree/js/file-explore.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
$(document).ready(function() {
    $(".file-tree").filetree({
        collapsed: false,
    });
});
</script>
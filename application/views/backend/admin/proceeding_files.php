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
            <a style="float:right" class="btn btn-primary mb-3" onclick="modalLgRequest('<?php echo base_url();?>modal/popup/modal_add_files/<?php echo $proceeding_id;?>');" href="javascript:void(0)">+ </a>
        </div>
        <div class="post-body">
            <ul class="file-tree">
                <?php 
                    $steps = $this->db->get_where('phase',array('status'=>1))->result_array();
                    foreach($steps as $step):
                    $proceeding_in = $this->db->query('SELECT * FROM `proceeding_files` WHERE `proceeding_id` = '.$proceeding_id.' AND `phase_id` = '.$step['phase_id'].'  AND parent_id IS NULL ORDER BY `proceeding_files_id` ASC')->result_array();
                    
                    if(count($proceeding_in) > 0):
                ?>
                <li class="folder-root open">
                    <div class="files" style="display:flex;cursor:pointer"><b><?php echo $step['name'];?></b>
                        <div class="file-actions" style="display:none;margin: 0px 15px 7px 15px;">
                            <a style="font-size:20px" onclick="modalLgRequest('<?php echo base_url();?>modal/popup/modal_add_files/<?php echo $proceeding_id;?>/<?php echo $step['phase_id'];?>');" href="javascript:void(0)"><i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <ul>
                        <?php 
                            foreach( $proceeding_in as $row):
                        ?>
                        <li>
                            <div class="files" style="display:flex;cursor:pointer">
                                <b onclick="modalLgRequest('<?php echo base_url();?>modal/popup/modal_show_files/<?php echo $row['proceeding_files_id'];?>');"><?php echo $row['name'];?></b>
                                <div class="file-actions" style="display:none;margin: 0px 15px 7px 15px;">
                                    <a style="font-size:20px" onclick="modalLgRequest('<?php echo base_url();?>modal/popup/modal_add_files_file2/<?php echo $proceeding_id;?>/<?php echo $row['proceeding_files_id'];?>');" href="javascript:void(0)"><i class="fa fa-plus-circle"></i></a>
                                    <a style="font-size:20px" onclick="modalLgRequest('<?php echo base_url();?>modal/popup/modal_edit_files/<?php echo $row['proceeding_files_id'];?>');" href="javascript:void(0)"><i class="fa fa-edit"></i></a>
                                    <a style="font-size:20px" onclick="deleteFile('<?php echo $row['proceeding_files_id'];?>');" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php endif; endforeach;?>
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

function deleteFile(proceeding_files_id) {

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

            if (proceeding_files_id != "") {

                $.ajax({
                    url: "<?php echo base_url().'admin/proceeding_files/delete/';?>" + proceeding_files_id,
                    type: "POST",
                    data: {},
                    success: function(response) {
                        getDetails('proceeding_files', <?php echo $proceeding_id; ?>);

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 2000,
                            customClass: {
                                popup: 'colored-toast'
                            },
                            iconColor: 'white',
                        });
                        Toast.fire({
                            icon: 'success',
                            title: 'Eliminado>'
                        })
                    },
                    error: function() {
                        console.log("error");
                    }
                });
            }

        }
    })


}
</script>
<div class="card">
    <div class="profile-post">
        <div class="post-header">
            <div class="media">
                <div class="media-body align-self-center">
                    <a href="social-app.html">
                        <h3 class="user-name2">Datos Económicos</h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="post-body">
            <div class="table-responsive">
                <h3 class="user-name2">honorarios</h3>
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
                        
                            $proceeding_in = $this->db->get_where('proceeding_judged',array('proceeding_id'=>$proceeding_id))->result_array();
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
                                <a href="javascript:void(0)" onclick="deleteElement('proceeding_judged','<?php echo $row['proceeding_judged_id']?>');"><i class="fa fa-trash m-r-5"></i></a>
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
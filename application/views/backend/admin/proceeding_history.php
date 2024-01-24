<div class="card">
    <div class="profile-post">
        <div class="post-header">
            <div class="media">
                <div class="media-body align-self-center">
                    <h3 class="user-name2">Historial de actividades</h3>
                </div>
            </div>
        </div>
        <div class="post-body">
            <div class="table-responsive">
                <table class="table table-padded dataTable no-footer show-case">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Fecha</th>
                            <th>Sección</th>
                            <th>Acción</th>
                            <th>Datos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                            $proceeding_in = $this->db->get_where('binnacle',array('origin'=>'proceeding','origin_id'=>$proceeding_id))->result_array();
                            foreach( $proceeding_in as $row):
                        ?>
                        <tr>
                            <td>
                                <a href="<?php echo base_url();?>/admin/contact_profile/<?php echo base64_encode($row['user_id'])?>">
                                    <div class="user-with-avatar">
                                        <img alt="" src="<?php echo $this->account_model->get_photo('directory',$row['user_id']);?>" style="max-width:20%">
                                        <span><?php echo  $this->account_model->getUserFullName('directory',$row['user_id']);?></span>
                                    </div>
                                </a>
                            </td>
                             <td><?php echo $row['date'];?></td>
                            <td><?php echo $row['section'];?></td>
                            <td><?php echo $row['action'];?></td>
                            <td><?php echo $row['message'];?></td>
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

function deleteMove(movment_economic_id) {
    console.log(movment_economic_id);
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

            if (movment_economic_id != "") {

                $.ajax({
                    url: "<?php echo base_url().'admin/proceeding_economic/delete/';?>" + movment_economic_id,
                    type: "POST",
                    data: {},
                    success: function(response) {
                        getDetails('proceeding_economic', <?php echo $proceeding_id; ?>);

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
                            title: 'Eliminado'
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
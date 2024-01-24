<div class="card">
    <div class="profile-post">
        <div class="post-header">

            <div class="media">
                <div class="media-body align-self-center">
                    <a href="social-app.html">
                        <h3 class="user-name2">Personal a su cargo</h3>
                    </a>
                </div>
            </div> 

            <a style="float:right" class="btn btn-primary mb-3" onclick="modalRequest('<?php echo base_url();?>modal/popup/modal_add_personal/<?php echo $directory_id;?>');" href="javascript:void(0)">+ </a>
        </div>
        <div class="post-body"> 
            <div class="table-responsive">
                <table class="table table-padded dataTable no-footer show-case">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $personal = $this->db->order_by('admin_personal_id','DESC')->get_where('admin_personal',array('admin_id'=>$directory_id))->result_array(); 
                          foreach($personal as $p):
                           $details = $this->db->get_where('directory',array('directory_id'=>$p['directory_id']))->row_array();
                          ?>
                        <tr>
                            <td><?php echo $details['name'];?></td>
                            <td style="white-space: nowrap;"><?php echo $this->db->get_where('charge',array('charge_id'=>$p['charge']))->row()->name;?></td>
                            <td style="white-space: nowrap;"><?php echo $details['phone'];?></td>
                            <td style="white-space: nowrap;"><?php echo $details['email'];?></td>
                            <td style="white-space: nowrap;">
                                <a class="btn btn-primary" href="javascript:void(0)" onclick="deletePersonal('<?php echo $p['admin_personal_id']; ?>')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    let timerInterval

function deletePersonal(admin_personal_id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Toma en cuenta que solo se eliminará el contacto",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#9fd13b',
        cancelButtonColor: '#fd4f57',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'Eliminando....',
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

                $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>admin/contact_profile/delete_personal/" + admin_personal_id,
                success: function(data) {

                  
                    getDetails('personal', <?php echo $directory_id; ?>);
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
                    // show response from the php script.
                }
            });
        }
    })
}
</script>
<form action="<?php echo base_url(); ?>admin/proceeding_interveners/add" method="post" id="idForm">
    <input type="hidden" value="<?php echo $param2; ?>" name="proceeding_id" />
    <input class="form-control" type="hidden" name="admin_id" value="<?php echo $param2; ?>">
    <div class="mb-3">
        <h4>Agregar contacto</h4>
    </div>
    <div class="col-sm-12 col-md-12 ">
        <div class="mb-3">
            <label class="form-label" for="exampleFormControlSelect9">Responsable</label><span style="color:red">*</span>
            <select class="form-select js-example-basic-single" required name="directory_rol_id" onclick="users(this.value)">
                <option value="">Seleccionar</option>
                <?php  $managers = $this->db->get('directory_rol')->result_array();
                    foreach ($managers as $mg): ?>
                <option value="<?php echo $mg['directory_rol_id'] ?>"><?php echo $mg['name']; ?></option>
                <?php endforeach;  ?>
            </select>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 mb-3">
        <div class="mb-3">
            <label class="form-label" for="exampleFormControlSelect9">Nombre</label><span style="color:red">*</span>
            <select class="form-select js-example-basic-single" required name="directory_id" id="users_holders">

            </select>
        </div>
    </div>
    <div class="text-right mt-3" style="text-align: right;">
        <br>
        <button class="btn btn-secondary" type="submit" id="modal_save">Guardar</button>
    </div>
</form>
<script>
$(document).ready(function() {
    $("#idForm").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var actionUrl = form.attr('action');

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(data) {

                $('#modal1').modal('hide');
                getDetails('proceeding_interveners', <?php echo $param2; ?>);
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
                    title: 'Agregado'
                })
                // show response from the php script.
            }
        });

    });
});


function users(user_id) {
    $.ajax({
        url: '<?php echo base_url(); ?>admin/get_users/' + user_id,
        success: function(response) {
            jQuery('#users_holders').html(response);
        }
    });
}
</script>
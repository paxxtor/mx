<form method="POST" action="<?php echo base_url();?>admin/proceeding_economic/create" id="idForm">
    <input type="hidden" name="origin_id" value="<?php echo $param2;?>">
    <input type="hidden" name="origin" value="<?php echo $param3;?>">
    <div class="modal-body">
        <div class="card-widget">
            <div class="row">
                <div class="mb-3">
                    <h4>Agregar nuevo movimiento económico</h4>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <label for="simpleinvput">Fecha:</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlSelect9">Tipo</label><span style="color:red">*</span>
                        <select class="form-select mb3 typehead" data-table="economic_type" required name="type" required></select>
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <label for="simpleinvput">Importe:</label>
                        <input id="fname" name="import" autocomplete='0' type="number" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <label for="simpleinvput">Concepto:</label>
                        <input id="fname" name="description" type="text" placeholder="Concepto" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 ">
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlSelect9">Cliente</label><span style="color:red">*</span>
                        <select class="form-select js-example-basic-single" required name="client_id">
                            <option value="">Seleccionar</option>
                            <?php  $managers = $this->db->get_where('directory', array('status'=>1,'directory_rol_id'=>1))->result_array();
                                                                foreach ($managers as $mg): ?>
                            <option value="<?php echo $mg['directory_id'] ?>"><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 ">
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlSelect9">Responsable</label><span style="color:red">*</span>
                        <select class="form-select js-example-basic-single" required name="manager_id">
                            <option value="">Seleccionar</option>
                            <?php  $managers = $this->db->where_in('directory_rol_id',array('4'))->get_where('directory', array('status'=>1))->result_array();
                                                                foreach ($managers as $mg): ?>
                            <option value="<?php echo $mg['directory_id'] ?>"><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Confirmar</button>
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
                getDetails('<?= $param3; ?>_economic', <?php echo $param2; ?>);
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
</script>
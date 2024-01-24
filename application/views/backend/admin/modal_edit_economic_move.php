<?php 
    $move = $this->db->get_where('proceeding_economic',array('proceeding_economic_id'=>$param2))->result_array(); 
    foreach ($move as $row):
?>
<form method="POST" action="<?php echo base_url();?>admin/proceeding_economic/update/<?php echo $param2?>" id="idForm">
    <div class="modal-body">
        <div class="card-widget">
            <div class="row">
                <div class="mb-3">
                    <h4>Editar movimiento económico</h4>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <label for="simpleinvput">Fecha:</label>
                        <input type="date" name="date" class="form-control" required value="<?php echo $row['date']?>">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlSelect9">Tipo</label><span style="color:red">*</span>
                        <select class="form-select mb3 typehead" data-table="economic_type" required name="type" required>
                            <option value="<?php echo $row['type']; ?>" selected><?php echo $this->crud_model->get_table_name('economic_type',$row['type']);?></option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <label for="simpleinvput">Importe:</label>
                        <input id="fname" name="import" autocomplete='0' type="number" class="form-control" required value="<?php echo $row['import']?>">
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <div class="form-group">
                        <label for="simpleinvput">Concepto:</label>
                        <input id="fname" name="description" type="text" placeholder="Concepto" class="form-control" required value="<?php echo $row['description']?>">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 ">
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlSelect9">Cliente</label><span style="color:red">*</span>
                        <select class="form-select js-example-basic-single" required name="client_id">
                            <option value="">Seleccionar</option>
                            <?php  $managers = $this->db->get_where('directory', array('status'=>1,'directory_rol_id'=>1))->result_array();
                                                                foreach ($managers as $mg): ?>
                            <option value="<?php echo $mg['directory_id'] ?>" <?php echo $mg['directory_id']==$row['client_id']?'selected':''; ?>><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
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
                            <option value="<?php echo $mg['directory_id'] ?>" <?php echo $mg['directory_id']==$row['manager_id']?'selected':''; ?>><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a type="submit" class="btn btn-danger " style="left: 25px;position: absolute;" onclick="modalLgRequest('<?php echo base_url();?>modal/popup/modal_economic_move/<?php echo $row['proceeding_economic_id'];?>');">Cancelar</a>
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
                getDetails('proceeding_economic', <?php echo $row['proceeding_id']; ?>);
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
<?php endforeach; ?>
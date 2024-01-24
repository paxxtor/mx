<form action="<?php echo base_url(); ?>admin/admin_contact/add" method="post">
    <input class="form-control" type="hidden" name="admin_id" value="<?php echo $param2; ?>">
    <div class="mb-3">
        <h4>Agregar contacto</h4>
    </div>
    <div class="mb-3">
        <label class="col-form-label" for="recipient-name">Nombre:<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="name">
    </div>
    <div class="mb-3">
        <label class="col-form-label" for="recipient-name">Cargo:</label>
        <input class="form-control" type="text" name="charge">
    </div>
    <div class="mb-3">
        <label class="col-form-label" for="recipient-name">Email:</label>
        <input class="form-control" type="text" name="email">
    </div>
    <div class="mb-3">
        <label class="col-form-label" for="recipient-name">Teléfono:</label>
        <input class="form-control" type="text" name="phone">
    </div>
    <div class="mb-3">
        <label class="col-form-label" for="message-text">Observaciones:</label>
        <textarea class="form-control" name="details"></textarea>
    </div>
    <div class="text-right" style="text-align: right;">
        <button class="btn btn-primary" type="submit" id="modal_save">Guardar</button>
    </div>
</form>

<form action="<?php echo base_url(); ?>admin/lexvault_templates/add" method="post">
    <div class="mb-3">
        <h4>Editar Plantilla</h4>
    </div>
    <div class="mb-3">
        <label class="col-form-label" for="recipient-name">Nombre:<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="name" value="">
    </div>
    
    <div class="mb-3">
        <label class="col-form-label" for="message-text">Descripción:</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
    <div class="text-right" style="text-align: right;">
        <button class="btn btn-primary" type="submit" id="modal_save">Guardar</button>
    </div>
</form>

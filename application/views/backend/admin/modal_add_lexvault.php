<link rel="stylesheet" type="text/css" href="https://mayansource.com/mx/public/assets/css/vendors/select2.css">
<form action="<?php echo base_url(); ?>admin/lexvault/add" method="post" id="idForm">
    <input type="hidden" value="<?php echo $param2; ?>" name="proceeding_id" />
    <input class="form-control" type="hidden" name="admin_id" value="<?php echo $param2; ?>">
    <div class="mb-3">
        <h4>Agregar contacto</h4>
    </div>
    <div class="col-sm-12 col-md-12 ">
        <div class="mb-3">
            <label class="form-label" for="exampleFormControlSelect9">Plantilla</label><span style="color:red">*</span>
            <select class="form-select js-example-basic-single" required name="lexvault_template_id" >
                <option value="">Seleccionar</option>
                <?php  $managers = $this->db->get('lexvault_template')->result_array();
                    foreach ($managers as $mg): ?>
                <option value="<?php echo $mg['lexvault_template_id'] ?>"><?php echo $mg['name']; ?></option>
                <?php endforeach;  ?>
            </select>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 mb-3">
        <div class="mb-3">
            <label class="form-label" for="exampleFormControlSelect9">Nombre</label><span style="color:red">*</span>
            <input class="form-control" type="text" name="name" required />
        </div>
    </div>
    <div class="col-sm-12 col-md-12 mb-3">
        <div class="mb-3">
            <label class="form-label" for="exampleFormControlSelect9">Descripción</label><span style="color:red">*</span>
            <textarea class="form-control"  name="description" required ></textarea>
        </div>
    </div>
    <div class="text-right mt-3" style="text-align: right;">
        <br>
        <button class="btn btn-primary" type="submit" id="modal_save">Guardar</button>
    </div>
</form>
<script>
$(function (){
    
    $('.js-example-basic-single').select2();
});
</script>

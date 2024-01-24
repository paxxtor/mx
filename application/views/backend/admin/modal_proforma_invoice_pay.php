<form action="<?php echo base_url(); ?>admin/proforma_invoice/pay/<?php echo $param2; ?>" method="post" id="idForm" enctype="multipart/form-data">
    <div class="mb-3">
        <h4>Marcar como cobrado</h4>
    </div>
    <div class="col-sm-12 col-md-12">
        <div class="mb-3">
            <label class="form-label">Fecha de cobro</label>
            <input class="form-control" type="date" name="invoice_date" value="<?php echo date('Y-m-d');?>">
        </div>
    </div>
    <div class="col-sm-12 col-md-12 mb-3">
        <label class="form-label" for="exampleFormControlSelect9">Forma de pago</label><span style="color:red">*</span>
        <select class="form-select mb3 typehead" data-table="invoice_clasification" required name="invoice_clasification_id">
        </select>
    </div>
    <div class="text-right mt-3" style="text-align: right;">
        <br>
        <button class="btn btn-secondary" type="submit" id="modal_save">Guardar</button>
    </div>
</form>
<script>
$(function() {
    $(".typehead").each(function() {

        table = $(this).data('table');
        $(this).attr('onclick', `openSelect('${table}',this.value)`);
        $(this).attr('id', table + '_name');


        $(this).after(`
                    <table  id='${table}_search' class='table' style="width: 280px;"></table>
                    <div id="loader_${table}" class="spinner-border text-primary" style="display:none;" role="status"><span class="sr-only">Loading...</span></div>
                    <table  id='${table}_options' class='table' style="width: 280px;"></table>
                    `);


    });
});
</script>
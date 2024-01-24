<form method="POST" action="<?php echo base_url();?>admin/movment_economic/create_payment" id="idForm">
    <input type="hidden" name="movment_economic_id" value="<?php echo $param2;?>">

    <div class="modal-body">
        <div class="card-widget">
            <div class="row">
                <div class="mb-3">
                    <h4>Cargar nuevo dato económico</h4>
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
                        <select class="form-select mb3 typehead" data-table="economic_payment_type" required name="type" required></select>
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
                <div class="col-sm-12 col-md-12">
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlSelect9">Método de pago</label><span style="color:red">*</span>
                        <select class="form-select mb3 typehead" data-table="payment_method" required name="payment_method"></select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a type="submit" class="btn btn-danger " style="left: 25px;position: absolute;" onclick="modalLgRequest('<?php echo base_url();?>modal/popup/modal_economic_move/<?php echo $param2;?>');">Cancelar</a>
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

                modalLgRequest('<?php echo base_url();?>modal/popup/modal_economic_move/<?php echo $param2;?>');
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
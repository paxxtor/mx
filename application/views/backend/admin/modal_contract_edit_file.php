<?php
$file = $this->db->get_where('contract_file', array('contract_file_id' => $param2))->result_array();
foreach($file as $row):
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/css/vendors/dropzone.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/js/fileupload/file-upload-with-preview.min.css">
<form class="row" action="<?php echo base_url(); ?>admin/contract_details/file_edit/<?php echo base64_encode($param2); ?>" method="post" id="idForm" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $row['contract_id']; ?>" name="contract_id" />
    <div class="mb-3">
        <h4>Agregar archivo</h4>
    </div>
    <div class="col-sm-12 col-md-4 mb-3">
        <label class="form-label" for="exampleFormControlSelect9"><b>Tipo:</b></label><span style="color:red">*</span>
        <select class="form-select mb3 typehead" data-table="contract_type_file" required name="type">
            <option value="<?php echo $row['type']; ?>" Selected><?php echo $this->crud_model->get_table_name('contract_type_file',$row['type']);?></option>
        </select>
    </div>
    <div class="col-sm-12 col-md-8 mb-3">
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Nombre</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="name" value="<?php echo $row['name']; ?>">
        </div>
    </div>
    <div class="col-sm-12 col-md-4 mb-3">
        <label class="form-label" for="exampleFormControlSelect9"><b>Canal:</b></label><span style="color:red">*</span>
        <select class="form-select mb3 typehead" data-table="contract_canal" required name="canal">
            <option value="<?php echo $row['canal']; ?>" Selected><?php echo $this->crud_model->get_table_name('contract_canal',$row['canal']);?></option>
        </select>
    </div>
    <div class="col-sm-12 col-md-4 mb-3">
        <div class="form-group mb-3">
            <label for="date">Fecha</label>
            <input class="form-control" type="date" name="date" value="<?php echo $row['date']; ?>">
        </div>
    </div>
    <div class="col-sm-12 col-md-4 mb-3">
        <div class="form-group mb-3">
            <label for="date">Fecha limite</label>
            <input class="form-control" type="date" name="date_end" value="<?php echo $row['date_end']; ?>">
        </div>
    </div>
    <div class="col-sm-12 col-md-6 mb-3">
        <label class="form-label" for="exampleFormControlSelect9"><b>Tipo:</b></label><span style="color:red">*</span>
        <select class="form-select mb3 typehead" data-table="contract_type_file1" required name="type_file">
            <option value="<?php echo $row['type_file']; ?>" Selected><?php echo $this->crud_model->get_table_name('contract_type_file1',$row['type_file']);?></option>
        </select>
    </div>
    <div class="col-sm-12 col-md-6 mb-3">
        <label class="form-label" for="exampleFormControlSelect9"><b>Estado:</b></label><span style="color:red">*</span>
        <select class="form-select mb3 typehead" data-table="contract_status_file" required name="contract_status_file">
            <option value="<?php echo $row['status']; ?>" Selected><?php echo $this->crud_model->get_table_name('contract_status_file',$row['status']);?></option>
        </select>
    </div>

    <div class="col-sm-12 col-md-12 mb-3">
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Remitente</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="sender" value="<?php echo $row['sender']; ?>">
        </div>
    </div>
    <div class="col-sm-12 col-md-12 mb-3">
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Asunto</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="subject" value="<?php echo $row['subject']; ?>">
        </div>
    </div>
    <div class="col-sm-12 col-md-12 ">
        <div class="mb-3">
            <label class="form-label" for="exampleFormControlSelect9">Encargado</label>
            <select class="form-select js-example-basic-single" required name="manager_id">
                <option value="">Seleccionar</option>
                <?php  $managers = $this->db->get_where('directory', array('status'=>1,'directory_rol_id'=>1))->result_array();
                                                                foreach ($managers as $mg): ?>
                <option value="<?php echo $mg['directory_id'] ?>" <?php echo $mg['directory_id'] == $row['manager_id'] ? 'Selected' :''; ?>><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                <?php endforeach;  ?>
            </select>
        </div>
    </div>
    <div class="form-group mb-3">
        <label>Nota</label>
        <textarea class="form-control" name="note" cols="10" rows="2"><?php echo $row['note']; ?></textarea>
    </div>
    
    <div class="text-right" style="text-align: right;">
        <button class="btn btn-primary" type="submit" id="modal_save">Guardar</button>
    </div>
</form>
<script src="<?php echo base_url() ?>public/assets/js/fileupload/file-upload-with-preview.min.js"></script>
<script src="<?php echo base_url() ?>public/assets/js/editor/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
//First upload
$(function() {

    $('input[type="date"]').attr('onfocus', 'this.showPicker()');


    $(".typehead").each(function() {

        table = $(this).data('table');
        field = $(this).attr('name');
        console.log($(this).attr('name'))

        $(this).attr('onclick', `openSelect('${table}',this.value,'${field}')`);
        $(this).attr('id', field + '_name');


        $(this).after(`
                        <table  id='${field}_search' class='table' style="width: 280px;"></table>
                        <div id="loader_${field}" class="spinner-border text-primary" style="display:none;" role="status"><span class="sr-only">Loading...</span></div>
                        <table  id='${field}_options' class='table' style="width: 280px;"></table>
                        `);


    });
});


$("form").submit(function() {
    $(this).find(':button').prop('disabled', true);
});


</script>
<script>
$(document).ready(function() {


    $("#idForm").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var actionUrl = form.attr('action');
        let data = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: data, // serializes the form's elements.
            processData: false,
            contentType: false,
            success: function(data) {

                $('#modalLG').modal('hide');
                getDetails('files', <?php echo $row['contract_id']; ?>);
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
<?php endforeach; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/css/vendors/dropzone.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/js/fileupload/file-upload-with-preview.min.css">
<form class="row" action="<?php echo base_url(); ?>admin/contract_details/file_create/<?php echo $param2; ?>" method="post" id="idForm" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $param2; ?>" name="contract_id" />
    <div class="mb-3">
        <h4>Agregar archivo</h4>
    </div>
    <div class="col-sm-12 col-md-4 mb-3">
        <label class="form-label" for="exampleFormControlSelect9"><b>Tipo:</b></label><span style="color:red">*</span>
        <select class="form-select mb3 typehead" data-table="contract_type_file" required name="type">
            <option value="">Seleccionar</option>
        </select>
    </div>
    <div class="col-sm-12 col-md-8 mb-3">
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Nombre</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="name">
        </div>
    </div>
    <div class="col-sm-12 col-md-4 mb-3">
        <label class="form-label" for="exampleFormControlSelect9"><b>Canal:</b></label><span style="color:red">*</span>
        <select class="form-select mb3 typehead" data-table="contract_canal" required name="canal">
            <option value="">Seleccionar</option>
        </select>
    </div>
    <div class="col-sm-12 col-md-4 mb-3">
        <div class="form-group mb-3">
            <label for="date">Fecha</label>
            <input class="form-control" type="date" name="date">
        </div>
    </div>
    <div class="col-sm-12 col-md-4 mb-3">
        <div class="form-group mb-3">
            <label for="date">Fecha limite</label>
            <input class="form-control" type="date" name="date_end">
        </div>
    </div>
    <div class="col-sm-12 col-md-6 mb-3">
        <label class="form-label" for="exampleFormControlSelect9"><b>Tipo:</b></label><span style="color:red">*</span>
        <select class="form-select mb3 typehead" data-table="contract_type_file1" required name="type_file">
            <option value="">Seleccionar</option>
        </select>
    </div>
    <div class="col-sm-12 col-md-6 mb-3">
        <label class="form-label" for="exampleFormControlSelect9"><b>Estado:</b></label><span style="color:red">*</span>
        <select class="form-select mb3 typehead" data-table="contract_status_file" required name="contract_status_file">
            <option value="">Seleccionar</option>
        </select>
    </div>

    <div class="col-sm-12 col-md-12 mb-3">
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Remitente</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="sender">
        </div>
    </div>
    <div class="col-sm-12 col-md-12 mb-3">
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Asunto</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="subject">
        </div>
    </div>
    <div class="col-sm-12 col-md-12 ">
        <div class="mb-3">
            <label class="form-label" for="exampleFormControlSelect9">Encargado</label>
            <select class="form-select js-example-basic-single" required name="manager_id">
                <option value="">Seleccionar</option>
                <?php  $managers = $this->db->get_where('directory', array('status'=>1,'directory_rol_id'=>1))->result_array();
                                                                foreach ($managers as $mg): ?>
                <option value="<?php echo $mg['directory_id'] ?>" <?php echo $mg['directory_id'] == $this->session->userdata('login_user_id') ? 'Selected' :''; ?>><?php echo $mg['name'].' '.$mg['first_last_name'].' '.$mg['second_last_name']?></option>
                <?php endforeach;  ?>
            </select>
        </div>
    </div>
    <div class="form-group mb-3">
        <label>Nota</label>
        <textarea class="form-control" name="note" cols="10" rows="2"></textarea>
    </div>
    <div class="col-xl-12 ">
        <div class="custom-file-container" data-upload-id="myFirstImage">
            <label><a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
            <label class="custom-file-container__custom-file">
                <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="*" name="file">
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                <span class="custom-file-container__custom-file__custom-file-control"></span>
            </label>
            <div class="custom-file-container__image-preview"></div>
        </div>
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

$(window).on('fileUploadWithPreview:imagesAdded', function(e) {

    // Get a reference to our file input
    const fileInput = document.querySelector('input[type="file"]');

    //Create a new DataTransfer object
    const dataTransfer = new DataTransfer

    //Add new files from the event's DataTransfer
    for (let i = 0; i < e.detail.cachedFileArray.length; i++)
        dataTransfer.items.add(e.detail.cachedFileArray[i])


    fileInput.files = dataTransfer.files
    console.log(fileInput.files);
});

$("form").submit(function() {
    $(this).find(':button').prop('disabled', true);
});

$('.custom-file-container__image-clear').hide();
</script>
<script>
$(document).ready(function() {

    var firstUpload = new FileUploadWithPreview('myFirstImage', {
        text: {
            browse: 'Buscar',
            chooseFile: 'Seleccionar archivos...'
        },
        multiple: true,
    })


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
                getDetails('files', <?php echo $param2; ?>);
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
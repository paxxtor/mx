<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/css/vendors/dropzone.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/js/fileupload/file-upload-with-preview.min.css">
<form class="row" action="<?php echo base_url(); ?>admin/folder_files/add" method="post" id="idForm" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $param2; ?>" name="folder_id" />
    <input type="hidden" value="<?php echo $param3; ?>" name="parent_id" />
    <div class="mb-3">
        <h4>Agregar archivo</h4>
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputPassword1">Nombre</label>
        <input class="form-control" id="exampleInputPassword1" type="text" name="name">
    </div>
    <div class="col-sm-12 col-md-12 mb-3">
        <label class="form-label" for="exampleFormControlSelect9"><b>Tipo:</b></label><span style="color:red">*</span>
        <select class="form-select mb3 typehead" data-table="files_type" required name="files_type_id">
            <option value="">Seleccionar</option>
        </select>
    </div>
    <div class="col-sm-12 col-md-4 mb-3">
        <label class="form-label" for="exampleFormControlSelect9"><b>Fecha de publicación:</b></label><span style="color:red">*</span>
        <input class="form-control" id="exampleFormControlSelect9" type="date" name="publication_date" required>
    </div>
    <div class="col-sm-12 col-md-4 mb-3">
        <label class="form-label" for="exampleFormControlSelect9"><b>Fecha de inicio de terminó:</b>
        <input class="form-control" id="exampleFormControlSelect9" type="date" name="date_start_end" >
    </div>
    <div class="col-sm-12 col-md-4 mb-3">
        <label class="form-label" for="exampleFormControlSelect9"><b>Fecha terminó:</b>
        <input class="form-control" id="exampleFormControlSelect9" type="date" name="date_end">
    </div>
    <div class="form-group mb-3">
        <label>Descripción</label>
        <textarea class="form-control" name="description" cols="10" rows="2"></textarea>
    </div>
    <div class="col-sm-12 col-md-12 mb-3">
        <div class="form-check checkbox checkbox-solid-dark">
            <input class="form-check-input" id="steps3" type="checkbox" name="public" value="1">
            <label class="form-check-label mb-0" for="steps3">Publicar en el perfil del cliente</label>
        </div>
    </div>
    <div class="col-xl-12 mb-3">
        <div class="custom-file-container" data-upload-id="myFirstImage">
            <label><a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
            <label class="custom-file-container__custom-file">
                <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="*" name="files[]" multiple="multiple">
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                <span class="custom-file-container__custom-file__custom-file-control"></span>
            </label>
            <div class="custom-file-container__image-preview"></div>
        </div>
    </div>
    <div class="text-right mt-3" style="text-align: right;">
        <br>
        <button class="btn btn-secondary" type="submit" id="modal_save">Guardar</button>
    </div>
</form>
<script src="<?php echo base_url() ?>public/assets/js/fileupload/file-upload-with-preview.min.js"></script>
<script src="<?php echo base_url() ?>public/assets/js/editor/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
//First upload
$(function() {
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
                getDetails('folder_files', <?php echo $param2; ?>);
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
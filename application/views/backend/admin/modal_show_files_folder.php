<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/css/vendors/dropzone.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/js/fileupload/file-upload-with-preview.min.css">
<input type="hidden" value="<?php echo $param2; ?>" name="proceeding_id" />

<?php   $files_details = $this->db->get_where('folder_files',array('folder_files_id'=>$param2))->row_array(); ?>
   <?php $arreglo = explode(",",$files_details['files']);
    for($i=0;$i<count($arreglo);$i++):
        if($arreglo[$i] != ""):?>
<div class="file-content card-body file-manager">

    <ul class="files">
        <h5 class="mt-4"><?php echo $files_details['name'];?></h5>
      
        <li class="file-box" style="width:100% !important; ">
            <div class="row">
                <div class="col-md-12 col-ms-12" style="justify-content: center;display: flex;align-items: center;">
                     <div class="file-top"  style="padding: 75px;"> <i class="fa fa-file-image-o txt-primary"></i></div>
                </div>
                
            </div>
        </li>
      
    </ul>
</div>
<div class="modal-footer" style="justify-content: start;">
    <div class="file-bottom">
        <?php echo $arreglo[$i];?>
        <p style="margin: 0px;">Descripción:<?php echo $files_details['description'];?></p>
        <p style="margin: 0px;">Fecha de publicación:<?php echo $files_details['publication_date'];?></p>
        <p style="margin: 0px;">Fecha de inicio de término:<?php echo $files_details['date_start_end'];?></p>
        <p style="margin: 0px;">Fecha de término:<?php echo $files_details['date_end'];?></p>
        <a style="font-size:20px" target="_blanck" href="<?php echo base_url();?>public/uploads/files/<?php echo $files_details['proceeding_files_id'] ?>/<?php echo $arreglo[$i];?>"><i class="fa fa-eye"></i></a>
        <a style="font-size:20px" target="_blanck" href="<?php echo base_url();?>admin/force_download/<?php echo $files_details['proceeding_files_id'] ?>/<?php echo base64_encode($arreglo[$i]);?>"><i class="fa fa-download"></i></a>
    </div>
   

</div>
 <?php     endif;
    endfor;?>
<script src="<?php echo base_url() ?>public/assets/js/fileupload/file-upload-with-preview.min.js"></script>
<script src="<?php echo base_url() ?>public/assets/js/editor/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
//First upload


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

                $('#modal1').modal('hide');
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
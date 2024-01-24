<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/css/vendors/dropzone.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/assets/js/fileupload/file-upload-with-preview.min.css">
<input type="hidden" value="<?php echo $param2; ?>" name="proceeding_id" />

<?php   $files_details = $this->db->get_where('proceeding_files',array('proceeding_files_id'=>$param2))->row_array(); ?>
  <?php 
            $arreglo = explode(",",$files_details['files']);
            for($i=0;$i<count($arreglo);$i++):
            if($arreglo[$i] != ""):
        ?>
<div class="file-content card-body file-manager">
    <h2 class="mt-4">Datos</h2>
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <h2 class="mt-4"><?php echo $files_details['name'];?></h2>
            <div >
                <p style="margin: 0px;"><b>Descripción: </b><?php echo $files_details['description'];?></p>
                <p style="margin: 0px;"><b>Fecha de publicación: </b><?php echo $files_details['publication_date'];?></p>
                <p style="margin: 0px;"><b>Fecha de inicio de término: </b><?php echo $files_details['date_start_end'];?></p>
                <p style="margin: 0px;"><b>Fecha de término: </b><?php echo $files_details['date_end'];?></p>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <img src="<?= base_url(); ?>public/assets/images/user/<?=  $files_details['icono']; ?>.jpg" width="150px">
        </div>
    
    </div>
</div>
<div class="modal-footer" style="justify-content: start;">
    <div>
        <h2>Archivos</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-padded  no-footer ">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Nombre</th>
                                <th>Etapa</th>
                                <th>Tipo</th>
                                <th>Parte</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                 <td><?= $files_details['date']; ?></td> 
                                 <td><?= $files_details['name']; ?></td> 
                                 <td><?= $this->db->get_where('phase',array('phase_id'=>$files_details['phase_id']))->row()->name; ?></td>
                                 <td><?= $this->db->get_where('files_type',array('files_type_id'=>$files_details['files_type_id']))->row()->name; ?></td>
                                 <td><?= 'Primario'; ?></td>
                                 <td>
                                    <a style="font-size:20px" target="_blanck" href="<?php echo base_url();?>public/uploads/files/<?php echo $files_details['proceeding_files_id'] ?>/<?php echo $arreglo[$i];?>"><i class="fa fa-eye"></i></a>
                                    <a style="font-size:20px" target="_blanck" href="<?php echo base_url();?>admin/force_download/<?php echo $files_details['proceeding_files_id'] ?>/<?php echo base64_encode($arreglo[$i]);?>"><i class="fa fa-download"></i></a>
                                    <a style="font-size:20px" onclick="modalLgRequest('<?php echo base_url();?>modal/popup/modal_edit_files/<?php echo $files_details['proceeding_files_id'];?>');" href="javascript:void(0)"><i class="fa fa-edit"></i></a>
                                    <a style="font-size:20px" onclick="deleteFile('<?php echo $files_details['proceeding_files_id'];?>');" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
                                 </td>
                            </tr>
                            <tr>
                           <?php echo $this->crud_model->hasfilestable($param2);?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
  <?php     
        endif;
        endfor;
    ?>
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
                getDetails('proceeding_files', <?php echo $param2; ?>);
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
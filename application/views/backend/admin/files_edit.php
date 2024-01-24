<style>
     /* Estilo para el contenedor del CKEditor */
  .cke_contents {
    border: 1px solid #ccc !important;
    padding: 5px !important;
    /* Otros estilos que desees aplicar al área del editor */
  }
  .cke_top {
    background-color: #d7e2e9 !important; /* Cambia el color según tus preferencias */
    /* Otros estilos que desees aplicar a la barra de herramientas */
    height: 60px;
  }
  .cke_chrome {
    background-color: #d7e2e9 !important;
}
.cke_chrome {
    visibility: inherit !important;
}
.cke_chrome {
    display: block !important;
    border-top: 1px solid #f7f7f7 !important;
    padding: 0 !important;
}

xa.chat-box .chat-right-aside .chat .chat-msg-box .message-data-time
{
    color:#999 !important;
}
.chat-box .chat-right-aside .chat .chat-msg-box .message{
    color:#59667a !important;
    font-weight:bold;
}
 

  /* Estilo para aumentar el tamaño de los botones de la barra de herramientas */
  .cke_button {
    line-height: 60px; /* Ajusta el tamaño de altura deseado */
    /* Otros estilos que desees aplicar a los botones */
  }

  /* Estilo para aumentar el tamaño del texto en los botones de la barra de herramientas */
  .cke_button .cke_label {
    font-size: 30px; /* Ajusta el tamaño de fuente deseado */
    /* Otros estilos que desees aplicar al texto de los botones */
  }
</style>
<?php 
$contract_file_id = $this->db->get_where('contract_file_rev',array('contract_file_rev_id'=>$contract_file_rev_id))->result_array();
foreach($contract_file_id as $details_ver):
$contract_id = $this->db->get_where('contract_file',array('contract_file_id'=>$details_ver['contract_file_id']))->row()->contract_id;

?>
<div class="card">
    <div class="profile-post">
        <div style="cursor:pointer;font-size:20px" onclick="getDetails('files_details',<?php echo $details_ver['contract_file_id']; ?>)"><i class="fa fa-arrow-circle-left"></i></div>
        <div class="post-header">
            <div class="media">

                <div class="media-body align-self-center">
                    <h3 class="user-name2"><?php echo $this->db->get_where('contract_file',array('contract_file_id'=>$details_ver['contract_file_id']))->row()->name;?> </h3>
                </div>
            </div>
        </div>
        <div class="post-body row">
            <div class="col-md-8 col-sm-12">
                <textarea class="form-control" id="textbox" name="message" cols="40" rows="10" name="message">
                    <?php 

                    $archivoRtf = 'public/uploads/contracts/'.$details_ver['file']; 
                    
                        // Verifica si el archivo existe
                        if (file_exists($archivoRtf)) {
                        $contenido = file_get_contents($archivoRtf);
                        echo $contenido;
                        } else {
                        echo 'El archivo no existe.';
                        }
                    
                    ?>
            
            
            </textarea>
            <div>
            
            <button class="btn btn-primary " type="button" style="   width:120px; float: right;margin-top: 10px;margin-left: 10px;" onclick="saveContent()">Guardar</button>
            <a class="btn btn-info " href="<?php echo base_url(); ?>admin/contract_details/download_content/<?php echo $contract_file_rev_id; ?>" style="   width:140px; float: right;margin-top: 10px;" >Descargar</a>    
        </div>
            </div>
            <div class="col-md-4 col-sm-12 call-chat-body">
                <div class="row chat-box ">
            <div class="col  chat-right-aside">
                        <!-- chat start-->
                        <div class="chat">
                          <div class="chat-history chat-msg-box custom-scrollbar">
                          <div >
                                <textarea class="form-control input-txt-bx" id="message-to-send" type="text" name="message-to-send" placeholder="Escribir comentario......" rows="5"></textarea>
                                <button class="btn btn-primary " type="button" style=" margin-top: 10px;" onclick="sendComment()">Enviar</button>
                            </div>
                            <br>
                            <ul>
                                <?php 
                                    $comments = json_decode( $details_ver['comments'],true); 
                                    $ultimoIndice = count($comments) - 1;
                                    for ($i = $ultimoIndice; $i >= 0; $i--):
                                    
                                        if($comments[$i]['directory_id'] == $this->session->userdata('login_user_id')):
                                ?>
                              <li>
                                <div class="message my-message"><img class="rounded-circle float-start chat-user-img img-30" src="<?php echo $this->account_model->get_photo('directory',$comments[$i]['directory_id']);?>" alt="">
                                  
                                    <?php echo $comments[$i]['comment']?>
                                    <div class="message-data "><span class="message-data-time"><?php echo $this->account_model->getUserFullName('directory',$comments[$i]['directory_id']); ?><br><?php echo $comments[$i]['date']?></span></div> 
                                </div>
                              </li>
                              <?php else:  ?>
                                <li>
                                    <div class="message other-message pull-right"><img class="rounded-circle float-end chat-user-img img-30" src="<?php echo $this->account_model->get_photo('directory',$comments[$i]['directory_id']);?>" alt="">
                                    
                                        <?php echo $comments[$i]['comment']?>
                                        <div class="message-data text-end"><span class="message-data-time"><?php echo $this->account_model->getUserFullName('directory',$comments[$i]['directory_id']); ?><br><?php echo $comments[$i]['date']?></span></div> 
                                    </div>
                              </li>
                                <?php endif;
                            
                            
                            endfor; ?>
                            </ul>
                           
                          </div>

                          <!-- chat end-->
                          <!-- Chat right side ends-->
                        </div>
                      </div>         
                    </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<link href="<?php echo base_url();?>public/assets/js/folding_tree/css/file-explore.css" rel="stylesheet">
<script src="<?php echo base_url();?>public/assets/js/folding_tree/js/file-explore.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="<?php echo base_url() ?>public/assets/js/editor/ckeditor/ckeditor.js"></script>
<script>
$(document).ready(function() {
    $(".file-tree").filetree({
        collapsed: false,
    });

// Inline ckeditor
CKEDITOR.disableAutoInline = true;
//init the area to be done
CKEDITOR.replace( 'textbox', {
    fillEmptyBlocks: false,
    autoParagraph: false,
    height: '400px',
    extraAllowedContent: 'p{text-align}',
   
} );


});

function sendComment()
{

    console.log('enviando: '+$('#message-to-send').val());
    $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>admin/contract_details/add_comment',
            data: {
                'comment':$('#message-to-send').val(),
                'contract_file_rev_id':'<?php echo $contract_file_rev_id; ?>',
            }, // serializes the form's elements.
            success: function(data) {
                getDetails('files_edit', <?php echo $contract_file_rev_id; ?>);
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

}

function saveContent()
{
    var contenido = CKEDITOR.instances.textbox.getData();
    console.log('enviando: '+contenido);
    $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>admin/contract_details/save_content',
            data: {
                'content':contenido,
                'contract_file_rev_id':'<?php echo $contract_file_rev_id; ?>',
            }, // serializes the form's elements.
            success: function(data) {
                getDetails('files_edit', <?php echo $contract_file_rev_id; ?>);
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

}
</script>
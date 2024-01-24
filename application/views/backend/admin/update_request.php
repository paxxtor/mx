<style>
.switch input:checked+.switch-state{
     background-color: #4db3a1;
}

 .toggle label {
	 position: relative;
	 display: inline-block;
	 width: 50px;
	 height: 50px;
	 background-color: #fd1015;
	 border-radius: 50px;
	 cursor: pointer;
	 box-shadow: inset 0 0 2px 1px rgba(0, 0, 0, 0.1), 0px 9px 15px 0px #ef4247;
	 -webkit-tap-highlight-color: transparent;
}
 .toggle label:before {
	 content: "";
	 position: absolute;
	 top: 50%;
	 left: 50%;
	 transform: translate(-50%, -50%);
	 transition: width 0.2s cubic-bezier(0, -1.85, 0.27, 1.75);
	 height: 30px;
	 width: 30px;
	 background-color: #fd0f14;
	 border-radius: 46px;
	 box-shadow: inset 0px 0px 0px 8px #fff;
}
 .toggle input {
	 display: none;
}
 .toggle input:checked + label {
	 background-color: #57de72;
	 box-shadow: inset 0 0 2px 1px rgba(0, 0, 0, 0.1), 0px 9px 15px 0px rgba(3, 132, 28, 0.5411764705882353);
}
 .toggle input:checked + label:before {
	 width: 10px;
	 background-color: #fff;
}

 .toggle span {
    font-weight: bold;
    position: relative;
    top: -30px;
    right: -15px;
    font-size: 20px;
}

</style>

<?php 
$admin = $this->db->get_where('admin_permission',array('directory_id'=>$directory_id))->result_array();
foreach($admin as $perm):
?>
<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Editar perfil</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Administrador</li>
                        <li class="breadcrumb-item active"> Editar permisos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-12">
                    <form class="card" action="<?php echo base_url(); ?>admin/admin_edit_permissions/edit/<?php echo $perm['directory_id']?>" method="post" enctype='multipart/form-data'>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 ">
                                     <div class="card-header pb-0">
                                        <h4 class="card-title mb-0">Permisos</h4>
                                        <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="col-sm-12 col-md-12 mb-3"  style="height: 30px;display:<?php echo ($type == 9)?'none':'block';?>">
                                                    <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">CARPETAS </h4>
                                                    <div class=" text-end" style="top: -43px;position: relative;">
                                                        <label class="switch">
                                                          <input type="checkbox"  name="folder" onclick="switchDiv('folder')" <?php echo $perm['folder'] == 1? 'checked':''; ?>><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row folder" style=" display:<?php echo $perm['folder'] == 1? 'block':'none'; ?>">
                                                    
                                                    <div class="col-md-12 toggle">
                                                          <input  id="folder_add" type="checkbox" name="folder_add" value="1" <?php echo $perm['folder_add'] == 1? 'checked':''; ?> />
                                                          <label for="folder_add"></label>
                                                          <span>Agregar</span>
                                                    </div>
                                                    <div class="col-md-12 toggle " >
                                                        <input  id="folder_edit"  type="checkbox"  name="folder_edit" value="1"  <?php echo $perm['folder_edit'] == 1? 'checked':''; ?>>
                                                        <label  for="folder_edit"></label>
                                                        <span>Actualizar</span>
                                                    </div>
                                                    <div class="col-md-12 toggle">
                                                            <input  id="folder_delete"  type="checkbox" name="folder_delete" value="1" <?php echo $perm['folder_delete'] == 1? 'checked':''; ?>>
                                                            <label  for="folder_delete"></label>
                                                            <span>Eliminar</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-sm-12 col-md-12 mb-3"  style="height: 30px;">
                                                    <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">EXPEDIENTES </h4>
                                                    <div class=" text-end" style="top: -43px;position: relative;">
                                                        <label class="switch">
                                                          <input type="checkbox"  name="proceedings" value="1" onclick="switchDiv('proceedings')" <?php echo $perm['proceedings'] == 1? 'checked':''; ?>><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row proceedings" style=" display:<?php echo $perm['proceedings'] == 1 ? 'block':'none'; ?>">
                                                    <div class="col-md-12 toggle">
                                                        <input  id="proceedings_add"  type="checkbox" name="proceedings_add" value="1" <?php echo $perm['proceedings_add'] == 1? 'checked':''; ?>>
                                                        <label  for="proceedings_add"><b></b></label>
                                                        <span>Agregar</span>
                                                    </div>
                                                    <div class="col-md-12 toggle">
                                                        <input  id="proceedings_edit"  type="checkbox" name="proceedings_edit" value="1" <?php echo $perm['proceedings_edit'] == 1? 'checked':''; ?>>
                                                        <label  for="proceedings_edit"><b></b></label>
                                                        <span>Actualizar</span>
                                                    </div>
                                                    <div class="col-md-12 toggle">
                                                        <input  id="proceedings_delete"  type="checkbox" name="proceedings_delete" value="1" <?php echo $perm['proceedings_delete'] == 1? 'checked':''; ?>>
                                                        <label  for="proceedings_delete"></label>
                                                        <span>Eliminar</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-sm-12 col-md-12 mb-3"  style="height: 30px;">
                                                    <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">ACTUACIONES</h4>
                                                    <div class=" text-end" style="top: -43px;position: relative;">
                                                        <label class="switch">
                                                          <input type="checkbox" name="actions" onclick="switchDiv('actions')" value="1" <?php echo $perm['actions'] == 1? 'checked':''; ?>><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row actions" style="display:<?php echo $perm['actions'] == 1? 'block':'none'; ?>">
                                                    <div class="col-md-12 toggle">
                                                        <input  id="actions_add"  type="checkbox" name="actions_add" value="1" <?php echo $perm['actions_add'] == 1? 'checked':''; ?>>
                                                        <label  for="actions_add"></label>
                                                         <span>Agregar</span>
                                                    </div>
                                                    <div class="col-md-12 toggle">
                                                        <input  id="actions_edit"  type="checkbox" name="actions_edit" value="1" <?php echo $perm['actions_edit'] == 1? 'checked':''; ?>>
                                                        <label  for="actions_edit"></label>
                                                         <span>Actualizar</span>
                                                    </div>
                                                    <div class="col-md-12 toggle">
                                                        <input  id="actions_delete"  type="checkbox" name="actions_delete" value="1" <?php echo $perm['actions_delete'] == 1? 'checked':''; ?>>
                                                        <label  for="actions_delete"></label>
                                                         <span>Eliminar</span>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-md-4">
                                                <div class="col-sm-12 col-md-12 mb-3"  style="height: 30px;">
                                                    <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">FACTURACIÓN</h4>
                                                    <div class=" text-end" style="top: -43px;position: relative;">
                                                        <label class="switch">
                                                          <input type="checkbox" name="invoice"  onclick="switchDiv('invoice')" value="1" <?php echo $perm['invoice'] == 1? 'checked':''; ?>><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row invoice" style=" display:<?php echo $perm['invoice'] == 1? 'block':'none'; ?>">
                                                    <div class="col-md-12 toggle">
                                                        <input  id="invoice_add"  type="checkbox" name="invoice_add" value="1" <?php echo $perm['invoice_add'] == 1? 'checked':''; ?>>
                                                        <label  for="invoice_add"><b></b></label>
                                                         <span>Agregar</span>
                                                    </div>
                                                    <div class="col-md-12 toggle">
                                                        <input  id="invoice_edit"  type="checkbox" name="invoice_edit" value="1" <?php echo $perm['invoice_edit'] == 1? 'checked':''; ?>>
                                                        <label  for="invoice_edit"><b></b></label>
                                                         <span>Actualizar</span>
                                                    </div>
                                                    <div class="col-md-12 toggle">
                                                        <input  id="invoice_delete"  type="checkbox" name="invoice_delete" value="1" <?php echo $perm['invoice_delete'] == 1? 'checked':''; ?>>
                                                        <label  for="invoice_delete"></label>
                                                        <span>Eliminar</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-sm-12 col-md-12 mb-3"  style="height: 30px;">
                                                    <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">DIRECTORIO</h4>
                                                    <div class=" text-end" style="top: -43px;position: relative;">
                                                        <label class="switch">
                                                          <input type="checkbox"  name="directory"  onclick="switchDiv('directory')" value="1" <?php echo $perm['directory'] == 1? 'checked':''; ?>><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row directory" style="display:<?php echo $perm['directory'] == 1? 'block':'none'; ?>">
                                                    <div class="col-md-12 toggle">
                                                        <input  id="directory_add"  type="checkbox" name="directory_add" value="1" <?php echo $perm['directory_add'] == 1? 'checked':''; ?>>
                                                        <label  for="directory_add"><b></b></label>
                                                         <span>Agregar</span>
                                                    </div>
                                                    <div class="col-md-12 toggle">
                                                        <input  id="directory_edit"  type="checkbox" name="directory_edit" value="1" <?php echo $perm['directory_edit'] == 1? 'checked':''; ?>>
                                                        <label  for="directory_edit"><b></b></label>
                                                         <span>Actualizar</span>
                                                    </div>
                                                    <div class="col-md-12 toggle">
                                                        <input  id="directory_delete"  type="checkbox" name="directory_delete" value="1" <?php echo $perm['directory_delete'] == 1? 'checked':''; ?>>
                                                        <label  for="directory_delete"></label>
                                                         <span>Eliminar</span>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-md-4">
                                                <div class="col-sm-12 col-md-12 mb-3"  style="height: 30px;">
                                                    <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">ADMINISTRADORES</h4>
                                                    <div class=" text-end" style="top: -43px;position: relative;">
                                                        <label class="switch">
                                                          <input type="checkbox" name="admins" onclick="switchDiv('admins')" value="1" <?php echo $perm['admins'] == 1? 'checked':''; ?>><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row admins " style="display:<?php echo $perm['admins'] == 1? 'block':'none'; ?>">
                                                    <div class="col-md-12 toggle">
                                                        <input  id="admins_add"  type="checkbox" name="admins_add" value="1" <?php echo $perm['admins_add'] == 1? 'checked':''; ?>>
                                                        <label  for="admins_add"><b></b></label>
                                                         <span>Agregar</span>
                                                    </div>
                                                    <div class="col-md-12 toggle">
                                                        <input  id="admins_edit"  type="checkbox" name="admins_edit" value="1" <?php echo $perm['admins_edit'] == 1? 'checked':''; ?>>
                                                        <label  for="admins_edit"><b></b></label>
                                                         <span>Actualizar</span>
                                                    </div>
                                                    <div class="col-md-12 toggle">
                                                        <input  id="admins_delete"  type="checkbox" name="admins_delete" value="1" <?php echo $perm['admins_delete'] == 1? 'checked':''; ?>>
                                                        <label  for="admins_delete"></label>
                                                         <span>Eliminar</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-sm-12 col-md-12 mb-3"  style="height: 30px;">
                                                    <h4 style="background: #001A15;padding: 7px;border-radius: 10px;color: #fff;">AJUSTES</h4>
                                                    <div class=" text-end" style="top: -43px;position: relative;">
                                                        <label class="switch">
                                                          <input type="checkbox"  name="settings"  onclick="switchDiv('settings')"  value="1" <?php echo $perm['settings'] == 1? 'checked':''; ?> ><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row settings" style=" display:<?php echo $perm['settings'] == 1 ? 'block':'none'; ?>">
                                                    <div class="col-md-12 toggle">
                                                        <input  id="settings_add"  type="checkbox" name="settings_add" value="1" <?php echo $perm['settings_add'] == 1? 'checked':''; ?>>
                                                        <label  for="settings_add"><b></b></label>
                                                         <span>Agregar</span>
                                                    </div>
                                                    <div class="col-md-12 toggle">
                                                        <input  id="settings_edit"  type="checkbox" name="settings_edit" value="1" <?php echo $perm['settings_edit'] == 1? 'checked':''; ?>>
                                                        <label  for="settings_edit"><b></b></label>
                                                         <span>Actualizar</span>
                                                    </div>
                                                    <div class="col-md-12 toggle">
                                                        <input  id="settings_delete"  type="checkbox" name="settings_delete" value="1" <?php echo $perm['settings_delete'] == 1? 'checked':''; ?>>
                                                        <label  for="settings_delete"></label>
                                                         <span>Eliminar</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Actualizar permisos</button>
                        </div>
                    </form>
                    <!-- Container-fluid Ends-->
                </div>
            </div>
        </div>
    </div>  
</div>
<!-- footer start-->
<?php endforeach; ?>
<script type="text/javascript">
function switchDiv(div){
    $('.'+div).toggle(500);
        if (typeof attr == 'undefined'  ) 
        {
            $('checkbox[name='+div+'_add]').attr('required','required');
            $('checkbox[name='+div+'_edit]').attr('required','required');
            $('checkbox[name='+div+'_delete]').attr('required','required');
            
        }else
        {
            $('checkbox[name='+div+'_add]').removeAttr('required');  
            $('checkbox[name='+div+'_edit]').removeAttr('required');  
            $('checkbox[name='+div+'_delete]').removeAttr('required');  
        }
}

window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            console.log(form);
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
}, false);
</script>
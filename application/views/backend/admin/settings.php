<style>
.avatar-upload {
    position: relative;
    max-width: 205px;
    margin: 0px;
    padding-top: 20px;
    padding-bottom: 20px;
}

.avatar-upload .avatar-edit {
    position: absolute;
    right: 88px;
    z-index: 1;
    top: 30px;
}

.avatar-upload .avatar-preview {
    width: 120px;
    height: 120px;
    position: relative;
    border-radius: 100%;
    border: 5px solid #e2e1e1;
    box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 10%);
}

.avatar-upload .avatar-preview>div {
    width: 100%;
    height: 100%;
    border-radius: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}


.avatar-upload .avatar-preview2 {
        width: 500px;
    height: 700px;
    
    position: relative;
   
    border: 5px solid #e2e1e1;
    box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 10%);
}

.avatar-upload .avatar-preview2 >div {
    width: 100%;
    height: 100%;
  
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}

.avatar-upload .avatar-edit input {
    display: none;
}

button,
input {
    overflow: visible;
}

button,
input,
optgroup,
select,
textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}

.avatar-upload .avatar-edit input+label {
    display: inline-block;
    width: 25px;
    height: 25px;
    margin-bottom: 0;
    border-radius: 100%;
    background: #ff5656eb;
    border: 1px solid transparent;
    box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 12%);
    cursor: pointer;
    font-weight: normal;
    transition: all 0.2s ease-in-out;
}

.form-group label,
label {
    font-size: 15px;
    color: #acb0c3;
    letter-spacing: 1px;
}

.avatar-upload .avatar-edit input+label:after {
    content: "\f040";
    font-family: 'FontAwesome';
    color: #fff;
    position: absolute;
    top: 0px;
    left: 0;
    right: 0;
    text-align: center;
    margin: auto;
}
</style>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Ajustes del sistema</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active"> Ajustes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Logo y Nombre del Sistema</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url(); ?>admin/settings/update_system" method="post" enctype='multipart/form-data'>
                                <div class=" mb-2">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' name="logo" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <?php 
                                            $logo=$this->db->get_where('settings', array('type' => 'logo'))->row()->description;
                                            if($logo != ''):?>
                                            <div id="imagePreview" style="background-image: url('<?php echo base_url();?>public/assets/images/logo/<?php echo $logo;?>');"></div>
                                            <?php else:?>
                                            <div id="imagePreview" style="background-image: url(<?php echo base_url();?>public/assets/images/logo/small-logo.png);"></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nombre del sistema</label>
                                    <input class="form-control" placeholder="Nombre del sistema" name="system_title" value="<?php echo $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;?>">
                                </div>
                                <div class="form-footer text-end">
                                    <button class="btn btn-primary btn-block">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <form class="card" action="<?php echo base_url(); ?>admin/settings/update_info" method="post" enctype='multipart/form-data'>
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Informacón de la empresa.</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nombre</label>
                                        <input class="form-control" type="text" placeholder="Company" name="system_name" value="<?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Télefono</label>
                                        <input class="form-control" type="number" placeholder="Teléfono" name="system_phone" value="<?php echo $this->db->get_where('settings', array('type' => 'system_phone'))->row()->description;?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Correo electrónico</label>
                                        <input class="form-control" type="email" placeholder="Email" name="system_email" value="<?php echo $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Dirección</label>
                                        <input class="form-control" type="text" placeholder="Home Address" name="system_address" value="<?php echo $this->db->get_where('settings', array('type' => 'system_address'))->row()->description;?>">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div>
                                        <label class="form-label">Acerca de</label>
                                        <textarea class="form-control" rows="5" placeholder="Enter About your description" name="about_us"><?php echo $this->db->get_where('settings', array('type' => 'about_us'))->row()->description;?></textarea>
                                    </div>
                                </div>
                             
                                <h3>Expedientes/Carpetas</h3>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Interés</label>
                                        <input class="form-control" type="number" placeholder="Interés" name="system_interest" value="<?php echo $this->db->get_where('settings', array('type' => 'interest'))->row()->description;?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Actualziar</button>
                        </div>
                    </form>
                    <!-- Container-fluid Ends-->
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Hoja membretada carta</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url(); ?>admin/settings/update_system_sheet_docs" method="post" enctype='multipart/form-data'>
                                <div class=" mb-2">
                                    <div class="avatar-upload">
                                        <div class="">
                                            <input type='file' name="sheet_docs" id="backgroundImage" accept=".png, .jpg, .jpeg" />
                                            <label for="backgroundImage"></label>
                                        </div>
                                        <div class="avatar-preview2">
                                            <?php 
                                            $sheet_docs=$this->db->get_where('settings', array('type' => 'sheet_docs'))->row()->description;
                                            if($sheet_docs != ''):?>
                                            <div id="imagePreview2" style="background-image: url('<?php echo base_url();?>public/assets/images/<?php echo $sheet_docs;?>');"></div>
                                            <?php else:?>
                                            <div id="imagePreview2" style="background-image: url(<?php echo base_url();?>public/assets/images/small-logo.png);"></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-footer text-end">
                                    <button class="btn btn-primary btn-block">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Hoja membretada oficio</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url(); ?>admin/settings/update_system_sheet_docs_of" method="post" enctype='multipart/form-data'>
                                <div class=" mb-2">
                                    <div class="avatar-upload">
                                        <div class="">
                                            <input type='file' name="sheet_docs" id="backgroundImage" accept=".png, .jpg, .jpeg" />
                                            <label for="backgroundImage"></label>
                                        </div>
                                        <div class="avatar-preview2">
                                            <?php 
                                            $sheet_docs=$this->db->get_where('settings', array('type' => 'sheet_docs_of'))->row()->description;
                                            if($sheet_docs != ''):?>
                                            <div id="imagePreview2" style="background-image: url('<?php echo base_url();?>public/assets/images/<?php echo $sheet_docs;?>');"></div>
                                            <?php else:?>
                                            <div id="imagePreview2" style="background-image: url(<?php echo base_url();?>public/assets/images/small-logo.png);"></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-footer text-end">
                                    <button class="btn btn-primary btn-block">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function readURL2(input) {
    
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview2').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview2').hide();
                $('#imagePreview2').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#backgroundImage").change(function() {
        readURL2(this);
    });


</script>
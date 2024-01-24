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
    right: 0px;
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
<?php 
     
        $admin = $this->db->get_where('admin',array('admin_id'=>base64_decode($admin_id)))->result_array();
        foreach( $admin as $row):
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
                        <li class="breadcrumb-item active"> Editar perfil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="edit-profile">
            <div class="row">
                <div class="col-xl-4 row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h4 class="card-title mb-0">Actualizar imagen</h4>
                                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url(); ?>admin/admin_edit_profile/edit_image/<?php echo $admin_id ?>" method="post" enctype='multipart/form-data'>
                                    <div class="row mb-2">
                                        <div class="profile-title">
                                            <div class="media">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' name="photo" id="imageUpload" accept=".png, .jpg, .jpeg" required />
                                                        <label for="imageUpload"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview" style="background-image: url('<?php echo $this->account_model->get_photo('admin',$row['admin_id']);?>');"></div>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="mb-1 f-20 txt-primary"><?php echo $row['name'].' '.$row['last_name']; ?></h3>
                                                    <p class=" f-12">@<?php echo $row['username']?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-footer">
                                        <button class="btn btn-primary btn-block">Actualizar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h4 class="card-title mb-0">Actualizar contraseña</h4>
                                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" novalidate="" action="<?php echo base_url(); ?>admin/admin_edit_profile/edit_password/<?php echo $admin_id ?>" method="post" enctype='multipart/form-data'>
                                    <div class="mb-3">
                                        <label class="form-label">Contraseña<span style="color:red">*</span></label>
                                        <input class="form-control password" name="password" type="password" placeholder="Contraseña" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Repetir Contraseña<span style="color:red">*</span></label>
                                        <input class="form-control password2" name="repeat_password" type="password" placeholder="Repetir contraseña" required>
                                        <div class="invalid-feedback">Las contraseñas no coinciden.</div>
                                    </div>
                                    <div class="form-footer">
                                        <button class="btn btn-primary btn-block">Actualizar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <form class="card" action="<?php echo base_url(); ?>admin/admin_edit_profile/edit_info/<?php echo $admin_id ?>" method="post" enctype='multipart/form-data'>
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Editar información</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Nombres<span style="color:red">*</span></label>
                                        <input class="form-control" type="text" placeholder="Nombres" name="name" value="<?php echo $row['name'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Apellidos<span style="color:red">*</span></label>
                                        <input class="form-control" type="text" placeholder="Apellidos" name="last_name" value="<?php echo $row['last_name'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">DNI<span style="color:red">*</span></label>
                                        <input class="form-control" type="number" placeholder="No. de identificación" name="dni" value="<?php echo $row['dni'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Teléfono<span style="color:red">*</span></label>
                                        <input class="form-control" type="number" placeholder="Telefono" name="phone" value="<?php echo $row['phone'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Correo electrónico<span style="color:red">*</span></label>
                                        <input class="form-control" type="email" placeholder="Email" name="email" value="<?php echo $row['email'];?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Dirección</label>
                                        <input class="form-control" type="text" placeholder="Dirección" name="address" value="<?php echo $row['address'];?>">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div>
                                        <label class="form-label">Acerca de</label>
                                        <textarea class="form-control" rows="5" placeholder="Escribe una breve descripción" name="about"><?php echo $row['about'];?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3">
                                    <div class="mb-3">
                                        <label class="form-label">Whatsapp</label>
                                        <input class="form-control" type="number" placeholder="Whatsapp" name="whatsapp" value="<?php echo $row['whatsapp'];?>">
                                        <small>(con el codigo de area)</small>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Facebook</label>
                                        <input class="form-control" type="text" placeholder="Facebook" name="facebook" value="<?php echo $row['facebook'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Instagram</label>
                                        <input class="form-control" type="text" placeholder="Instagram" name="instagram" value="<?php echo $row['instagram'];?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">twitter</label>
                                        <input class="form-control" type="text" placeholder="Twitter" name="twitter" value="<?php echo $row['twitter'];?>">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit">Update Profile</button>
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

$(".password2").keyup(function() {
    if ($(".password").val() == $(".password2").val()) {
        this.setCustomValidity("");
        return true;
    } else {
        console.log('false')
        this.setCustomValidity("Las contraseñas no coinciden");
        $('.needs-validation').addClass('was-validated');
        return false;

    }
});
</script>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema jurídico a la medida.">
    <meta name="keywords" content="Software, web">
    <meta name="author" content="MAYANSOURCE - mayansource.com">
    <link rel="icon" href="<?php echo base_url();?>public/assets/images/logo/icon.png" type="image/x-icon">
    <title>Bienvenido | Accede a tu cuenta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/vendors/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/vendors/icofont.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/vendors/themify.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/vendors/flag-icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/vendors/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/vendors/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?php echo base_url();?>public/assets/css/color-1.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/responsive.css">
</head>
<style>
.login {

    background-image: url("<?php echo base_url();?>public/assets/images/login_back.jpeg");
}
</style>

<body>
    <section></section>
    <div class="container-fluid p-0 login">
        <div class="row">
            <div class="col-12">
                <div class="login-card">
                    <?php echo form_open(base_url().'auth/validate', array('class' => 'theme-form login-form','style' => 'background-color: #274a44;color:white'));?>
                    <center>
                        <img class="img-fluid for-light" style="height: 165px;" src="<?php echo base_url();?>public/assets/images/logo/<?php echo $this->db->get_where('settings', array('type' => 'logo'))->row()->description;?>" alt="">
                    </center>
                    <br>
                    <?php if($this->session->userdata('error') == '1'):?>
                    <div class="alert alert-danger login-error">Parece que tus credenciales son incorrectas, verifica y vuelve a intentar.</div>
                    <?php endif;?>
                    <label style="color:#a7a5a5;font-family:'Poppins',sans-serif;font-size:14.5px">Tu cuenta tiene habilitada la autenticación de doble factor, deberás ingresar el PIN de tu App para poder continuar.</label>
						<input type="hidden" name="val" value="<?php echo $val;?>">
						<div class="form-group">
							<input name="pin" type="text" maxlength="6" required="" class="form-control">
							<span data-placeholder="Ingresar PIN"></span>
						</div>
						<div>
    					    <div class="form-group">
                                <button class="btn  btn-block" type="submit" style="color:black; background:white;background:white;">Continuar</button>
                            </div>
    						    <div style="width:100%;padding:15px;text-align:center;display:inline-block;margin-top:10px">
    						        <hr>
    								<p>
    								<a href="<?php echo base_url();?>auth/" style="font-family: 'Pacifico', sans-serif;color: #f18518;font-size: 19px; text-align: center; text-decoration:none;">Regresar</a></p>
    							</div>
						</div>
                    <br>
                    <center><a class="link" href="javascript:void(0);" style="color:white">¿Olvidaste tu clave?</a></center>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url();?>public/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/icons/feather-icon/feather-icon.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/config.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/script.js"></script>
</body>

</html>
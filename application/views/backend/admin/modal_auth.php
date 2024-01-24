	    <div class="form-group">
            <div class="container">
	            <div class="row">
                    <div class="col-sm-12 text-center">
                        <h6>Escanea el siguiente código QR con tu aplicación <b>Autenticador de Google</b>.</h6><br>
                        <?php $response = $this->security_model->getGoogleAuthQR();?>
	                    <img src="<?php echo $response['qr'];?>"/><br><br>
	                    <center><span class="app-divider2"></span></center>
	                    <a class="btn btn-primary"  href="<?php echo base_url();?>admin/contact_profile/admin_auth_link/<?php echo base64_encode($response['secret']);?>">Listo, guardar.</a>
                    </div>
                </div>
            </div>
	    </div> 
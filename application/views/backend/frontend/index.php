<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="irstheme">

    <title> Juristic - Lawyers and Law Firm HTML Template </title>

    <link rel="icon" href="<?php echo base_url();?>public/assets/images/logo/icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url();?>public/assets/images/logo/icon.png" type="image/x-icon">
    <link href="<?php echo base_url(); ?>public/frontend/assets/css/flaticon.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/frontend/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/frontend/assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/frontend/assets/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/frontend/assets/css/owl.theme.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/frontend/assets/css/slick.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/frontend/assets/css/slick-theme.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/frontend/assets/css/swiper.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/frontend/assets/css/owl.transitions.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/frontend/assets/css/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/frontend/assets/css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://mayansource.com/mx/public/assets/css/vendors/font-awesome.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    #mydiv {
        position: sticky;
        top: 55px;
        z-index: 500;
    }

    #mydivheader {
        padding: 10px;
        z-index: 10;
        background-color: #2196F3;
        color: #fff;
    }

    .selected {

        border: solid 4px black;
    }

    .avatar-edit {
        position: absolute;
        right: 0px;
        z-index: 1;
        /* top: 30px; */
        left: 89%;
    }
    }

    .avatar-edit input {
        display: none;
    }

    .avatar-edit input+label {
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

    .avatar-edit input+label:after {
        content: "\f040";
        font-family: 'FontAwesome';
        color: #fff;
        position: relative;
        top: 0px;
        left: 4px;
        right: 0;
        text-align: center;
        margin: auto;
    }

    .avatar-save {

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
        text-align: center;
        color: #fff;
    }

    input[type=file] {
        display: none;
    }
    </style>
    <script>
    function openTab(tabName, nav) {

        var i;
        var x = document.getElementsByClassName("tab");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        $('#' + tabName).show().addClass('animated slideInLeft');;

        var i;
        var x = document.getElementsByClassName("nav-tab");
        for (i = 0; i < x.length; i++) {
            x[i].classList.remove("swiper-pagination-bullet-active");
        }
        nav.classList.add("swiper-pagination-bullet-active");


    }
    </script>

</head>

<body>


    <div class="alert alert-danger" role="alert" style="position: sticky;
    top: 0;
    background-color: pink;
    z-index: 999;
    margin-bottom: 0px !important;">
        Esta es la versión editable de la página los cambios que se realicen acá se verán reflejados en la página principal.
    </div>
    <div id="mydiv">
        <!-- Include a header DIV with the same name as the draggable DIV, followed by "header" -->
        <div id="mydivheader">Acciones</div>
        <div class="makeWYSIWYG_buttons_container" id="makeWYSIWYG_buttons_container" style="text-align: center; margin-top: 5px;">
            <div class="makeWYSIWYG_buttons">
                <button class="makeWYSIWYG_saveButton" style="color:black;"><i class="fa fa-save"></i></button>
                <input style="color:black;" data-value="h1" data-tag="heading" class="makeWYSIWYG_colorButton" type="color" id="favcolor" name="favcolor" value="#000000">
                <button style="color:black;" class="makeWYSIWYG_underlineButton" data-tag="underline"><i class="fa fa-underline"></i></button>
                <button style="color:black;" class="makeWYSIWYG_boldlineButton" data-tag="bold"><i class="fa fa-bold"></i></button>
                <button><label class="fa fa-image" for="fileInput"><input style="color:black;display:none" class="makeWYSIWYG_imageButton" type="file" name="favcolor" id="fileInput"></label></button>
            </div>
        </div>
    </div>


    <!-- start page-wrapper -->
    <div class="page-wrapper">

        <!-- start preloader -->
        <div class="preloader" style="display: none;">
            <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>
        </div>
        <!-- end preloader -->

        <!-- Start header -->
        <header id="header" class="site-header header-style-1">
            <div class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col col-md-9">
                            <div class="contact-info">
                                <ul class="clearfix">
                                    <li><span>Llamanos:</span> 548978478</li>
                                    <li><span>Envianos un correo:</span> demo@example.com</li>
                                    <li><span>Nuestra direccion:</span> 45 Dreem street Austria</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="social">
                                <ul class="clearfix">
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                    <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                    <li><a href="#"><i class="ti-skype"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-md-1">
                            <a href="<?php echo base_url(); ?>auth" class="theme-btn" style="padding:10px;">Acceder</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end topbar -->

            <nav class="navigation navbar navbar-default original">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.html"><img src="http://mayansource.com/mx/public/frontend/assets/images/logo.png" alt=""></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">
                        <button class="close-navbar"><i class="ti-close"></i></button>
                        <ul class="nav navbar-nav">
                            <li><a onclick="window.location='<?php echo base_url()?>admin/frontend/home';">Inicio</a></li>
                            <li><a onclick="window.location='<?php echo base_url()?>admin/frontend/services';">Servicios</a></li>
                            <li><a onclick="window.location='<?php echo base_url()?>admin/frontend/us';">Nuestro equipo</a></li>
                            <li><a onclick="window.location='<?php echo base_url()?>admin/frontend/contact';">Contactos</a></li>
                        </ul>
                    </div><!-- end of nav-collapse -->
                </div><!-- end of container -->
            </nav>
        </header>
        <!-- end of header -->

        <?php include 'pages/'.$page_name.'.php'; ?>

        <!-- start site-footer -->
        <footer class="site-footer">
            <div class="social-newsletter-area">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <div class="social-newsletter-content clearfix">
                                <div class="social-area">
                                    <ul class="clearfix">
                                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                        <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                        <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                    </ul>
                                </div>
                                <div class="logo-area">
                                    <img src="http://mayansource.com/mx/public/frontend/assets/images/footer-logo.png" alt="">
                                </div>
                                <div class="newsletter-area">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-4 col-md-4 col-sm-6">
                            <div class="widget about-widget">
                                <div class="widget-title">
                                    <h3>Acerca de nosotros</h3>
                                </div>
                                <p>Showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm</p>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-md-4 col-sm-6">
                            <div class="widget contact-widget service-link-widget">
                                <div class="widget-title">
                                    <h3>Dirección</h3>
                                </div>
                                <ul>
                                    <li>45/15 New alsala Avenew Booston town, Austria</li>
                                    <li><span>Phone:</span> 84667441</li>
                                    <li><span>Email:</span> demo@example.com</li>
                                    <li><span>Office Time:</span> 10AM- 5PM</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-md-4 col-sm-6">
                            <div class="widget link-widget">
                                <div class="widget-title">
                                    <h3>Links de accesos</h3>
                                </div>
                                <ul>
                                    <li><a href="contact.html">Inicio</a></li>
                                    <li><a href="contact.html">Servicios</a></li>
                                    <li><a href="contact.html">Nuestro equipo</a></li>
                                    <li><a href="contact.html">Contactos</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </div>
            <div class="lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="separator"></div>
                        <div class="col col-xs-12">
                            <p class="copyright">Copyright © 2019 Juristic. All rights reserved.</p>
                            <div class="extra-link">
                                <ul>
                                    <li><a href="#">Privace &amp; Policy</a></li>
                                    <li><a href="#">Terms</a></li>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end site-footer -->



    </div>
    <!-- end of page-wrapper -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- All JavaScript files
    ================================================== -->
    <script src="<?php echo base_url(); ?>public/frontend/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/frontend/assets/js/bootstrap.min.js"></script>

    <!-- Plugins for this template -->
    <script src="<?php echo base_url(); ?>public/frontend/assets/js/jquery-plugin-collection.js"></script>

    <!-- Custom script for this template -->
    <script src="<?php echo base_url(); ?>public/frontend/assets/js/script.js"></script>

    <script>
    
    
    function iconSpan(icon)
    {
        console.log(icon);
    }
    
    <?php if($page_name != "services"):?>
    $(function() {

        $('a').each(function() {

            $(this).removeAttr('href');
        });
    });
    <?php endif; ?>
    $('.imgEdit').click(function() {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            $('.avatar-edit').remove();
        } else {
            $('.selected').removeClass('selected');
            $(this).addClass('selected');
            $('.avatar-edit').remove();
            var name = $(this).data('img');
            $(this).before(`<div class="avatar-edit">
                                <input type="file" name="logo" id="imageUpload" accept=".png, .jpg, .jpeg" onchange="readURL(this,${name} )">
                                <label for="imageUpload"></label>
                                <div class="avatar-save" onclick="saveImage('${name}')">
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                </div>
                            </div>
                            
                            `);
            $(this).attr('id', $(this).data('img'));
            console.log($(this).data('img'));


        }
    });

    /* This function will call when onchange event fired */
    function saveImage(img) {

        const file = $("#imageUpload")[0].files[0];

        if (file) {
            var property = $("#imageUpload")[0].files[0];
            var image_name = property.name;
            var image_extension = image_name.split('.').pop().toLowerCase();
            var url = '<?php echo base_url(); ?>admin/updateFrontImages';
            if (jQuery.inArray(image_extension, ['jpg', 'jpeg', 'png']) == -1) {
                alert('Invalid image file');
                return false;
            }
            var form_data = new FormData();
            form_data.append("files", property);
            form_data.append("cl", img);

            $.ajax({
                url: url,
                method: 'POST',
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#msg').html('Loading......');
                },
                success: function(data) {
                    $('.selected').removeClass('selected');
                    $('.avatar-edit').remove();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 5000
                    });

                    Toast.fire({
                        icon: 'success',
                        title: 'Actualizado'
                    })
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }


    }


    /* This function will call when onchange event fired */
    function readURL(input, img) {
        const file = $("#imageUpload")[0].files[0];
        let reader = new FileReader();
        reader.onload = function(event) {
            console.log(event.target.result);
            img.src = event.target.result;

        }
        reader.readAsDataURL(file);
    }

    function makeWYSIWYG(editor, cl) {

        //If the DOM element we want to edit exists
        if (editor) {

            //[...]
            //We insert the buttons after the editor

            var parent = editor.parentNode;
            var buttons_container = document.getElementById("makeWYSIWYG_buttons_container");

            //Click on the "Edit" button
            buttons_container.querySelector('.makeWYSIWYG_saveButton').addEventListener('click', function(e) {
                e.preventDefault();
                console.log(editor.innerHTML)
                updateFront(cl, editor.innerHTML);

            }, false);


            //Click on the "Edit" button
            buttons_container.querySelector('.makeWYSIWYG_colorButton').addEventListener('input', function(e) {
                console.log('"' + this.value + '"');
                // change selection's color to red         
                document.execCommand("foreColor", false, this.value);

            }, false);

            //Click on the "Edit" button
            buttons_container.querySelector('.makeWYSIWYG_boldlineButton').addEventListener('click', function(e) {
                console.log(this.getAttribute('data-tag'));
                document.execCommand(this.getAttribute('data-tag'), false, "#000");

                e.preventDefault();
            }, false);

            //Click on the "Edit" button
            buttons_container.querySelector('.makeWYSIWYG_imageButton').addEventListener('change', function(e) {

                const file = $("#fileInput")[0].files[0];

                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        editor.style.backgroundImage = "url('" + event.target.result + "')"

                    }
                    reader.readAsDataURL(file);
                }




            }, false);


            //Click on the "Edit" button
            buttons_container.querySelector('.makeWYSIWYG_underlineButton').addEventListener('click', function(e) {
                console.log(this.getAttribute('data-tag'));
                document.execCommand(this.getAttribute('data-tag'), false, "#000");

                e.preventDefault();
            }, false);

        }
        return editor;
    };

    function updateFront(cl, text) {
        var form_data = new FormData();
        var property = $("#fileInput")[0].files[0];
        if (property) {
            var image_name = property.name;
            var image_extension = image_name.split('.').pop().toLowerCase();
            var url = '<?php echo base_url(); ?>admin/updateFront';
            if (jQuery.inArray(image_extension, ['jpg', 'jpeg', 'png']) == -1) {
                alert('Invalid image file');
                return false;
            }

            form_data.append("files", property);
        }
        form_data.append("cl", cl);
        form_data.append("value", text);

        $.ajax({
            url: url,
            method: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#msg').html('Loading......');
            },
            success: function(data) {

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 5000
                });

                Toast.fire({
                    icon: 'success',
                    title: 'Actualizado'
                })
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });

    }
    </script>
</body>

</html>
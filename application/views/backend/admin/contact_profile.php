<style>
.support-ticket+.support-ticket {
    margin-top: 20px;
}

.support-ticket:hover,
.support-ticket.active {
    box-shadow: 0px 5px 12px rgba(126, 142, 177, 0.2), 0px 0px 0px 2px #A01A7A;
    -webkit-transform: translateY(-3px);
    transform: translateY(-3px);
    cursor: pointer;
}

.support-ticket:hover .ticket-title,
.support-ticket.active .ticket-title {
    color: #047bf8;
}

.support-ticket.active {
    -webkit-transform: none;
    transform: none;
}


.support-ticket .st-meta {
    position: absolute;
    top: 5px;
    right: 5px;
    z-index: 99;
    display: -webkit-box;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
}

.support-ticket .st-meta>div {
    margin-left: 10px;
}

.support-ticket .st-meta>i {
    margin-left: 10px;
    color: #EAA81D;
    font-size: 16px;
}

.support-ticket .st-meta .badge {
    font-size: 0.72rem;
    padding: 2px 5px;
}

.support-ticket .st-body {
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
    padding: 20px;
    border-radius: 6px;
    display: -webkit-box;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
}

.support-ticket .st-body .avatar {
    -webkit-box-flex: 0;
    flex: 0 0 50px;
    padding-right: 15px;
    font-size: 25px;
    font-weight: bold;
    text-align: center;
}

.os-progress-bar {
    margin-bottom: 1rem;
}

.os-progress-bar .bar-labels {
    display: -webkit-box;
    line-height: 1;
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    margin-bottom: 5px;
}

.os-progress-bar .bar-labels span {
    font-size: 0.72rem;
}

.os-progress-bar .bar-labels span.bigger {
    font-size: 0.99rem;
}

.os-progress-bar .bar-label-left span {
    margin-right: 5px;
}

.os-progress-bar .bar-label-left span.positive {
    color: #619B2E;
}

.os-progress-bar .bar-label-left span.negative {
    color: #D83536;
}

.os-progress-bar .bar-label-right span {
    margin-left: 5px;
}

.os-progress-bar .bar-label-right span.info {
    color: #A01A7A;
}

.os-progress-bar .bar-level-1,
.os-progress-bar .bar-level-2,
.os-progress-bar .bar-level-3 {
    border-radius: 12px;
    height: 10px;
}
</style>
<?php 
    $directory = $this->db->get_where('directory',array('directory_id'=>$directory_id))->result_array();
    foreach( $directory as $row):
?>
<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3></h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"><?php echo $this->db->get_where('directory_rol',array('directory_rol_id'=>$row['directory_rol_id']))->row()->name;?></li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <!-- user profile header start-->
                <div class="col-sm-12">
                    <div class="card profile-header"><img class="img-fluid bg-img-cover" src="<?php echo base_url(); ?>public/assets/images/user-profile/portada_user_profile.jpg" alt="">
                        <div class="profile-img-wrrap"><img class="img-fluid bg-img-cover" src="<?php echo base_url(); ?>public/assets/images/user-profile/bg-profile.jpg" alt=""></div>
                        <div class="userpro-box">
                            <div class="img-wrraper">
                                <div class="avatar"><img class="img-fluid" alt="" src="<?php echo $this->account_model->get_photo('directory',$row['directory_id']);?>"></div><a class="icon-wrapper" href="<?php echo base_url(); ?>admin/directory_edit_profile/<?php echo base64_encode($row['directory_id']);?>"><i class="icofont icofont-pencil-alt-5"></i></a>
                            </div>
                            <div class="user-designation">
                                <div class="title"><a target="_blank" href="">
                                        <h4><?php echo $row['name'].' '.$row['first_last_name'].' '.$row['second_last_name']?></h4>
                                        <h3>@<?php echo $row['username']?></h3>
                                    </a></div>
                                <div class="social-media">
                                    <ul class="user-list-social">
                                        <?php if($row['whatsapp'] != ""):?><li><a href="https://api.whatsapp.com/send?phone=<?php echo $row['whatsapp']?>"><i class="fa fa-whatsapp"></i></a></li><?php endif; ?>
                                        <?php if($row['facebook'] != ""):?> <li><a href="https://www.facebook.com/<?php echo $row['facebook']?>"><i class="fa fa-facebook"></i></a></li> <?php endif; ?>
                                        <?php if($row['twitter'] != ""):?><li><a href="https://twitter.com/<?php echo $row['twitter']?>"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
                                        <?php if($row['instagram'] != ""):?><li><a href="https://www.instagram.com/<?php echo $row['instagram']?>"><i class="fa fa-instagram"></i></a></li><?php endif; ?>

                                    </ul>
                                </div>
                                <div class="follow">
                                    <ul class="follow-list">
                                        <li>
                                            <div class="follow-num counter">325</div><span>Expedientes</span>
                                        </li>
                                        <li>
                                            <div class="follow-num counter">450</div><span>Folders</span>
                                        </li>
                                        <?php if($row['admin'] != 0):?>
                                        <li>
                                            <div class="follow-num counter">500</div><span>Personal</span>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- user profile header end-->
                <div class="col-xl-4 col-lg-12 col-md-5 xl-35">
                    <div class="default-according style-1 faq-accordion job-accordion">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card" style="    margin: 0px;">
                                    <div class="card-header">
                                        <h5 class="p-0">
                                            <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2">Datos Generales</button>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
                                        <div class="card-body post-about">
                                            <ul>
                                                <li>
                                                    <div class="icon"><i data-feather="user"></i></div>
                                                    <div>
                                                        <h5><?php echo $row['name'].' '.$row['last_name'];?></h5>
                                                        <p>Nombre</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon"><i class="fa fa-credit-card-alt"></i></div>
                                                    <div>
                                                        <h5><?php echo $row['dni'];?></h5>
                                                        <p>DNI</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon"><i class="fa fa-credit-card-alt"></i></div>
                                                    <div>
                                                        <h5><?php echo $row['frc'];?></h5>
                                                        <p>RFC</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon"><i class="fa fa-credit-card-alt"></i></div>
                                                    <div>
                                                        <h5><?php echo $row['curp'];?></h5>
                                                        <p>CURP</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon"><i data-feather="mail"></i></div>
                                                    <div>
                                                        <h5><?php echo $row['email'];?></h5>
                                                        <p>Correo electrónico</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon"><i data-feather="phone"></i></div>
                                                    <div>
                                                        <h5><?php echo $row['phone'];?></h5>
                                                        <p>Número de teléfono</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon"><i data-feather="map-pin"></i></div>
                                                    <div>
                                                        <h5><?php echo $row['address'];?></h5>
                                                        <p>Dirección</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="social-network theme-form"><span class="f-w-600">Social Networks</span>
                                                <?php if($row['facebook'] != ""):?> <button class="btn social-btn btn-fb mb-2 text-center"><i class="fa fa-facebook m-r-5"></i>Facebook</button><?php endif;?>
                                                <?php if($row['twitter'] != ""):?> <button class="btn social-btn btn-twitter mb-2 text-center" style="background-color:black;"><i class="fa fa-x m-r-5"></i>X</button><?php endif;?>
                                                <?php if($row['instagram'] != ""):?> <button class="btn social-btn btn-google text-center"><i class="fa fa-instagram m-r-5"></i>Instagram</button><?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($this->session->userdata('login_user_id') == $directory_id):?>
                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6 xl-35">
                                <a <?php if($this->security_model->authStatus() != ''): ?>onclick="remove_auth();" <?php else:?>onclick="modalRequest('<?php echo base_url();?>modal/popup/modal_auth');" <?php endif;?>>
                                    <div class="support-ticket <?php if($this->security_model->authStatus() != '') echo 'active';?>">
                                        <div class="st-body">
                                            <div class="avatar">
                                                <img src="<?php echo base_url();?>public/assets/images/authentication.png" style="width: 40px;">
                                            </div>
                                            <div class="ticket-content">
                                                <div class="ticket-description">
                                                    <div class="os-progress-bar primary">
                                                        <div class="bar-labels">
                                                            <div class="bar-label-left">
                                                                <span class="bigger"><b><?php if($this->security_model->authStatus() != ''): ?>Desactivar<?php else:?>Usar<?php endif;?> autenticación en dos pasos</b></span>
                                                            </div>
                                                        </div>
                                                        <div class="bar-level-1 auth-text">
                                                            <?php if($this->security_model->authStatus() != ''): ?>Desactiva<?php else:?>Activa<?php endif;?> la seguridad en tu cuenta.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endif; ?>
                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6 mt-10">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="p-0">
                                            <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon8" aria-expanded="true" aria-controls="collapseicon8">Contactos</button>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="collapseicon8" aria-labelledby="collapseicon8" data-parent="#accordion">
                                        <div class="card-body social-list filter-cards-view">
                                            <button class="btn btn-primary mb-2 text-center" onclick="modalRequest('<?php echo base_url();?>modal/popup/modal_add_admin_contact/<?php echo $row['directory_id'];?>');"><i class="fa fa-user m-r-5"></i>Nuevo contacto</button>
                                            <?php 
                                                 $admin_contact = $this->db->get_where('admin_contact',array('admin_id'=>$row['directory_id']))->result_array();
                                                 foreach ($admin_contact as $contact):
                                                 ?>
                                            <hr>
                                            <div class="media">
                                                <div class="media-body">
                                                    <span class="d-block"><?php echo $contact['name'];?></span>
                                                    <p>
                                                        <b>Cargo:</b> <?php echo $contact['charge'];?><br>
                                                        <b>Email:</b> <?php echo $contact['email'];?><br>
                                                        <b>Teléfono:</b> <?php echo $contact['phone'];?><br>
                                                        <b>Observaciones:</b> <?php echo $contact['details'];?>
                                                    </p>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12 col-md-7 xl-65">
                    <div class="row">
                        <div class="col-sm-12 box-col-12">
                            <div class="card">
                                <div class="social-tab">
                                    <ul class="nav nav-tabs" id="top-tab" role="tablist">
                                        <li class="nav-item"><a onclick="getDetails('proceedings',<?php echo $row['directory_id'];?>)" class="nav-link active" id="top-timeline" data-bs-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true"><i class="fa fa-users"></i>Expedientes</a></li>
                                        <li class="nav-item"><a onclick="getDetails('folder_1',<?php echo $row['directory_id'];?>)" class="nav-link" id="top-about" data-bs-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><i class="fa fa-university"></i>Carpetas de Investigación </a></li>
                                        <li class="nav-item"><a onclick="getDetails('folder_2',<?php echo $row['directory_id'];?>)" class="nav-link" id="top-friends" data-bs-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false"><i class="fa fa-fax"></i>Carpetas Judiciales</a></li>
                                        <?php if($row['admin'] != 0):?>
                                        <li class="nav-item"><a onclick="getDetails('personal',<?php echo $row['directory_id'];?>)" class="nav-link" id="top-friends" data-bs-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false"><i class="fa fa-fax"></i>Personal</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- profile post start-->
                        <div class="col-sm-12" id="result">

                        </div>
                        <!-- profile post end                           -->
                    </div>
                </div>
                <!-- user profile fifth-style end-->
            </div>
        </div>
    </div>
</div>
<!-- footer start-->

<script>
$(function() {
    getDetails('proceedings', <?php echo $row['directory_id'];?>)
})

function remove_auth() {

    let timerInterval


    Swal.fire({
        title: '¿Estás seguro?',
        text: "Al iniciar sesión ya no se solicitara el código de autenticación.",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#9fd13b',
        cancelButtonColor: '#fd4f57',
        confirmButtonText: 'Sí, desactivar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'Desactivando',
                titleTextColor: '#000',
                html: 'Esta ventana se cerrará en <strong></strong>.',
                timer: 2000,
                onBeforeOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                        Swal.getContent().querySelector('strong').textContent = Swal
                            .getTimerLeft()
                    }, 100)
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
            })
            location.href = "<?php echo base_url();?>admin/contact_profile/admin_auth_link_des/";
        }
    })

}


function getDetails(table, directory_id) {

    $('#loader_' + table).show();
    $.ajax({
        url: "<?php echo base_url().'admin/getDirectoryDetails/';?>",
        type: "POST",
        data: {
            table: table,
            directory_id: directory_id,
        },
        success: function(response) {

            $('#result').html(response).fadeIn(1000);

            //console.log(response);
        },
        complete: function() {
            $('table.show-case').DataTable({
                "paging": true,
                "ordering": false,
                "orderable": false,
                "info": false,
                "responsive": false,
                language: {
                    search: `<i style="font-size:20px" class="fa fa-search"></i>`,
                    "lengthMenu": "_MENU_",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última ",
                        "next": `<i class="fa fa-chevron-circle-right"></i>`,
                        "previous": `<i class="fa fa-chevron-circle-left"></i>`
                    },
                },
                initComplete: function() {
                    $('.dataTables_length').css({
                        'display': 'flex'
                    });
                    $('.dataTables_length').append(`
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-left:10px !important;align-self: center;color: white;">
                    <i class="fa fa-filter"></i> 
                </button> 
                <div class="dropdown-menu p-4" aria-labelledby="filterDropdown" id="filters"></div>
            </div>`);

                    this.api()
                        .columns()
                        .every(function() {
                            var column = this;
                            if (column.index() == 4 || column.index() == 5) {


                                var select = $('<div class="form-group"> <label for="select1">' + $(column.header()).html() + '</label><select class="filter_select" ><option value=""><b>seleccionar</b></option></select></div>')
                                    .appendTo($('#filters'));

                                select.find('select').on('change', function() {

                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                    if (val != "") {
                                        $(this).addClass('filtrando');
                                    } else {
                                        $(this).removeClass('filtrando');
                                    }


                                    column.search(val, true, false).draw();
                                });

                                column
                                    .data()
                                    .unique()
                                    .sort()
                                    .each(function(d, j) {

                                        select.find('select').append('<option value="' + d + '">' + d + '</option>');

                                    });
                            }


                        });
                },
            });

            $('.dropdown-menu').click(function(e) {
                e.stopPropagation();
            });
        },

        error: function() {
            console.log("error");
        }
    });

}
</script>
<?php endforeach; ?>
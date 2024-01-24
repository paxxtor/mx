<?php 
    $proceeding = $this->db->get_where('proceeding',array('proceeding_id'=>$proceeding_id))->result_array();
    foreach( $proceeding as $row):
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
                        <li class="breadcrumb-item">Expedientes</li>
                        <li class="breadcrumb-item active"><?php echo $row['code'];?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 xl-35">
                    <div class="default-according style-1 faq-accordion job-accordion">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="p-0">
                                            <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2">Datos Generales</button>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
                                        <div class="card-body post-about">
                                            <div class="row">
                                                <span class="f-w-600">Detalles</span>
                                                <div class="col-md-4">
                                                    <div class="icon"><i data-feather="user"></i></div>
                                                    <div>
                                                        <p>Código</p>
                                                        <h5><?php echo $row['code'];?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i class="fa fa-credit-card-alt"></i></div>
                                                    <div>
                                                        <p>Responsable</p>
                                                        <h5><?php echo $this->account_model->getUserFullName('directory',$row['manager_id'])?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i data-feather="mail"></i></div>
                                                    <div>
                                                        <p>Fecha de alta</p>
                                                        <h5><?php echo $row['discharge_date'];?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i data-feather="mail"></i></div>
                                                    <div>
                                                        <p>Fecha de finalización</p>
                                                        <h5><?php echo ($row['finish_date'] != '0000-00-00') ? $row['finish_date']:'Pendiente.';?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i class="fa fa-credit-card-alt"></i></div>
                                                    <div>
                                                        <p>Descripción</p>
                                                        <h5><?php echo $row['description'];?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i data-feather="mail"></i></div>
                                                    <div>
                                                        <p>Categoría</p>
                                                        <h5><?php echo $this->crud_model->get_table_name('proceeding_category',$row['proceeding_category_id']);?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i data-feather="mail"></i></div>
                                                    <div>
                                                        <p>Tipo</p>
                                                        <h5><?php echo $this->crud_model->get_table_name('proceeding_type',$row['proceeding_type']);?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i data-feather="mail"></i></div>
                                                    <div>
                                                        <p>Asunto</p>
                                                        <h5><?php echo $this->crud_model->get_table_name('proceeding_razon',$row['proceeding_razon']);?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i class="fa fa-credit-card-alt"></i></div>
                                                    <div>
                                                        <p>Situacion</p>
                                                        <h5><?php echo $this->crud_model->get_table_name('proceeding_status',$row['proceeding_status']);?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i data-feather="mail"></i></div>
                                                    <div>
                                                        <p>Procedimiento</p>
                                                        <h5><?php echo $row['proccess'];?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i data-feather="mail"></i></div>
                                                    <div>
                                                        <p>Cliente</p>
                                                        <h5><?php echo $this->account_model->getUserFullName('directory',$row['client_id'])?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i data-feather="mail"></i></div>
                                                    <div>
                                                        <p>Parte</p>
                                                        <h5><?php echo $this->crud_model->get_table_name('proceeding_part',$row['proceeding_part']);?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i data-feather="mail"></i></div>
                                                    <div>
                                                        <p>Cuantia</p>
                                                        <h5><?php echo $row['amount'];?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i data-feather="mail"></i></div>
                                                    <div>
                                                        <p>Interes</p>
                                                        <h5><?php echo $row['interests'];?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i data-feather="mail"></i></div>
                                                    <div>
                                                        <p>Turno de oficio</p>
                                                        <h5><?php echo $row['turn']==1?'SI':'NO';?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i data-feather="mail"></i></div>
                                                    <div>
                                                        <p>Confidencial</p>
                                                        <h5><?php echo $row['confidential']==1?'SI':'NO';?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icon"><i data-feather="mail"></i></div>
                                                    <div>
                                                        <p>Publicar en el portal del cliente</p>
                                                        <h5><?php echo $row['public']==1?'SI':'NO';?></h5>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="social-network theme-form"><span class="f-w-600">Acciones</span>
                                                    <a href="javascript:void(0)" style="font-size:20px;color:green;padding-bottom:25px;"><i class="fa fa-edit m-r-5"></i>Editar</a><br><br>
                                                    <a href="javascript:void(0)" style="font-size:20px;color:#6fa2d8;padding-bottom:25px;"><i class="fa fa-envelope m-r-5"></i>Notificar</a><br><br>
                                                    <a href="javascript:void(0)" style="font-size:20px;color:#c64e40;padding-bottom:25px;"><i class="fa fa-trash-o m-r-5"></i>Eliminar</a><br><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12 col-md-8 xl-65">
                    <div class="row">
                        <div class="col-sm-12 box-col-12">
                            <div class="card">
                                <div class="social-tab">
                                    <ul class="nav nav-tabs" id="top-tab" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" id="top-timeline" data-bs-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <polyline points="12 6 12 12 16 14"></polyline>
                                                </svg>Intervinientes</a></li>
                                        <li class="nav-item"><a class="nav-link" id="top-about" data-bs-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                                    <line x1="12" y1="16" x2="12" y2="16"></line>
                                                </svg>Juzgados </a></li>
                                        <li class="nav-item"><a class="nav-link" id="top-friends" data-bs-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="9" cy="7" r="4"></circle>
                                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                </svg>Actuaciones</a></li>
                                        <li class="nav-item"><a class="nav-link" id="top-photos" data-bs-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image">
                                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                    <polyline points="21 15 16 10 5 21"></polyline>
                                                </svg>Documentos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- profile post start-->
                        <div class="col-sm-12">

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
<?php endforeach; ?>
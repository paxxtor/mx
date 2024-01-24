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
                         <h3></h3>
                     </div>
                     <div class="col-12 col-sm-6">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                             <li class="breadcrumb-item">Administradores</li>
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
                                     <div class="avatar"><img class="img-fluid" alt="" src="<?php echo $this->account_model->get_photo('admin',$row['admin_id']);?>"></div><a class="icon-wrapper" href="<?php echo base_url(); ?>admin/admin_edit_profile/<?php echo base64_encode($row['admin_id']);?>"><i class="icofont icofont-pencil-alt-5"></i></a>
                                 </div>
                                 <div class="user-designation">
                                     <div class="title"><a target="_blank" href="">
                                             <h4><?php echo $row['name'].' '.$row['last_name']?></h4>
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
                                                 <div class="follow-num counter">325</div><span>Follower</span>
                                             </li>
                                             <li>
                                                 <div class="follow-num counter">450</div><span>Following</span>
                                             </li>
                                             <li>
                                                 <div class="follow-num counter">500</div><span>Likes</span>
                                             </li>
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
                                     <div class="card">
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
                                                     <?php if($row['twitter'] != ""):?> <button class="btn social-btn btn-twitter mb-2 text-center"><i class="fa fa-twitter m-r-5"></i>Twitter</button><?php endif;?>
                                                     <?php if($row['instagram'] != ""):?> <button class="btn social-btn btn-google text-center"><i class="fa fa-instagram m-r-5"></i>Instagram</button><?php endif;?>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
                                     <div class="card">
                                         <div class="card-header">
                                             <h5 class="p-0">
                                                 <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon8" aria-expanded="true" aria-controls="collapseicon8">Contactos</button>
                                             </h5>
                                         </div>
                                         <div class="collapse show" id="collapseicon8" aria-labelledby="collapseicon8" data-parent="#accordion">
                                             <div class="card-body social-list filter-cards-view">
                                                 <button class="btn btn-primary mb-2 text-center" onclick="modalRequest('<?php echo base_url();?>modal/popup/modal_add_admin_contact/<?php echo $row['admin_id'];?>');"><i class="fa fa-user m-r-5"></i>Nuevo contacto</button>
                                                 <?php 
                                                 $admin_contact = $this->db->get_where('admin_contact',array('admin_id'=>$row['admin_id']))->result_array();
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
                             <!-- profile post start-->
                             <div class="col-sm-12">
                                 <div class="card">
                                     <div class="profile-post">
                                         <div class="post-header">
                                             <div class="media">
                                                 <div class="media-body align-self-center">
                                                     <a href="social-app.html">
                                                         <h3 class="user-name">Expedientes</h3>
                                                     </a>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="post-body">
                                             <div class="table-responsive">
                                                 <table class="show-case">
                                                     <thead>
                                                         <tr>
                                                             <th>Código</th>
                                                             <th>Descripción</th>
                                                             <th>Abogado</th>
                                                             <th>Abogrado Contrario</th>
                                                             <th>Contrario</th>
                                                             <th>Acciones</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         <tr>
                                                             <td>Tiger Nixon</td>
                                                             <td>System Architect</td>
                                                             <td>Edinburgh</td>
                                                             <td>61</td>
                                                             <td>2011/04/25</td>
                                                             <td>$320,800</td>
                                                         </tr>
                                                         <tr>
                                                             <td>Garrett Winters</td>
                                                             <td>Accountant</td>
                                                             <td>Tokyo</td>
                                                             <td>63</td>
                                                             <td>2011/07/25</td>
                                                             <td>$170,750</td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- profile post end   -->
                             <!-- profile post start-->
                             <div class="col-sm-12">
                                 <div class="card">
                                     <div class="profile-post">
                                         <div class="post-header">
                                             <div class="media">
                                                 <div class="media-body align-self-center">
                                                     <a href="social-app.html">
                                                         <h3 class="user-name">Actuaciones</h3>
                                                     </a>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="post-body">
                                             <div class="table-responsive">
                                                 <table class="show-case">
                                                     <thead>
                                                         <tr>
                                                             <th>Código</th>
                                                             <th>Descripción</th>
                                                             <th>Abogado</th>
                                                             <th>Abogrado Contrario</th>
                                                             <th>Contrario</th>
                                                             <th>Acciones</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         <tr>
                                                             <td>Tiger Nixon</td>
                                                             <td>System Architect</td>
                                                             <td>Edinburgh</td>
                                                             <td>61</td>
                                                             <td>2011/04/25</td>
                                                             <td>$320,800</td>
                                                         </tr>
                                                         <tr>
                                                             <td>Garrett Winters</td>
                                                             <td>Accountant</td>
                                                             <td>Tokyo</td>
                                                             <td>63</td>
                                                             <td>2011/07/25</td>
                                                             <td>$170,750</td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
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
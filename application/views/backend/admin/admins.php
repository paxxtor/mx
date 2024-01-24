  <!-- Page Sidebar Ends-->
  <a class="floated-chat-btn text-white" style="text-decoration: none;" href="<?php echo base_url();?>admin/admin_add_profile"><i class="icofont icofont-plus"></i></a>
  <div class="page-body">
      <div class="container-fluid">
          <div class="page-title">
              <div class="row">
                  <div class="col-12 col-sm-6">
                      <h3>Administradores</h3>
                  </div>
                  <div class="col-12 col-sm-6">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                          <li class="breadcrumb-item">Administradores</li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>
      <!-- Container-fluid starts-->
      <div class="container-fluid user-card">
          <div class="row">
              <?php 
                $admins = $this->db->order_by('directory_id','ASC')->get_where('directory',array('status'=>1,'admin'=>1,'admin_type'=>$admin_type))->result_array();
                foreach ($admins as $admin):
            ?>
              <div class="col-md-6 col-lg-6 col-xl-4 box-col-4">
                  <div class="card custom-card">
                      <div class="card-header"><img class="img-fluid" src="<?php echo base_url(); ?>public/assets/images/user/portada.jpg" alt=""></div>
                      <div class="card-profile"><img style="width: 112px;" class="rounded-circle" src="<?php echo $this->account_model->get_photo('directory',$admin['directory_id']);?>" alt=""></div>
                      <div class="text-center profile-details"><a href="<?php echo base_url(); ?>admin/contact_profile/<?php echo base64_encode($admin['directory_id'])?>">
                              <h4><?php echo $admin['name'].' '.$admin['first_last_name'];?></h4>
                          </a>
                          <h6>@<?php echo $admin['username'];?></h6>
                      </div>
                      <ul class="card-social">
                         <li><a href="<?php echo base_url(); ?>admin/contact_profile/<?php echo base64_encode($admin['directory_id'])?>"><i class="fa fa-user"></i></a></li>
                           <li><a href="<?php echo base_url(); ?>admin/directory_edit_profile/<?php echo base64_encode($admin['directory_id']);?>"><i class="fa fa-pencil-square-o"></i></a></li> 
                           <li><a href="<?php echo base_url(); ?>admin/admin_edit_permissions/<?php echo base64_encode($admin['directory_id']);?>"><i class="fa fa-th-list"></i></a></li>
                           <li><a href="javascript:void(0)" ><i class="fa fa-trash"></i></a></li>
                      </ul>
                      <div class="card-footer row">
                          <div class="col-4 col-sm-4">
                              <h6>Expedientes</h6>
                              <h3 class="counter">9564</h3>
                          </div>
                          <div class="col-4 col-sm-4">
                              <h6>Carpetas</h6>
                              <h3><span class="counter">5</span></h3>
                          </div>
                          <div class="col-4 col-sm-4">
                              <h6>Actuaciones</h6>
                              <h3><span class="counter">96</span></h3>
                          </div>
                      </div>
                  </div>
              </div>
              <?php endforeach; ?>
          </div>
      </div>
  </div>
  <!-- footer start-->
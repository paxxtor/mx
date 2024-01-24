  <style>
.table {
    border: none !important;

}

.table.table-padded {
    border-collapse: separate;
    border-spacing: 0 5px;

}

.table.table-padded thead tr th {
    border: none;
    font-size: 0.81rem;
    text-transform: uppercase;
    color: rgba(90, 99, 126, 0.49);
    letter-spacing: 1px;
    padding: 0.3rem 1.1rem;
}

.table.table-padded tbody tr {
    border-radius: 4px;
    -webkit-transition: all 0.1s ease;
    transition: all 0.1s ease;
}

.table.table-padded tbody tr:hover {
    background: #eaeaea !important;
    box-shadow: 0px 2px 5px #eaeaea;
    border-radius: 15px;
}

.table.table-padded tbody td {
    padding: 0.7rem 0.9rem;
    border: none;
    border-right: 1px solid rgba(0, 0, 0, 0.03);
}

.table.table-padded tbody td.bolder {
    font-weight: 500;
    font-size: 0.99rem;
}

.table.table-padded tbody td img {
    display: inline-block;
    width: 30px;
    vertical-align: middle;
}

.table.table-padded tbody td img+span {
    display: inline-block;
    margin-left: 10px;
    font-family: "CircularStd", sans-serif;
    vertical-align: middle;
}

.table.table-padded tbody td span+span {
    margin-left: 5px;
}

.table.table-padded tbody td .status-pill+span {
    margin-left: 10px;
}

.table.table-padded tbody td:first-child {
    border-radius: 15px 0px 0px 15px;
}

.table.table-padded tbody td:last-child {
    border-radius: 0px 15px 15px 0px;
    border-right: none;
}

/* 3b. Override bootstrap table styles */
.table .user-with-avatar {
    white-space: nowrap;
}

.table .user-with-avatar img {
    width: 35px;
    height: 35px;
    display: inline-block;
    vertical-align: middle;
    border-radius: 50px;
}

.table .user-with-avatar span {
    display: inline-block;
    vertical-align: middle;
}

.table .user-with-avatar img+span {
    margin-left: 10px;
}

.table .icon-separator {
    margin: 0px 4px;
    opacity: 0.6;
}

.table th {
    font-weight: 500;
}

.table .smaller,
.table.smaller {
    font-size: 0.82rem;
    font-family: "CircularStd", sans-serif;
}

.table .lighter {
    color: rgba(90, 99, 126, 0.69);
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current,
.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #fff !important;
    -webkit-box-shadow: 0px 2px 14px rgb(0 155 171 / 40%) !important;
    box-shadow: 0px 2px 14px rgb(0 155 171 / 40%) !important;
    font-family: 'Poppins', sans-serif;
    background: #001a15 !important;
    border: none;
    border-radius: 5px;
}
  </style>

  <!-- Page Sidebar Ends-->
  <a class="floated-chat-btn " style="text-decoration: none;" href="<?php echo base_url();?>admin/directory_add_profile/<?php echo base64_encode($type);?>"><i class="icofont icofont-plus"></i></a>
  <div class="page-body">
      <div class="container-fluid">
          <div class="page-title">
              <div class="row">
                  <div class="col-12 col-sm-6">
                      <h3><?php echo $this->db->get_where('directory_rol',array('directory_rol_id'=>$type))->row()->name;?></h3>
                  </div>
                  <div class="col-12 col-sm-6">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                          <li class="breadcrumb-item"><?php echo $this->db->get_where('directory_rol',array('directory_rol_id'=>$type))->row()->name;?></li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>
      <!-- Container-fluid starts-->
      <div class="container-fluid user-card">
          <!-- Zero Configuration  Starts-->
          <div class="col-sm-12">
              <div class="card">
                  <div class="card-header pb-0">

                  </div>
                  <div class="card-body">
                      <div class="table-responsive ">
                          <table class="table table-padded dataTable no-footer " id="basic-1">
                              <thead>
                                  <tr>
                                      <th>Nombre</th>
                                      <th>RFC</th>
                                      <th>Direccion</th>
                                      <th>Télefono</th>
                                      <th>Email</th>
                                      <th>Acciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $directory = $this->db->get_where('directory',array('status'=>1,'directory_rol_id'=>$type))->result_array(); 
                                  foreach($directory as $dr):
                                  ?>
                                  <tr>
                                      <td>
                                          <a href="<?php echo base_url();?>admin/contact_profile/<?php echo base64_encode($dr['directory_id'])?>">
                                              <div class="user-with-avatar">
                                                  <img alt="" src="<?php echo $this->account_model->get_photo('directory',$dr['directory_id']);?>">
                                                  <span><?php echo $dr['name'].' '.$dr['first_last_name'].' '.$dr['second_last_name']?></span>
                                              </div>
                                          </a>
                                      </td>
                                      <td><?php echo $dr['rfc'];?></td>
                                      <td><?php echo $dr['street'].' '.$dr['colony'].' '.$dr['municipallity'];?></td>
                                      <td><?php echo $dr['phone'];?></td>
                                      <td><?php echo $dr['email'];?></td>
                                      <td><a class="btn btn-primary" href="<?php echo base_url();?>admin/contact_profile/<?php echo base64_encode($dr['directory_id'])?>"><i class="fa fa-user"></i></a></td>
                                  </tr>
                                  <?php endforeach;?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Zero Configuration  Ends-->
      </div>
  </div>
  <!-- footer start-->
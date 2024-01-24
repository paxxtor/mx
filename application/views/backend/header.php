<div class="page-header">
    <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="<?php echo base_url();?>public/assets/images/logo/logo.png" alt=""></a></div>
            <div class="toggle-sidebar">
                <div class="status_toggle sidebar-toggle d-flex">
                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <g>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0003 6.6738C21.0003 8.7024 19.3551 10.3476 17.3265 10.3476C15.2979 10.3476 13.6536 8.7024 13.6536 6.6738C13.6536 4.6452 15.2979 3 17.3265 3C19.3551 3 21.0003 4.6452 21.0003 6.6738Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3467 6.6738C10.3467 8.7024 8.7024 10.3476 6.6729 10.3476C4.6452 10.3476 3 8.7024 3 6.6738C3 4.6452 4.6452 3 6.6729 3C8.7024 3 10.3467 4.6452 10.3467 6.6738Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0003 17.2619C21.0003 19.2905 19.3551 20.9348 17.3265 20.9348C15.2979 20.9348 13.6536 19.2905 13.6536 17.2619C13.6536 15.2333 15.2979 13.5881 17.3265 13.5881C19.3551 13.5881 21.0003 15.2333 21.0003 17.2619Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3467 17.2619C10.3467 19.2905 8.7024 20.9348 6.6729 20.9348C4.6452 20.9348 3 19.2905 3 17.2619C3 15.2333 4.6452 13.5881 6.6729 13.5881C8.7024 13.5881 10.3467 15.2333 10.3467 17.2619Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
        <div class="left-side-header col ps-0 d-none d-md-block">

        </div>
        <div class="nav-right col-10 col-sm-6 pull-right right-header p-0">
            <ul class="nav-menus">
                <li style="    margin-right: 13px;">
                    <div class="mode animated backOutRight">
                        <i class="icofont icofont-sun-alt lighticon"></i>
                        <i class="icofont icofont-moon darkicon"></i>
                        <!-- </svg> -->
                    </div>
                </li>
                <!--
                <li class="d-md-none resp-serch-input">
                    <div class="resp-serch-box"><i data-feather="search"></i></div>
                    <div class="form-group search-form">
                        <input type="text" placeholder="Search here...">
                    </div>
                </li>-->
                <li id="permissions">
                    <i class="icofont icofont-ui-password" onclick="window.open('<?php echo base_url();?>admin/update_request', '_self')"></i>
                </li>
                <li id="notes">
                    <i class="icon-notepad" style=""></i>
                </li>
                <li class="onhover-dropdown">
                    <i class="icofont icofont-bell-alt"></i><!-- <span class="badge rounded-pill badge-warning">4 </span> -->
                    <div class="onhover-show-div notification-dropdown">
                        <div class="dropdown-title">
                            <h3>Notification</h3><a class="f-right" href="#"><i class="icofont icofont-bell-alt"></i></a>
                        </div>
                        <ul class="custom-scrollbar">
                            <!--  <li>
                                <div class="media">
                                    <div class="notification-img bg-light-primary"><img src="<?php echo base_url();?>public/assets/images/avtar/man.png" alt=""></div>
                                    <div class="media-body">
                                        <h5> <a class="f-14 m-0" href="user-profile.html">Allie Grater</a></h5>
                                        <p>Lorem ipsum dolor sit amet...</p><span>10:20</span>
                                    </div>
                                    <div class="notification-right"><a href="#"><i data-feather="x"></i></a></div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="notification-img bg-light-secondary"><img src="<?php echo base_url();?>public/assets/images/avtar/teacher.png" alt=""></div>
                                    <div class="media-body">
                                        <h5> <a class="f-14 m-0" href="user-profile.html">Olive Yew</a></h5>
                                        <p>Lorem ipsum dolor sit amet...</p><span>09:20</span>
                                    </div>
                                    <div class="notification-right"><a href="#"><i data-feather="x"></i></a></div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="notification-img bg-light-info"><img src="<?php echo base_url();?>public/assets/images/avtar/teenager.png" alt=""></div>
                                    <div class="media-body">
                                        <h5> <a class="f-14 m-0" href="user-profile.html">Peg Legge</a></h5>
                                        <p>Lorem ipsum dolor sit amet...</p><span>07:20</span>
                                    </div>
                                    <div class="notification-right"><a href="#"><i data-feather="x"></i></a></div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="notification-img bg-light-success"><img src="<?php echo base_url();?>public/assets/images/avtar/chinese.png" alt=""></div>
                                    <div class="media-body">
                                        <h5> <a class="f-14 m-0" href="user-profile.html">Teri Dactyl</a></h5>
                                        <p>Lorem ipsum dolor sit amet...</p><span>05:20</span>
                                    </div>
                                    <div class="notification-right"><a href="#"><i data-feather="x"></i></a></div>
                                </div>
                            </li>
                            <li class="p-0"><a class="btn btn-primary" href="#">Check all</a></li>
                             -->
                        </ul>
                    </div>
                </li>
                <li class="profile-nav onhover-dropdown pe-0 py-0 me-0">
                    <i class="icofont icofont-user-suited"></i>
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="javascript:void(0)"><span><b><?php echo $this->account_model->getUserFullName('directory',$this->session->userdata('login_user_id'));?></b></span></a></li>
                        <li><a href="<?php echo base_url();?>admin/contact_profile/<?php echo base64_encode($this->session->userdata('login_user_id')); ?>"><i data-feather="users"></i><span>Mi perfil</span></a></li>
                        <li><a href="<?php echo base_url();?>logout"><i data-feather="log-in"> </i><span>Salir</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
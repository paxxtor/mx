<?php 
    $permissions = $this->db->get_where('admin_permission',array('directory_id'=>$this->session->userdata('login_user_id')))->result_array();
    foreach($permissions as $pr):
    
?>
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper" style="text-align: center;"><a href="<?php echo base_url(); ?>admin">
                <img class="img-fluid for-light" style="width: 100px;height: 100px;" src="<?php echo base_url();?>public/assets/images/logo/<?php echo $this->db->get_where('settings', array('type' => 'logo'))->row()->description;?>" alt="">
                <img class="img-fluid for-dark" style="width: 100px;height: 100px;" src="<?php echo base_url();?>public/assets/images/logo/<?php echo $this->db->get_where('settings', array('type' => 'logo'))->row()->description;?>" alt="" width="100%"></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="<?php echo base_url();?>admin/dashboard/"><img class="img-fluid" src="<?php echo base_url();?>public/assets/images/logo-icon.png" alt=""></a></div>
        <nav class="sidebar-main" style="top: 135px;">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="<?php echo base_url()?>"><img class="img-fluid" src="<?php echo base_url();?>public/assets/images/logo-icon.png" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"> </i></div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title <?php echo ($page_name == "calendar" || $page_name == "calendar") ? 'active':'';?>" href="#">
                            <i data-feather="calendar"></i><span>Agenda</span></a>
                        <ul class="sidebar-submenu " <?php echo ($page_name == "calendar" ) ? 'style="display:block;"':'style="display:none;"';?>>
                            <li><a <?php echo ($page_name == "calendar") ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/calendar/<?php echo base64_encode(1) ?>"><?php echo 'Calendario';?></a></li>
                            <li><a <?php echo ($type == 2) ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/todo_do/<?php echo base64_encode(2)?>"><?php echo 'Tareas';?></a></li>
                        </ul>
                    </li>
                    <?php if($pr['folder'] == 1):?>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title <?php echo ($page_name == "folders" || $page_name == "folders_add"  || $page_name == "folders_details") ? 'active':'';?>" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                            <span>Carpetas</span></a>
                        <ul class="sidebar-submenu " <?php echo ($page_name == "folders" || $page_name == "folders_add") ? 'style="display:block;"':'style="display:none;"';?>>

                            <li><a <?php echo ($type == 1) ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/folders/<?php echo base64_encode(1) ?>"><?php echo 'Judicial';?></a></li>
                            <li><a <?php echo ($type == 2) ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/folders/<?php echo base64_encode(2)?>"><?php echo 'Investigación';?></a></li>

                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if($pr['proceedings'] == 1):?>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav  <?php echo ($page_name == "proceedings" || $page_name == "proceedings_add" || $page_name == "proceedings_details") ? 'active':'';?> " href="<?php echo base_url(); ?>admin/proceedings/<?php echo base64_encode(3) ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                            <span>Expedientes</span></a>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if($pr['actions'] == 1):?>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title <?php echo ($page_navigation == "actions" ) ? 'active':'';?>" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            </svg>
                            <span>Actuaciones</span></a>
                        <ul class="sidebar-submenu" <?php echo ($page_name == "actions" || $page_name == "actions_add" || $page_name == "actions_edit") ? 'style="display:block;"':'style="display:none;"';?>>
                            <?php 
                                    $actions = $this->db->get('action_type')->result_array();
                                    foreach ($actions as $act) :?>

                            <li><a <?php echo ($action_type == $act['action_type_id'] ) ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/actions/<?php echo base64_encode($act['action_type_id'])?>"><?php echo $act['name'];?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if( 1):?>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title <?php echo ($page_name == "lexdocs" || $page_name == "lexvault" ||  $page_name == "lexvault_templates" || $page_name == "lexvault_edit" || $page_name == "lexvault_template_edit") ? 'active':'';?> " href="#">
                            <i class="icofont icofont-papers" style="margin-right:10px"></i>
                            <span>LexPappers</span></a>
                        <ul class="sidebar-submenu" <?php echo ($page_name == "lexdocs" || $page_name == "lexvault" ||  $page_name == "lexvault_templates" || $page_name == "lexvault_edit" || $page_name == "lexvault_template_edit") ? 'style="display:block;"':'style="display:none;"';?>>
                            <li><a <?php echo ($page_name == "lexdocs") ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/lexdocs">LexPappers</a></li>
                            <li><a <?php echo ($page_name == "lexvault" || $page_name == "lexvault_edit" || $page_name == "lexvault_template_edit" || $page_name == "lexvault_templates")  ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/lexvault">Lexvault</a></li>
                            <!--
                            
                            <li><a <?php echo  ($page_name == "profesionals_invoice")? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/profesionals_invoice/<?php echo base64_encode(2)?>"><?php echo 'Facturación Profecionales';?></a></li>
                            <li><a <?php echo  ($page_name == "provisions_invoice") ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/provisions_invoice/<?php echo base64_encode(2)?>"><?php echo 'Facturación Proviciones';?></a></li>
                            <li><a <?php echo  ($page_name == "provaider_invoice") ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/provaider_invoice/<?php echo base64_encode(2)?>"><?php echo 'Factura Proveedores';?></a></li>
                            -->
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if($pr['invoice'] == 1):?>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title <?php echo ($page_name == "client_invoice" ) ? 'active':'';?> " href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                            <span>Facturación</span></a>
                        <ul class="sidebar-submenu" <?php echo ($page_name == "client_invoice" || $page_name == "proforma_invoice" || $page_name == "profesionals_invoice"  || $page_name == "provisions_invoice" || $page_name == "provaider_invoice" ) ? 'style="display:block;"':'style="display:none;"';?>>
                            <li><a <?php echo ($page_name == "client_invoice") ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/client_invoice"><?php echo 'Cobro Clientes';?></a></li>
                            <li><a <?php echo ($page_name == "proforma_invoice")  ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/proforma_invoice"><?php echo 'Facturas Proformas';?></a></li>
                            <li><a <?php echo  ($page_name == "profesionals_invoice")? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/profesionals_invoice/<?php echo base64_encode(2)?>"><?php echo 'Facturación Profecionales';?></a></li>
                            <li><a <?php echo  ($page_name == "provisions_invoice") ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/provisions_invoice/<?php echo base64_encode(2)?>"><?php echo 'Facturación Proviciones';?></a></li>
                            <li><a <?php echo  ($page_name == "provaider_invoice") ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/provaider_invoice/<?php echo base64_encode(2)?>"><?php echo 'Factura Proveedores';?></a></li>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if($pr['directory'] == 1):?>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title <?php echo ($page_name == "directory" || $page_name == "directory_add_profile" || $page_name == "directory_edit_profile") ? 'active':'';?>" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                            <span>Directorio</span></a>
                        <ul class="sidebar-submenu" <?php echo ($page_name == "directory" || $page_name == "directory_add_profile" || $page_name == "directory_edit_profile") ? 'style="display:block;"':'style="display:none;"';?>>
                            <?php 
                                    $directory = $this->db->get('directory_rol')->result_array();
                                    foreach ($directory as $dr) :?>

                            <li><a <?php echo ($type == $dr['directory_rol_id']) ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/directory/<?php echo base64_encode($dr['directory_rol_id'])?>"><?php echo $dr['name'];?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if($pr['admins'] == 1):?>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title <?php echo ($page_name == "admins" || $page_name == "update_request" ) ? 'active':'';?> " href="#">
                            <i data-feather="users"></i>
                            <span>Administradores</span></a>
                        <ul class="sidebar-submenu" <?php echo ($page_name == "admins" ||  $page_name == "profesionals_invoice"  || $page_name == "provisions_invoice" || $page_name == "provaider_invoice" ) ? 'style="display:block;"':'style="display:none;"';?>>
                            <li><a <?php echo ($page_name == "admins" && $admin_type == 1) ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/admins/<?php echo base64_encode(1);?>"><?php echo 'Administradores';?></a></li>
                            <li><a <?php echo ($page_name == "admins" && $admin_type == 0)  ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/admins/<?php echo base64_encode(0);?>"><?php echo 'Con permisos';?></a></li>
                            <li><a <?php echo  ($page_name == "update_request")? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/update_request"><?php echo 'Solicitud de cambios';?></a></li>
                            <li><a <?php echo  ($page_name == "user_access") ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/user_access/"><?php echo 'Control de accesos';?></a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if($pr['settings'] == 1):?>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                            <i data-feather="settings"></i>
                            <span>Ajustes</span></a>
                        <ul class="sidebar-submenu" <?php echo ($page_name == "settings" || $page_name == "frontend" ) ? 'style="display:block;"':'style="display:none;"';?>>
                            <li><a <?php echo ($page_name == "settings") ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/settings"><?php echo 'Ajustes del sistema';?></a></li>
                            <li><a <?php echo ($page_name == "frontend")  ? 'class="active"':'';?> href="<?php echo base_url(); ?>admin/frontend/home"><?php echo 'Pagina web';?></a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<?php endforeach; ?>
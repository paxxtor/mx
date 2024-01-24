<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Admin extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->library('session');
            $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
            $this->output->set_header('Pragma: no-cache');    
            $this->load->library('excel');
            $this->load->library('user_agent');
                          
        }
        
        public function index()
        {
            if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            if ($this->session->userdata('admin_login') == 1)
            {
                redirect(base_url() . 'admin/calendar/', 'refresh');
            }
        }

        function dashboard($param1 = '', $param2 = '')
        {
            if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            $page_data['page_name']  = 'dashboard';
            $page_data['page_title'] = "Tablero";
            $this->load->view('backend/index', $page_data);
        }
        ////////////////////////////////////////////////////////////////

        public function email()
        {


            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'notificaciones.medicaby@gmail.com',
                'smtp_pass' => 'cxtpqqtcadmzwsaw',
                'mailtype'  => 'html', 
                'charset'   => 'utf-8',
                'wordwrap' => true
            );
            $this->load->library('email', $config);
            $this->email->initialize($config);
        
            $this->email->set_newline("\r\n");
            
            $this->email->from('notificaciones.medicaby@gmail.com', 'Correo electrónico');
        
            $this->email->to( 'angcorado4@gmail.com' );
        
            $this->email->subject('Cuenta registrada');
        
            $this->email->message('nuevo correo');
            if ($this->email->send()) {
                echo 'enviado';
            } else {
                show_error($this->email->print_debugger());
            }
            

        }
        //////////////////////////////////////////////////////////////////

        
        public function actions($param1 = '', $param2 = '')
        {
            
            if ($this->session->userdata('admin_login') != 1 || $this->crud_model->get_permission('actions') == 0)
            {
                redirect(base_url(), 'refresh');
            }

            if($param1 == 'send_mail')
            {

                $data['action_type'] = $this->input->post('action_type');
                $data['send_to'] = $this->input->post('directory_id');
                $data['razon']   = $this->input->post('subject');
                $data['message'] = $this->input->post('message');
                

                $this->db->insert('action',$data);

                $action_id = $this->db->insert_id();

                
                if($this->input->post('action_type') == '1')
                {

                    $email = $this->db->get_where('directory',array('directory_id'=>$this->input->post('directory_id')))->row()->email;

                    if($email != "")
                    {
                       
                        require("class.phpmailer.php");
                        $mail = new PHPMailer();
                        $mail->IsHTML(true); 
                        $mail->IsMail();
                        $mail->CharSet = 'UTF-8';
                        $mail->Subject = $this->input->post('subject');
                        $mail->SetFrom('no-reply@mayansource.com', 'Notificaciones Mayansource');
                        $mail->AddAddress($email);
                        $mail->Body = $this->input->post('message');
                       
                        $attachment ='';
                         // Count # of uploaded files in array
                         $total = sizeof($_FILES['attachments']['name']);
                       
                            // Loop through each file
                            for( $i=0 ; $i < $total ; $i++ ) 
                            {
        
                                    if($_FILES['attachments']['name'][$i] != "")
                                    {

                                        $attachment .= $_FILES['attachments']['name'][$i].',';
                                        mkdir("public/uploads/emails/".$action_id);
                                        $attach_path =  "public/uploads/emails/".$action_id."/".$_FILES['attachments']['name'][$i];
                                       
                                        $filename = $_FILES['attachments']['name'][$i];
                                        if (move_uploaded_file($_FILES['attachments']['tmp_name'][$i], $attach_path)) {
                                            $mail->addAttachment($attach_path, $filename);
                                        }
                                    }
                            }
 
                        
                        if(!$mail->Send()) {
                                 $dataAt['email_status'] = 0;
                                $this->db->where('action_id', $action_id);
                                $this->db->update('action', $dataAt);
                        }else {
                            
                                $dataAt['attachments'] = $attachment;
                                $dataAt['email_status'] = 1;
                                $this->db->where('action_id', $action_id);
                                $this->db->update('action', $dataAt);
                        }

                    }

                }
                
                
             redirect(base_url().'admin/actions/'.base64_encode($this->input->post('action_type')),'refresh');
              
                
            }

            if($param1 == 'resend_mail')
            {

                $data['action_type'] = $this->input->post('action_type');
                $data['send_to'] = $this->input->post('directory_id');
                $data['razon']   = $this->input->post('subject');
                $data['message'] = $this->input->post('message');
                

                $this->db->insert('action',$data);

                $action_id = $this->db->insert_id();

                
                if($this->input->post('action_type') == '1')
                {

                    $email = $this->db->get_where('directory',array('directory_id'=>$this->input->post('directory_id')))->row()->email;

                    if($email != "")
                    {
                       
                        require("class.phpmailer.php");
                        $mail = new PHPMailer();
                        $mail->IsHTML(true); 
                        $mail->IsMail();
                        $mail->CharSet = 'UTF-8';
                        $mail->Subject = $this->input->post('subject');
                        $mail->SetFrom('no-reply@mayansource.com', 'Notificaciones Mayansource');
                        $mail->AddAddress($email);
                        $mail->Body = $this->input->post('message');
                       
                        $attachment ='';
                         // Count # of uploaded files in array
                         $total = sizeof($_FILES['attachments']['name']);
                       
                            // Loop through each file
                            for( $i=0 ; $i < $total ; $i++ ) 
                            {
        
                                    if($_FILES['attachments']['name'][$i] != "")
                                    {

                                        $attachment .= $_FILES['attachments']['name'][$i].',';
                                        mkdir("public/uploads/emails/".$action_id);
                                        $attach_path =  "public/uploads/emails/".$action_id."/".$_FILES['attachments']['name'][$i];
                                       
                                        $filename = $_FILES['attachments']['name'][$i];
                                        if (move_uploaded_file($_FILES['attachments']['tmp_name'][$i], $attach_path)) {
                                            $mail->addAttachment($attach_path, $filename);
                                        }
                                    }
                            }
 
                        
                        if(!$mail->Send()) {
                                 $dataAt['email_status'] = 0;
                                $this->db->where('action_id', $action_id);
                                $this->db->update('action', $dataAt);
                        }else {
                            
                                $dataAt['attachments'] = $attachment;
                                $dataAt['email_status'] = 2;
                                $this->db->where('action_id', $action_id);
                                $this->db->update('action', $dataAt);
                        }

                    }

                }
                
                
             redirect(base_url().'admin/actions/'.base64_encode($this->input->post('action_type')),'refresh');
              
                
            }

            if($param1 == 'add_actions')
            {

                if($this->input->post('event') == 1)
                {

                    $dataE['title'] = $this->db->get_where('action_type',array('action_type_id'=>$this->input->post('action_type')))->row()->name;
                    $dataE['description'] = $this->input->post('message');
                    $dataE['date_start'] = $this->input->post('discharge_date');
                    $dataE['date_end'] = $this->input->post('discharge_date');
                    $dataE['color'] = 1;
    
                    $this->db->insert('event',$dataE);
    
                    $event_id = $this->db->insert_id();
                    
                }
                $data['action_type'] = $this->input->post('action_type');
                $data['discharge_date'] = $this->input->post('discharge_date');
                $data['send_to'] = $this->input->post('directory_id');
                $data['directory_id']   = $this->input->post('directory_id');
                $data['razon']   = $this->input->post('subject');
                $data['message'] = $this->input->post('message');
                $data['invoice'] = $this->input->post('invoice') == ""? 0:1 ;
                $data['event_id']   = $event_id;
                $data['public']  = $this->input->post('public') == ""? 0:1 ;
                $data['time'] = $this->input->post('long');
                $data['type'] = $this->input->post('type');
                $data['proceeding_id'] = $this->input->post('proceeding_id');
                $data['folder_type'] = $this->input->post('folder_type');
                $data['folder_id'] = $this->input->post('folder_id');
                $data['status'] = $this->input->post('action_status');
                $data['event']   = $this->input->post('event') == ""? 0:1 ;
                
                $this->db->insert('action',$data);

                redirect(base_url().'admin/actions/'.base64_encode($this->input->post('action_type')),'refresh');
              
            }
            
              if($param1 == 'edit_actions')
            {

                if($this->input->post('event') == 1)
                {

                    $dataE['title'] = $this->db->get_where('action_type',array('action_type_id'=>$this->input->post('action_type')))->row()->name;
                    $dataE['description'] = $this->input->post('message');
                    $dataE['date_start'] = $this->input->post('discharge_date');
                    $dataE['date_end'] = $this->input->post('discharge_date');
                    $dataE['color'] = 1;
    
                    $this->db->insert('event',$dataE);
    
                    $event_id = $this->db->insert_id();
                    
                }
                
                $data['action_type'] = $this->input->post('action_type');
                $data['discharge_date'] = $this->input->post('discharge_date');
                $data['send_to'] = $this->input->post('directory_id');
                $data['directory_id']   = $this->input->post('directory_id');
                $data['razon']   = $this->input->post('subject');
                $data['message'] = $this->input->post('message');
                $data['phase_id'] = $this->input->post('phase_id');
                $data['invoice'] = $this->input->post('invoice') == ""? 0:1 ;
                $data['event']   = $this->input->post('event') == ""? 0:1 ;
                $data['event_id']   = $event_id;
                $data['public']  = $this->input->post('public') == ""? 0:1 ;
                $data['time'] = $this->input->post('long');
                $data['type'] = $this->input->post('type');
                $data['proceeding_id'] = $this->input->post('proceeding_id');
                $data['folder_type'] = $this->input->post('folder_type');
                $data['folder_id'] = $this->input->post('folder_id');
                $data['status'] = $this->input->post('action_status');
                
                $data['directory_id']   = $this->input->post('directory_id');
                $data['show_date']      = $this->input->post('show_date');
                $data['expire_date']    = $this->input->post('expire_date');
                
                
                $this->db->where('action_id',$param2);
                $this->db->update('action',$data);

                redirect(base_url().'admin/actions/'.base64_encode($this->input->post('action_type')),'refresh');
              
                 log_message('error',$this->input->post('discharge_date'));
            }
            
            if($param1 == 'delete')
            {

                $action = $this->db->get_where('action',array('action_id'=>$param2))->row();
             
                $data['status'] = 0;
                $this->db->where('action_id',$param2);
                $this->db->update('action',$data);
                
                $data['status'] = 0;
                $this->db->where('event_id',$action->event_id);
                $this->db->update('event',$data);

                redirect(base_url().'admin/actions/'.base64_encode($action->action_type),'refresh');
              
                
            }
            
            
            $page_data['page_navigation']  ='actions';
            $page_data['action_type']  = base64_decode($param1);
            $page_data['page_name']  = 'actions';
            $page_data['page_title'] = 'Actuaciones';
            $this->load->view('backend/index', $page_data);
            
        }

              
        public function actions_add($param1 = '')
        {
            
            if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }

            $page_data['action_type']  = base64_decode($param1);
            $page_data['page_name']  = 'actions_add';
            $page_data['page_title'] = 'Agregar actuaciones';
            $this->load->view('backend/index', $page_data);
            
        }

        public function actions_edit($param1 = '')
        {
            
            if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }


            $page_data['action_type']  = $this->db->get_where('action', array('action_id'=>base64_decode($param1)))->row()->action_type;
            $page_data['action_id']  = base64_decode($param1);
            $page_data['page_name']  = 'actions_edit';
            $page_data['page_title'] = 'Editar actuaciones';
            $this->load->view('backend/index', $page_data);
            
        }

        public function send_mail($param1 = '')
        {
            
            if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }

            $page_data['action_type']  = base64_decode($param1);
            $page_data['page_name']  = 'send_mail';
            $page_data['page_title'] = 'Enviar email';
            $this->load->view('backend/index', $page_data);
            
        }

        public function email_details($param1 = '')
        {
            
            if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }

            $page_data['action_id']  = base64_decode($param1);
            $page_data['page_name']  = 'mail_details';
            $page_data['page_title'] = 'Enviar email';
            $this->load->view('backend/index', $page_data);
            
        }
        
        ////////////////////////////////////////////////////////////////

        public function directory($param1 = '',$param2 = '')
        {
            
            if ($this->session->userdata('admin_login') != 1 || $this->crud_model->get_permission('directory') == 0)
            {
                redirect(base_url(), 'refresh');
            }
            
              if($param1 == 'add')
            {


                log_message('error',$this->input->post('name'));
                $return =  $this->account_model->add_directory($param2);

                if($return == 1){

                    $this->session->set_flashdata('success_message','Agregado');
                  
                    redirect(base_url().'admin/directory/'.base64_encode($param2), 'refresh');
                }else {
                    $this->session->set_flashdata('error_message','Error al agregar el contacto');
                    
                    redirect(base_url().'admin/directory/'.base64_encode($param2), 'refresh');
                }

            }

            if($param1 == 'edit')
            {

                $return =  $this->account_model->edit_directory($param2);

                if($return == 1){

                    $this->session->set_flashdata('success_message','Actualizado');
                  
                    redirect(base_url().'admin/contact_profile/'.base64_encode($param2), 'refresh');
                }else {
                    $this->session->set_flashdata('error_message','Error al agregar el contacto');
                    
                    redirect(base_url().'admin/contact_profile/'.base64_encode($param2), 'refresh');
                }

            }

         
            $page_data['type']  = base64_decode($param1);
            $page_data['page_name']  = 'directory';
            $page_data['page_title'] = $this->db->get_where('directory_rol',array('directory_rol_id'=>base64_decode($param1)))->row()->name;
            $this->load->view('backend/index', $page_data);
            
        }

        public function directory_add_profile($param1 = '', $param2 = '')
        {
            
            if($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }



            $page_data['type']  = base64_decode($param1);
            $page_data['page_name']  = 'directory_add_profile';
            $page_data['page_title'] = "Agregar perfil";
            $this->load->view('backend/index', $page_data);
            
        }

        public function directory_edit_profile($param1 = '', $param2 = '')
        {
            
            if($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }


           

            $page_data['directory_id']  =$param1;
            log_message('error',$this->db->get_where('directory',array('directory_id'=>base64_decode($param1)))->row()->directory_rol_id);
            $page_data['type']  =$this->db->get_where('directory',array('directory_id'=>base64_decode($param1)))->row()->directory_rol_id;
            $page_data['page_name']  = 'directory_edit_profile';
            $page_data['page_title'] = "Editar perfil";
            $this->load->view('backend/index', $page_data);
            
        }
        
        public function getDirectoryDetails($param1 = '')
        {
            
            if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            if($this->input->post('table') == 'proceedings')
            {
                $page_data['directory_id'] =$this->input->post('directory_id');
                $this->load->view('backend/admin/directory_proceedings.php', $page_data);
            }
            
             if($this->input->post('table') == 'folder_1')
            {
                $page_data['directory_id'] =$this->input->post('directory_id');
                $this->load->view('backend/admin/folder_1.php', $page_data);
            }
            
             if($this->input->post('table') == 'folder_2')
            {
                $page_data['directory_id'] =$this->input->post('directory_id');
                $this->load->view('backend/admin/folder_2.php', $page_data);
            }

            if($this->input->post('table') == 'personal')
            {
                $page_data['directory_id'] =$this->input->post('directory_id');
                $this->load->view('backend/admin/personal.php', $page_data);
            }
        
          
            
        }

        function personal($param1 = '',$param2 = '')
        {

            $data = array(
                'directory_id' => $this->input->post('directory_id'),
                'admin_id' => $this->input->post('admin_id'),
            );

            $this->db->insert('admin_personal', $data);
        }
        
        public function contact_profile($param1 = '',$param2 = '')
        {
            
            if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            if($param1 == 'admin_auth_link')
            {
                $data['auth_secret'] = $param2;
	            $this->db->where('directory_id', $this->session->userdata('login_user_id'));
	            $this->db->update('directory', $data);
	            redirect(base_url().'admin/contact_profile/'.base64_encode($this->session->userdata('login_user_id')), 'refresh');
            }
            
            if($param1 == 'admin_auth_link_des')
            {
                $data['auth_secret'] = '';
	            $this->db->where('directory_id', $this->session->userdata('login_user_id'));
	            $this->db->update('directory', $data);
	            redirect(base_url().'admin/contact_profile/'.base64_encode($this->session->userdata('login_user_id')), 'refresh');
            }
            
            if($param1 == 'add_personal')
            {

                $data['admin_id']  = $this->input->post('admin_id');
                $data['directory_id']   = $this->input->post('directory_id');
                $data['charge']   = $this->input->post('charge');
            
                $this->db->insert('admin_personal',$data);
                exit();
            }

            if($param1 == 'delete_personal')
            {

                $this->db->where('admin_personal_id',$param2);
                $this->db->delete('admin_personal');
                exit();
            }
        
            
            $page_data['directory_id']  = base64_decode($param1);
            $page_data['page_name']  = 'contact_profile';
            $page_data['page_title'] = "Perfil del contacto";
            $this->load->view('backend/index', $page_data);
            
        }


////////////////////////////////////////////////////////////////






public function proceedings($param1 = '',$param2 = '')
{
    
    if ($this->session->userdata('admin_login') != 1 || $this->crud_model->get_permission('proceedings') == 0)
    {
        redirect(base_url(), 'refresh');
    }
    
    if($param1 == 'add')
    {
        $return =  $this->crud_model->proceedings_add($param2);

        if($return == 1){

            $this->session->set_flashdata('success_message','Expediente agregado');
          
            redirect(base_url().'admin/proceedings/'.base64_encode($this->input->post('type')), 'refresh');
        }else {
            $this->session->set_flashdata('error_message','Error al agregar el expediente');
            
            redirect(base_url().'admin/proceedings/'.base64_encode($this->input->post('type')), 'refresh');
        }

    }
    
    if($param1 == 'edit')
    {
        $return =  $this->crud_model->proceedings_edit(base64_decode($param2));

        if($return == 1){

            $this->session->set_flashdata('success_message','Expediente actualizado');
          
            redirect(base_url().'admin/proceedings_details/'.$param2, 'refresh');
        }else {
            $this->session->set_flashdata('error_message','Error al actualizar el expediente');
            
            redirect(base_url().'admin/proceedings_details/'.$param2, 'refresh');
        }

    }
    
    if($param1 == 'delete')
    {
        $return =  $this->crud_model->proceedings_delete($param2);

        if($return == 1){

            $this->session->set_flashdata('success_message','Expediente eliminado');
          
            redirect(base_url().'admin/proceedings_details/'.$param2, 'refresh');
        }else {
            $this->session->set_flashdata('error_message','Error al eliminar el expediente');
            
            redirect(base_url().'admin/proceedings_details/'.$param2, 'refresh');
        }

    }




    $page_data['type']  = base64_decode($param1);
    $page_data['page_name']  = 'proceedings';
    $page_data['page_title'] = "Expedientes";
    $this->load->view('backend/index', $page_data);
    
}

public function proceedings_details($param1 = '')
{
    
    if ($this->session->userdata('admin_login') != 1 )
    {
        redirect(base_url(), 'refresh');
    }
    $page_data['proceeding_id']  = base64_decode($param1);
    $page_data['page_name']  = 'proceedings_details';
    $page_data['page_title'] = "Detalles del Expediente";
    $this->load->view('backend/index', $page_data);
    
}



public function proceedings_add($param1 = '')
{
    
    if ($this->session->userdata('admin_login') != 1)
    {
        redirect(base_url(), 'refresh');
    }

 
    $page_data['page_name']  = 'proceedings_add';
    $page_data['page_title'] = "Agregar Expediente";
    $this->load->view('backend/index', $page_data);
    
}


public function proceedings_edit($param1 = '')
{
    
    if ($this->session->userdata('admin_login') != 1)
    {
        redirect(base_url(), 'refresh');
    }
 
    $page_data['proceeding_id']  = $param1;
    $page_data['page_name']  = 'proceedings_edit';
    $page_data['page_title'] = "Agregar Expediente";
    $this->load->view('backend/index', $page_data);
    
}




public function getDetails($param1 = '')
{
    
    if ($this->session->userdata('admin_login') != 1)
    {
        redirect(base_url(), 'refresh');
    }
    
    if($this->input->post('table') == 'proceeding_interveners')
    {
        $page_data['proceeding_id'] =$this->input->post('proceeding_id');
        $this->load->view('backend/admin/proceeding_interveners.php', $page_data);
    }

    if($this->input->post('table') == 'proceeding_judged')
    {
        $page_data['proceeding_id'] =$this->input->post('proceeding_id');
        $this->load->view('backend/admin/proceeding_judged.php', $page_data);
    }

    if($this->input->post('table') == 'proceeding_actions')
    {
        $page_data['proceeding_id'] =$this->input->post('proceeding_id');
        $this->load->view('backend/admin/proceeding_actions.php', $page_data);
    }

    if($this->input->post('table') == 'proceeding_files')
    {
        $page_data['proceeding_id'] =$this->input->post('proceeding_id');
        $this->load->view('backend/admin/proceeding_files.php', $page_data);
    }

    
    if($this->input->post('table') == 'proceeding_economic')
    {
        $page_data['proceeding_id'] =$this->input->post('proceeding_id');
        $this->load->view('backend/admin/proceeding_economic.php', $page_data);
    }
    
     
    if($this->input->post('table') == 'proceeding_invoices')
    {
        $page_data['proceeding_id'] =$this->input->post('proceeding_id');
        $this->load->view('backend/admin/proceeding_invoices.php', $page_data);
    }
    
    
    if($this->input->post('table') == 'proceeding_history')
    {
        $page_data['proceeding_id'] =$this->input->post('proceeding_id');
        $this->load->view('backend/admin/proceeding_history.php', $page_data);
    }
    
}

/////////////////////////////////////////////////////////



public function getFolderDetails($param1 = '')
{
    
    if ($this->session->userdata('admin_login') != 1)
    {
        redirect(base_url(), 'refresh');
    }
    
    if($this->input->post('table') == 'folder_interveners')
    {
        $page_data['folder_id'] =$this->input->post('folder_id');
        $this->load->view('backend/admin/folder_interveners.php', $page_data);
    }

    if($this->input->post('table') == 'folder_judged')
    {
        $page_data['folder_id'] =$this->input->post('folder_id');
        $this->load->view('backend/admin/folder_judged.php', $page_data);
    }

    if($this->input->post('table') == 'folder_actions')
    {
        $page_data['folder_id'] =$this->input->post('folder_id');
        $this->load->view('backend/admin/folder_actions.php', $page_data);
    }
    
    
    if($this->input->post('table') == 'folder_economic')
    {
        $page_data['folder_id'] =$this->input->post('folder_id');
        $this->load->view('backend/admin/folder_economic.php', $page_data);
    }

    if($this->input->post('table') == 'folder_files')
    {
        $page_data['folder_id'] =$this->input->post('folder_id');
        $this->load->view('backend/admin/folder_files.php', $page_data);
    }
    
    if($this->input->post('table') == 'folder_history')
    {
        $page_data['folder_id'] =$this->input->post('folder_id');
        $this->load->view('backend/admin/folder_history.php', $page_data);
    }
    
}


public function folders($param1 = '', $param2 = '')
{
    
    if ($this->session->userdata('admin_login') != 1  || $this->crud_model->get_permission('folder') == 0)
    {
        redirect(base_url(), 'refresh');
    }
    
    if($param1 == 'add')
    {
        $return =  $this->crud_model->folder_add($param2);

        if($return == 1){

            $this->session->set_flashdata('success_message','Carpeta agregada agregado');
           
        }else {
            $this->session->set_flashdata('error_message','Error al agregar la carpeta');
          
        }

        redirect(base_url().'admin/folders/'.base64_encode($this->input->post('type')), 'refresh');

    } 
    
     if($param1 == 'edit')
    {
        $return =  $this->crud_model->folder_edit(base64_decode($param2));

        if($return == 1){

            $this->session->set_flashdata('success_message','Carpeta actualizada');
           
        }else {
            $this->session->set_flashdata('error_message','Error al actualizar la carpeta');
          
        }

        redirect(base_url().'admin/folders_details/'.$param2, 'refresh');

    } 
    
    if($param1 == 'delete')
    {
        $return =  $this->crud_model->folder_delete($param2);

        if($return == 1){

            $this->session->set_flashdata('success_message','Carpeta eliminada');
           
        }else {
            $this->session->set_flashdata('error_message','Error al eliminar la carpeta');
          
        }

        $refer =  $this->agent->referrer();
        redirect($refer, 'refresh');

    } 

    $page_data['type']  = base64_decode($param1);
    $page_data['page_name']  = 'folders';
    $page_data['page_title'] = "Carpets ";
    $this->load->view('backend/index', $page_data);
}


public function folders_add($param1 = '')
{
    
    if ($this->session->userdata('admin_login') != 1 || $this->crud_model->get_permission('folder_add') == 0)
    {
        redirect(base_url(), 'refresh');
    }

    $page_data['type']  = $param1;
    $page_data['page_name']  = 'folders_add';
    $page_data['page_title'] = "Agregar carpeta";
    $this->load->view('backend/index', $page_data);
    
}

public function folder_edit($param1 = '')
{
    
    if ($this->session->userdata('admin_login') != 1 || $this->crud_model->get_permission('folder_edit') == 0)
    {
        redirect(base_url(), 'refresh');
    }

    $page_data['folder_id']  = base64_decode($param1);
    $page_data['page_name']  = 'folder_edit';
    $page_data['page_title'] = "Editar carpeta";
    $this->load->view('backend/index', $page_data);
    
}

public function folders_details($param1 = '')
{
    
    if ($this->session->userdata('admin_login') != 1)
    {
        redirect(base_url(), 'refresh');
    }
    $page_data['folder_id']  = base64_decode($param1);
    $page_data['page_name']  = 'folders_details';
    $page_data['page_title'] = "Detalles de la carpeta";
    $this->load->view('backend/index', $page_data);
    
}


public function folder_files($param1 = '', $param2 = '')
{
    if($param1 == 'add')
    {
        $md5 = md5(date('d-m-y H:i:s'));
       
        
        $data['folder_id']  = $this->input->post('folder_id');
        $data['parent_id']  = $this->input->post('parent_id');
        $data['name']   = $this->input->post('name');
        $data['description']   = $this->input->post('description');
        $data['date']   = date('Y-m-d H:i');
        $data['phase_id']  = $this->input->post('phase_id');
        $data['public'] =  $this->input->post('public') != "" ? 1 : 0;
        $data['publication_date']   = $this->input->post('publication_date');
        $data['date_start_end']   = $this->input->post('date_start_end');
        $data['date_end']   = $this->input->post('date_end');
        $data['phase_id']  = $this->input->post('phase_id');
    
        $this->db->insert('folder_files',$data);
        $files_id = $this->db->insert_id();
        $files ='';
                         // Count # of uploaded files in array
            $total = sizeof($_FILES['files']['name']);
        
            // Loop through each file
            for( $i=0 ; $i < $total ; $i++ ) 
            {

                    if($_FILES['files']['name'][$i] != "")
                    {
                       
                        mkdir("public/uploads/files/".$files_id);
                        $attach_path =  "public/uploads/files/".$files_id."/". $md5.str_replace(' ', '', $_FILES['files']['name'][$i]);
                        
                        $filename =  $md5.str_replace(' ', '', $_FILES['files']['name'][$i]);
                        if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $attach_path)) {
                            $files .=  $md5.str_replace(' ', '', $_FILES['files']['name'][$i]).',';
                        }
                    }
            }

        
      

        if($files != "")
        {
            $dataF['files']  = $files;   
            $this->db->where('folder_files_id', $files_id);
            $this->db->update('folder_files', $dataF);
            
        }

        exit();

    }

    if($param1 == 'edit')
    {

       $md5 = md5(date('d-m-y H:i:s'));
        $files = $this->db->get_where('folder_files',array('folder_files_id'=>$param2))->row()->files;
       
        $files = explode(",",$files);
        for($i=0;$i<count($arreglo);$i++){
            if($arreglo[$i] != "")
           unlink('public/uploads/files/'.$param2.'/'.$arreglo[$i]); //imprimimos cada nombre 
        }
       
       
        $data['name']   = $this->input->post('name');
        $data['description']   = $this->input->post('description');
        $data['modify']   = date('Y-m-d H:i');                 
        $data['public'] =  $this->input->post('public') != "" ? 1 : 0;
        $data['publication_date']   = $this->input->post('publication_date');
        $data['date_start_end']   = $this->input->post('date_start_end');
        $data['date_end']   = $this->input->post('date_end');
        $data['phase_id']  = $this->input->post('phase_id');
    
        $this->db->where('folder_files_id', $param2);
        $this->db->update('folder_files',$data);
      
        $files ='';
                         // Count # of uploaded files in array
            $total = sizeof($_FILES['files']['name']);
        
            // Loop through each file
            for( $i=0 ; $i < $total ; $i++ ) 
            {

                    if($_FILES['files']['name'][$i] != "")
                    {

                        $attach_path =  "public/uploads/files/".$param2."/". $md5.str_replace(' ', '', $_FILES['files']['name'][$i]);
                        
                        $filename =  $md5.str_replace(' ', '', $_FILES['files']['name'][$i]);
                        if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $attach_path)) {
                            $files .=  $md5.str_replace(' ', '', $_FILES['files']['name'][$i]).',';
                        }
                    }
            }

        
      

        if($files != "")
        {
            $dataF['files']  = $files;   
            $this->db->where('folder_files_id', $param2);
            $this->db->update('folder_files', $dataF);
            
        }

        exit();

    }


    if($param1 == 'delete')
    {

        $files = $this->db->get_where('folder_files',array('folder_files_id'=>$param2))->row()->files;
       
        $files = explode(",",$files);
        for($i=0;$i<count($arreglo);$i++){
            if($arreglo[$i] != "")
           unlink('public/uploads/files/'.$param2.'/'.$arreglo[$i]); //imprimimos cada nombre 
        }
       
        $this->db->where('folder_files_id',$param2);
        $this->db->delete('folder_files');
        exit();

    }
    
}



/////////////////////////////////////////////////////////

public function proceeding_interveners($param1 = '', $param2 = '')
{
    if($param1 == 'add')
    {

        $data['proceeding_id']  = $this->input->post('proceeding_id');
        $data['directory_id']   = $this->input->post('directory_id');
        $data['public']         = 1;
    
        $this->db->insert('proceeding_interveners',$data);
        exit();

    }

    if($param1 == 'delete')
    {

       
        $this->db->where('proceeding_interveners_id',$param2);
        $this->db->delete('proceeding_interveners');
        exit();

    }
    
}


public function proceeding_judged($param1 = '', $param2 = '')
{
    if($param1 == 'add')
    {

        $data['proceeding_id']  = $this->input->post('proceeding_id');
        $data['directory_id']   = $this->input->post('directory_id');
        $data['public']         = 1;
    
        $this->db->insert('proceeding_judged',$data);
        exit();

    }

    if($param1 == 'delete')
    {

       
        $this->db->where('proceeding_judged_id',$param2);
        $this->db->delete('proceeding_judged');
        exit();

    }
    
}


public function proceeding_files($param1 = '', $param2 = '')
{
    if($param1 == 'add')
    {
        $md5 = md5(date('d-m-y H:i:s'));
       
        if($this->input->post('parent_id') == "")
            $phase_id = $this->input->post('phase_id');
        else
            $phase_id = $this->db->get_where('proceeding_files', array('proceeding_files_id'=>$this->input->post('parent_id')))->row()->phase_id;
        
        $data['proceeding_id']  = $this->input->post('proceeding_id');
        $data['parent_id']  = $this->input->post('parent_id');
        $data['name']   = $this->input->post('name');
        $data['description']   = $this->input->post('description');
        $data['date']   = date('Y-m-d H:i');
        $data['publication_date']   = $this->input->post('publication_date');
        $data['date_start_end']   = $this->input->post('date_start_end');
        $data['date_end']   = $this->input->post('date_end');
        $data['phase_id']  = $phase_id;
        $data['public'] =  $this->input->post('public') != "" ? 1 : 0;
        $data['files_type_id']  = $this->input->post('files_type_id');
        $data['files_part_id']  = $this->input->post('files_part_id');
        $data['icono']  = $this->input->post('icono');
        $this->db->insert('proceeding_files',$data);
        $files_id = $this->db->insert_id();
        $files ='';
                         // Count # of uploaded files in array
            $total = sizeof($_FILES['files']['name']);
        
            // Loop through each file
            for( $i=0 ; $i < $total ; $i++ ) 
            {

                    if($_FILES['files']['name'][$i] != "")
                    {
                       
                        mkdir("public/uploads/files/".$files_id);
                        $attach_path =  "public/uploads/files/".$files_id."/". $md5.str_replace(' ', '', $_FILES['files']['name'][$i]);
                        
                        $filename =  $md5.str_replace(' ', '', $_FILES['files']['name'][$i]);
                        if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $attach_path)) {
                            $files .=  $md5.str_replace(' ', '', $_FILES['files']['name'][$i]).',';
                        }
                    }
            }

        
      

        if($files != "")
        {
            $dataF['files']  = $files;   
            $this->db->where('proceeding_files_id', $files_id);
            $this->db->update('proceeding_files', $dataF);
            
        }

        exit();

    }

    if($param1 == 'edit')
    {

       $md5 = md5(date('d-m-y H:i:s'));
        $files = $this->db->get_where('proceeding_files',array('proceeding_files_id'=>$param2))->row()->files;
       
        $files = explode(",",$files);
        for($i=0;$i<count($arreglo);$i++){
            if($arreglo[$i] != "")
           unlink('public/uploads/files/'.$param2.'/'.$arreglo[$i]); //imprimimos cada nombre 
        }
       
       
        $data['name']   = $this->input->post('name');
        $data['description']   = $this->input->post('description');
        $data['modify']   = date('Y-m-d H:i');                 
        $data['public'] =  $this->input->post('public') != "" ? 1 : 0;
        $data['publication_date']   = $this->input->post('publication_date');
        $data['date_start_end']   = $this->input->post('date_start_end');
        $data['date_end']   = $this->input->post('date_end');
        $data['phase_id']  = $this->input->post('phase_id');
       
        $this->db->where('proceeding_files_id', $param2);
        $this->db->update('proceeding_files',$data);
      
        $files ='';
                         // Count # of uploaded files in array
            $total = sizeof($_FILES['files']['name']);
        
            // Loop through each file
            for( $i=0 ; $i < $total ; $i++ ) 
            {

                    if($_FILES['files']['name'][$i] != "")
                    {

                        $attach_path =  "public/uploads/files/".$param2."/". $md5.str_replace(' ', '', $_FILES['files']['name'][$i]);
                        
                        $filename =  $md5.str_replace(' ', '', $_FILES['files']['name'][$i]);
                        if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $attach_path)) {
                            $files .=  $md5.str_replace(' ', '', $_FILES['files']['name'][$i]).',';
                        }
                    }
            }

        
      

        if($files != "")
        {
            $dataF['files']  = $files;   
            $this->db->where('proceeding_files_id', $param2);
            $this->db->update('proceeding_files', $dataF);
            
        }

        exit();

    }


    if($param1 == 'delete')
    {

        $files = $this->db->get_where('proceeding_files',array('proceeding_files_id'=>$param2))->row()->files;
       
        $files = explode(",",$files);
        for($i=0;$i<count($arreglo);$i++){
            if($arreglo[$i] != "")
           unlink('public/uploads/files/'.$param2.'/'.$arreglo[$i]); //imprimimos cada nombre 
        }
       
        $this->db->where('proceeding_files_id',$param2);
        $this->db->delete('proceeding_files');
        exit();

    }
    
}

public function movment_economic($param1 = '', $param2 = '')
{
    if($param1 == 'create')
    {
        $data = array(
            'date' => $this->input->post('date'),
            'type' => $this->input->post('type'),
            'import' => $this->input->post('import'),
            'description' => $this->input->post('description'),
            'origin_id' => $this->input->post('origin_id'),
            'origin' => $this->input->post('origin'),
            'client_id' => $this->input->post('client_id'),
            'manager_id' => $this->input->post('manager_id'),
            'status' => 1
            
        );
        $this->db->insert('movment_economic',$data);
        exit();

    }

    if($param1 == 'update')
    {
        $data = array(
            'date' => $this->input->post('date'),
            'type' => $this->input->post('type'),
            'import' => $this->input->post('import'),
            'description' => $this->input->post('description'),
            'client_id' => $this->input->post('client_id'),
            'manager_id' => $this->input->post('manager_id'),
        );
        $this->db->where('movment_economic_id',$param2);
        $this->db->update('movment_economic',$data);
        exit();

    }

   
    if($param1 == 'delete')
    {
        $data = array(
            'status'=>0
            );
            
        $this->db->where('economic_payment_id',$param2);
        $this->db->update('economic_payment',$data);
        exit();
    }

    if($param1 == 'create_payment')
    {
        $data = array(
            'date' => $this->input->post('date'),
            'type' => $this->input->post('type'),
            'import' => $this->input->post('import'),
            'description' => $this->input->post('description'),
            'method' => $this->input->post('payment_method'),
            'movment_economic_id' => $this->input->post('movment_economic_id'),
            'status' => 1
        );
        $this->db->insert('economic_payment',$data);
        exit();
    }

   
    
}

function force_download($folder, $file_name)
    {
        $this->load->helper('download');
        $data = file_get_contents("public/uploads/files/" . $folder."/".base64_decode($file_name));
       
        if(base64_decode($file_name) !="")
            force_download(base64_decode($file_name), $data);
      
    }
//////////////////////////////////// seleccionar carpetas para
function getFolders()
    {
        $type = $this->input->post('type');
       
      
        $values = $this->db->get_where('folder', array('type'=>$type,'status'=>1));
        if($values->num_rows() > 0){

            
            foreach ($values->result_array() as $row) {
                $html .='<option value="'.$row['folder_id'].'">'.$row['nic'].'</option>';
            }
         
            
        }

        echo $html;
        exit();
      
    }

/////////////////////////////////// typehead //////////////////////////////////



public function openSelect()
{
    
    $table = $this->input->post('table');
    $field = $this->input->post('field');

        $html .=' <tr class="newOption "   >
                        <td>
                            <input  onFocus="getValues(\''.$table.'\',this.value,\''.$field.'\')" onKeyUp="getValues(\''.$table.'\',this.value,\''.$field.'\')"  type="text" id="'.$field.'_new" class="form-control type" placeholder="Agregar nuevo elemento"/>
                        </td>
                        <td><a style="cursor:pointer" onclick="addValue(\''.$table.'\',\''.$field.'\')" herf="javascript:void(0)"><i class="icon"><i class="icon-plus"></i></a></td>
                    </tr> ';
    
    echo $html;
    exit();

}


public function getValues()
{
    
        $name = $this->input->post('name');
        $table = $this->input->post('table');
        $field = $this->input->post('field');
        if($name == "" )
        {
            $this->db->limit(5);
        }
        $values = $this->db->like('name', $name,'BOTH')->get_where($table, array('status'=>1));
        if($values->num_rows() > 0){

            
            foreach ($values->result_array() as $row) {
                $html .='<tr class="option " >
                    <td    style="cursor:pointer" onclick="selectValue(\''.$table.'\',\''.$row[$table.'_id'].'\',\''.$row['name'].'\',\''.$field.'\')">
                         <b> '.$row['name'].' </b> 
                    </td>
                    <td style="cursor:pointer" onclick="deleteValue(\''.$table.'\',this)" herf="javascript:void(0)" data-id="'.$row[$table.'_id'].'" ><i class="icon"><i class="icon-trash"></i></td>
                </tr>';
            }
         
            
        }

        echo $html;
        exit();

}

public function addValue()
{

    $name = $this->input->post('name');
    $table = $this->input->post('table');

    $data['name']=$name;
    $this->db->insert($table,$data);

    echo $this->db->insert_id();
    exit();
}

public function deleteValue()
{

    $id = $this->input->post('id');
    $table = $this->input->post('table');

    $data['status']=0;
    $this->db->where($table.'_id',$id);
    $this->db->update($table,$data);
    exit();
}

////////////////////////////////////////////////////////////////
        public function admin_contact($param1 = '', $param2 = '')
        {
            
            if($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }

            if($param1 == 'add')
            {
                $this->account_model->add_contact();
                $refer =  $this->agent->referrer();
                redirect($refer, 'refresh');
            }

            if($param1 == 'edit_password')
            {
                $return = $this->account_model->edit_admin_password($param2);
                if($return == 1){

                    $this->session->set_flashdata('success_message','actualizado');
                    $refer =  $this->agent->referrer();
                    redirect($refer, 'refresh');
                }else {
                    $this->session->set_flashdata('error_message','Error al actualizar');
                    $refer =  $this->agent->referrer();
                    redirect($refer, 'refresh');
                }
            }

            if($param1 == 'edit_info')
            {
                $return =  $this->account_model->edit_admin_info($param2);

                if($return == 1){

                    $this->session->set_flashdata('success_message','actualizado');
                    $refer =  $this->agent->referrer();
                    redirect($refer, 'refresh');
                }else {
                    $this->session->set_flashdata('error_message','Error al actualizar');
                    $refer =  $this->agent->referrer();
                    redirect($refer, 'refresh');
                }

            }

            $page_data['admin_id']  = $param1;
            $page_data['page_name']  = 'admin_edit_profile';
            $page_data['page_title'] = "Editar perfil";
            $this->load->view('backend/index', $page_data);
             
        }


        public function admins($param1 = '')
        {
            
           if ($this->session->userdata('admin_login') != 1 || $this->crud_model->get_permission('admins') == 0)
            {
                redirect(base_url(), 'refresh');
            }

            $page_data['admin_type']  = base64_decode($param1 );
            $page_data['page_name']  = 'admins';
            $page_data['page_title'] = "Administradores";
            $this->load->view('backend/index', $page_data);
            
        }

        public function user_access($param1 = '')
        {
            
           if ($this->session->userdata('admin_login') != 1 || $this->crud_model->get_permission('admins') == 0)
            {
                redirect(base_url(), 'refresh');
            }

            $page_data['page_name']  = 'user_access';
            $page_data['page_title'] = "Usuarios";
            $this->load->view('backend/index', $page_data);
            
        }

        
        public function admin_add_profile($param1 = '', $param2 = '')
        {
            
            if($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }


            if($param1 == 'add')
            {
                $return =  $this->account_model->add_admin($param2);

                if($return == 1){

                    $this->session->set_flashdata('success_message','Administrador agregado');
                  
                    redirect(base_url().'admin/admins', 'refresh');
                }else {
                    $this->session->set_flashdata('error_message','Error al agregar administrador');
                    
                    redirect(base_url().'admin/admins', 'refresh');
                }

            }

            $page_data['page_name']  = 'admin_add_profile';
            $page_data['page_title'] = "Agregar administrador";
            $this->load->view('backend/index', $page_data);
            
        }
        
        
        public function admin_edit_permissions($param1 = '', $param2 = '')
        {
            
            if($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }


            if($param1 == 'edit')
            {
                $return =  $this->account_model->edit_admin_permission($param2);

                if($return == 1){

                    $this->session->set_flashdata('success_message','Permisos actualizados');
                  
                    redirect(base_url().'admin/admins/'.base64_encode($return), 'refresh');
                }else {
                    $this->session->set_flashdata('error_message','Error al actualizar los permisos');
                    
                    redirect(base_url().'admin/admins'.base64_encode($return), 'refresh');
                }

            }
            $page_data['directory_id']  = base64_decode($param1);
            $page_data['page_name']  = 'admin_edit_permissions';
            $page_data['page_title'] = "Editar permisos de administrador";
            $this->load->view('backend/index', $page_data);
            
        }
        
        
        public function admin_edit_profile($param1 = '', $param2 = '')
        {
            
            if($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }

            if($param1 == 'edit_image')
            {
                $this->account_model->edit_admin_image($param2);
                $refer =  $this->agent->referrer();
                redirect($refer, 'refresh');
            }

            if($param1 == 'edit_password')
            {
                $return = $this->account_model->edit_admin_password($param2);
                if($return == 1){

                    $this->session->set_flashdata('success_message','actualizado');
                    $refer =  $this->agent->referrer();
                    redirect($refer, 'refresh');
                }else {
                    $this->session->set_flashdata('error_message','Error al actualizar');
                    $refer =  $this->agent->referrer();
                    redirect($refer, 'refresh');
                }
            }

            if($param1 == 'edit_info')
            {
                $return =  $this->account_model->edit_admin_info($param2);

                if($return == 1){

                    $this->session->set_flashdata('success_message','actualizado');
                    $refer =  $this->agent->referrer();
                    redirect($refer, 'refresh');
                }else {
                    $this->session->set_flashdata('error_message','Error al actualizar');
                    $refer =  $this->agent->referrer();
                    redirect($refer, 'refresh');
                }

            }

            $page_data['admin_id']  = $param1;
            $page_data['page_name']  = 'admin_edit_profile';
            $page_data['page_title'] = "Editar perfil";
            $this->load->view('backend/index', $page_data);
            
        }

        public function admin_profile($param1 = '')
        {
            
           if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            $page_data['admin_id']  = $param1;
            $page_data['page_name']  = 'admin_profile';
            $page_data['page_title'] = "Administrador";
            $this->load->view('backend/index', $page_data);
            
        }

        public function calendar($param1 = '')
        {
            
           if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            $page_data['page_name']  = 'calendar';
            $page_data['page_title'] = "Calendario";
            $this->load->view('backend/index', $page_data);
            
        }
        
        public function todo_do($param1 = '')
        {
            
           if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            if($param1 == 'add_task')
            {
                
                $data = array(
                    'task'=>$this->input->post('task'),
                    'directory_id'=>$this->session->userdata('login_user_id'),
                    'status'=>0,
                    );
                    
                $this->db->insert('todo_do',$data);
                
                echo 1;
                exit();
            }
             if($param1 == 'delete_task')
            {
                
                
                $this->db->where('todo_do_id',$this->input->post('task_id'));    
                $this->db->delete('todo_do');
                
                echo 1;
                exit();
            }
            
            if($param1 == 'complete_task')
            {
                $status = $this->db->get_where('todo_do',array('todo_do_id'=>$this->input->post('task_id')))->row()->status;
                
                if($status == 0)
                {
                    $data = array(
                        'status'=>1,
                    );    
                }else
                {
                    
                    $data = array(
                        'status'=>0,
                    );
                }
                
                $this->db->where('todo_do_id',$this->input->post('task_id'));    
                $this->db->update('todo_do',$data);
                
                echo 1;
                exit();
            }
            
             if($param1 == 'mark_all_task')
            {
                $status = $this->db->get_where('todo_do',array('todo_do_id'=>$this->input->post('task_id')))->row()->status;
                
                $data = array(
                        'status'=>1,
                    );  
                
                $this->db->where('directory_id',$this->session->userdata('login_user_id'));    
                $this->db->update('todo_do',$data);
                
                echo 1;
                exit();
            }
            
            if($param1 == 'desmark_all_task')
            {
                $status = $this->db->get_where('todo_do',array('todo_do_id'=>$this->input->post('task_id')))->row()->status;
                
                $data = array(
                        'status'=>0,
                    );  
                
                $this->db->where('directory_id',$this->session->userdata('login_user_id'));    
                $this->db->update('todo_do',$data);
                
                echo 1;
                exit();
            }
            
            $page_data['page_name']  = 'todo_do';
            $page_data['page_title'] = "Tareas";
            $this->load->view('backend/index', $page_data);
            
        }

        public function notes($param1 = '')
        {
            
           if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            if($param1 == 'newNote')
            {
                
                $data = array(
                    'title'=>'',
                    'cnt'=>'',
                    'directory_id'=>$this->session->userdata('login_user_id'),
                    );
                    
                $this->db->insert('note',$data);
                
                $note_id = $this->db->insert_id();

                $note = '<div class="note" data-id="'.$note_id.'">'
                        .	'<a href="javascript:;" class="button remove">X</a>'
                        . 	'<div class="note_cnt">'
                        .       '<textarea class="title notes" data-id="'.$note_id.'" placeholder="Título"></textarea>'
                        . 		'<textarea class="cnt notes" data-id="'.$note_id.'" placeholder="Apunta lo que necesites aquí."></textarea>'
                        .	'</div> '
                        .'</div>';
                
                echo $note;
                exit();
            }
            if($param1 == 'updateNote')
            {
                $cl = str_replace(' notes','',$this->input->post('cl'));
                $data = array(
                    $cl =>$this->input->post('val'),
                    );  
                
                $this->db->where('note_id',$this->input->post('note_id'));    
                $this->db->update('note',$data);
                
                exit();
            }

            if($param1 == 'deleteNote')
            {
                
                $this->db->where('note_id',$this->input->post('note_id'));    
                $this->db->delete('note');
                
                exit();
            }
            
        }

        
        public function settings($param1 = '')
        {
            
           if ($this->session->userdata('admin_login') != 1 || $this->crud_model->get_permission('settings') == 0)
            {
                redirect(base_url(), 'refresh');
            }

            if($param1 == 'update_system')
            {
                $this->crud_model->update_system();
                $refer =  $this->agent->referrer();
                redirect($refer, 'refresh');
            }
            
             if($param1 == 'update_system_sheet_docs')
            {
                $this->crud_model->update_system_sheet_docs();
                $refer =  $this->agent->referrer();
                redirect($refer, 'refresh');
            }
            
            if($param1 == 'update_system_sheet_docs_of')
            {
                $this->crud_model->update_system_sheet_docs_of();
                $refer =  $this->agent->referrer();
                redirect($refer, 'refresh');
            }

            if($param1 == 'update_info')
            {
                $this->crud_model->update_info();
                $refer =  $this->agent->referrer();
                redirect($refer, 'refresh');
            }

            $page_data['page_name']  = 'settings';
            $page_data['page_title'] = "Ajustes";
            $this->load->view('backend/index', $page_data);
            
        }

        public function frontend($param1 = '')
        {
            
           if ($this->session->userdata('admin_login') != 1 || $this->crud_model->get_permission('settings') == 0)
            {
                redirect(base_url(), 'refresh');
            }
            
            if($param1 == "home")
            {
    
                $page_data['page_name']  = 'home';
                $page_data['page_title'] = "Pagina web";
                $this->load->view('backend/frontend/index.php', $page_data);
            }
            
             if($param1 == "services")
            {
    
                $page_data['page_name']  = 'services';
                $page_data['page_title'] = "Servicios";
                $this->load->view('backend/frontend/index.php', $page_data);
            }
            
             if($param1 == "us")
            {
    
                $page_data['page_name']  = 'us';
                $page_data['page_title'] = "Nosotros";
                $this->load->view('backend/frontend/index.php', $page_data);
            }
            
            if($param1 == "contact")
            {
    
                $page_data['page_name']  = 'contact';
                $page_data['page_title'] = "Contacto";
                $this->load->view('backend/frontend/index.php', $page_data);
            }
            
        }

        public function updateFront($param1 = '')
        {
            
          $data['description'] = $this->input->post('value'); 
          $this->db->where('type',$this->input->post('cl') );
          $this->db->update('frontend',$data);

          $md5 = md5(date('d-m-y H:i:s'));


            if($_FILES['files']['name'] != '') 
            {
                $data['description'] = $md5.str_replace(' ', '', $_FILES['files']['name']);
                $this->db->where('type','image_'.$this->input->post('cl') );
                $this->db->update('frontend',$data);
                move_uploaded_file($_FILES['files']['tmp_name'], 'public/assets/images/frontend/' . $md5.str_replace(' ', '', $_FILES['files']['name']));
                echo $md5.str_replace(' ', '', $_FILES['files']['name']);
            }


          exit();
            
        }

        public function updateFrontImages($param1 = '')
        {
            

          $md5 = md5(date('d-m-y H:i:s'));


            if($_FILES['files']['name'] != '') 
            {
                $data['description'] = $md5.str_replace(' ', '', $_FILES['files']['name']);
                $this->db->where('type',$this->input->post('cl') );
                $this->db->update('frontend',$data);
                move_uploaded_file($_FILES['files']['tmp_name'], 'public/assets/images/frontend/' . $md5.str_replace(' ', '', $_FILES['files']['name']));
                echo $md5.str_replace(' ', '', $_FILES['files']['name']);
            }


          exit();
            
        }



        public function chart($param = '')
        {
            
         
            $page_data['page_name']  = 'chart';
            $page_data['page_title'] = "graficas";
            $this->load->view('backend/index', $page_data);
            
        }

       function events($param1 = '',$param2 = '')
        {
            
            if($param1 == "create")
            {


                log_message('error',$this->input->post('time_end'));
                $data['title'] = $this->input->post('title');
                $data['description'] = $this->input->post('description');
                $data['date_start'] = $this->input->post('date_start');
                $data['date_end'] = $this->input->post('date_end');
                $data['time_start'] = $this->input->post('time_start');
                $data['time_end'] = $this->input->post('time_end');
                $data['color'] = $this->input->post('color');

                $this->db->insert('event',$data);

                redirect(base_url().'admin/calendar','refresh');

            }
            
             if($param1 == "update")
            {


                log_message('error',$this->input->post('time_end'));
                $data['title'] = $this->input->post('title');
                $data['description'] = $this->input->post('description');
                $data['date_start'] = $this->input->post('date_start');
                $data['date_end'] = $this->input->post('date_end');
                $data['time_start'] = $this->input->post('time_start');
                $data['time_end'] = $this->input->post('time_end');
                $data['color'] = $this->input->post('color');

                $this->db->insert('event',$data);

                redirect(base_url().'admin/calendar','refresh');

            }
            
             if($param1 == "delete")
            {


             
                $this->db->where('event_id',$param2);
                $this->db->delete('event');

                redirect(base_url().'admin/calendar','refresh');

            }
            
        }

        
       function get_users($param1 = '')
       {
          
             $users = $this->db->get_where('directory',array('directory_rol_id'=>$param1))->result_array();
             foreach ($users as $row) 
             {

                echo '<option value="'.$row['directory_id'].'">'.$row['name'].' '.$row['first_last_name'].' '.$row['second_last_name'].'</option>';

            } 

       }

       ////////////////////////////////// Client Invoices
        
       public function client_invoice($param1 = '', $param2 = '')
       {
           
          if ($this->session->userdata('admin_login') != 1)
           {
               redirect(base_url(), 'refresh');
           }

           if($param1 == "create")
           {
             
               $this->crud_model->create_invoice();
               $this->session->set_flashdata('success_message','Agregado');
               redirect(base_url().'admin/client_invoice','refresh');
           }

           if($param1 == "edit")
           {
               
                $this->crud_model->edit_invoice($param2);
               $this->session->set_flashdata('success_message','Actualizado');
               redirect(base_url().'admin/client_invoice','refresh');
           }

           if($param1 == "delete")
           {
                $this->crud_model->delete_invoice($param2);
               $this->session->set_flashdata('success_message','Eliminado');
               redirect(base_url().'admin/client_invoice','refresh');
           }

           if($param1 == "pay")
           {
                $this->crud_model->pay_invoice($param2);
               $this->session->set_flashdata('success_message','Actualizado');
               redirect(base_url().'admin/client_invoice','refresh');

           }

           $page_data['status']  = $param1;
           $page_data['page_name']  = 'client_invoice';
           $page_data['page_title'] = "Cobro a clientes";
           $this->load->view('backend/index', $page_data);
           
       }

       public function add_client_invoice($param1 = '', $param2 = '')
       {
           
          if ($this->session->userdata('admin_login') != 1)
           {
               redirect(base_url(), 'refresh');
           }

           $page_data['page_name']  = 'add_client_invoice';
           $page_data['page_title'] = "Cobro a clientes";
           $this->load->view('backend/index', $page_data);
           
       }

       public function edit_client_invoice($param1 = '', $param2 = '')
       {
           
          if ($this->session->userdata('admin_login') != 1)
           {
               redirect(base_url(), 'refresh');
           }

          

           $page_data['client_invoice_id']  = base64_decode($param1);
           $page_data['page_name']  = 'edit_client_invoice';
           $page_data['page_title'] = "Cobro a clientes";
           $this->load->view('backend/index', $page_data);
           
       }


        ////////////////////////////////// Proforma Invoices
        
        public function proforma_invoice($param1 = '', $param2 = '')
        {
            
           if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            if($param1 == "create")
            {
              
                $this->crud_model->create_invoice();
                $this->session->set_flashdata('success_message','Agregado');
                redirect(base_url().'admin/proforma_invoice','refresh');
            }
 
            if($param1 == "edit")
            {
                
                 $this->crud_model->edit_invoice($param2);
                $this->session->set_flashdata('success_message','Actualizado');
                redirect(base_url().'admin/proforma_invoice','refresh');
            }
 
            if($param1 == "delete")
            {
                 $this->crud_model->delete_invoice($param2);
                $this->session->set_flashdata('success_message','Eliminado');
                redirect(base_url().'admin/proforma_invoice','refresh');
            }
 
            if($param1 == "pay")
            {
                 $this->crud_model->pay_invoice($param2);
                $this->session->set_flashdata('success_message','Actualizado');
                redirect(base_url().'admin/proforma_invoice','refresh');
 
            }
 
 
            $page_data['status']  = $param1;
            $page_data['page_name']  = 'proforma_invoice';
            $page_data['page_title'] = "Cobro a clientes";
            $this->load->view('backend/index', $page_data);
            
        }
 
        public function proforma_invoice_add($param1 = '', $param2 = '')
        {
            
           if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
 
            $page_data['page_name']  = 'proforma_invoice_add';
            $page_data['page_title'] = "Cobro a clientes";
            $this->load->view('backend/index', $page_data);
            
        }
 
        public function proforma_invoice_edit($param1 = '', $param2 = '')
        {
            
           if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
 
           
 
            $page_data['invoice_id']  = base64_decode($param1);
            $page_data['page_name']  = 'proforma_invoice_edit';
            $page_data['page_title'] = "Cobro a clientes";
            $this->load->view('backend/index', $page_data);
            
        }


         ////////////////////////////////// Prefecionales Invoices
        
         public function professionals_invoice($param1 = '', $param2 = '')
         {
             
            if ($this->session->userdata('admin_login') != 1)
             {
                 redirect(base_url(), 'refresh');
             }
             
             if($param1 == "create")
             {
               
                 $this->crud_model->create_invoice();
                 $this->session->set_flashdata('success_message','Agregado');
                 redirect(base_url().'admin/professionals_invoice','refresh');
             }
  
             if($param1 == "edit")
             {
                 
                  $this->crud_model->edit_invoice($param2);
                 $this->session->set_flashdata('success_message','Actualizado');
                 redirect(base_url().'admin/professionals_invoice','refresh');
             }
  
             if($param1 == "delete")
             {
                  $this->crud_model->delete_invoice($param2);
                 $this->session->set_flashdata('success_message','Eliminado');
                 redirect(base_url().'admin/professionals_invoice','refresh');
             }
  
             if($param1 == "pay")
             {
                  $this->crud_model->pay_invoice($param2);
                 $this->session->set_flashdata('success_message','Actualizado');
                 redirect(base_url().'admin/professionals_invoice','refresh');
  
             }
  
  
             $page_data['status']  = $param1;
             $page_data['page_name']  = 'professionals_invoice';
             $page_data['page_title'] = "Cobro a clientes";
             $this->load->view('backend/index', $page_data);
             
         }
  
         public function professionals_invoice_add($param1 = '', $param2 = '')
         {
             
            if ($this->session->userdata('admin_login') != 1)
             {
                 redirect(base_url(), 'refresh');
             }
  
             $page_data['page_name']  = 'professionals_invoice_add';
             $page_data['page_title'] = "Cobro a clientes";
             $this->load->view('backend/index', $page_data);
             
         }
  
         public function professionals_invoice_edit($param1 = '', $param2 = '')
         {
             
            if ($this->session->userdata('admin_login') != 1)
             {
                 redirect(base_url(), 'refresh');
             }
  
  
             $page_data['invoice_id']  = base64_decode($param1);
             $page_data['page_name']  = 'professionals_invoice_edit';
             $page_data['page_title'] = "Cobro a clientes";
             $this->load->view('backend/index', $page_data);
             
         }
/////////////////////////////////////////////////////////////////////////////
    
                 ////////////////////////////////// provisions Invoices
        
        public function provisions_invoice($param1 = '', $param2 = '')
        {
            
        if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }
            
            if($param1 == "create")
            {
            
                $this->crud_model->create_invoice();
                $this->session->set_flashdata('success_message','Agregado');
                redirect(base_url().'admin/provisions_invoice','refresh');
            }

            if($param1 == "edit")
            {
                
                $this->crud_model->edit_invoice($param2);
                $this->session->set_flashdata('success_message','Actualizado');
                redirect(base_url().'admin/provisions_invoice','refresh');
            }

            if($param1 == "delete")
            {
                $this->crud_model->delete_invoice($param2);
                $this->session->set_flashdata('success_message','Eliminado');
                redirect(base_url().'admin/provisions_invoice','refresh');
            }

            if($param1 == "pay")
            {
                $this->crud_model->pay_invoice($param2);
                $this->session->set_flashdata('success_message','Actualizado');
                redirect(base_url().'admin/provisions_invoice','refresh');

            }


            $page_data['status']  = $param1;
            $page_data['page_name']  = 'provisions_invoice';
            $page_data['page_title'] = "Facturación proviciones";
            $this->load->view('backend/index', $page_data);
            
        }

        public function provisions_invoice_add($param1 = '', $param2 = '')
        {
            
        if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }

            $page_data['page_name']  = 'provisions_invoice_add';
            $page_data['page_title'] = "Facturación proviciones";
            $this->load->view('backend/index', $page_data);
            
        }

        public function provisions_invoice_edit($param1 = '', $param2 = '')
        {
            
        if ($this->session->userdata('admin_login') != 1)
            {
                redirect(base_url(), 'refresh');
            }


            $page_data['invoice_id']  = base64_decode($param1);
            $page_data['page_name']  = 'provisions_invoice_edit';
            $page_data['page_title'] = "Facturación proviciones";
            $this->load->view('backend/index', $page_data);
            
        }

        ////////////////////////////////// provaider Invoices
        
                 public function provaider_invoice($param1 = '', $param2 = '')
                 {
                     
                 if ($this->session->userdata('admin_login') != 1)
                     {
                         redirect(base_url(), 'refresh');
                     }
                     
                     if($param1 == "create")
                     {
                     
                         $this->crud_model->create_invoice();
                         $this->session->set_flashdata('success_message','Agregado');
                         redirect(base_url().'admin/provaider_invoice','refresh');
                     }
         
                     if($param1 == "edit")
                     {
                         
                         $this->crud_model->edit_invoice($param2);
                         $this->session->set_flashdata('success_message','Actualizado');
                         redirect(base_url().'admin/provaider_invoice','refresh');
                     }
         
                     if($param1 == "delete")
                     {
                         $this->crud_model->delete_invoice($param2);
                         $this->session->set_flashdata('success_message','Eliminado');
                         redirect(base_url().'admin/provaider_invoice','refresh');
                     }
         
                     if($param1 == "pay")
                     {
                         $this->crud_model->pay_invoice($param2);
                         $this->session->set_flashdata('success_message','Actualizado');
                         redirect(base_url().'admin/provaider_invoice','refresh');
         
                     }
         
         
                     $page_data['status']  = $param1;
                     $page_data['page_name']  = 'provaider_invoice';
                     $page_data['page_title'] = "Facturación proviciones";
                     $this->load->view('backend/index', $page_data);
                     
                 }
         
                 public function provaider_invoice_add($param1 = '', $param2 = '')
                 {
                     
                 if ($this->session->userdata('admin_login') != 1)
                     {
                         redirect(base_url(), 'refresh');
                     }
         
                     $page_data['page_name']  = 'provaider_invoice_add';
                     $page_data['page_title'] = "Facturación proviciones";
                     $this->load->view('backend/index', $page_data);
                     
                 }
         
                 public function provaider_invoice_edit($param1 = '', $param2 = '')
                 {
                     
                 if ($this->session->userdata('admin_login') != 1)
                     {
                         redirect(base_url(), 'refresh');
                     }
         
         
                     $page_data['invoice_id']  = base64_decode($param1);
                     $page_data['page_name']  = 'provaider_invoice_edit';
                     $page_data['page_title'] = "Facturación proviciones";
                     $this->load->view('backend/index', $page_data);
                     
                 }
                 
         public function setDarkmode($param1 = '')
        {
            
            $dark = $this->db->get_where('directory',array('directory_id'=>$this->session->userdata('login_user_id')))->row()->dark;
            if($dark)
            {
                $data['dark'] = 0;
                $this->session->set_userdata('dark_mode', 0);
            }
            else
            {
                $data['dark'] = 1;
                $this->session->set_userdata('dark_mode', 1);
            }
            
            $this->db->where('directory_id', $this->session->userdata('login_user_id'));
            $this->db->update('directory', $data);
           
        }


        public function rtf($param1 = '')
        {

            $contenido ="contedido reft";
           // Establecer el tipo de contenido como RTF
            header('Content-Type: application/rtf');
            header('Content-Disposition: attachment; filename="archivo.rtf"');

            // Imprimir el contenido RTF en el cuerpo de la respuesta
            echo $contenido;
           
        }
        
//////////////////////////////////////////////////////////////////////////////////

    public function lexdocs($param1 = '',$param2 = '')
    {
        if($param1 == 'create_contract')
        {
            log_message('error','principal '.$this->input->post('principal_client'));
            $data = array(
                'name' => $this->input->post('name'),
                'no_contract' => $this->input->post('no_contract'),
                'type' => $this->input->post('contract_type'),
                'contract_status' => $this->input->post('contract_status'),
                'date' => $this->input->post('date'),
                'description' => $this->input->post('description'),
                'user_type1' => $this->input->post('user_type1'),
                'client1' => $this->input->post('client1'),
                'user_type2' => $this->input->post('user_type2'),
                'client2' => $this->input->post('client2'),
                'principal_client' => $this->input->post('principal_client'),
                'date_start' => $this->input->post('date_start'),
                'date_end' => $this->input->post('date_end'),
                'directory_id' => $this->session->userdata('login_user_id'),
                'principal' => $this->session->userdata('principal_client'),
                'manager_id' => $this->input->post('manager_id'),
                'status' => 1
            );
                $this->db->insert('contract', $data);
                $this->session->set_flashdata('success_message','Agregado');
                redirect(base_url().'admin/lexdocs','refresh');

        }


        if($param1 == 'update_contract')
        {
            $data = array(
                'name' => $this->input->post('name'),
                'no_contract' => $this->input->post('no_contract'),
                'type' => $this->input->post('contract_type'),
                'contract_status' => $this->input->post('contract_status'),
                'date' => $this->input->post('date'),
                'description' => $this->input->post('description'),
                'user_type1' => $this->input->post('user_type1'),
                'client1' => $this->input->post('client1'),
                'user_type2' => $this->input->post('user_type2'),
                'client2' => $this->input->post('client2'),
                'principal_client' => $this->input->post('principal_client'),
                'date_start' => $this->input->post('date_start'),
                'date_end' => $this->input->post('date_end'),
                'directory_id' => $this->session->userdata('login_user_id'),
                'manager_id' => $this->input->post('manager_id'),
                'status' => 1
            );
            
            

            $this->db->where('contract_id', base64_decode($param2));
            $this->db->update('contract', $data);
            
            $this->session->set_flashdata('success_message','Actualizado');
            redirect(base_url().'admin/lexdocs','refresh');

        }


        if($param1 == 'delete')
        {
            $data = array(
                'status' => 0
            );
            $this->db->where('contract_id', $param2);
            $this->db->update('contract', $data);
            $this->session->set_flashdata('success_message','Eliminado');
            redirect(base_url().'admin/lexdocs','refresh');

        }

        $page_data['page_name']  = 'lexdocs';
        $page_data['page_title'] = "Lex Docs";
        $this->load->view('backend/index', $page_data);
        
    }

    public function contract_add($param1 = '')
    {

        $page_data['page_name']  = 'contract_add';
        $page_data['page_title'] = "Agregar Lex Docs";
        $this->load->view('backend/index', $page_data);
        
    }


    public function contract_edit($param1 = '')
    {

        $page_data['contract_id'] = base64_decode($param1);
        $page_data['page_name']  = 'contract_edit';
        $page_data['page_title'] = "Editar Lex Docs";
        $this->load->view('backend/index', $page_data);
        
    }

    public function contract_details($param1 = '',$param2 = '')
    {
        if($param1 == 'file_create')
        {
                $data = array(
                    'name' => $this->input->post('name'),
                    'type' => $this->input->post('type'),
                    'canal' => $this->input->post('canal'),
                    'date' => $this->input->post('date'),
                    'type_file' => $this->input->post('type_file'),
                    'status' => $this->input->post('contract_status_file'),
                    'date_end' => $this->input->post('date_end'),
                    'note' => $this->input->post('note'),
                    'subject' => $this->input->post('subject'),
                    'contract_id' => $this->input->post('contract_id'),
                    'manager_id' => $this->input->post('manager_id'),
                    'sender' => $this->input->post('sender')
                );

                
        
        
                if($_FILES['file']['name'] != '')
                {
                    $upload_dir = 'public/uploads/contracts/';
                    $filename = bin2hex(random_bytes(8));
                    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    $attach_path = $upload_dir . $filename . '.' . $ext;

        
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $attach_path)) {
                        $data['file'] =  $filename . '.' . $ext;
                    }
                }

                $this->db->insert('contract_file', $data);

                $data = array(
                    'contract_file_id' => $this->db->insert_id(),
                    'coment' => $this->input->post('note'),
                );


                $this->db->insert('contract_file_rev', $data);

                exit();
                
        }

        if($param1 == 'file_edit')
        {
                $data = array(
                    'name' => $this->input->post('name'),
                    'type' => $this->input->post('type'),
                    'canal' => $this->input->post('canal'),
                    'date' => $this->input->post('date'),
                    'type_file' => $this->input->post('type_file'),
                    'status' => $this->input->post('contract_status_file'),
                    'date_end' => $this->input->post('date_end'),
                    'note' => $this->input->post('note'),
                    'subject' => $this->input->post('subject'),
                    'contract_id' => $this->input->post('contract_id'),
                    'manager_id' => $this->input->post('manager_id'),
                    'sender' => $this->input->post('sender')
                );

                $this->db->where('contract_file_id', base64_decode($param2));
                $this->db->update('contract_file', $data);

               
                exit();
                
        }

        if($param1 == 'file_version_create')
        {

            if($_FILES['file']['name'] != '')
            {
                $upload_dir = 'public/uploads/contracts/';
                $filename = bin2hex(random_bytes(8));
                $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $attach_path = $upload_dir . $filename . '.' . $ext;

    
                if (move_uploaded_file($_FILES['file']['tmp_name'], $attach_path)) {
                    $file=  $filename . '.' . $ext;
                }
            }

            $data = array(
                'contract_file_id' => $param2,
                'coment' => $this->input->post('note'),
                'file' => $file,
                'directory_id' => $this->session->userdata('login_user_id'),
            );

            log_message('error',json_encode($data).$_FILES['file']['name']);
            $this->db->insert('contract_file_rev', $data);
            exit();
        }


        if($param1 == 'add_comment')
        {

            $contract_file_id = $this->db->get_where('contract_file_rev',array('contract_file_rev_id'=>$this->input->post('contract_file_rev_id')))->row();
            log_message('error','comments '.$contract_file_id->comments);
            $comments = json_decode( $contract_file_id->comments,true);

            if( $comments != '' ||  $comments != null)
            {
                $data = array(
                    'comment' => $this->input->post('comment'),
                    'date' => date('Y-m-d H:m:s'),
                    'directory_id' => $this->session->userdata('login_user_id'),
                );
    
                array_push($comments,$data);

            }else
            {
                $comments = array(); 

                $data = array(
                    'comment' => $this->input->post('comment'),
                    'date' => date('Y-m-d H:m:s'),
                    'directory_id' => $this->session->userdata('login_user_id'),
                );
    
                array_push($comments,$data);
            }
           
            log_message('error','comments 2 '.json_encode($comments));
            $data = array(
                'comments' => json_encode($comments),
            );

            $this->db->where('contract_file_rev_id',$this->input->post('contract_file_rev_id'));
            $this->db->update('contract_file_rev',$data);
            exit();
        }

        if($param1 == 'save_content')
        {
            $contract_file_id = $this->db->get_where('contract_file_rev',array('contract_file_rev_id'=>$this->input->post('contract_file_rev_id')))->row();
            
            log_message('error','comments '.$contract_file_id->file);

            $archivoRtf = 'public/uploads/contracts/'.$contract_file_id->file; 
            // Verifica si el archivo existe
            if (file_exists($archivoRtf)) {
                $contenido = file_get_contents($archivoRtf);
                echo $contenido;
                } else {
                echo 'El archivo no existe.';
                }

                log_message('error','new content '.$this->input->post('content'));
                file_put_contents($archivoRtf,$this->input->post('content'));


                $data = array(
                    'file' => $contract_file_id->file,
                );
    
                $this->db->where('contract_file_id',$contract_file_id->contract_file_id);
                $this->db->update('contract_file',$data);


            exit();
        }

        if($param1 == 'download_content')
        {
            $contract_file_id = $this->db->get_where('contract_file_rev',array('contract_file_rev_id'=>$param2))->row();
            $name = $this->db->get_where('contract_file',array('contract_file_id'=>$contract_file_id->contract_file_id))->row()->name;
          
            log_message('error','comments '.$contract_file_id->file);
            $archivoTxt = 'public/uploads/contracts/'.$contract_file_id->file; 

            $contenidoTxt = file_get_contents($archivoTxt);
           
            $this->load->library('word_generator');
            $wordGenerator = new Word_generator();
            $result = $wordGenerator->HtmltoWord($contenidoTxt, $name.'.docx' );
            echo $result;
        }

        if($param1 == 'download_content_pdf')
        {
            $contract_file_id = $this->db->get_where('contract_file_rev',array('contract_file_rev_id'=>$param2))->row();
            $name = $this->db->get_where('contract_file',array('contract_file_id'=>$contract_file_id->contract_file_id))->row()->name;
          
            log_message('error','comments '.$contract_file_id->file);
            $archivoTxt = 'public/uploads/contracts/'.$contract_file_id->file; 

            $contenidoTxt = file_get_contents($archivoTxt);
           
            $this->load->library('M_pdf');
            $mpdf = new mPDF('c', 'A4'); 
            $mpdf->packTableData = true;
            $mpdf->WriteHTML($contenidoTxt);
            $mpdf->Output($name.'.pdf', "D");
        }

        if($param1 == 'download_content1')
        {
            
            $contract_file = $this->db->get_where('contract_file',array('contract_file_id'=>$param2))->row();
            $name = $contract_file->name;
            log_message('error','comments '.$contract_file->file);
            $archivoTxt = 'public/uploads/contracts/'.$contract_file->file; 

            $contenidoTxt = file_get_contents($archivoTxt);
           
            $this->load->library('M_pdf');
            $mpdf = new mPDF('c', 'A4'); 
            $mpdf->packTableData = true;
            $mpdf->WriteHTML($contenidoTxt);
            $mpdf->Output($name.'.pdf', "I");
        }

        $page_data['contract_id'] = base64_decode($param1);
        $page_data['page_name']  = 'contract_details';
        $page_data['page_title'] = "Detalles de Lex Docs";
        $this->load->view('backend/index', $page_data);
        
    }

    public function lexvault($param1 = '',$param2 = '')
    {
        if($param1 == 'delete')
        {
            $data = array(
                'status' => 0
            );
            $this->db->where('lexvault_id',$param2);
            $this->db->update('lexvault', $data);
            $this->session->set_flashdata('success_message','Eliminado');
            redirect(base_url().'admin/lexvault','refresh');
        }

        
        if($param1 == 'add')
        {
            $template = $this->db->get_where('lexvault_template',array('lexvault_template_id'=>$this->input->post('lexvault_template_id')))->row();


            $fields = json_decode($template->fields);
            $nfields = array();	
            foreach($fields as $field)
            {
                log_message('error','field '.$field);
                $nfields[$field] = "";
            }

           
            $data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'lexvault_template_id' => $this->input->post('lexvault_template_id'),
                'content' => $template->content,
                'fields' => json_encode($nfields),
                'directory_id' => $this->session->userdata('login_user_id'),
                'status' => 1
            );
            $this->db->insert('lexvault', $data);
            $this->session->set_flashdata('success_message','Agregado');
            redirect(base_url().'admin/lexvault','refresh');

        }

        $page_data['page_name']  = 'lexvault';
        $page_data['page_title'] = "Lexvault";
        $this->load->view('backend/index', $page_data);
        
    }

    public function lexvault_templates($param1 = '',$param2 = '')
    {
        if($param1 == 'edit')
        {
            $data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description')
            );

            $this->db->where('lexvault_template_id', base64_decode($param2));
            $this->db->update('lexvault_template',$data);
            $this->session->set_flashdata('success_message','Actualizado');
            $refer =  $this->agent->referrer();
            redirect($refer, 'refresh');
        }


        if($param1 == 'add')
        {
            $data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description')
            );

            $this->db->insert('lexvault_template',$data);
            $lexvault_template_id = $this->db->insert_id();
            $this->session->set_flashdata('success_message','Actualizado');
            redirect(base_url().'admin/lexvault_edit/'.base64_encode($lexvault_template_id),'refresh');
        }


        if($param1 == 'delete')
        {
            $data = array(
                'status' => 1
            );
            $this->db->where('contract_id', base64_decode($param1));
            $this->db->update('contract', $data);
            $this->session->set_flashdata('success_message','Agregado');
            redirect(base_url().'admin/lexdocs','refresh');

        }

        

        $page_data['page_name']  = 'lexvault_templates';
        $page_data['page_title'] = "Lexvault";
        $this->load->view('backend/index', $page_data);
        
    }

public function lexvault_edit($param1 = '',$param2 = '')
{
    if ($this->session->userdata('admin_login') != 1)
    {
        redirect(base_url(), 'refresh');
    }
    if($param1 == 'save_content')
    {
        $data = array(
            'content' => $this->input->post('content'),
        );

        log_message('error',' lexvault_id '.$this->input->post('lexvault_id'));
        $this->db->where('lexvault_id',$this->input->post('lexvault_id'));
        $this->db->update('lexvault',$data);
        exit();
        
    }


    

    if($param1 == 'downloadWord')
    {
        
        $this->db->where('lexvault_id',$param2);
        $lexvault = $this->db->get('lexvault')->row();
        $html = $lexvault->content;
        $name = $lexvault->name;


        log_message('error',$html);
        $fields = json_decode($lexvault->fields,true);
        $claves  = array_keys($fields);
        $nclaves = array();
        foreach ($claves as $clave) {
           array_push($nclaves,'['.str_replace('_', ' ', $clave).']');
        }
        $values = array_values($fields);
        $html = str_replace($nclaves, $values , $html);



        $this->load->library('word_generator');
        $wordGenerator = new Word_generator();

        $html = explode('<br>',$html);
        $html2 = '';
       
       
        for ($i=0; $i < count($html); $i++) { 
            # code...
            if($html[$i] == '')
            {
               $html2 .= $html[$i].'<p></p>';
            }else
            {
                $html2 .= $html[$i].'<br/>';
            }
           
        }
       
      $result = $wordGenerator->HtmltoWord($html2, $name.'.docx' );
        
    }

    
    if($param1 == 'downloadPDF')
    {
        
        $this->db->where('lexvault_id',$param2);
        $lexvault = $this->db->get('lexvault')->row();
        $html = $lexvault->content;
        $name = $lexvault->name;
       
        $fields = json_decode($lexvault->fields,true);
        $claves  = array_keys($fields);
        $nclaves = array();
        foreach ($claves as $clave) {
           array_push($nclaves,'['.str_replace('_', ' ', $clave).']');
        }
        $values = array_values($fields);
        $html = str_replace($nclaves, $values , $html);
        
        $sheet_docs = $this->db->get_where('settings', array('type' => 'sheet_docs'))->row()->description;
        $sheet_docs_of = $this->db->get_where('settings', array('type' => 'sheet_docs_of'))->row()->description;
        $stylesheet = "<style>
        .sheet {
            font-family: Arial; 
        }

                @page {
                       
                        margin :0px;
                        
                    }
                    
                    .sheet ul {
                        display: block;
                        list-style-type: disc;
                        margin-block-start: 1em;
                        margin-block-end: 1em;
                        margin-inline-start: 0px;
                        margin-inline-end: 0px;
                        padding-inline-start: 40px;
                    }
                  
                  
                    .carta {
                    
                            width: 210mm;
                            height: 297mm;
                            padding: 2.5cm 3cm 2.5cm 3cm;
                    }

                        
                                            
                        .oficio {
                        
                            width: 8.5in;
                            height: 14in;
                            padding: 2.5cm 3cm 2.5cm 3cm;
                        }
                        
                 
                        .withBackgroundCarta {
                          background-image: url('".base_url()."public/assets/images/".$sheet_docs."');
                            background-size: contain;
                            background-position: center;
                            background-repeat: no-repeat;
                        }
                        
                        .withBackgroundOficio {
                            background-image: url('".base_url()."public/assets/images/".$sheet_docs_of."');
                            background-size: contain;
                            background-position: center;
                            background-repeat: no-repeat;
                        }
                        
                        
                        .withOutBackground {
                            background-image: none;
                        }
                        
                        .sheet div {
                            margin: 0;
                            line-height: 18.4px;
                            word-spacing: -1px;
                        }
                </style>
        ";
        $this->load->library('M_pdf');

        $mpdf = new mPDF('c'); 
        // Agrega el estilo CSS al documento
        $mpdf->default_available_fonts = ['Arial'];
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html,2);
        $mpdf->Output($name.'.pdf', "I");   
        
    }

    if($param1 == 'add_fiels')
    {

        $fields = $this->db->get_where('lexvault',array('lexvault_id'=>$param2))->row()->fields;
        log_message('error', is_null($fields));
        if($fields == '' ||  $fields == 'null')
        {
            log_message('error',' lexvault_id '.$param2.' campos '.$fields);
            $fields =array();
           
        }else{
            
            $fields = json_decode($fields,true);
        } 
       
        array_push($fields,$this->input->post('field'));

        $data = array(
            'fields' =>json_encode($fields)
        );

        
        $this->db->where('lexvault_id',$param2);
        $this->db->update('lexvault',$data);

        $cont= 0;
        $field_list = ' <ul id="todo-list fields_list">';
               
                foreach ($fields as $field):
                    $field_list .=   '<li class="task m-b-10">
                        <span class="task-label ">['.$field.']</span><span class="task-action-btn" style="color: red;margin-left: 10px;"><span class="action-box large delete-btn" title="Delete Task" onclick="deleteField(\''.$cont++.'\')"><i class="icon"><i class="icon-trash"></i></i></span></span>
                    </li>';
                 endforeach;

                 $field_list .= ' </ul>';
                 echo $field_list;
        exit();
        
    }

    if($param1 == 'save_fiels')
    {

        log_message('error',json_encode($this->input->post()));
        $miArray = $this->input->post();
        foreach ($miArray as $clave => $valor) {
            if ($clave === 0 ) {
                unset($miArray[$clave]);
            }
        }
        
        $data = array(
            'fields' =>json_encode($miArray),
        );

        $this->db->where('lexvault_id',$param2);
        $this->db->update('lexvault',$data);
        
        exit();
        
    }

    if($param1 == 'delete_field')
    { 

        $fields = $this->db->get_where('lexvault',array('lexvault_id'=>$param2))->row()->fields;
        
        $fields = json_decode($fields,true);

        log_message('error',' lexvault_id '.$param2.' Campos '.$fields);
        if (isset($fields[$this->input->post('field')])) 
        {
            unset($fields[$this->input->post('field')]);
        }

        $data = array( 'fields' =>json_encode($fields));

        
        $this->db->where('lexvault_id',$param2);
        $this->db->update('lexvault',$data);


        $field_list = ' <div id="todo-list fields_list">';
               
                foreach ($fields as $key => $field):
                    $field_list .=   '<li class="task m-b-10">
                        <span class="task-label ">['.$field.']</span><span class="task-action-btn" style="color: red;margin-left: 10px;"><span class="action-box large delete-btn" title="Delete Task" onclick="deleteField(\''.$key.'\')"><i class="icon"><i class="icon-trash"></i></i></span></span>
                    </li>';
                 endforeach;

                 $field_list .= ' </ul>';
                 echo $field_list;
        exit();
        
    }

    $page_data['lexvault_id']  =base64_decode($param1);
    $page_data['page_name']  = 'lexvault_edit';
    $page_data['page_title'] = "Editar archivos ";
    $this->load->view('backend/index', $page_data);
}



public function lexvault_template_edit($param1 = '',$param2 = '')
{

    if($param1 == 'save_content')
    {
        $data = array(
            'content' => $this->input->post('content'),
        );

        log_message('error',' lexvault_template_id '.$this->input->post('lexvault_template_id'));
        $this->db->where('lexvault_template_id',$this->input->post('lexvault_template_id'));
        $this->db->update('lexvault_template',$data);
        exit();
        
    }


    

    if($param1 == 'downloadWord')
    {
        
        $this->db->where('lexvault_template_id',$param2);
        $html = $this->db->get('lexvault_template')->row()->content;


        log_message('error',$html);

        $this->load->library('word_generator');
        $wordGenerator = new Word_generator();

        $html = explode('<br>',$html);
        $html2 = '';
       
       
        for ($i=0; $i < count($html); $i++) { 
            # code...
            if($html[$i] == '')
            {
               $html2 .= $html[$i].'<p></p>';
            }else
            {
                $html2 .= $html[$i].'<br/>';
            }
           
        }
       
      $result = $wordGenerator->HtmltoWord($html2, 'test.docx' );
        
    }

    
    if($param1 == 'downloadPDF')
    {
        
        $this->db->where('lexvault_template_id',$param2);
        $lexvault_template = $this->db->get('lexvault_template')->row();
        $html = $lexvault_template->content;
        $name = $lexvault_template->name;

        $test = 'asdfd';

        $html = str_replace(array('[NAME]'), array($test), $html);
        $stylesheet = "<style>
        .sheet {
            font-family: Arial; 
        }
                    .sheet ul {
                        display: block;
                        list-style-type: disc;
                        margin-block-start: 1em;
                        margin-block-end: 1em;
                        margin-inline-start: 0px;
                        margin-inline-end: 0px;
                        padding-inline-start: 40px;
                    }
                    @page {
                        margin :2.5cm 3cm 2.5cm 2.5cm;
                        
                    }
                </style>
        ";
        $this->load->library('M_pdf');

        $mpdf = new mPDF('c', 'letter'); 
        // Agrega el estilo CSS al documento
        $mpdf->default_available_fonts = ['Arial'];
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html,0);
        $mpdf->Output($name.'.pdf', "I");   
        
    }

    if($param1 == 'add_fiels')
    {

        $fields = $this->db->get_where('lexvault_template',array('lexvault_template_id'=>$param2))->row()->fields;
        log_message('error', is_null($fields));
        if($fields == '' ||  $fields == 'null')
        {
            log_message('error',' lexvault_template_id '.$param2.' campos '.$fields);
            $fields =array();
           
        }else{
            
            $fields = json_decode($fields,true);
        } 
       
        array_push($fields,$this->input->post('field'));

        $data = array(
            'fields' =>json_encode($fields)
        );

        
        $this->db->where('lexvault_template_id',$param2);
        $this->db->update('lexvault_template',$data);

        $cont= 0;
        $field_list = ' <ul id="todo-list fields_list">';
               
                foreach ($fields as $field):
                    $field_list .=   '<li class="task m-b-10">
                        <span class="task-label ">['.$field.']</span><span class="task-action-btn" style="color: red;margin-left: 10px;"><span class="action-box large delete-btn" title="Delete Task" onclick="deleteField(\''.$cont++.'\')"><i class="icon"><i class="icon-trash"></i></i></span></span>
                    </li>';
                 endforeach;

                 $field_list .= ' </ul>';
                 echo $field_list;
        exit();
        
    }


    if($param1 == 'delete_field')
    { 

        $fields = $this->db->get_where('lexvault_template',array('lexvault_template_id'=>$param2))->row()->fields;
        
        $fields = json_decode($fields,true);

        log_message('error',' lexvault_template_id '.$param2.' Campos '.$fields);
        if (isset($fields[$this->input->post('field')])) 
        {
            unset($fields[$this->input->post('field')]);
        }

        $data = array( 'fields' =>json_encode($fields));

        
        $this->db->where('lexvault_template_id',$param2);
        $this->db->update('lexvault_template',$data);


        $field_list = ' <ul id="todo-list fields_list">';
               
                foreach ($fields as $key => $field):
                    $field_list .=   '<li class="task m-b-10">
                        <span class="task-label ">['.$field.']</span><span class="task-action-btn" style="color: red;margin-left: 10px;"><span class="action-box large delete-btn" title="Delete Task" onclick="deleteField(\''.$key.'\')"><i class="icon"><i class="icon-trash"></i></i></span></span>
                    </li>';
                 endforeach;

                 $field_list .= ' </ul>';
                 echo $field_list;
        exit();
        
    }

    $page_data['lexvault_template_id']  =base64_decode($param1);
    $page_data['page_name']  = 'lexvault_template_edit';
    $page_data['page_title'] = "Editar archivos ";
    $this->load->view('backend/index', $page_data);
}




public function getContractDetails($param1 = '')
{
    
    if ($this->session->userdata('admin_login') != 1)
    {
        redirect(base_url(), 'refresh');
    }
    
    if($this->input->post('table') == 'files')
    {
        $page_data['contract_id'] =$this->input->post('contract_id');
        $this->load->view('backend/admin/contract_files.php', $page_data);
    }

    if($this->input->post('table') == 'files_details')
    {
        $page_data['contract_file_id'] =$this->input->post('contract_id');
        $this->load->view('backend/admin/files_details.php', $page_data);
    }

    if($this->input->post('table') == 'files_edit')
    {
        $page_data['contract_file_rev_id'] =$this->input->post('contract_id');
        $this->load->view('backend/admin/files_edit.php', $page_data);
    }

    
}
     



public function comprobante($param1 = '')
{
    $page_data['param2']  =$param1;
    $page_data['page_name']  = 'folders';
    $page_data['page_title'] = "Carpets ";
    $this->load->view('backend/comprobante.php', $page_data);
}

public function invoice_download($param1 = '')
{
    $page_data['param2']  =$param1;
    $html = $this->load->view('backend/comprobante_pdf.php', $page_data,TRUE);
    
    $this->load->library('M_pdf');
    $mpdf = new mPDF('c', 'letter'); 
    $mpdf->SetTitle($name);
    $mpdf->packTableData = true;
    $mpdf->SetCompression(0);
    $mpdf->WriteHTML($html,0);
    $mpdf->Output('Comprobante.pdf', "I");  
    
}

public function invoice_all_download($param1 = '')
{
    $page_data['movment_economic_id']  =$param1;
    $html = $this->load->view('backend/comprobante_all_pdf.php', $page_data,TRUE);
    
    $this->load->library('M_pdf');
    $mpdf = new mPDF('c', 'letter'); 
    $mpdf->SetTitle($name);
    $mpdf->packTableData = true;
    $mpdf->SetCompression(0);
    $mpdf->WriteHTML($html,0);
    $mpdf->Output('comprobante_all_pdf.pdf', "I");  
    
}

function update_request($param1 = '', $param2 = '')
{
    if ($this->session->userdata('admin_login') != 1)
    {
        redirect(base_url(), 'refresh');
    }
    $page_data['page_name']  = 'update_request';
    $page_data['page_title'] = "Solicitud de Actualización";
    $this->load->view('backend/index', $page_data);
}

function puzzle($param1 = '', $param2 = '')
{
    
    $page_data['page_name']  = 'puzzle';
    $page_data['page_title'] = "Puzzle";
    $this->load->view('backend/index', $page_data);
}


    function word()
    {   	
        $this->load->library('word_generator');
        $wordGenerator = new Word_generator();

        $html ='<div class="sheet carta" style="" contenteditable="true">adfasdfadsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssxxssssd<br><br>facebook la raiz cuadrada de 3<br><br>debe ser la test<br><br>jalkdjfasldkfjasldkfa<br><br>asd,.zxcnv,mznxcvzxcvznnm,nasdfalkj;kk;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;k;;asndfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffasdadfajnsdfjnalskdfnalk;sdnfa;lskdnfa;lskdnfa;asdfkn;asdlnf<br><br>asdkfasdfasdf<br><br><br>kjalksdfalksdfjasdf<br></div>';
      
        $html = explode('<br>',$html);
        $html2 = '';
       
       
        for ($i=0; $i < count($html); $i++) { 
            # code...
            if($html[$i] == '')
            {
               $html2 .= $html[$i].'<p></p>';
            }else
            {
                $html2 .= $html[$i].'<br/>';
            }
           
        }
       
      $result = $wordGenerator->HtmltoWord($html2, 'test.docx' );
       
    }


    function whatsapp()
    {


        $page_data['page_name']  = 'puzzle';
        $page_data['page_title'] = "Puzzle";
        $this->load->view('backend/index', $page_data);

    }
    
    
   
       
}
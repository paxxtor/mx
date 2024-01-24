<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    function __construct() 
    {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        $this->load->library('user_agent');
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
    
    public function index() 
    {
        if ($this->session->userdata('admin_login') == 1)
        {
            redirect(base_url() . 'admin/calendar/', 'refresh');
        }
        $this->load->view('backend/auth');
    }
    
    function login() 
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $credential = array('username' => $username, 'password' => sha1($password));
        $query = $this->db->get_where('directory', $credential);
        if ($query->num_rows() > 0) 
        {
         
            $row = $query->row();
            
            if($row->auth_secret != ''){
                
                $redirect = base_url() . 'auth/two_factor/'.base64_encode($row->directory_id).'/admin'; 
                redirect($redirect, 'refresh');
             }else{
                   if($row->admin == 1)
                   {
                       
                        $this->session->set_userdata('admin_login', '1');
                        $this->session->set_userdata('login_user_id', $row->directory_id);
                        $this->session->set_userdata('dark_mode', $row->dark);
                        $this->session->set_userdata('name', $row->name.' '.$row->last_name);
                        $this->session->set_userdata('login_type', 'admin');
                        $this->setUserAgent($row->directory_id);
                        redirect(base_url() . 'admin/calendar/', 'refresh');
                           
                   }
             }
        }
        
        $this->session->set_flashdata('error', '1');
        redirect(base_url().'auth', 'refresh');
    }
    
    function setUserAgent($directory_id){
        if($this->agent->mobile() != ''){
            $data['dispositivo']       = $this->agent->mobile();   
        }else{
            $data['dispositivo']       = 'Dispositivo desconocido';
        }
        $data['navegador']         = $this->agent->browser();
        $data['directory_id']          = $directory_id;
        $data['ip']                = $this->input->ip_address();
        $data['sistema_operativo'] = $this->agent->platform();
        return $this->db->insert('acceso', $data);
    }
    
     function two_factor($param = '', $param1 = ''){
        $data['val'] = $param;
        $data['type'] = $param1;
        $this->load->view('backend/two_factor',$data);
    }

  function validate(){
        $val = $this->input->post('val');
        $pin = $this->input->post('pin');

                $credential = array('directory_id' => base64_decode($val));


                $query = $this->db->get_where('directory', $credential);
                if ($query->num_rows() > 0) 
                {
                    $row = $query->row();
                    
                    $secret = base64_decode($row->auth_secret);
                    
                    require_once 'public/auth/GoogleAuthenticator.php';
                    $ga = new PHPGangsta_GoogleAuthenticator();
                
                    $result = $ga->verifyCode($secret, $pin);
                    
                    log_message('error',$secret);
                    
                    if($result == 1){
                             if($row->admin == 1)
                           {
                               
                                $this->session->set_userdata('admin_login', '1');
                                $this->session->set_userdata('login_user_id', $row->directory_id);
                                $this->session->set_userdata('dark_mode', $row->dark);
                                $this->session->set_userdata('name', $row->name.' '.$row->last_name);
                                $this->session->set_userdata('login_type', 'admin');
                                $this->setUserAgent($row->directory_id);
                                redirect(base_url() . 'admin/calendar/', 'refresh');
                                   
                           }
                    }
                }
                
                $this->session->set_flashdata('error', '1');
                redirect(base_url() . 'auth/two_factor/'.$val, 'refresh');   
                
  }
    
    function logout() 
    { 
      $this->session->sess_destroy();
      $this->session->set_flashdata('logout_notification', 'logged_out');
      redirect(base_url(), 'refresh');
    }
}
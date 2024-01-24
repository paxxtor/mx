<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Inicio extends CI_Controller
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
            if($this->session->userdata('admin_login') == 1)
            {
                redirect(base_url().'admin/calendar/', 'refresh');
            }
            
            $page_data['page_name']  = 'home';
            $page_data['page_title'] = 'Home';
            $this->load->view('frontend/index', $page_data);
        }
        
        public function home($param1 = '')
        {
            
           
            $page_data['page_name']  = 'home';
            $page_data['page_title'] = 'Home';
            $this->load->view('frontend/index', $page_data);
            
        }
   }
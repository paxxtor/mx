<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Binnacle_model extends CI_Model 
{ 
    function __construct() 
    {
        parent::__construct();
    }

    //Funciton to get the full name to any user
    function getBinnacle($id, $date){

        if($id != 0)
        {
            $this->db->like( 'date', $date,'both');
            $this->db->order_by( 'binnacle_id','DESC');
            return $this->db->get_where('binnacle', array('user_id' => $id))->result_array();

        }
        else
        {
            $this->db->limit(20);
            $this->db->order_by( 'binnacle_id','DESC'); 
            return $this->db->get('binnacle')->result_array();

        }

    }

     //Funciton to get the full name to any user
     function binnacleDashboard(){

     
            $this->db->limit(7);
            $this->db->order_by( 'binnacle_id','DESC'); 
            return $this->db->get('binnacle')->result_array();

    }


    //Funciton to get the full name to any user
    function binnacle_insert($origin,$section,$action,$message,$proceeding_id){
        
        $data['section']       = $section;
        $data['action']         = $action;
        $data['message']        = $message;
        $data['origin']         = $origin;
        $data['origin_id']      = $proceeding_id;
        $data['user_type']      = $this->session->userdata('login_type');
        $data['user_id']        = $this->session->userdata('login_user_id');
        $data['date']           = date('Y-m-d H:i');
        
        $this->db->insert('binnacle',$data);

    }


    
}

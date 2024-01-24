<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Google extends CI_Model 
{
    function __construct() 
    {
      parent::__construct();
    }
    
    
    function getGoogleAuthQR()
    {
        require_once 'public/google/GoogleAuthenticator.php';
	    $ga = new PHPGangsta_GoogleAuthenticator();
	    $secret = $ga->createSecret();
	    $username = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->usuario;
	    $qr = $ga->getQRCodeGoogleUrl('Innvo ('.$username.')',$secret);
	    $array = array(
            "qr" => $qr,
            "secret" => $secret,
        );
	    return $array;
    }
    
    function updateSecret($secret){
        $data['clave_secreta'] = $secret;
        $data['doble_factor']  = 1;
	    $this->db->where('admin_id', $this->session->userdata('login_user_id'));
	    return $this->db->update('admin', $data);
    }
    
    function disableGoogle(){
        $current_pass = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('login_user_id')))->row()->clave;
        if($current_pass != sha1($this->input->post('clave'))){
            return 0;
        }
        $data['clave_secreta'] = '';
        $data['doble_factor']  = 0;
	    $this->db->where('admin_id', $this->session->userdata('login_user_id'));
	    return $this->db->update('admin', $data);
    }
    
    
    
}
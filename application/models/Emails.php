<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Emails extends CI_Model
{
    function __construct() 
    {
      parent::__construct();
    }
    
    //Send notifify from smtp.
    function test_smtp()
    {
        $email_sub      = 'Hi user!';
        $email_msg      = 'Your SMTP settings is successfully configured.';
        $email_to       = $this->input->post('smtp_email');
        if($email_to != '')
        {
            $this->submit($email_to,$email_sub,$email_msg);
        }
    }

    function submit($to, $subject, $message)
	{
	    $config = Array(
	        'protocol' => $this->db->get_where('setting', array('type' => 'protocol'))->row()->description,
            'smtp_host' => strtolower($this->db->get_where('setting', array('type' => 'encryption'))->row()->description).'://'.$this->db->get_where('setting', array('type' => 'hostname'))->row()->description,
            'smtp_port' => $this->db->get_where('setting', array('type' => 'port'))->row()->description,
            'smtp_user' => $this->db->get_where('setting', array('type' => 'username'))->row()->description,
            'smtp_pass' => $this->db->get_where('setting', array('type' => 'password'))->row()->description,
            'mailtype'  => 'html', 
            'charset'   => strtolower($this->db->get_where('setting', array('type' => 'charset'))->row()->description),
            'wordwrap' => true
        );
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('your@notify.com', $this->db->get_where('setting', array('type' => 'sent_from'))->row()->description);
        $this->email->to($to);
        $this->email->subject($subject);
   
        $this->email->message($message);
        if (!$this->email->send()) {
            echo 0;
        }else{
            echo 1;
        }
	}
}

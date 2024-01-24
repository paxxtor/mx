<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model 
{ 
    function __construct() 
    {
        parent::__construct();
    }

    //Funciton to get the full name to any user
    function getUserFullName($type, $id){

        $user= $this->db->get_where($type, array($type.'_id' => $id))->row_array();

        return $user['name'].' '.$user['first_last_name'].' '.$user['second_last_name'];
    }

    function get_photo($type, $id){
        $photo = $this->db->get_where($type, array($type.'_id' => $id))->row()->photo;
        if($photo != '')
        {
            return base_url().'public/assets/images/user/'.$photo;   
        }else {
            $name = strtoupper($this->db->get_where($type, array($type.'_id' => $id))->row()->name[0]);
            return base_url().'public/assets/images/avatars/'.str_replace('Ñ', 'N',$name).'.svg';   
        }
       
    }
/////////////////////////////////////////////////////////////


        function add_directory($type)
        {
        
            $md5 = md5(date('d-m-y H:i:s'));
                    
            if($_FILES['photo']['name'] != '')
            {
                log_message('error',$_FILES['photo']['name']);
                $data['photo'] = $md5.str_replace(' ', '', $_FILES['photo']['name']);    
                move_uploaded_file($_FILES['photo']['tmp_name'], 'public/assets/images/user/' . $md5.str_replace(' ', '', $_FILES['photo']['name']));
            }
            
            $username = $this->getUsername(strtolower($this->normalizeText($this->input->post('name')." ".$this->input->post('last_name'))));
            $password = $this->getPassword();
         
            if($this->input->post('directory_type') == 0 )
            {
                $data['directory_rol_id'] = $type;
                $data['directory_type'] =$this->input->post('directory_type');
                $data['username'] = $username;
                $data['password'] = sha1($password);
                $data['demo'] = base64_encode($password);
                $data['name']   = $this->input->post('name');
                $data['first_last_name']   = $this->input->post('first_last_name');
                $data['second_last_name']   = $this->input->post('second_last_name');
                $data['io_oficial']   = $this->input->post('io_oficial');
                $data['folio']   = $this->input->post('folio');
                $data['frc']   = $this->input->post('frc');
                $data['curp']   = $this->input->post('curp');
                $data['nacionality']   = $this->input->post('nacionality');
                $data['passport']   = $this->input->post('passport');
                $data['expire_passport']   = $this->input->post('expire_passport');
                $data['activity_authorizated']   = $this->input->post('activity_authorizated');
                $data['street']   = $this->input->post('street');
                $data['no_intern']   = $this->input->post('no_intern');
                $data['no_extern']   = $this->input->post('no_extern');
                $data['colony']   = $this->input->post('colony');
                $data['municipality']   = $this->input->post('municipality');
                $data['c_p']   = $this->input->post('c_p');
                $data['federity_entity']   = $this->input->post('federity_entity');
                $data['phone']   = $this->input->post('phone');
                $data['cell']   = $this->input->post('cell');
                $data['email']   = $this->input->post('email');
                $data['whatsapp']   = $this->input->post('whatsapp');
                $data['facebook']   = $this->input->post('facebook');
                $data['instagram']   = $this->input->post('instagram');
                $data['twitter']   = $this->input->post('twitter');
                $data['name_representative']   = $this->input->post('name_representative');
                $data['first_last_name_representative']   = $this->input->post('first_last_name_representative');
                $data['second_last_name_representative']   = $this->input->post('second_last_name_representative');
                $data['dni_representative']   = $this->input->post('dni_representative');
                $data['folio_representative']   = $this->input->post('folio_representative');
                $data['frc_representative']   = $this->input->post('frc_representative');
                $data['curp_representative']   = $this->input->post('curp_representative');
                $data['nacionality_representative']   = $this->input->post('nacionality_representative');
                $data['passport_representative']   = $this->input->post('passport_representative');
                $data['expire_passport_representative']   = $this->input->post('expire_passport_representative');
                $data['activity_authorizated_representative']   = $this->input->post('activity_authorizated_representative');

             


            }else {
                
                $data['directory_rol_id'] = $type;
                $data['directory_type'] =$this->input->post('directory_type');
                $data['username'] = $username;
                $data['password'] = sha1($password);
                $data['demo'] = base64_encode($password);
                $data['name']   = $this->input->post('name_moral');
                $data['folio']   = $this->input->post('folio_moral');
                $data['frc']   = $this->input->post('frc_moral');
                $data['poliza']   = $this->input->post('poliza_moral');
                $data['grant_date']   = $this->input->post('grant_date');
                $data['notary_name']   = $this->input->post('notary_name');
                $data['notary_municipality']   = $this->input->post('notary_municipality');
                $data['notary_number']   = $this->input->post('notary_number');
                $data['notary_entity']   = $this->input->post('notary_entity');
                $data['folio_date']   = $this->input->post('folio_date');
                $data['folio_entity']   = $this->input->post('folio_entity');
                $data['doc_notary_power']   = $this->input->post('doc_notary_power');
                $data['doc_folio']   = $this->input->post('doc_folio');
                $data['doc_notary']   = $this->input->post('doc_notary');
                $data['doc_notary_number']   = $this->input->post('doc_notary_number');
                $data['doc_inscription']   = $this->input->post('doc_inscription');
                $data['street']   = $this->input->post('street_moral');
                $data['no_intern']   = $this->input->post('no_intern_moral');
                $data['no_extern']   = $this->input->post('no_extern_moral');
                $data['colony']   = $this->input->post('colony_moral');
                $data['municipality']   = $this->input->post('municipality_moral');
                $data['c_p']   = $this->input->post('c_p_moral');
                $data['federity_entity']   = $this->input->post('federity_entity_moral');
                $data['phone']   = $this->input->post('phone_moral');
                $data['cell']   = $this->input->post('cell_moral');
                $data['email']   = $this->input->post('email_moral');
                $data['whatsapp']   = $this->input->post('whatsapp_moral');
                $data['facebook']   = $this->input->post('facebook_moral');
                $data['instagram']   = $this->input->post('instagram_moral');
                $data['twitter']   = $this->input->post('twitter_moral');
                $data['name_representative']                    = $this->input->post('name_representative_moral');
                $data['first_last_name_representative']         = $this->input->post('first_last_name_representative_moral');
                $data['second_last_name_representative']        = $this->input->post('second_last_name_representative_moral');
                $data['dni_representative']                     = $this->input->post('dni_representative_moral');
                $data['folio_representative']                   = $this->input->post('folio_representative_moral');
                $data['frc_representative']                     = $this->input->post('frc_representative_moral');
                $data['curp_representative']                    = $this->input->post('curp_representative_moral');
                $data['nacionality_representative']             = $this->input->post('nacionality_representative_moral');
                $data['passport_representative']                = $this->input->post('passport_representative_moral');
                $data['expire_passport_representative']         = $this->input->post('expire_passport_representative_moral');
                $data['activity_authorizated_representative']   = $this->input->post('activity_authorizated_representative_moral');

            }

            
            $response = $this->db->insert('directory', $data);
            return $response;

        }


        function edit_directory($directory_id)
        {
        
             $md5 = md5(date('d-m-y H:i:s'));
                    
            if($_FILES['photo']['name'] != '')
            {
                log_message('error',$_FILES['photo']['name']);
                $data['photo'] = $md5.str_replace(' ', '', $_FILES['photo']['name']);    
                move_uploaded_file($_FILES['photo']['tmp_name'], 'public/assets/images/user/' . $md5.str_replace(' ', '', $_FILES['photo']['name']));
            }
         
         
            if($this->input->post('directory_type') == 0 )
            {
             
               
             
                $data['name']   = $this->input->post('name');
                $data['first_last_name']   = $this->input->post('first_last_name');
                $data['second_last_name']   = $this->input->post('second_last_name');
                $data['io_oficial']   = $this->input->post('io_oficial');
                $data['folio']   = $this->input->post('folio');
                $data['frc']   = $this->input->post('frc');
                $data['curp']   = $this->input->post('curp');
                $data['nacionality']   = $this->input->post('nacionality');
                $data['passport']   = $this->input->post('passport');
                $data['expire_passport']   = $this->input->post('expire_passport');
                $data['activity_authorizated']   = $this->input->post('activity_authorizated');
                $data['street']   = $this->input->post('street');
                $data['no_intern']   = $this->input->post('no_intern');
                $data['no_extern']   = $this->input->post('no_extern');
                $data['colony']   = $this->input->post('colony');
                $data['municipality']   = $this->input->post('municipality');
                $data['c_p']   = $this->input->post('c_p');
                $data['federity_entity']   = $this->input->post('federity_entity');
                $data['phone']   = $this->input->post('phone');
                $data['cell']   = $this->input->post('cell');
                $data['email']   = $this->input->post('email');
                $data['whatsapp']   = $this->input->post('whatsapp');
                $data['facebook']   = $this->input->post('facebook');
                $data['instagram']   = $this->input->post('instagram');
                $data['twitter']   = $this->input->post('twitter');
                $data['name_representative']   = $this->input->post('name_representative');
                $data['first_last_name_representative']   = $this->input->post('first_last_name_representative');
                $data['second_last_name_representative']   = $this->input->post('second_last_name_representative');
                $data['dni_representative']   = $this->input->post('dni_representative');
                $data['folio_representative']   = $this->input->post('folio_representative');
                $data['frc_representative']   = $this->input->post('frc_representative');
                $data['curp_representative']   = $this->input->post('curp_representative');
                $data['nacionality_representative']   = $this->input->post('nacionality_representative');
                $data['passport_representative']   = $this->input->post('passport_representative');
                $data['expire_passport_representative']   = $this->input->post('expire_passport_representative');
                $data['activity_authorizated_representative']   = $this->input->post('activity_authorizated_representative');

             


            }else {
                
    
                $data['name']   = $this->input->post('name_moral');
                $data['folio']   = $this->input->post('folio_moral');
                $data['frc']   = $this->input->post('frc_moral');
                $data['poliza']   = $this->input->post('poliza_moral');
                $data['grant_date']   = $this->input->post('grant_date');
                $data['notary_name']   = $this->input->post('notary_name');
                $data['notary_municipality']   = $this->input->post('notary_municipality');
                $data['notary_number']   = $this->input->post('notary_number');
                $data['notary_entity']   = $this->input->post('notary_entity');
                $data['folio_date']   = $this->input->post('folio_date');
                $data['folio_entity']   = $this->input->post('folio_entity');
                $data['doc_notary_power']   = $this->input->post('doc_notary_power');
                $data['doc_folio']   = $this->input->post('doc_folio');
                $data['doc_notary']   = $this->input->post('doc_notary');
                $data['doc_notary_number']   = $this->input->post('doc_notary_number');
                $data['doc_inscription']   = $this->input->post('doc_inscription');
                $data['street']   = $this->input->post('street_moral');
                $data['no_intern']   = $this->input->post('no_intern_moral');
                $data['no_extern']   = $this->input->post('no_extern_moral');
                $data['colony']   = $this->input->post('colony_moral');
                $data['municipality']   = $this->input->post('municipality_moral');
                $data['c_p']   = $this->input->post('c_p_moral');
                $data['federity_entity']   = $this->input->post('federity_entity_moral');
                $data['phone']   = $this->input->post('phone_moral');
                $data['cell']   = $this->input->post('cell_moral');
                $data['email']   = $this->input->post('email_moral');
                $data['whatsapp']   = $this->input->post('whatsapp_moral');
                $data['facebook']   = $this->input->post('facebook_moral');
                $data['instagram']   = $this->input->post('instagram_moral');
                $data['twitter']   = $this->input->post('twitter_moral');
                $data['name_representative']                    = $this->input->post('name_representative_moral');
                $data['first_last_name_representative']         = $this->input->post('first_last_name_representative_moral');
                $data['second_last_name_representative']        = $this->input->post('second_last_name_representative_moral');
                $data['dni_representative']                     = $this->input->post('dni_representative_moral');
                $data['folio_representative']                   = $this->input->post('folio_representative_moral');
                $data['frc_representative']                     = $this->input->post('frc_representative_moral');
                $data['curp_representative']                    = $this->input->post('curp_representative_moral');
                $data['nacionality_representative']             = $this->input->post('nacionality_representative_moral');
                $data['passport_representative']                = $this->input->post('passport_representative_moral');
                $data['expire_passport_representative']         = $this->input->post('expire_passport_representative_moral');
                $data['activity_authorizated_representative']   = $this->input->post('activity_authorizated_representative_moral');

            }

            $this->db->where('directory_id',$directory_id);
            $response = $this->db->update('directory', $data);
            return $response;

        }


/////////////////////////////////////////////////////////////
    function add_contact()
    {
        $data['name']       = $this->input->post('name');
        $data['charge']     = $this->input->post('charge');
        $data['email']      = $this->input->post('email');
        $data['phone']      = $this->input->post('phone');
        $data['details']    = $this->input->post('details');
        $data['admin_id']   = $this->input->post('admin_id');
        
        $response = $this->db->insert('admin_contact', $data);
        return $response;
    }


    function add_admin()
    {
        $data['directory_id']       = $this->input->post('directory_id');
        $data['folder']             = $this->input->post('folder')== ""? 0:1 ;
        $data['folder_add']         = $this->input->post('folder_add')== ""? 0:1 ;
        $data['folder_edit']        = $this->input->post('folder_edit')== ""? 0:1 ;
        $data['folder_delete']      = $this->input->post('folder_delete')== ""? 0:1 ;
        $data['proceedings']        = $this->input->post('proceedings')== ""? 0:1 ;
        $data['proceedings_add']    = $this->input->post('proceedings_add')== ""? 0:1 ;
        $data['proceedings_edit']   = $this->input->post('proceedings_edit')== ""? 0:1 ;
        $data['proceedings_delete'] = $this->input->post('proceedings_delete')== ""? 0:1 ;
        $data['actions']            = $this->input->post('actions')== ""? 0:1 ;
        $data['actions_add']        = $this->input->post('actions_add')== ""? 0:1 ;
        $data['actions_edit']       = $this->input->post('actions_edit')== ""? 0:1 ;
        $data['actions_delete']     = $this->input->post('actions_delete')== ""? 0:1 ;
        $data['invoice']            = $this->input->post('invoice')== ""? 0:1 ;
        $data['invoice_add']        = $this->input->post('invoice_add')== ""? 0:1 ;
        $data['invoice_edit']       = $this->input->post('invoice_edit')== ""? 0:1 ;
        $data['invoice_delete']     = $this->input->post('invoice_delete')== ""? 0:1 ;
        $data['directory']          = $this->input->post('directory')== ""? 0:1 ;
        $data['directory_add']      = $this->input->post('directory_add')== ""? 0:1 ;
        $data['directory_edit']     = $this->input->post('directory_edit')== ""? 0:1 ;
        $data['directory_delete']   = $this->input->post('directory_delete')== ""? 0:1 ;
        $data['admins']             = $this->input->post('admins')== ""? 0:1 ;
        $data['admins_add']         = $this->input->post('admins_add')== ""? 0:1 ;
        $data['admins_edit']        = $this->input->post('admins_edit')== ""? 0:1 ;
        $data['admins_delete']      = $this->input->post('admins_delete')== ""? 0:1 ;
        $data['settings']             = $this->input->post('settings')== ""? 0:1 ;
        $data['settings_add']         = $this->input->post('settings_add')== ""? 0:1 ;
        $data['settings_edit']        = $this->input->post('settings_edit')== ""? 0:1 ;
        $data['settings_delete']      = $this->input->post('settings_delete')== ""? 0:1 ;
        $response = $this->db->insert('admin_permission', $data);
        
        $dataA['admin']      = 1;
        $this->db->where('directory_id',$this->input->post('directory_id'));
        $response = $this->db->update('directory', $dataA);
       
        
        return $response;

    }




   
    function edit_admin_info($admin_id)
    {
     
        $data['name']   = $this->input->post('name');
        $data['last_name']   = $this->input->post('last_name');
        $data['email']   = $this->input->post('email');
        $data['phone']   = $this->input->post('phone');
        $data['dni']   = $this->input->post('dni');
        $data['address']   = $this->input->post('address');
        $data['about']   = $this->input->post('about');
        $data['facebook']   = $this->input->post('facebook');
        $data['whatsapp']   = $this->input->post('whatsapp');
        $data['instagram']   = $this->input->post('instagram');
        $data['twitter']   = $this->input->post('twitter');
         
        $this->db->where('admin_id', base64_decode($admin_id));
        $response = $this->db->update('admin', $data);
        return $response;
       

    }


    function edit_admin_permission($admin_id)
    {
        
        $data['folder']             = $this->input->post('folder')== ""? 0:1 ;
        $data['folder_add']         = $this->input->post('folder_add')== ""? 0:1 ;
        $data['folder_edit']        = $this->input->post('folder_edit')== ""? 0:1 ;
        $data['folder_delete']      = $this->input->post('folder_delete')== ""? 0:1 ;
        $data['proceedings']        = $this->input->post('proceedings')== ""? 0:1 ;
        $data['proceedings_add']    = $this->input->post('proceedings_add')== ""? 0:1 ;
        $data['proceedings_edit']   = $this->input->post('proceedings_edit')== ""? 0:1 ;
        $data['proceedings_delete'] = $this->input->post('proceedings_delete')== ""? 0:1 ;
        $data['actions']            = $this->input->post('actions')== ""? 0:1 ;
        $data['actions_add']        = $this->input->post('actions_add')== ""? 0:1 ;
        $data['actions_edit']       = $this->input->post('actions_edit')== ""? 0:1 ;
        $data['actions_delete']     = $this->input->post('actions_delete')== ""? 0:1 ;
        $data['invoice']            = $this->input->post('invoice')== ""? 0:1 ;
        $data['invoice_add']        = $this->input->post('invoice_add')== ""? 0:1 ;
        $data['invoice_edit']       = $this->input->post('invoice_edit')== ""? 0:1 ;
        $data['invoice_delete']     = $this->input->post('invoice_delete')== ""? 0:1 ;
        $data['directory']          = $this->input->post('directory')== ""? 0:1 ;
        $data['directory_add']      = $this->input->post('directory_add')== ""? 0:1 ;
        $data['directory_edit']     = $this->input->post('directory_edit')== ""? 0:1 ;
        $data['directory_delete']   = $this->input->post('directory_delete')== ""? 0:1 ;
        $data['admins']             = $this->input->post('admins')== ""? 0:1 ;
        $data['admins_add']         = $this->input->post('admins_add')== ""? 0:1 ;
        $data['admins_edit']        = $this->input->post('admins_edit')== ""? 0:1 ;
        $data['admins_delete']      = $this->input->post('admins_delete')== ""? 0:1 ;
        $data['settings']             = $this->input->post('settings')== ""? 0:1 ;
        $data['settings_add']         = $this->input->post('settings_add')== ""? 0:1 ;
        $data['settings_edit']        = $this->input->post('settings_edit')== ""? 0:1 ;
        $data['settings_delete']      = $this->input->post('settings_delete')== ""? 0:1 ;
        $this->db->where('directory_id', $admin_id);
        $response = $this->db->update('admin_permission', $data);

        $dataD = array(
            'admin_type'=>$data['admin_type'] = $this->input->post('admin_type')== ""? 0:1 
        );
        $this->db->where('directory_id', $admin_id);
        $response = $this->db->update('directory', $dataD);


        return $response;

    }

    function normalizeText($string) 
    {
    	$table = array(
        'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
    	);
    	return strtr($string, $table);
	}

    function getUsername($string= '')
    {
		  $pattern = " ";
		  $firstPart = strstr(strtolower($string), $pattern, true);
		  $secondPart = substr(strstr(strtolower($string), $pattern, false), 0,3);
		  $nrRand = rand(0, 100);
		  $username = trim($firstPart).trim($secondPart).trim($nrRand);
		  return $username; 
    }

    function getPassword()
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr(str_shuffle($chars),0,8);
        return $password;
    }


    ////////////////////////////////////
    
 //Funciones de usuario
    function getUsers($type){
        if($type != 0)
            return $this->db->get_where('user',array('status' => 1,'type'=>$type,'branch_id'=> $this->session->userdata('branch_id')))->result_array();
        else
            return $this->db->get_where('user',array('status' => 1, 'branch_id'=> $this->session->userdata('branch_id')))->result_array();
    
        }


    function createUser()
    {
        
        $data['name']       = $this->input->post('name');
        $data['last_name']  = $this->input->post('last_name');
        $data['phone_1']    = $this->input->post('phone_1');
        $data['phone_2']    = $this->input->post('phone_2');
        $data['username']   = $this->input->post('username');
        $data['password'] = sha1($password);
        $data['demo'] = base64_encode($password);
        $data['email']      = $this->input->post('email');
        $data['address']    = trim($this->input->post('address'));
        $data['type']       = $this->input->post('type');
        $data['branch_id']  = $this->session->userdata('branch_id');

        $response = $this->db->insert('user', $data);
       
    }


    function updateUser($id)
    {
        
        $data['name']       = $this->input->post('name');
        $data['last_name']  = $this->input->post('last_name');
        $data['phone_1']    = $this->input->post('phone_1');
        $data['phone_2']    = $this->input->post('phone_2');
        $data['username']   = $this->input->post('username');
        
        if($this->input->post('password') != '')
        $data['password']   = sha1($this->input->post('password'));

        $data['email']      = $this->input->post('email');
        $data['address']    = trim($this->input->post('address'));
      
        $this->db->where('user_id',base64_decode($id));
        $response = $this->db->update('user', $data);
       
    }

    function deleteUser($id)
    {
        
        $data['status']    = 0;
      
        $this->db->where('user_id',base64_decode($id));
        $response = $this->db->update('user', $data);
       
    }

    function deleteMultipleUser(){

        $ids = $this->input->post('id');

        for ($i=0; $i < sizeof($ids); $i++) { 
            $data['status'] = 0;
            $this->db->where('user_id', base64_decode($ids[$i]));
            $this->db->update('user', $data);

        }
        
    }

    function checkMail()
    {
        $num = $this->db->get_where('user', array('email' =>$this->input->post('mail'),'status'=>1))->num_rows();
        $response = array(
        "available"  => $num
        );
        return $response;  
    }

    function checkUsername()
    {
        $num = $this->db->get_where('user', array('username' =>$this->input->post('username'), 'status'=>1))->num_rows();
        $response = array(
        "available"  => $num
        );
        return $response;  
    }

    
}
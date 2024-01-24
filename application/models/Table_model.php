<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Table_model extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }
    


    function getDataTables($table = '', $param1 = '', $param2 = '', $param3 = '')
    {
        $fetch_data = $this->MakeTable($table, $param1, $param2, $param3);  
        
        $data = $this->getArrays($table,$fetch_data,$param1, $param2, $param3);    
        
        $output = array(  
            "draw"                      =>      intval($_POST["draw"]),  
            "recordsTotal"              =>      $this->GetAllData($table,$param1, $param2, $param3),  
            "recordsFiltered"           =>      $this->GetFilteredData($table,$param1, $param2, $param3),  
            "data"                      =>      $data  
        );  
        
        echo json_encode($output); 
    }
    
    function MakeTable($table,$param1, $param2, $param3)
	{  
        $this->MakeQuery($table,$param1, $param2, $param3);  
        if($_POST["length"] != -1)  
        {  
            $this->db->limit($_POST['length'], $_POST['start']);  
        }  
        $query = $this->db->get();  
        return $query->result();  
    }
    
    function MakeQuery($table,$param1, $param2, $param3)  
    {  
        $this->db->select("*");  
        
        if($table == 'expences')
        {
            $this->db->order_by('expense_id', 'DESC');
            $this->db->from("expense");
            $this->db->where('status', 1);
        }
        elseif($table == 'incomes')
        {
            $this->db->order_by('income_id', 'DESC');
            $this->db->from("income");
            $this->db->where('status', 1);
        }
        
        //*****************
        if(isset($_POST["search"]["value"]))  
        {
            if($table == 'expences')
            {
                $this->db->like("date", $_POST["search"]["value"]);  
            }
            if($table == 'incomes')
            {
                $this->db->like("date", $_POST["search"]["value"]);  
            }
        }  
        if(isset($_POST["order"]))  
        {  
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
        }  
        
    }
    
    function GetAllData($table,$param1, $param2, $param3)  
    {  
        $this->db->select("*");  
        if($table == 'expences')
        {
            $this->db->from("expense"); 
            $this->db->where('status', 1);
            return $this->db->count_all_results(); 
        }
        if($table == 'incomes')
        {
            $this->db->from("income"); 
            $this->db->where('status', 1);
            return $this->db->count_all_results(); 
        }
        
        //*******************
    }
    
    function GetFilteredData($table,$param1, $param2, $param3)
    {  
        $this->MakeQuery($table,$param1, $param2, $param3);  
        $query = $this->db->get();  
        return $query->num_rows();  
    }
    
    
    function getArrays($table, $fetch_data,$param1, $param2, $param3)
    {
        if($table == 'expences' )
        {
            return $this->getExpences($table, $fetch_data,$param1, $param2, $param3);
        }
        if($table == 'incomes' )
        {
            return $this->getIncomes($table, $fetch_data,$param1, $param2, $param3);
        }
        
        //*******************
    }

    function getExpences($table, $fetch_data,$param1, $param2, $param3)
    {
        $data = array();  
        $n = 1;
        foreach($fetch_data as $row)  
        {  
            $currency = $this->crud_model->getCurrency();
            $sub_array      = array();  
            
            $sub_array[]    = '<span class="lighter">#'.sprintf("%06d",$row->expense_id).'</span>';

            $sub_array[]    = '<span class="text-info">'. $this->crud_model->getUserById($row->user_id).'</span>';
            $sub_array[]    = '<span><b>'.$row->date.'</b></span>';
            $method    = '<span class="text-primary">';
                             if($row->method == 1):
                                $method    .= ' Efectivo';
                             elseif($row->method == 0):
                                $method   .= ' Tarjeta';
                             endif;
            $method    .= '</span>';

            $sub_array[] = $method;
            $sub_array[] = '<span class="text-danger">-'.$currency. number_format($row->amount,2,'.',',').'</span>';
            $acctions  = '
                                            <span>
                                                <span class="svg-icon svg-icon-primary svg-icon-2x" onclick="window.open(\''.base_url().'admin/print_expense/'. base64_encode($row->expense_id).'\',\'_blank\');">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M16,17 L16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 L8,17 L5,17 C3.8954305,17 3,16.1045695 3,15 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,15 C21,16.1045695 20.1045695,17 19,17 L16,17 Z M17.5,11 C18.3284271,11 19,10.3284271 19,9.5 C19,8.67157288 18.3284271,8 17.5,8 C16.6715729,8 16,8.67157288 16,9.5 C16,10.3284271 16.6715729,11 17.5,11 Z M10,14 L10,20 L14,20 L14,14 L10,14 Z" fill="#585f6f"/>
                                                            <rect fill="#585f6f" opacity="0.3" x="8" y="2" width="8" height="2" rx="1"/>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span onclick="modalRequest(\''. base_url().'modal/popup/modal_expense/'. base64_encode($row->expense_id).'\')" class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#585f6f" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                            <rect fill="#585f6f" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </span>
                                                
                                            ';
            $sub_array[] = $acctions;

            $data[] = $sub_array;  
        }
        return $data;
    }

    function getIncomes($table, $fetch_data,$param1, $param2, $param3)
    {
        $data = array();  
        $n = 1;
        foreach($fetch_data as $row)  
        {  
            $currency = $this->crud_model->getCurrency();
            $total= $row->subtotal+$row->tax+$row->tip;
            $sub_array      = array();  
            
            $sub_array[]    = '<span class="lighter">#'.sprintf("%06d",$row->income_id).'</span>';
            $sub_array[]    =  '<small><b>'.date('j M, Y H:iA', strtotime($row->date)).'</b></small>';
        
            if($row->method == '0')
            $sub_array[]    = '<a class="text-primary">Efectivo</a>';      
            else
            $sub_array[]    = '<a class="text-info">Tarjeta de credito/debito</a>';   
            $sub_array[]    = '<a href="'.base_url().'/admin/order_dashboard/'.$row->title.'"><span class="badge badge-primary">#'.$row->title.'</span></a>';
            $sub_array[]    = '<a style= "white-space: nowrap; color: #619B2E !important;">+'.$currency.$total.'</a>';  
            $sub_array[]    = '
                                <span class="svg-icon svg-icon-primary svg-icon-2x" onclick="modalRequest(\''. base_url().'modal/popup/modal_income_details/'. base64_encode($row->income_id).'\')">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <circle fill="#585f6f" opacity="0.3" cx="12" cy="12" r="10"/>
                                            <rect fill="#585f6f" x="11" y="10" width="2" height="7" rx="1"/>
                                            <rect fill="#585f6f" x="11" y="7" width="2" height="2" rx="1"/>
                                        </g>
                                    </svg>
                                </span>
                                <span class="svg-icon svg-icon-primary svg-icon-2x" onclick="window.open(\''.base_url().'admin/print_income/'. base64_encode($row->income_id).'\',\'_blank\');">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M16,17 L16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 L8,17 L5,17 C3.8954305,17 3,16.1045695 3,15 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,15 C21,16.1045695 20.1045695,17 19,17 L16,17 Z M17.5,11 C18.3284271,11 19,10.3284271 19,9.5 C19,8.67157288 18.3284271,8 17.5,8 C16.6715729,8 16,8.67157288 16,9.5 C16,10.3284271 16.6715729,11 17.5,11 Z M10,14 L10,20 L14,20 L14,14 L10,14 Z" fill="#585f6f"/>
                                            <rect fill="#585f6f" opacity="0.3" x="8" y="2" width="8" height="2" rx="1"/>
                                        </g>
                                    </svg>
                                </span>
                                ';   

            $data[] = $sub_array;  
        }
        return $data;
    }

    /*Functions to list products*/
    function get_products()
    {

        $fetch_data = $this->make_products_datatables();  
           $data = array();  
           $dat = "";
           $desc = "";
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<input class="check ck" type="checkbox" name="product_id[]" value="'.base64_encode($row->product_id).'"/>';  
                        $dat .='<div style="display:inline-block;vertical-align:top;">
                                    <img src="'.base_url().'public/uploads/products/'.$row->photo.'" style="width:40px; height:40px;object-fit:cover;border-radius:35px">
                                </div>
                                <div style="display:inline-block">
                                    <span class="d-none d-xl-inline-block">'.$row->name.'</span><br>';
                                    if($row->variant == 1)
                                    {
                                        $dat .= '<span class="lighter">Variante: Sí</span>';
                                    }
                        $dat .= '</div>';  
                $sub_array[] = $dat;  
                
                $sub_array[] = '<div class="text-primary">Q'.$row->cost.'</div>';  
                $sub_array[] = '<div class="text-info">Q'.$row->price.'</div>';  
                $sub_array[] = '<div class="text-success">'.$row->stock.'</div>';  
                $sub_array[] = '<div class="text-warning">'.$this->crud_model->getnameCategory($row->category_id).'</div>'; 
                $desc .= '<span class="svg-icon svg-icon-primary svg-icon-2x" onclick="modalLgRequest(\''.base_url().'modal/popup/modal_update_product/'.base64_encode($row->product_id).'\')">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#585f6f" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                        <rect fill="#585f6f" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />
                                    </g>
                                </svg>
                            </span>
                            <span class="svg-icon svg-icon-primary svg-icon-2x" onclick="deleteProduct(\''.base64_encode($row->product_id).'\');">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#585f6f" fill-rule="nonzero" />
                                        <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#585f6f" opacity="0.3" />
                                    </g>
                                </svg>
                            </span>';
                            
                $sub_array[] = $desc;
            
            $data[] = $sub_array;      
            $dat = "";
            $desc = "";
               
           }
                $output = array(  
                "draw"                      =>      intval($_POST["draw"]),  
                "recordsTotal"              =>      $this->get_all_products_data(),  
                "recordsFiltered"           =>      $this->get_filtered_products_data(),  
                "data"                      =>      $data  
           );  
           echo json_encode($output); 
    }
    
    function make_products_datatables()
	{  
        $this->make_products_query();  
        if($_POST["length"] != -1)  
        {  
            $this->db->limit($_POST['length'], $_POST['start']);  
        }  
        $query = $this->db->get();  
        return $query->result();  
    }
    
    function make_products_query()  
    {  
        $this->db->select('*'); 
        $this->db->from('product');
        $this->db->where('status', '1');
        $this->db->where('branch_id', $this->session->userdata('branch_id'));
    
        if($_POST["search"]["value"] != '')  
        {  
            $idCat = $this->crud_model->get_cat_id($_POST["search"]["value"]);
            
            $this->db->like("category_id",$idCat);
            $this->db->or_like("name", $_POST["search"]["value"]);
        }  
        if(isset($_POST["order"]))  
        {  
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
            
        }  
        else  
        {  
            $this->db->order_by('product_id', 'DESC');  
            
        }  
    }
    
    function get_all_products_data()  
    {  
        $this->db->select('*'); 
        $this->db->from('product');
        $this->db->where('status', 1);
        $this->db->where('branch_id', $this->session->userdata('branch_id'));
        return $this->db->count_all_results();  
    }
    
    function get_filtered_products_data()
    {  
        $this->make_products_query();  
        $query = $this->db->get();  
        return $query->num_rows();  
    }
    
    
    
    
    /*Functions to list products*/
    function get_products_kitchen()
    {
        $fetch_data = $this->make_products_kitchen_datatables();  
           $data = array();  
           $dat = "";
           $desc = "";
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<input class="check ck" type="checkbox" name="product_id[]" value="'.base64_encode($row->product_id).'"/>';  
                        $dat .='<div style="display:inline-block;vertical-align:top;">
                                    <img src="'.base_url().'public/uploads/products/'.$row->photo.'" style="width:40px; height:40px;object-fit:cover;border-radius:35px">
                                </div>
                                <div style="display:inline-block">
                                    <span class="d-none d-xl-inline-block">'.$row->name.'</span><br>
                                </div>';  
                                
                $sub_array[] = $dat;  
                
                $sub_array[] = '<div class="text-primary">Q'.$row->cost.'</div>';  
                $sub_array[] = '<div class="text-success">'.$row->stock.'</div>';  
                $desc .= '<span class="svg-icon svg-icon-primary svg-icon-2x" onclick="modalLgRequest(\''.base_url().'modal/popup/modal_update_product_kitchen/'.base64_encode($row->product_id).'\')">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#585f6f" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                        <rect fill="#585f6f" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />
                                    </g>
                                </svg>
                            </span>
                            <span class="svg-icon svg-icon-primary svg-icon-2x" onclick="deleteProduct(\''.base64_encode($row->product_id).'\');">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#585f6f" fill-rule="nonzero" />
                                        <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#585f6f" opacity="0.3" />
                                    </g>
                                </svg>
                            </span>';
                            
                $sub_array[] = $desc;
            
            $data[] = $sub_array;      
            $dat = "";
            $desc = "";
               
           }
                $output = array(  
                "draw"                      =>      intval($_POST["draw"]),  
                "recordsTotal"              =>      $this->get_all_products_kitchen_data(),  
                "recordsFiltered"           =>      $this->get_filtered_products_kitchen_data(),  
                "data"                      =>      $data  
           );  
           echo json_encode($output); 
    }
    
    function make_products_kitchen_datatables()
	{  
        $this->make_products_kitchen_query();  
        if($_POST["length"] != -1)  
        {  
            $this->db->limit($_POST['length'], $_POST['start']);  
        }  
        $query = $this->db->get();  
        return $query->result();  
    }
    
    function make_products_kitchen_query()  
    {  
        $this->db->select('*'); 
        $this->db->from('product');
        $this->db->where('status', '2');
        $this->db->where('branch_id', $this->session->userdata('branch_id'));
    
        if($_POST["search"]["value"] != '')  
        {  
            $this->db->like("name", $_POST["search"]["value"]);
        }  
        if(isset($_POST["order"]))  
        {  
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
        }  
        else  
        {  
            $this->db->order_by('product_id', 'DESC');  
        }  
    }
    
    function get_all_products_kitchen_data()  
    {  
        $this->db->select('*'); 
        $this->db->from('product');
        $this->db->where('status', 2);
        $this->db->where('branch_id', $this->session->userdata('branch_id'));
        return $this->db->count_all_results();  
    }
    
    function get_filtered_products_kitchen_data()
    {  
        $this->make_products_kitchen_query();  
        $query = $this->db->get();  
        return $query->num_rows();  
    }
    
    
    
    /*Functions to list products in alert*/
    function get_alerts()
    {
        $fetch_data = $this->make_alerts_datatables();  
           $data = array();  
           $dat = "";
           $type = "";
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $dat    .=  '<div style="display:inline-block;vertical-align:top;">
                                <img src="'.base_url().'public/uploads/products/'.$row->photo.'" style="width:40px; height:40px;object-fit:cover;border-radius:35px"/>
                            </div>
                            <div style="display:inline-block">
                                <span class="d-none d-xl-inline-block">'.$row->name.'</span><br>';
                                if($row->variant == 1)
                                {
                                    $dat .='<span class="lighter">Variante: Sí</span>';    
                                }
                                $dat .='</div>';  
                                        
                $sub_array[] = $dat;  
                if($row->status == 1)
                {
                    $type   .=  '<div class="text-danger">Producto</div>';
                }
                else
                {
                    $type   .=  '<div class="text-warning">Cocina</div>';
                }
                $sub_array[] = $type;  
                $sub_array[] = '<div class="text-primary">'.$row->stock.'</div>';  
                $sub_array[] = '<div class="text-success">Q'.$row->cost.'</div>';  
                if($row->price > 0){
                $sub_array[] = '<div class="text-info">Q'.$row->price.'</div>';}
                else{
                $sub_array[] = '<div class="text-info">-</div>';
                }
                
            
                $data[] = $sub_array;      
                $dat = "";
                $type = "";
           }
                $output = array(  
                "draw"                      =>      intval($_POST["draw"]),  
                "recordsTotal"              =>      $this->get_all_alerts_data(),  
                "recordsFiltered"           =>      $this->get_filtered_alerts_data(),  
                "data"                      =>      $data  
           );  
           echo json_encode($output); 
    }
    
    function make_alerts_datatables()
	{  
        $this->make_alerts_query();  
        if($_POST["length"] != -1)  
        {  
            $this->db->limit($_POST['length'], $_POST['start']);  
        }  
        $query = $this->db->get();  
        return $query->result();  
    }
    
    function make_alerts_query()  
    {  
        $this->db->select('*'); 
        $this->db->from('product');
        $where = "branch_id = ".$this->session->userdata('branch_id')." AND stock <= alert AND (status = 1 OR status = 2)";
        $this->db->where($where);
        
        if($_POST["search"]["value"] != '')  
        {  
            $this->db->like("name", $_POST["search"]["value"]);
        }  
        if(isset($_POST["order"]))  
        {  
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
        }  
        else  
        {  
            $this->db->order_by('product_id', 'DESC');  
        }  
    }
    
    function get_all_alerts_data()  
    {  
        $this->db->select('*'); 
        $this->db->from('product');
        $where = "branch_id = ".$this->session->userdata('branch_id')." AND stock <= alert AND (status = 1 OR status = 2)";
        $this->db->where($where);
        return $this->db->count_all_results();  
    }
    
    function get_filtered_alerts_data()
    {  
        $this->make_alerts_query();  
        $query = $this->db->get();  
        return $query->num_rows();  
    }
    
    
    /*Functions to list vinculations*/
    function get_vinculation()
    {
        $fetch_data = $this->make_vinculation_datatables();  
           $data = array();  
           $dat = "";
           $desc = "";
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<input class="check ck" type="checkbox" name="vinculation_id[]" value="'.base64_encode($row->vinculation_id).'"/>';  
                $dat .= ' <div style="display:inline-block;vertical-align:top;">
                                    <img src="'.base_url().'public/uploads/products/'.$this->crud_model->get_photo_product($row->product_id).'" style="width:40px; height:40px;object-fit:cover;border-radius:35px">
                                </div>
                                <div style="display:inline-block">
                                    <span class="d-none d-xl-inline-block">'.$this->crud_model->get_name_product($row->product_id).'</span><br>';
                                    if($row->to_show == 1){
                                    $dat .= '<span class="text-primary">Mostrar y descontar</span>';
                                    }
                                    else{
                                    $dat .= '<span class="text-warning">Solo descontar</span>';
                                    }
                                $dat .= '</div>'; 
                                
                $sub_array[] = $dat;  
                $sub_array[] = '<div class="lighter">'.$this->crud_model->getUserById($row->user_id).'</div>';  
                $sub_array[] = '<div class="text-primary">'.date("d/m/Y h:i:s A",strtotime($row->date)).'</div>';  
                $desc .= '<a href="'.base_url().'admin/update_vinculation/'.base64_encode($row->product_id).'"><span class="svg-icon svg-icon-primary svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#585f6f" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                        <rect fill="#585f6f" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />
                                    </g>
                                </svg>
                            </span></a>
                            <span class="svg-icon svg-icon-primary svg-icon-2x" onclick="deleteVinculation(\''.base64_encode($row->vinculation_id).'\');">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#585f6f" fill-rule="nonzero" />
                                        <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#585f6f" opacity="0.3" />
                                    </g>
                                </svg>
                            </span>';
                            
                $sub_array[] = $desc;
            
            $data[] = $sub_array;      
            $dat = "";
            $desc = "";
               
           }
                $output = array(  
                "draw"                      =>      intval($_POST["draw"]),  
                "recordsTotal"              =>      $this->get_all_vinculation_data(),  
                "recordsFiltered"           =>      $this->get_filtered_vinculation_data(),  
                "data"                      =>      $data  
           );  
           echo json_encode($output); 
    }
    
    function make_vinculation_datatables()
	{  
        $this->make_vinculation_query();  
        if($_POST["length"] != -1)  
        {  
            $this->db->limit($_POST['length'], $_POST['start']);  
        }  
        $query = $this->db->get();  
        return $query->result();  
    }
    
    function make_vinculation_query()  
    {  
        $this->db->select('*'); 
        $this->db->from('vinculation');
        $this->db->where('branch_id', $this->session->userdata('branch_id'));
        $this->db->group_by('product_id');
        
        if($_POST["search"]["value"] != '')  
        {  
            $prod_id = $this->crud_model->get_prod_id($_POST["search"]["value"]);
            $this->db->like("product_id", $prod_id);
        }
        if(isset($_POST["order"]))  
        {  
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
            
        }  
        else  
        {  
            $this->db->order_by('vinculation_id', 'DESC');  
            
        }  
    }
    
    function get_all_vinculation_data()  
    {  
        $this->db->select('*'); 
        $this->db->from('vinculation');
        $this->db->where('branch_id', $this->session->userdata('branch_id'));
        $this->db->group_by('product_id');
        return $this->db->count_all_results();  
    }
    
    function get_filtered_vinculation_data()
    {  
        $this->make_vinculation_query();  
        $query = $this->db->get();  
        return $query->num_rows();  
    }

    function getFloors() 
    {
        return $this->db->get_where("floor",array('branch_id'=>$this->session->userdata("branch_id"),'status'=>1))->result_array();
    }

    function getTables($floor_id) 
    {
        return $this->db->get_where("table",array('floor_id'=>$floor_id, 'status !='=>0))->result_array();
    }

    function tableExist( $tables, $number) {
        foreach ($tables as $element) {
            if ($element['number'] == $number) {
                return true;
            }
        }
        return false;
    }

    function getTableName( $table_id) {
        return $this->db->get_where("table",array('table_id'=>$table_id))->row()->name;
    }

    function tableReservation($table_id) {
       
        $date = date('Y-m-d');
        $avalible = 0;
        $reservation = $this->db->query('SELECT * FROM reservation_table as rt INNER JOIN reservation as r ON rt.reservation_id = r.reservation_id where rt.table_id = '.$table_id.' and r.start like "'.$date.'%"')->result_array();
        if(count($reservation) > 0)
        {
            foreach ($reservation as $row)
            {
                $start_reservation = strtotime($row['start']);
                $end_reservation = strtotime($row['end']);

                $time = strtotime(date('Y-m-d H:i:s'));
                

                if($time > $start_reservation && $time < $end_reservation) {

                    $avalible = $row['reservation_id'];

                }else {
                    $avalible = 0;
                }
            }
            

        }else {

            if($avalible == 0)
            $avalible = 0;
        }

        return  $avalible;

    }


    function tableReservationDetails($reservation_id) {
       
       return $this->db->get_where("reservation", array('reservation_id'=>$reservation_id))->result_array();
    }
    
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model 
{ 
    function __construct() 
    {
        parent::__construct();
    }

    //Funciton to get the full name to any user
    function getOrders($date,$type){
        $this->db->order_by('order_refer_id', 'DESC');
        $this->db->like('date',$date, 'after');
        $this->db->where('status <>',0);
        return $this->db->get_where('order_refer', array('type'=>$type))->result_array();
    }

    
    function getOrdersAccounts($order_refer_id){
        $this->db->order_by('order_id', 'ASC');
        $this->db->where('order_refer_id ',$order_refer_id);
        $this->db->where('status !=',0);
        return $this->db->get('order')->result_array();
    }

    //Funciton of the dashboard

      function getAllOrders(){
        $this->db->order_by('order_id', 'DESC');
        $this->db->where('status !=', 0);
        $this->db->limit('7');
        return $this->db->get('order')->result_array();
    }


    function countAllOrdersTable(){
       
        return $this->db->query('SELECT * FROM `order` where MONTH(date)=MONTH(now()) and YEAR(date)=YEAR(now()) and type = 2 and status != 0 and branch_id = '.$this->session->userdata('branch_id').' ORDER BY `order`.`order_id` ASC')->num_rows();
    }


    function countAllOrdersDelivery(){
       
        return $this->db->query('SELECT * FROM `order` where MONTH(date)=MONTH(now()) and YEAR(date)=YEAR(now()) and type = 1 and status != 0 and branch_id = '.$this->session->userdata('branch_id').' ORDER BY `order`.`order_id` ASC')->num_rows();
    }


    function countAllOrdersToget(){
       
        return $this->db->query('SELECT * FROM `order` where MONTH(date)=MONTH(now()) and YEAR(date)=YEAR(now()) and type = 0 and status != 0 and branch_id = '.$this->session->userdata('branch_id').' ORDER BY `order`.`order_id` ASC')->num_rows();
    }

    
    function countAllOrdersPayed(){
       
        return $this->db->query('SELECT * FROM `order` where MONTH(date)=MONTH(now()) and YEAR(date)=YEAR(now()) and type = 3 and status != 0 and branch_id = '.$this->session->userdata('branch_id').' ORDER BY `order`.`order_id` ASC')->num_rows();
    }


    function getSalesToday(){
    
        $total = $this->db->query('SELECT SUM(subtotal+ tax+tip) as total FROM `order` where DATE(date) = CURDATE() and status = 3 and branch_id = '.$this->session->userdata('branch_id'))->row()->total;

        if($total != "") {
            return $total;
        }else {
            return number_format(0,2,'.',',');
        }
    }

    function getTotalOrdersPerMonth(){

        
    
        for ($i=1; $i <= 12 ; $i++) { 
            if($i<10)
            $month = date('Y').'-0'.$i.'-01';
            else
            $month = date('Y').'-'.$i.'-01';

            $total = $this->db->query('SELECT * FROM `order` where MONTH(date)=MONTH("'.$month.'") and YEAR(date)=YEAR(now()) and status != 0 and branch_id = '.$this->session->userdata('branch_id').' ORDER BY `order`.`order_id` ASC')->num_rows();

            echo $total.',';

        }
    
    }


    function getOrderInfo($code){
        
        return $this->db->get_where('order', array('code' => $code))->result_array();
    }



    function getOrderDetailsGroup($code){
    
        return $this->db->query('SELECT *, SUM(amount) as Total, (SUM(amount)*price) as Price_total FROM `order_details` where order_code = "'.$code.'" GROUP BY product_id, variant_id ORDER BY order_details_id DESC')->result_array();
    }

    function getOrderDetails($code){
    
        return $this->db->query('SELECT *, (amount * price) as total FROM `order_details` where order_code = "'.$code.'" ORDER BY order_details_id DESC')->result_array();
    }

    function gerPenndingOrders(){
    
        return $this->db->query('SELECT * FROM `order_details` where status = 0 ORDER BY order_details_id DESC')->result_array();
    }

    function gerProcessOrders(){
    
        return $this->db->query('SELECT * FROM `order_details` where status = 1 ORDER BY order_details_id DESC')->result_array();
    }


    function gerCompleteOrders(){
    
        return $this->db->query('SELECT * FROM `order_details` where status = 2  ORDER BY order_details_id DESC  LIMIT 8')->result_array();
    }

 



    function createOrder(){
        
           
            $data_order['code'] = strtoupper(substr(md5(rand(100000000, 200000000)), 0, 8));;
            $data_order['type'] = 0;
            $data_order['status'] = 1;
            $data_order['branch_id'] = $this->session->userdata('branch_id');

            $this->db->insert('order_refer',$data_order);


            $data_order['code'] =  strtoupper(substr(md5(rand(100000000, 200000000)), 0, 8));
            $data_order['type'] = 0;
            $data_order['status'] = 1;
            $data_order['order_refer_id'] = $this->db->insert_id();
            $data_order['branch_id'] = $this->session->userdata('branch_id');


            $this->db->insert('order',$data_order);

            return $data_order['code'];

    }

    
    function newAccount($order_refer_id){
        
        
        $type = $this->db->get_where('order_refer',array('order_refer_id'=>base64_decode($order_refer_id)))->row()->type;

        $data_order['code'] =  strtoupper(substr(md5(rand(100000000, 200000000)), 0, 8));
        $data_order['type'] = $type;
        $data_order['status'] = 1;
        $data_order['order_refer_id'] = base64_decode($order_refer_id);
        $data_order['branch_id'] = $this->session->userdata('branch_id');

        $this->db->insert('order',$data_order);

        return $data_order['code'];

    }

    function createDelivery(){
        
        $data_order['code'] = strtoupper(substr(md5(rand(100000000, 200000000)), 0, 8));;
        $data_order['type'] = 1;
        $data_order['status'] = 1;
        $data_order['branch_id'] = $this->session->userdata('branch_id');

        $this->db->insert('order_refer',$data_order);


        $data_order['code'] =  strtoupper(substr(md5(rand(100000000, 200000000)), 0, 8));
        $data_order['type'] = 1;
        $data_order['status'] = 1;
        $data_order['order_refer_id'] = $this->db->insert_id();
        $data_order['branch_id'] = $this->session->userdata('branch_id');


        $this->db->insert('order',$data_order);

        return $data_order['code'];

    }

    function createOrderTable($table_id){
        
        $data_order['code'] = strtoupper(substr(md5(rand(100000000, 200000000)), 0, 8));;
        $data_order['type'] = 3;
        $data_order['status'] = 1;
        $data_order['table_id'] = base64_decode($table_id);
        $data_order['branch_id'] = $this->session->userdata('branch_id');

        $this->db->insert('order_refer',$data_order);

        $data_order1['code'] =  strtoupper(substr(md5(rand(100000000, 200000000)), 0, 8));
        $data_order1['type'] = 3;
        $data_order1['status'] = 1;
        $data_order1['order_refer_id'] = $this->db->insert_id();
        $data_order1['branch_id'] = $this->session->userdata('branch_id');

        $this->db->insert('order',$data_order1);

        $data_table['order_code'] = $data_order1['code'];
        $data_table['status'] = 3;
        $this->db->where('table_id', base64_decode($table_id));
        $this->db->update('table',$data_table);

        return $data_order1['code'];
    }

    function deleteOrder($code){
        
    
        $order_details = $this->db->get_where('order_details', array('order_code'=>$code))->result_array();
        foreach ($order_details as $row){
            $this->deleteProductInOrder($row['order_details_id']);
        }
        
        $this->db->where('code',$code);
        $this->db->delete('order');

        $dataTable['status'] = '0';
        $dataTable['order_code'] = '';
        $this->db->where('order_code',$code);
        $this->db->update('table',$dataTable); 


    }

    function payOrder($code)
    {
        
        if($this->input->post('client_id') == 0) {

            $data_client['first_name']    = $this->input->post('first_name');
            $data_client['last_name']    = $this->input->post('last_name');
            $data_client['phone']   = $this->input->post('phone');
            $data_client['email']   = $this->input->post('email');
            $data_client['address'] = $this->input->post('address');
            $this->db->insert('client',$data_client);
            $data_order['client_id']    = $this->db->insert_id();
        }else {
            $data_order['client_id']    = $this->input->post('client_id');

            $data_client['first_name']    = $this->input->post('first_name');
            $data_client['last_name']    = $this->input->post('last_name');
            $data_client['phone']   = $this->input->post('phone');
            $data_client['email']   = $this->input->post('email');
            $data_client['address'] = $this->input->post('address');
            $this->db->where('client_id',$this->input->post('client_id'));
            $this->db->update('client',$data_client);
        }


        $data_order['subtotal']   = $this->input->post('subtotal');
        $data_order['tax']        = $this->input->post('tax');
        $data_order['tip']        = $this->input->post('tip');
        $data_order['details']    = $this->input->post('details');
        $data_order['date']       = date('Y-m-d H:i:s');
        $data_order['method']     = $this->input->post('method');
        $data_order['status']     = 3;

        $this->db->where('code',$code);
        $this->db->update('order',$data_order);

        
        $data_income['title']        = $code;
        $data_income['date']         = date('Y-m-d H:i:s');
        $data_income['subtotal']     = $this->input->post('subtotal');
        $data_income['tax']          = $this->input->post('tax');
        $data_income['tip']          = $this->input->post('tip');
        $data_income['method']       = $this->input->post('method');
        $data_income['description']  = $this->input->post('description');
        $data_income['branch_id']    = $this->session->userdata('branch_id');
        $data_income['user_id']      = $this->session->userdata('login_user_id');
        
        $this->db->insert('income',$data_income);
        
        $order_refer_id = $this->db->get_where('order',array('code'=>$code))->row()->order_refer_id;
        $type = $this->db->get_where('order',array('code'=>$code))->row()->type;

        $accounts = $this->db->get_where('order',array('order_refer_id'=>$order_refer_id,'status'=>1))->num_rows();
        
        if($accounts == 0)
        {
            $table_id = $this->db->get_where('order_refer',array('order_refer_id'=>$order_refer_id))->row()->table_id;
           
            if($table_id != "") 
            {
                $data_table['status'] = 1;
    
                $this->db->where('table_id',$table_id);
                $this->db->update('table',$data_table);
                
                              
            }else
            {
                $order_refer['status'] = 2;
    
                $this->db->where('order_refer_id',$order_refer_id);
                $this->db->update('order_refer',$order_refer);

            }

            return $type;

        }else{

            return $this->db->get_where('order',array('order_refer_id'=>$order_refer_id,'status'=>1))->row()->code;
            
        }


    }

    function addProduct($code)
    {
        $data['order_code'] = $code;
        $data['product_id'] = $this->input->post('product_id');
        $data['variant_id'] = $this->input->post('variant_id');
        
        if($this->input->post('variant_id') == ""){
            $data['price']      = $this->db->get_where('product',array('status'=>1,'product_id'=>$this->input->post('product_id')))->row()->price;
            $data['cost']      = $this->db->get_where('product',array('status'=>1,'product_id'=>$this->input->post('product_id')))->row()->cost;
        }else {
            $data['price']      = $this->db->get_where('product_variant',array('product_variant_id'=>$this->input->post('variant_id')))->row()->price;
            $data['cost']      = $this->db->get_where('product_variant',array('product_variant_id'=>$this->input->post('variant_id')))->row()->cost;
        }
        $data['amount']     = $this->input->post('amount');
        $data['details']    = $this->input->post('details');
        $data['branch_id']    = $this->session->userdata('branch_id');
        $data['status']     = 0;

        $this->db->insert('order_details',$data);
        $idOrderDetail = $this->db->insert_id();
        
        $total =  ($data['price'] * $this->input->post('amount')) + $this->db->get_where('order',array('code'=>$code))->row()->total;;
        $data_order['subtotal'] =   $total;
        $data_order['status'] = 2;
        $this->db->where('code',$code);
        $this->db->update('order',$data_order);

        $table_id = $this->db->get_where('order',array('code'=>$code))->row()->table_id;

        if($table_id != "") 
        {
            $data_table['status'] = 3;

            $this->db->where('table_id',$table_id);
            $this->db->update('table',$data_table);
        }
        
        $stock = $this->crud_model->getProductStock($this->input->post('product_id'));
        $stock -= $this->input->post('amount');

        $data_prod['stock'] = $stock;
        $this->db->where('product_id',$this->input->post('product_id'));
        $this->db->update('product',$data_prod);
        
        //Add vinculation to products
        $this->addProductVinculation($this->input->post('product_id'), $code, $idOrderDetail);

    }

    function updateProduct($id)
    {
       
        $data['product_id'] = $this->input->post('product_id');
        $data['variant_id'] = $this->input->post('variant_id');
        
        if($this->input->post('variant_id') == ""){
            $data['price']      = $this->db->get_where('product',array('status'=>1,'product_id'=>$this->input->post('product_id')))->row()->price;
        }else {
            $data['price']      = $this->db->get_where('product_variant',array('product_variant_id'=>$this->input->post('variant_id')))->row()->price;
        }

        $data['amount']     = $this->input->post('amount');
        $data['details']    = $this->input->post('details');

        if($this->input->post('amount') == 0){

            $amount = $this->db->get_where('order_details',array('order_details_id'=>$id))->row()->amount;

            $stock = $this->crud_model->getProductStock($this->input->post('product_id'));
            $stock += $amount;

            $data_prod['stock'] = $stock;
            $this->db->where('product_id',$this->input->post('product_id'));
            $this->db->update('product',$data_prod);
            

            $this->db->where('order_details_id',$id);
            $this->db->delete('order_details');


        }else {


            $amount = $this->db->get_where('order_details',array('order_details_id'=>$id))->row()->amount;

            $stock = $this->crud_model->getProductStock($this->input->post('product_id'));
            $stock += $amount;
            $stock -= $this->input->post('amount');

            $data_prod['stock'] = $stock;
            $this->db->where('product_id',$this->input->post('product_id'));
            $this->db->update('product',$data_prod);

            $this->db->where('order_details_id',$id);
            $this->db->update('order_details',$data);
        }
       
    }

    function proccesOrder($id){
        
        $data_order['status'] = 1;

        $this->db->where('order_details_id',base64_decode($id));
        $this->db->update('order_details',$data_order);

    }

    function completeOrder($id){
        
        $data_order['status'] = 2;

        $this->db->where('order_details_id',base64_decode($id));
        $this->db->update('order_details',$data_order);

    }

    function deleteProductInOrder($idOrderDetail)
    {
        $data = $this->db->get_where('vinculation_order', array('order_details_id' => $idOrderDetail));
        if($data->num_rows() > 0)
        {
            foreach($data->result_array() as $row)
            {
                $stock      = $this->crud_model->getProductStock($row['id_product']);
                $stock      += $row['quantity'];
                $datacp['stock'] = $stock;
                $this->db->where('product_id',  $row['id_product']);
                $this->db->update('product', $datacp);
                
                $this->db->where('vinculation_order_id',$row['vinculation_order_id']);
                $this->db->delete('vinculation_order');
            }
        }
        
        $idProducto = $this->db->get_where('order_details', array('order_details_id' => $idOrderDetail))->row()->product_id;
        $quantity   = $this->db->get_where('order_details', array('order_details_id' => $idOrderDetail))->row()->amount;
        
        $stock      = $this->crud_model->getProductStock($idProducto);
        $stock      += $quantity;
        $datacp['stock'] = $stock;
        $this->db->where('product_id',  $idProducto);
        $this->db->update('product', $datacp);
        
        $this->db->where('order_details_id',$idOrderDetail);
        $this->db->delete('order_details');
        
    }
    
    function addProductVinculation($idProduct, $order, $idOrderDetail)
    {
        $prodcutsdd = $this->input->post('product_vinc');
        $amountsdd  = $this->input->post('amount_vinc');
        
        if(sizeof($prodcutsdd) > 0 && sizeof($amountsdd) > 0)
        {
            $codee  = strtoupper(substr(sha1(rand(100000000, 20000000000000)), 0, 6));
            $entries = sizeof($prodcutsdd);
            
            for($i = 0; $i < $entries; $i++) 
            {
                    $stock      = $this->crud_model->getProductStock($prodcutsdd[$i]);
                    $stock      -= $amountsdd[$i];
                    $datacp['stock'] = $stock;
                    $this->db->where('product_id',  $prodcutsdd[$i]);
                    $this->db->update('product', $datacp);
                    
                    $datavp['order_details_id']     = $idOrderDetail;
                    $datavp['codex']                = $codee;
                    $datavp['id_product']           = $prodcutsdd[$i];
                    $datavp['quantity']             = $amountsdd[$i];
                    $datavp['order_code']           = $order;
                    $datavp['product_principal']    = $idProduct;
                    $datavp['to_show']              = 1;
                    $this->db->insert('vinculation_order', $datavp);
            }
        }
        
        
        $complements = $this->db->get_where('product_complement', array('product_id' => $idProduct));
        
        if($complements->num_rows() > 0)
        {
           foreach($complements->result_array() as $cmplts)
           {
               //validate vinculations
               $data = $this->db->get_where('vinculation', array('vinculation_id' => $cmplts['vinculo_id'], 'to_show' => 0, 'branch_id' => $this->session->userdata('branch_id')));
               if($data->num_rows() > 0)
               {
                    $rowss = $data->row();
                    $stock          = $this->crud_model->getProductStock($rowss->product_id);
                    $stock          -= ($rowss->amount*$this->input->post('amount'));
               
                    $datano['stock'] = $stock;
                    $this->db->where('product_id',  $rowss->product_id);
                    $this->db->update('product', $datano);
               
                    $codee  = strtoupper(substr(sha1(rand(100000000, 20000000000000)), 0, 6));
               
                    $data33['order_details_id']     = $idOrderDetail;
                    $data33['codex']                = $codee;
                    $data33['id_product']           = $rowss->product_id;
                    $data33['quantity']             = $rowss->amount*$this->input->post('amount');
                    $data33['order_code']           = $order;
                    $data33['product_principal']    = $idProduct;
                    $data33['to_show']              = 0;
                    $this->db->insert('vinculation_order', $data33);
               }
            }
        }
        return 1;
    }

    
}

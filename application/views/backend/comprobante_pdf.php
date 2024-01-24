<?php 
    $system_name        =	$this->db->get_where('settings' , array('type' =>'system_name'))->row()->description;
    $system_title       =	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
    $account_type = $this->session->userdata('login_type'); 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title><?php echo $page_title;?> | <?php echo $system_title;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Software jurídico a la medida">
    <meta name="keywords" content="software, web">
    <meta name="author" content="MAYANSOURCE - mayansource.com">
    <?php include 'topcss.php';?>
</head>

<body class="<?php if($this->session->userdata('dark_mode')) echo 'dark-only'?>">

    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader">
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-ball"></div>
        </div>
    </div>
    <!-- Loader ends--> 
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <div class="page-body-wrapper" style="    padding: 10%;    ">
            <center>
                <div class="card" style=" width: 460px;   text-align: left;">

                    <div class="card-body post-about">
                        <img class="img-fluid" style="width: 100px;height: 100px;" src="<?php echo base_url();?>public/assets/images/logo/<?php echo $this->db->get_where('settings', array('type' => 'logo'))->row()->description;?>" alt="" width="100%">
                        <h2><?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;?></h2>
                        <?php 
                        $move = $this->db->get_where('economic_payment',array('economic_payment_id'=>$param2))->result_array(); 
                        foreach ($move as $row):
                    ?>
                        <div style="margin:0px">
                            <h4><?php echo date('d/m/Y',strtotime($row['date']));?></h4>
                        </div>

                        <div style="margin:0px">
                            <br>
                            <h3><?php echo $this->crud_model->get_table_name('payment_method',$row['method']);?></h3>
                        </div>
                        <div style="margin:0px">
                            <br>
                            <h3 style="margin:0px"><?php echo $row['description'];?></h3>
                            <h2 style="margin:0px">$<?php echo number_format($row['import'],2,'.',',');?></h2>
                        </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </center>
        </div>
        <?php include 'scripts.php';?>
</body>

</html>
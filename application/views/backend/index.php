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
        <?php include 'header.php';?>
        <div class="page-body-wrapper">
            <?php include $account_type.'/navigation.php';?>
            <?php  include $account_type.'/'.$page_name.'.php'; ?>
            <?php include 'footer.php';?>
            <?php include $account_type.'/'.'notes.php';?>
        </div>
    </div>

    <?php include 'modal.php';?>
    <?php include 'scripts.php';?>
</body>

</html>
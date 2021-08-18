<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wood!<?php echo (isset($title) ? ' - '.$title : ''); ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- NProgress -->
    <!-- <link href="<?php //echo base_url(); ?>assets/template/vendors/nprogress/nprogress.css" rel="stylesheet"> -->

    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Switchery -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/switchery/dist/switchery.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/template/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    
    <?php 
        if(isset($css)) {
                foreach($css as $c) {
                    
                    echo '<link href="'.$c.'" rel="stylesheet">';
                }
        }
    ?>

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/template/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container" style="border: 0; background: #a77d46;">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view" style="border: 0; background: #a77d46;">
            <div class="navbar nav_title" style="border: 0; background: #a77d46;">
              <a href="<?php echo site_url(); ?>" class="site_title">
               <img width="35" height="35" src="<?php echo base_url(); ?>assets/images/bois.png"> <span>Wood!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url(); ?>assets/template/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenue</span>
                <h2>
                    <?php echo $this->session->userdata("user_username") ? ucfirst($this->session->userdata("user_username")) : ""; ?>
                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
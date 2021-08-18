<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Connexion | Wood</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url(); ?>assets/template/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/template/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <a href="<?php echo site_url('home'); ?>"><img src="<?php echo base_url(); ?>assets/images/bois.png" /></a>
            <form method="post" action="<?php echo site_url('user/connexion'); ?>">
              <h1>Connexion</h1>

               <?php if(isset($error)) {?>
                   <span style="color: red;"><?= $error; ?></span>
               <?php } ?>

              <div>
                 <input type="text" name="user_username" value="<?= set_value('user_username'); ?>" class="form-control" placeholder="Login" required="" />
                 <?php echo form_error('user_username', '<span style="color: red;">', '</span>'); ?>
              </div>
                 
              <div>
                 <input type="password" name="user_password" class="form-control" placeholder="Mot de passe" required="" />
                 <?php echo form_error('user_password', '<span style="color: red;">', '</span>'); ?>
              </div>
                 
              <div>
                <button type="submit" class="btn btn-defaul">Connexion</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-home"></i> Wood!</h1>
                  <p>©2017 All Rights Reserved. Propulsé par <a href="http://www.matlle.com">Matlle</a></p>
                </div>
              </div>
            </form>
          </section>
        </div>




      </div>
    </div>
  </body>
</html>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>


  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/AdminLTE.min.css">
  <!-- login style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/admin-login.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
    .login-page
    {
      background-image: url('<?php echo base_url() ?>dist/img/boxed-bg.jpg');
    }
  </style>

</head>
<body class="login-page">
<div class="login-box">
  <div class="login-logo">
    <!--    <a href="#"><b>SUPERFLUX</b>HELPDESK</a>-->
    &nbsp;
  </div>
  <div class="login-box-body login-header">
    <center><h1><img src="<?php echo base_url()?>dist/img/logo.png" width="150" height="20" alt=""></h1></center>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo lang('login_subheading');?></p>
    <?php if(!empty($message)) echo '<div id="infoMessage" class="alert alert-warning"> '.$message.'</div>';?>
    <?php echo form_open("auth/login",array('autocomplete'=>'off'));?>
    <div class="form-group has-feedback">
      <?php
      $data =array('name'=>'identity','type'=>'email','class'=>'form-control','placeholder'=>'Email');
      echo form_input($data);?>
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <?php
      $data =array('name'=>'password','type'=>'password','class'=>'form-control','placeholder'=>'Password');
      echo form_input($data);?>
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
      <!-- /.col -->
      <div class="col-xs-4">

        <?php
        $data = array('type'=>'submit','value'=>'Sign In','class'=>'btn btn-primary btn-block btn-flat');
        echo form_submit($data);?>
        <!--       <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>-->
      </div>
      <!-- /.col -->
    </div>

    <?php echo form_close();?>

    <a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
    <br>
  </div>


</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <!--start-meta-->
    <?php echo (isset($meta_view)) ? $meta_view : ''; ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--end-meta-->

    <!-- Le styles -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="<?php echo base_url()?>bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>dist/css/AdminLTE.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>dist/css/skins/skin-blue.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/datatables/dataTables.bootstrap.css">
      <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/datepicker/datepicker3.css">

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/ico/favicon.ico">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<!--start_nav-->
<?php echo (isset($header_view)) ? $header_view : ''; ?>
<!--end_nav-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php echo $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   <?php include_once('error_view.php');?>
    <?php echo (isset($content_for_layout)) ? $content_for_layout : ''; ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


    <!--start_footer-->
    <?php echo (isset($footer_view)) ? $footer_view : ''; ?>
    <!--end_footer-->

</div>
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url()?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url()?>bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>dist/js/app.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url()?>plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
    $(function () {

        $('.datepicker').datepicker({
            autoclose:true
        });
        $('#table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
</body>
</html>

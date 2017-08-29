<!DOCTYPE HTML>
<html>
<head>
<title>Event Diary</title>
<link href="<?php  echo base_url() ?>dist/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php  echo base_url() ?>bootstrap/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php  echo base_url() ?>bootstrap/css/style1.css" rel="stylesheet" type="text/css" media="all" />
<link media="all" type="text/css" rel="stylesheet" href="http://www.eventdiary.ng/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Voguish Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700' rel='stylesheet' type='text/css'>
<script src="<?php  echo base_url() ?>bootstrap/js/jquery.min.js"></script>
<script src="<?php  echo base_url() ?>bootstrap/js/responsiveslides.min.js"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: true,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
    
  </script>
    
</head>
<body>
<!-- header -->
<?php echo (isset($header_view)) ? $header_view : ''; ?>
<!--end_nav-->
<!-- Content Wrapper. Contains page content -->
<div class="container">
   
   <?php include_once('error_view.php');?>
    <?php echo (isset($content_for_layout)) ? $content_for_layout : ''; ?>
</div>
<!-- /.content-wrapper -->


    <!--start_footer-->
    <?php echo (isset($footer_view)) ? $footer_view : ''; ?>
    <!--end_footer-->

</div>
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
        
                             <script type="text/javascript">
                                $(window).load(function() {
                                    
                                    $("#flexiselDemo3").flexisel({
                                        visibleItems: 5,
                                        animationSpeed: 1000,
                                        autoPlay: true,
                                        autoPlaySpeed: 3000,            
                                        pauseOnHover: true,
                                        enableResponsiveBreakpoints: true,
                                        responsiveBreakpoints: { 
                                            portrait: { 
                                                changePoint:480,
                                                visibleItems: 2
                                            }, 
                                            landscape: { 
                                                changePoint:640,
                                                visibleItems: 3
                                            },
                                            tablet: { 
                                                changePoint:768,
                                                visibleItems: 3
                                            }
                                        }
                                    });
                                    
                                });
                                </script>
                                <script type="text/javascript" src="<?php  echo base_url() ?>bootstrap/js/jquery.flexisel.js"></script>
</body>
</html>

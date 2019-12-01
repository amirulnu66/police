<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <title><?php echo $__env->yieldContent('title','Police Line High School & College, Dinajpur'); ?> </title>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" /><meta name="author" />

    <?php if(settingsInfo()->institute_logo): ?>
     <link rel="shortcut icon" href="<?php echo e(URL::to('assets/settings/'.settingsInfo()->institute_logo)); ?>" />
     <?php endif; ?>
    
    <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css" />-->
    <!-- Global CSS -->

     <!-- Icon fonts -->
    <link rel="stylesheet" href="<?php echo e(url('frontend')); ?>/assets/fonts/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?php echo e(url('frontend')); ?>/assets/fonts/themify-icons/css/themify-icons.css">

    <link rel="stylesheet" href="<?php echo e(url('frontend/assets/plugins/bootstrap/css/bootstrap.min.css')); ?>">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?php echo e(url('frontend/assets/plugins/font-awesome/css/font-awesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('frontend/assets/plugins/flexslider/flexslider.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('frontend/assets/plugins/pretty-photo/css/prettyPhoto.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('frontend/assets/plugins/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('frontend/assets/css/bootstrap-datepicker.min.css')); ?>">
    <!-- Theme CSS -->
   <style>
        p
        {
            line-height: 1.25 !important;
        }
        .makeBold
        {
            font-weight: bold;
            text-transform: uppercase;
        }
        .clearMargin
        {
            padding-left: 0px;
        }
        .clearMarginR
        {
            padding-right: 0px;
        }
        
        #btnLanguage
        {
            border-right: 1px solid #c3c3c3;
            color: #7c7c7c;
            float: right;
            font-size: 12px;
            margin-right: 135px;
            margin-top: -190px;
            padding-right: 10px;
        }
        #btnLanguage a:hover
        {
            color: Blue;
        }
        .visitorCount
        {
            color: #6091BA;
        }
        .copyrightSclName
        {
            color: #6091BA;
        }
        .header .contact
        {
            font-size: 20px !important;
            margin-top: 10px !important;
        }
        
        a
        {
            font-family:SolaimanLipi !important;
            }
        p
        {
            font-family:SolaimanLipi !important;
            } 
         
    </style>

    <!-- main css file -->  
    <!-- page-calendar -->
    <link rel="stylesheet" href="<?php echo e(url('frontend/assets/pg-calendar/css/ui.css')); ?>">
    <!-- page-calendar -->
    <link rel="stylesheet" href="<?php echo e(url('frontend/assets/pg-calendar/css/pignose.calendar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('frontend/assets/pg-calendar/css/style.css')); ?>">
   
    <link rel="stylesheet" href="<?php echo e(url('frontend/assets/css/new-style.css')); ?>">
    

    <link id="Link1" rel="stylesheet" href="<?php echo e(url('frontend/assets/css/old-styles.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(url('frontend/assets/css/meanmenu.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('frontend/assets/css/responsive.css')); ?>">
    <!-- jquery cdn -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>
<body class="home-page">
    <div id="body-bg-colorID" class="wrapper body-bg-color">
        <div>  
            <!-- ******HEADER****** -->
            <!-- ******HEADER****** -->
            <?php echo $__env->make('frontend.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <!--//main-nav-->
      
        <div class="clearfix"></div>
        <div class="content container">
            <!-- ******CONTENT****** -->
            <div class="row">
                <div class="col-md-12 clearMarginR">
                    <div>    
            <!--  top notice-->
        <?php echo $__env->yieldContent('top-marquee'); ?>  

            <!-- col-md-9 -->
        <?php echo $__env->yieldContent('contant'); ?>
    <!--//section-content-->

        <!-- main side bar -->
        <?php echo $__env->yieldContent('side-bar'); ?>

                    </div>
                    

                </div>
            </div>
            <div style="clear: both"></div>
            
        </div>
        <div style="clear: both"></div>

    </div>
    <!-- ******FOOTER****** -->

    <?php echo $__env->make('frontend.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- add new -->
    <!-- <script src="<?php echo e(url('frontend')); ?>/assets/js/vendors.bundle.js"></script> -->
    <!-- <script src="<?php echo e(url('frontend')); ?>/assets/js/scripts.js"></script> -->

    <script type="text/javascript" src="<?php echo e(url('frontend/assets/plugins/jquery-migrate-1.2.1.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(url('frontend/assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('frontend/assets/plugins/bootstrap-hover-dropdown.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('frontend/assets/plugins/back-to-top.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('frontend/assets/plugins/jquery-placeholder/jquery.placeholder.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('frontend/assets/plugins/pretty-photo/js/jquery.prettyPhoto.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('frontend/assets/plugins/flexslider/jquery.flexslider-min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('frontend/assets/plugins/jflickrfeed/jflickrfeed.min.js')); ?>"></script>
    <!-- responsive menu -->
    <script src="<?php echo e(url('frontend/assets/js/jquery.meanmenu.min.js')); ?>"></script>
    <!-- <script src="assets/js/mains.js"></script> -->
    <script type="text/javascript" src="<?php echo e(url('frontend/assets/js/main.js')); ?>"></script>


    <!--canvas Pie Charts-->
    <script type="text/javascript" src="<?php echo e(url('frontend/assets/plugins/Chart.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('frontend/assets/plugins/owl.carousel.min.js')); ?>"></script>
    <!-- databatle -->
    <script src="<?php echo e(url('/frontend/assets/js/datatables/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url('/frontend/assets/js/datatables/dataTables.bootstrap.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url('/frontend/assets/js/bootstrap/bootstrap-waitingfor.min.js')); ?>" type="text/javascript"></script>

    <!--page calender  -->
    <script src="<?php echo e(url('/frontend/assets/pg-calendar/js/moment.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url('/frontend/assets/pg-calendar/js/pignose.calendar.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url('/frontend/assets/js/bootstrap-datepicker.min.js')); ?>" type="text/javascript"></script>

    <?php echo $__env->yieldContent('js-script'); ?>
    
    <!--class topper slide  -->
    <script type="text/javascript">
               $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:6
                }
            }
        }); 
    </script>
    <!-- background change -->

</body>

</html>


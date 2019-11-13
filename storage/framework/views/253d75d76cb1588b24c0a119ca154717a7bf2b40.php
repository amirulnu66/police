<?php $__env->startSection('title'); ?>
<?php $__env->startSection('top-marquee'); ?>
    <?php echo $__env->make('frontend.layouts.notice.top-news', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contant'); ?>
    <div class="col-md-9 clearMargin">

        <!-- home slider -->
        <div id="promo-slider" class="slider flexslider">
            <ul class="slides">
            <?php if(!empty($homeSlides)): ?>    
                <?php $__currentLoopData = $homeSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <img src="<?php echo e(URL::to('/assets/slider/'.$slide->slide_image)); ?>" alt="slide image" />
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
            <?php endif; ?>    
            </ul>
            <!--//slides-->
        </div>


    <div id="MainContent_UpdatePanel1">          
        <section class="news history-panel">
            <h1 class="section-heading text-highlight">
                <?php if(settingsInfo()): ?>
                <span class="line"><?php echo e(settingsInfo()->institute_name); ?> </span></h1>
                <?php endif; ?>
         <div class="row,line">
             <div id="MainContent_Div4 ">
              <div class="single-post col-md-12 col-xs-12 text-wrapper">
                <?php if(instituteHistory()->history_desc): ?>
                <div class="text sub-text">
                    <p><?php echo e(Str::words(instituteHistory()->history_desc,70)); ?>

                       
                        <a class="btn-details pull-right" href="<?php echo e(URL::to('/institute/history')); ?>" target="_blank">বিস্তারিত</a></p>
                </div> <!-- /.sub-text -->
                <?php endif; ?>
            </div> <!-- /.single-post -->
            
            </div>
        </div>

        </section>              
 <!--//news htecr-panel-->           
</div>

    <div id="MainContent_UpdatePanel1">          
        <section class="news htecr-panel">
         <div class="row line">
             <div id="MainContent_Div4">
              <div class="single-post col-md-6 col-sm-6 col-xs-12 h-teacher30">
                <h1 class="section-heading text-highlight">
                <span class="line">সভাপতির বাণী  </span></h1>
            <!-- this method get helpers.php     -->    
                <?php if(directorMsgInfo()): ?>
                <div class="img-holder message-inner">
                     <?php if(directorMsgInfo()->teacher_image): ?>
                    <img style="margin-bottom: 10px;" src="<?php echo e(URl::to('assets/speech/'.directorMsgInfo()->teacher_image)); ?>" alt="Image" width="370" height="280">
                     <?php else: ?>
                    <img class="img-responsive" src="<?php echo e(URL::to('frontend/default/img.jpg')); ?>" alt="Image" height="290">
                    <?php endif; ?> 
                    
                </div>
                <div class="text-wrapper">
                    <div class="text tran4s">
                        <p style="padding: 0 15px;"><?php echo e(Str::words(directorMsgInfo()->teacher_desc,35)); ?>

                        <a class="btn-details pull-right" href="<?php echo e(URL::to('/message/from/director-message')); ?>" target="_blank">বিস্তারিত</a></p>
                    </div> <!-- /.text -->
                </div> <!-- /.text-wrapper -->
            <?php endif; ?>    
            </div> <!-- /.single-post -->

            <div class="single-post col-md-6 col-sm-6 col-xs-12">
                <h1 class="section-heading text-highlight">
                <span class="line">অধ্যক্ষের বাণী  </span></h1>
              <?php if(hteacherMsgInfo()): ?>    
                <div class="img-holder message-inner">
                    <?php if(hteacherMsgInfo()->teacher_image): ?>
                    <img style="margin-bottom: 10px;" src="<?php echo e(URl::to('assets/speech/'.hteacherMsgInfo()->teacher_image)); ?>" alt="Image" width="370" height="280">
                    <?php else: ?>
                    <img class="img-responsive" src="<?php echo e(URL::to('frontend/default/img.jpg')); ?>" alt="Image" height="270">
                    <?php endif; ?>
                    
                </div>
                <div class="text-wrapper">
                    <div class="text tran4s">
                        <p style="padding: 0 15px;"><?php echo e(Str::words(hteacherMsgInfo()->teacher_desc,35)); ?>

                            <a class="btn-details pull-right" href="<?php echo e(url('/message/head/teacher-message')); ?>" target="_blank">বিস্তারিত</a>
                        </p>
                    </div> <!-- /.text -->
                </div> <!-- /.text-wrapper -->
            <?php endif; ?>     
            </div> <!-- /.single-post -->
            
            </div>
        </div>

        </section>              
 <!--//news htecr-panel-->           
</div>

<!-- bublic exam result -->
        <div style="margin-bottom: 10px; margin-top: -.01px;">
            <h1 class="section-heading text-highlight">
                <span class="line">বিগত তিন বছরের পাবলিক পরীক্ষার ফলাফল</span></h1>  
                    <div class="clearfix"></div>
                    <?php echo $__env->make('frontend.layouts.public-result.public-exam-result', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                

            <!-- boder solic top in section -->

        <!-- class topper -->
        <!-- <div class="col-md-12">
            <div class="row">
                include('frontend.layouts.includes.class-topper')
                 
            </div>
        </div> -->
        <!--//col-md-12-->
                 <!-- boder solic top in section -->
            <div class="container" style="margin-top: 4px;">
                </div>

                <div class="section-content">
                    <h1 class="section-heading text-highlight">
                        <span id="MainContent_lblbtitle"></span>
                      
                    </h1>
                    <p>
                        <span id="MainContent_lblbcontent"></span>
                    </p>
                    
                </div>
        
           <div class="row">
            <div class="col-md-6">
                <section>
            <a href="#"><h1 class="section-heading text-highlight">
                <span class="line">প্রাতিষ্ঠানিক ভিডিও </span></h1></a>
                <div class="clender-inner">
                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/QNUSIOMb6vI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>


            <!--//section-content-->
            </section>
            </div>
            
            <div class="col-md-6">
                <section class="gallary photo-gallery">
                    <a href="#"><h1 class="section-heading text-highlight">
                    <span class="line">ফটো গ্যালারি</span></h1> </a> 
                    <div>
            <!-- this homePhotoGallery() method get form helpers.php -->
                <?php if(!empty(homePhotoGallery() AND homePhotoGallery()->count()>0)): ?>        
                    <?php $__currentLoopData = homePhotoGallery(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singlePhoto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>        
                    <div class="row thumblink border-bottom ">
                        <a href="<?php echo e(URL::to('/school/photo/photo-gallery')); ?>" target="_blank">
                           <div class="col-xs-3 col-sm-3 padding-unset">
                            <img src="<?php echo e(url('assets/galleries/'.$singlePhoto->gallery_image)); ?>" class="img-responsive home-photo-gallery" alt="Book Distribution" title="Book Distribution">

                            </div>
                           <div class="col-xs-9 col-sm-9 border-left"><span><?php echo e($singlePhoto->photo_title); ?></span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>    

                    </div>
                <!--//section-content-->
                </section>
            </div>
            </div> 
        <!--//row-->


    </div>
<!--//col-9 clearMargin-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('side-bar'); ?>

	<?php echo $__env->make('frontend.layouts.sideBar.sideBar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
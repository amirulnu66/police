    <div class="col-md-3 col-paddding">
        <!-- student attendance chart side abr -->
        <!-- include('frontend.layouts.includes.student-attendance-chart') -->
    <div class="clearfix"></div>
        <!-- teacher attendance side bar -->
        <!-- include('frontend.layouts.includes.teacher-attendance-chart') -->

    <div class="clearfix"></div>
        <!-- right side bar notice boradr -->
         <?php echo $__env->make('frontend.layouts.includes.notice-board', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="clearfix"></div>  
        
        <section class="links">
            <h1 class="section-heading text-highlight rightbar-link-bg">
                <span class="line">ডাউনলোড</span>
            </h1>
        <?php  $i=4  ?>    
        <?php if(!empty(notice())): ?>   
            <div class="download-inner" >
                <?php $__currentLoopData = notice(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($i>0): ?>
                <a href="<?php echo e(URL::to('assets/notices/'.$notice->notice_file)); ?>" target="_blank" class="tran3s"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><?php echo e($notice->notice_title); ?> </a><br>
                    <?php endif; ?>
                    <?php  $i--;  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        <?php endif; ?>    
            <!--//section-content-->
        </section>

         <div class="clearfix"></div>  
        
        <!-- right side abr important link -->
         <?php echo $__env->make('frontend.layouts.includes.importenLink', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

         <div class="clearfix"></div>  
        
        <!-- right side abr important link -->
         <?php echo $__env->make('frontend.layouts.includes.calender', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
    </div>
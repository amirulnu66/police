 <section class="achievements">
         <h1 class="section-heading text-highlight">
       <span class="line student-title"> আমাদের সেরা ছাত্র ছাত্রী </span> </h1>
       <!-- frontend\HomeController -->
        <?php if(!empty($academicTopper)): ?>
        <div id="MainContent_achievementDiv1" class="section-content" style="">   
            <div class="student-carousel owl-carousel owl-theme">
                <?php $__currentLoopData = $academicTopper; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                <div class="item">
                    
                    <img src="<?php echo e($topper->photo); ?>" alt="" height="100" />
                    <h3><?php echo e($topper->name); ?></h3>
                    <p><span><?php echo e($topper->batch); ?></span></p>
                    <p>Section: <span><?php echo e($topper->section); ?></span></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div> 
        <?php else: ?>

                        
            <h5 class="text-center" style="font-size: 16px; padding: 10px; letter-spacing: 1px; height: 60px; display: block;color: red;">
                <strong>No Records Found</strong> 
            </h5>

            
        <?php endif; ?>
            <!--//section-content-->
    </section>
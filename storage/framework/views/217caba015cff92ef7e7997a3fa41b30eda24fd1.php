 

<?php $__env->startSection('title'); ?>

<?php $__env->startSection('contant'); ?>
  <header class="page-heading clearfix">
                     <h1 class="heading-title pull-left">
                       <span id="MainContent_lblbtitle">অধ্যক্ষের বাণী   </span>
                     </h1>           
                     <div class="breadcrumbs pull-right">                       
                                          
                          <ul>
                              <li class="breadcrumbs-label">আপনি এখানে আছেন:</li>
                              <li> আমাদের কথা  <i class="fa fa-angle-right"></i> </li>
                              <li class="current">অধ্যক্ষের বাণী   </li>
                             
                          </ul> 
                     </div>
                </header>

                <div class="adivisors-details-area pt-100">

                        <div class="col-xl-4 col-lg-4 mb-30">
                            <div class="advisor-img mb-35">
                            <?php if(!empty(hteacherMsgInfo())): ?>
                              <?php if(hteacherMsgInfo()->teacher_image): ?>
                                  <img id="MainContent_PersonsImage" src="<?php echo e(url('assets/speech/'.hteacherMsgInfo()->teacher_image)); ?>" width="370" height="280" />
                               <?php else: ?>
                                <img class="img-responsive" src="<?php echo e(url('frontend/default/img.jpg')); ?>" alt="Image" height="380">
                                <?php endif; ?>
                              <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-8">
                            <div class="adivisor-text-2 white-bg">
                            <?php if(!empty(hteacherMsgInfo())): ?>
                                <div class="adivisor-text-heading d-flex mb-10">
                                    <div class="adivisor-text-title adivisor-text-title-2">
                                        <h4><?php echo e(hteacherMsgInfo()->teacher_name); ?> </h4>
                                    </div>
                                </div>
                                <div class="adivisor-para adivisor-para-2">

                                 <h4 style="text-align: justify;"> <?php echo e(hteacherMsgInfo()->teacher_desc); ?>

                                  <br><br>
                                  শুভেচ্ছান্তে,<br>
                                  প্রধান শিক্ষক,<br>
                                  <?php if(settingsInfo()->institute_name): ?>
                                    <?php echo e(settingsInfo()->institute_name); ?>।
                                  <?php endif; ?>

                                 </h4>

                                </div>

                            <?php endif; ?>
                                
                            </div>
                        </div>
                    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
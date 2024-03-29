<?php $__env->startSection('title'); ?>

<?php $__env->startSection('contant'); ?>
    <header class="page-heading clearfix">
        <h1 class="heading-title pull-left">
            নোটিশ
        </h1>
        <div class="breadcrumbs pull-right">
            <ul>
                <li class="breadcrumbs-label">আপনি এখানে আছেন:</li>
                <li> তথ্য <i class="fa fa-angle-right"></i> </li>
                <li class="current">নোটিশ</li>

            </ul>
        </div>
    </header>
    <div class="section-content">
        <div class="">
            <div class="details col-md-9 col-sm-8 col-xs-12">
                <span id="MainContent_lblbcontent">
 <!--This method get helpers.php AcademicNotices()  -->

            <div class="newsContent col-md-12 newsContent-notice">

                 
                 <!-- .//This variable get App\Providers\AppServiceProvider -->
                     <?php if(!empty($noticeList) AND count($noticeList)>0): ?>
                         

                 <?php $__currentLoopData = $noticeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="news-item page-row has-divider clearfix row">
                  <div class="row singel-section-notice">

                    <div class="col-md-12 col-xs-12" style="padding-top:0; margin-top:-20px;">
                  <!-- This togel have master.php  -->

                   <h4 class=" Event_news_aside" >

                       <a id="<?php echo e($notice->id); ?>" style="cursor: pointer;" class="notice" data-toggle="modal" data-target="#myModal" data-id="<?php echo e(date('d M, Y', strtotime($notice->date))); ?>" data-key="<?php echo e($notice->file); ?>" data-title="<?php echo e($notice->file_path); ?>" data-content="<?php echo e($notice->description); ?>">

                  <?php echo e($notice->title); ?>


                </a>

                 </h4>

                    </div>

                    </div>
                
               </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="clearfix"></div>
                    <?php else: ?>
                     <div class="clearfix"></div>
                    <div class="">
                      <h3 class="alert alert-danger text-center">No Records Found</h3>
                    </div>

                  <?php endif; ?>
                
            </div>

        </span>
            </div>

        </div><!-- .entry-content -->

        <!-- right sitebar here -->
        <div class="col-md-3 col-sm-4 col-xs-12">
            <?php echo $__env->make('frontend.layouts.includes.importenLink', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

    </div><!--//page-row-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-script'); ?>
<script>

    $(document).ready(function () {

        // notice click event

        $('.notice').click(function () {

            // notice date and title, description

            var title= $(this).text();

            var date = $(this).attr('data-id');

            var description = $(this).attr('data-content');



            // notice header and body

            var notice_date = $('#notice_date');

            var notice_header = $('#notice_header');

            var notice_body = $('#notice_body');



            var notice_file = $('#notice_file');

            var notice_file_container = $('#notice_file_container');





            var file = $(this).attr('data-key');

            if(file==1){

                var file_path = $(this).attr('data-title');

                // remove hidden class

                notice_file_container.removeClass('hidden');

                notice_file.attr('href', file_path);

            }else{

                notice_file.removeAttr('href');

                notice_file_container.addClass('hidden');

            }





            // replace modal header and body

            notice_date.html('');

            notice_date.html(date);

            notice_header.html('');

            notice_header.html(title);

            notice_body.html('');

            notice_body.html(description);

        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
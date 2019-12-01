<?php $__env->startSection('title'); ?>

<?php $__env->startSection('contant'); ?>
    <header class="page-heading clearfix">
        <?php if(!empty($pageInfo) AND $pageInfo->count()>0): ?>
            <h1 class="heading-title pull-left">
                <span id="MainContent_lbletitle"><?php echo e($pageInfo->page_title); ?></span>
            </h1>
            <div class="breadcrumbs pull-right">
                <ul>
                    <li class="breadcrumbs-label">আপনি এখানে আছেন:</li>
                    <li>আমাদের কথা  <i class="fa fa-angle-right"></i> </li>
                    <li class="current">	<?php echo e($pageInfo->page_title); ?></li>

                </ul>
            </div>
        <?php endif; ?>
    </header>
    <div class="section-content">
        <div class="entry-content">
            <div class="details col-md-9 col-sm-8 col-xs-12 paddingBot35">
                <?php if(!empty($pageInfo) AND $pageInfo->count()>0): ?>
                    <span id="MainContent_lblecontent"><h4><strong><?php echo e($pageInfo->sub_title); ?>-</strong></h4>
                  <h4 class="contant-text" style="text-align: justify;">
                    <?php echo str_replace('<ul><li>','<ul class=""',$pageInfo->page_desc) ?>
                  </h4>
                </span>
                <?php endif; ?>
            </div>

        </div><!-- .entry-content -->

        <!-- right sitebar here -->
        <div class="details col-md-3 col-sm-4 col-xs-12">
            <?php echo $__env->make('frontend.layouts.includes.importenLink', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

    </div><!--//page-row-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
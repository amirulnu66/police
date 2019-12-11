<?php $__env->startSection('title'); ?>
<?php $__env->startSection('contant'); ?>
<div class="details col-md-8 col-md-offset-2 col-xs-12 form-inner-bg margin-top80">
  <div class="col-md-12">
    <div class="row">
      <?php if(Session::has('success')): ?>
      <div id="w0-success-0" class="alert-success alert-auto-hide alert fade in" style="opacity: 423.642;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> <?php echo e(Session::get('success')); ?> </h4>
      </div>
      <?php elseif(Session::has('feiled')): ?>
      <div id="w0-success-0" class="alert-warning alert-auto-hide alert fade in" style="opacity: 423.642;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> <?php echo e(Session::get('feiled')); ?> </h4>
      </div>
      <?php elseif(Session::has('error')): ?>
      <div id="w0-success-0" class="alert-warning alert-auto-hide alert fade in" style="opacity: 423.642;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> <?php echo e(Session::get('error')); ?> </h4>
      </div>
      <?php endif; ?>
    </div>
    </div>   <!--.//col-->
    <span id="MainContent_lblbcontent">লগইন ফরম </span>
    <form id="applicant-login-form" action="<?php echo e(URL::to('/applicant-login')); ?>" method="post">
      <div class="col-sm-12 amission-form-bg">
        <div class="login-inner-section">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <div class="row">
            <div class="login-title">
              <p>Login to Your Account</p>
            </div>
            <div class="col-md-6 col-md-offset-3">
              <!-- <label for="username" class="control-label">User Name</label> -->
              <input type="text" name="username" id="username" class="form-control login-input" placeholder="Email Address" required>
            </div>
          </div><br>
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <!-- <label for="password" class="control-label">Password </label> -->
              <input type="password" name="password" id="password" class="form-control login-input" placeholder="Password" required>
              
            </div>
          </div>
          
          <div class="col-md-6 col-md-offset-3 col-xs-12  student-login">
            <div class="routine-btn">
              <button type="submit" id="applicant-login-form-btn" class="login-btn">Login</button>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </form>
  </div>


  <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('title'); ?>

<?php $__env->startSection('contant'); ?>
 <header class="page-heading clearfix">
     <h1 class="heading-title pull-left">
    <span id="MainContent_lbletitle"> ফিস ও পেমেন্টস </span>
     </h1>           
      <div class="breadcrumbs pull-right">                       
          <ul>
              <li class="breadcrumbs-label">আপনি এখানে আছেন:</li>
              <li> একাডেমিক  <i class="fa fa-angle-right"></i> </li>
              <li class="current">  একাডেমিক ফিস</li>
               
          </ul>  
     </div>
</header>

<div class="section-content">                     
     <div class="entry-content">
        <div class="details col-md-9 col-sm-8 col-xs-12">
       

                <?php if(Session::has('message')): ?>
                                   <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
                                   <?php endif; ?>
              
                 <hr>
                
     
        <button id="bKash_button" class="btn btn-success">Pay with bKash.</button>
        </div>

    </div><!-- .entry-content -->
    
 <!-- right sitebar here -->
 <div class="details col-md-3 col-sm-4 col-xs-12">
  <?php echo $__env->make('frontend.layouts.includes.importenLink', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
   </div><!--//page-row-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-script'); ?>
<script src="<?php echo e(URL::to('js/bKash-checkout-sandbox.js')); ?>"></script>
<script>
    $(document).ready(function () {
    var paymentRequest = { amount:<?php echo e($studentProfile->amount); ?>, intent: 'sale'};
    var id = "<?php echo e($studentProfile->invoice_id); ?>";
    var paymentID = null;
    var bKashCheckoutUrl = 'http://localhost:8000/bKash/';
    bKash.init({
      paymentMode: 'checkout',
      paymentRequest: paymentRequest,
      createRequest: function (request) {
        $.ajax({
          url: bKashCheckoutUrl + "create-checkout?id=" + id,
          type: 'GET',
          contentType: 'application/json',
          dataType: "json",
          beforeSend: function () {
            
          },
          success: function (obj) { 
            if (obj.status == "success" && obj.bkash.paymentID != undefined) {
              id=obj.uuid;
              bKash.create().onSuccess(obj.bkash);
            } else{
              $("#bkash-alert").html(obj.bkash.message);
              bKash.create().onError();
            }
          },
          error: function () {
            bKash.create().onError();
          }
        });
      },

      executeRequestOnAuthorization: function () {
          $.ajax({
          url: bKashCheckoutUrl + "execute-checkout?id=" + id,
          type: 'GET',
          contentType: 'application/json',
          dataType: "json",
          beforeSend: function () {
          },
          success: function (obj) {
            if (obj.status == "success") {
              // location.reload()
              window.location.href = "<?php echo e(URL::to('/bkash-success')); ?>";
              // alert('success') // redeict paymetn success page 

            }else if(obj.bkash.errorCode != undefined){
              $("#bkash-alert").html(obj.bkash.errorMessage);
              bKash.execute().onError();
            } else { 
              $("#bkash-alert").html(obj.bkash.message);
              bKash.execute().onError();
            }
          },
          error: function () {
            bKash.execute().onError();
          }
        });
        
      },
      onClose: function () {

      }
    });

    $("#home-redirect").click(function (e) {
      e.preventDefault();
      $("#bKash_button").hide();
      $("#bkashcheckout-loading-btn").show();
      window.location.replace(paymentUrl + "?invoice=" + invoice + "&default_network=bkashcheckout");
    })
    setTimeout(function () {
      clickPayButton(); 
    }, 10);



    });

    function callReconfigure(val) {
      bKash.reconfigure(val);
    }

    function clickPayButton() {
       //alert("ji");
      $("#bKash_button").trigger('click');
    }





  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
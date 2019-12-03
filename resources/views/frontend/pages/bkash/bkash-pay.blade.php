@extends('frontend.master')

@section('title')

@section('contant')
<style>
  .displayHide{
    display: none;
  }
</style>
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
       

                @if(Session::has('message'))
                                   <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                   @endif
                 <div id="bkashalert" class="alert alert-danger displayHide"> </div>
              
                 <hr>
                
     
        <button id="bKash_button" class="btn btn-success">Pay with bKash.</button>
        </div>

    </div><!-- .entry-content -->
    
 <!-- right sitebar here -->
 <div class="details col-md-3 col-sm-4 col-xs-12">
  @include('frontend.layouts.includes.importenLink')
</div>
   </div><!--//page-row-->
@endsection

@section('js-script')
<script src="{{ URL::to('js/bKash-checkout-sandbox.js') }}"></script>
<script>
    $(document).ready(function () {
    var paymentRequest = { amount:40, intent: 'sale'};
    var id = "{{ $studentProfile->invoice_id }}";
    var paymentID = null;
    var bKashCheckoutUrl = 'https://plhsd.edu.bd/bKash/';
    // var bKashCheckoutUrl = 'http://localhost:8000/bKash/';
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
              // alert(obj.bkash.message);
              $("#bkashalert").removeClass('displayHide').html(obj.bkash.message);
              // $("#bkashalert").html(obj.bkash.message);
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
              window.location.href = "{{ URL::to('/bkash-success') }}";
              // alert('success') // redeict paymetn success page 

            }else if(obj.bkash.errorCode != undefined){
              // $("#bkashalert").html(obj.bkash.errorMessage);
              $("#bkashalert").removeClass('displayHide').html(obj.bkash.errorMessage);
              bKash.execute().onError();
            } else { 
              // $("#bkashalert").html(obj.bkash.message);
              $("#bkashalert").removeClass('displayHide').html(obj.bkash.message);
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

@endsection
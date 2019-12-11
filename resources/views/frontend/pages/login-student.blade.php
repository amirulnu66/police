@extends('frontend.master')
@section('title')
@section('contant')
<div class="details col-md-8 col-md-offset-2 col-xs-12 form-inner-bg margin-top80">
  <div class="col-md-12">
    <div class="row">
      @if(Session::has('success'))
      <div id="w0-success-0" class="alert-success alert-auto-hide alert fade in" style="opacity: 423.642;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> {{ Session::get('success') }} </h4>
      </div>
      @elseif(Session::has('feiled'))
      <div id="w0-success-0" class="alert-warning alert-auto-hide alert fade in" style="opacity: 423.642;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> {{ Session::get('feiled') }} </h4>
      </div>
      @elseif(Session::has('error'))
      <div id="w0-success-0" class="alert-warning alert-auto-hide alert fade in" style="opacity: 423.642;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> {{ Session::get('error') }} </h4>
      </div>
      @endif
    </div>
    </div>   <!--.//col-->
    <span id="MainContent_lblbcontent">লগইন ফরম </span>
    <form id="applicant-login-form" action="{{URL::to('/applicant-login')}}" method="post">
      <div class="col-sm-12 amission-form-bg">
        <div class="login-inner-section">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
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


  @stop
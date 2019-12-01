@extends('frontend.master')

@section('title')

@section('contant')
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
              
            <div class="alert alert-success">
                <strong>Success</strong> Your bkash payment has been processed successfully and admission is confirmed.
              </div>
        </div>

    </div><!-- .entry-content -->
    
 <!-- right sitebar here -->
 <div class="details col-md-3 col-sm-4 col-xs-12">
  @include('frontend.layouts.includes.importenLink')
</div>
   </div><!--//page-row-->
@endsection

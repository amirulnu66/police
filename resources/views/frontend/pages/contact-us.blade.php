 @extends('frontend.master')

@section('title')

@section('contant')
 <header class="page-heading clearfix">
        <h1 class="heading-title pull-left">
            যোগাযোগের তথ্য
            
        </h1>
        <div class="breadcrumbs pull-right">
            <ul>
                <li class="breadcrumbs-label">আপনি এখানে আছেন:</li>
                <li>যোগাযোগ </li>
            </ul>
        </div>
    </header>

    <article class="contact-form col-md-12 col-xs-12  page-row">
        <div class="col-md-8 col-md-offset-2">
            <div class="designAside content-info">
                @if(!empty(settingsInfo())) 
                <h5>
                    <span id="MainContent_lblSchoolName">  {{settingsInfo()->institute_name}}</span>
                </h5>
                
                <div>
                    <i style="padding-right: 15px" class="fa fa-home"></i>
                    <span id="MainContent_lblContactNumber">{{settingsInfo()->institute_address}} </span><br />
                    
                    <i style="padding-right: 15px" class="fa fa-phone-square"></i>
                    <span id="MainContent_lblContactNumber">{{settingsInfo()->phone_number}} </span><br />
                    
                    <i style="padding-right: 15px" class="fa fa-envelope-o"></i><a href="#">
                        <span id="MainContent_lblEmail">{{settingsInfo()->email}}</span></a><br />
                    
                    <br />

                </div>
                @endif
            </div>
        </div>
        <div class="goolge-map">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3597.5854450676234!2d88.638008615437!3d25.61868818370185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fb5284ff07b229%3A0x9cd47ed7ac8fb386!2sDinajpur%20Police%20Lines%20High%20School!5e0!3m2!1sen!2sbd!4v1572078805747!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

        </div>
    </article>
    
    <!-- right site bar -->

@stop

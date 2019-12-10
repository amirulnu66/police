@extends('frontend.master')

@section('title')

@section('contant')
<header class="page-heading clearfix">
    <h1 class="heading-title pull-left">
        <span id="MainContent_lblbtitle">অ্যাডমিশন  </span>
    </h1>
    <div class="breadcrumbs pull-right">
        <ul>
            <li class="breadcrumbs-label">আপনি এখানে আছেন:</li>
            <li>  ভর্তি কার্যক্রম <i class="fa fa-angle-right"></i> </li>
            <li class="current">অ্যাডমিশন   </li>

        </ul>
    </div>
</header>
<div class="details col-md-10 col-md-offset-1 col-xs-12 form-inner-bg">
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
                <h4><i class="icon fa fa-check"></i> {{ Session::get('warning') }} </h4>
            </div>
            @endif
        </div>
    </div>   <!--.//col-->

    <div class="admison-heade-section">
        <div class="col-sm-2 form-logo-inner">
           @if(settingsInfo()->institute_logo)
           <img class="admision-form-logo" src="{{url('assets/settings/'.settingsInfo()->institute_logo)}}" alt="logo" width="90" height="90">
           @endif
       </div>
       @if(!empty(settingsInfo())) 
       <div class="col-sm-10">

        <h2 class="admission-scl-name">{{settingsInfo()->institute_name}} </h2>

        <h3 class="admission-scl-adderss">{{settingsInfo()->institute_address}} </h3>
        <p><span><strong>e-mail:</strong>{{settingsInfo()->email}} </span>
            <span><strong>Phone:</strong> {{settingsInfo()->phone_number}} </span>
        </p>

    </div>
    @endif
    <div class="clear-fix"></div>

</div>
<span id="MainContent_lblbcontent">ভর্তির আবেদন ফরম</span>

<form id="myform" method="post" action="{{URL::to('/online/admission/data/store')}}">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="campus_id" value="{{env('CAMPUS_ID')}}">
    <input type="hidden" name="institute_id" value="{{env('INSTITUTE_ID')}}">
    <input type="hidden" name="email" value="{{env('CAMPUS_ID').env('INSTITUTE_ID').rand(10,100).rand(101,1000)}}@gmail.com">
    <input type="hidden" name="username" value="{{env('CAMPUS_ID').env('INSTITUTE_ID').rand(10,100).rand(101,1000)}}">
    <input type="hidden" name="password" value="123456">
    <input type="hidden" name="confirm_password" value="123456">
    <div class="col-sm-12 amission-form-bg">
        <div class="row">
            <div class="col-md-12">
                <legend style="margin-top: 15px;">
                    <abbr title="" data-toggle="tooltip" data-original-title="Enter your personal information like">
                        <i class="fa fa-user"></i>
                        শিক্ষার্থীর তথ্য
                    </abbr>
                </legend>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 form-group">
                <label>শিক্ষার্থীর নাম(বাংলায়) *</label>
                <input type="text" name="std_name_bn" class="form-control" required>
            </div>
            <div class="col-sm-6 form-group">
                <label>শিক্ষার্থীর নাম(English)  *</label>
                <input type="text" name="std_name" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 form-group">
                <label>জন্ম তারিখ (জন্ম সনদ অনুযায়ী) * </label>
                <input type="text" name="birth_date" class="form-control " required>
            </div>
            <div class="col-md-6">
                <label for="gender" class="control-label">লিঙ্গ *</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="" disabled selected>---Select Gender---</option>
                    <option value="0" >Male</option>
                    <option value="1">Female</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 form-group">
            <label>জাতীয়তা *</label>
                <select class="form-control" id="nationality" name="nationality" required>
                    <option value="">--- Select Nationality ---</option>
                    <option value="1">Bangladeshi</option>
                </select>
            <!--<input type="text" name="nationality" class="form-control" required>-->
            </div>
            <div class="col-sm-4 form-group">
                <label>ধর্ম * </label>
                <select class="form-control" id="religion" name="religion" required>
                    <option value="" disabled selected>---Select Religion ---</option>
                     <option value="1">Islam</option>
                    <option value="2">Hinduism</option>
                    <option value="3">Christian</option>
                    <option value="4">Buddhism</option>
                    <option value="5">Others</option>
                </select>
            </div>
            <div class="col-sm-4 form-group">
                <label>ছবি * </label>
                <input type="file" id="photoUpload" name="std_photo" onchange="previewPhotoInput(this)" required class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <legend>
                    <abbr title="" data-toggle="tooltip" data-original-title="Enter your personal information like">
                        <i class="fa fa-user"></i>
                        পিতার তথ্য
                    </abbr>
                </legend>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 form-group">
                <label>পিতার নাম(বাংলায়) *</label>
                <input type="text" name="father_name_bn" class="form-control" required>
            </div>
            <div class="col-sm-6 form-group">
                <label>পিতার নাম(English) *</label>
                <input type="text" name="father_name" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 form-group">
                <label>পেশা *</label>
                <input type="text" name="father_occupation" class="form-control" required>
            </div>
            <div class="col-sm-6 form-group">
                <label>(প্রযোজ্য খেত্র) শিক্ষাগত যোগ্যতা </label>
                <input type="text" name="father_education" class="form-control" >
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <legend>
                    <abbr title="" data-toggle="tooltip" data-original-title="Enter your personal information like">
                        <i class="fa fa-user"></i>
                        মাতার তথ্য
                    </abbr>
                </legend>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 form-group">
                <label>মাতার নাম (বাংলায়) *</label>
                <input type="text" name="mother_name_bn" class="form-control" required>
            </div>
            <div class="col-sm-6 form-group">
                <label>মাতার নাম (English) *</label>
                <input type="text" name="mother_name" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 form-group">
                <label>পেশা *</label>
                <input type="text" name="mother_occupation" class="form-control" required>
            </div>
            <div class="col-sm-6 form-group">
                <label>(প্রযোজ্য খেত্র) শিক্ষাগত যোগ্যতা </label>
                <input type="text" name="mother_education" class="form-control" >
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <legend>
                    <abbr title="" data-toggle="tooltip" data-original-title="Enter your personal information like">
                        <i class="fa fa-map-marker"></i>
                        বর্তমান ঠিকানা
                    </abbr>
                </legend>
            </div>
            <div class="col-sm-6 form-group">
                <label>গ্রাম/মহল্লা *</label>
                <input type="text" name="add_pre_address" class="form-control" required>
            </div>
            <div class="col-sm-6 form-group">
                <label>ডাকঘর *</label>
                <input type="text" name="add_pre_post"  class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 form-group">
                <label>পিতার মোবাইল *</label>
                <input type="number" name="add_pre_phone" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="present" class="control-label">জেলা *</label>
                <select class="form-control state" id="present" name="add_pre_state" required>
                    <option value="" disabled selected>---Select One---</option>
                    @if($stateList)
                        @foreach($stateList as $index=>$state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    @endif

                </select>
            </div>
            <div class="col-md-4">
                <label for="pre_city" class="control-label">উপজেলা *</label>
                <select class="form-control" id="city_present" name="add_pre_city" required>
                    <option value="" selected>---Select One---</option>
                </select>

            </div>
        </div>
    <!--.//present address-->

        <div class="row">
            <div class="col-md-12">
                <legend>
                    <abbr title="" data-toggle="tooltip" data-original-title="Enter your personal information like">
                        <i class="fa fa-map-marker"></i>
                        স্থায়ী ঠিকানা
                    </abbr>
                </legend>
            </div>
            <div class="col-sm-6 form-group">
                <label>গ্রাম/মহল্লা *</label>
                <input type="text" name="add_per_address" class="form-control" required>
            </div>
            <div class="col-sm-6 form-group">
                <label>ডাকঘর *</label>
                <input type="text" name="add_per_post" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 form-group">
                <label>মোবাইল *</label>
                <input type="number" name="add_per_phone" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="per_state" class="control-label">জেলা *</label>
                <select class="form-control state" id="permanent" name="add_per_state" required>
                    <option value="" disabled selected>---Select One---</option>
                    @if($stateList)
                        @foreach($stateList as $index=>$state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    @endif

                </select>
            </div>
            <div class="col-md-4">
                <label for="per_city" class="control-label">উপজেলা *</label>
                <select class="form-control" id="city_permanent" name="add_per_city" required>
                    <option value="" selected>---Select One---</option>
                </select>
            </div>
        </div>
        <!--.//permanent address-->

        <div class="row">
            <div class="col-md-12">
                <legend>
                    <abbr title="" data-toggle="tooltip" data-original-title="Enter your personal information like">
                        <i class="fa fa-home"></i>
                        অভিভাবকের তথ্য

                    </abbr>
                </legend>
            </div>

            <div class="col-sm-6 form-group">
                <label>অভিভাবকের নাম (যদি প্রয়োজন হয়)</label>
                <input type="text" name="gud_name" class="form-control" >
            </div>
            <div class="col-sm-6 form-group">
                <label>মোবাইল *</label>
                <input type="number" name="gud_phone" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 form-group">
                <label>পিতা/মাতা/অভিভাবকের বাৎসরিক আয়(টাকা) *</label>
                <input type="text" name="gud_income" class="form-control" required>
            </div>
            <div class="col-sm-6 form-group">
                <label>পিতা/মাতা/অভিভাবকের বাৎসরিক আয়(কথায়) *</label>
                <input type="text" name="gud_income_bn" class="form-control" required>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <legend>
                    <abbr title="" data-toggle="tooltip" data-original-title="Enter your personal information like">
                        <i class="fa fa-home"></i>
                        যে শ্রেণীতে ভর্তি হতে চায়

                    </abbr>
                </legend>
            </div>
            <div class="col-md-4">
                <label for="academic_year" class="control-label">প্রাতিষ্ঠানিক বৎসর *</label>
                <select class="form-control academicYear" id="academic_year" name="academic_year">
                    <option value="" disabled selected>Select Academic Year</option>
                    @if(!empty($academicYearList) AND count($academicYearList->data)>0)
                        @foreach($academicYearList->data as $year)
                            <option value="{{$year->id}}">{{$year->year_name}}</option>
                        @endforeach
                    @endif
                </select>

            </div>
            <div class="col-md-4">
                <label for="academic_level" class="control-label">প্রাতিষ্ঠানিক লেভেল *</label>
                <select class="form-control academicLevel" id="academic_level" name="academic_level" required>
                    <option value="" disabled selected="">---Select Level---</option>

                </select>

            </div>
            <div class="col-md-4">
                <label for="batch" class="control-label">শ্রেণী *</label>
                <select class="form-control academicBatch" id="batch" name="batch" required>
                    <option value="" disabled selected="">---Select class---</option>
                </select>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-md-12">
                <legend>
                    <abbr title="" data-toggle="tooltip" data-original-title="Enter your personal information like. First name, Middle name, Last name, Gender, DOB, etc.">
                        <i class="fa fa-home"></i>
                        অনান্য তথ্য
                    </abbr>
                </legend>
            </div>

            <!-- <div class="col-sm-12">
                <div class="row" style="margin-bottom: 10px;">
                <div class="col-sm-6">
                    <label>বিশেষ যত্ন (ওটিজম) হ্যাঁ &nbsp;   </label>
                   <input type="checkbox" name="special_care" value="1" >&nbsp; না &nbsp;
                   <input type="checkbox" name="special_care" value="0" >&nbsp;(টিক দিন) *
                </div>
                 <div class="col-sm-6">
                    <label>নৃতাত্ত্বিক জনগোষ্ঠির হ্যাঁ &nbsp;    </label>
                   <input type="checkbox" name="tribal" value="1" >&nbsp; না &nbsp;
                   <input type="checkbox" name="tribal" value="0" >&nbsp;(টিক দিন) *
                </div>
               </div>
            </div> -->

            </div>


    <div class="row">
        <div class="col-sm-4 form-group">
            <label>সমাপনী পরীক্ষায় প্রাপ্ত (জি পি এ)</label>
            <input type="text" name="psc_gpa" class="form-control" >
        </div>
        <div class="col-sm-4 form-group">
            <label>সমাপনী পরীক্ষার রোল নম্বর </label>
            <input type="text" name="psc_roll" class="form-control" >
        </div>
        <div class="col-sm-4 form-group">
            <label>পাসের সন</label>
            <input type="text" name="psc_year" class="form-control" >
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 form-group">
            <label>JSC পরীক্ষায় প্রাপ্ত (জি পি এ)</label>
            <input type="text" name="jsc_gpa" class="form-control" >
        </div>
        <div class="col-sm-4 form-group">
            <label>JSC পরীক্ষার রোল নম্বর </label>
            <input type="text" name="jsc_roll" class="form-control" >
        </div>
        <div class="col-sm-4 form-group">
            <label>JSC পাসের সন</label>
            <input type="text" name="jsc_year" class="form-control" >
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 form-group">
            <label>বিদ্যালয়ের নাম </label>
            <input type="text" name="psc_school" class="form-control" >
        </div>
        <div class="col-sm-4 form-group">
            <label>প্রশংসাপত্র/ছাড়পত্র নম্বর</label>
            <input type="text" name="psc_tes_no" class="form-control" >
        </div>
        <div class="col-sm-4 form-group">
            <label>তারিখ</label>
            <input type="text" readonly name="psc_tes_date" class="form-control datepicker" >
        </div>
    </div>

        <div class="form-group student-panel">
            <div class="routine-btn">
                <button type="submit" class="p-color-bg themehover">Submit</button>
            </div>
        </div>
    </div>
    </form>
</div>

@stop


@section('js-script')
    <script>
      $(document).ready(function () {
                //datepicker calender                      
                $('.datepicker').datepicker();
                var campus_id = "{{env('CAMPUS_ID')}}";
                var institute_id = "{{env('INSTITUTE_ID')}}";

                jQuery(document).on('change','.state', function(){
                            // get academic level id
                            var state_type = $(this).attr('id');
                            var state_id = $(this).val();
                            // checking
                            if(state_id){
                                $.ajax({
                                    url: "/ems/city-list/"+state_id,
                                    type: 'GET',
                                    cache: false,
                                    datatype: 'application/json',

                                    beforeSend: function() {
                                    },

                                    success:function(data){
                                        var op = null;
                                        op += '<option value="" selected>--- Select City ---</option>';
                                        // set city list
                                        var city = $('#city_'+state_type);
                                        city.html('');
                                        // checking
                                        if(data.length>0){
                                            for (var i=0; i<data.length; i++) {
                                                op += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                                            }    
                                        } 
                                        // append
                                        city.append(op);                               
                                    },

                                    error:function(){
                                        //alert(JSON.stringify(data));
                                    }
                                });
                            }
                        });

                // request for batch list using level id
                jQuery(document).on('change','.academicYear',function(){
                    // console.log("hmm its change");

                    // get academic year id
                    var year_id = $(this).val();
                    var div = $(this).parent();
                    var op="";

                    // checking
                    if(campus_id && institute_id){
                        $.ajax({
                            url: "/get-academic-level-list",
                            type: 'GET',
                            cache: false,
                            data: {
                                "institute":institute_id,
                                "campus":campus_id,
                                "id":year_id
                            }, //see the $_token
                            datatype: 'application/json',

                            beforeSend: function() {
                                // clear std list container
                                $('#std_list_container_row').html('');
                            },

                            success:function(response){
                                console.log(response.data);
                                // checking
                                if(response.status=='success'){
                                    var data = response.data;
                                    //console.log(data.length);
                                    op+='<option value="0" selected>--- Select Level ---</option>';
                                    for(var i=0;i<data.length;i++){
                                        // console.log(data[i].level_name);
                                        op+='<option value="'+data[i].id+'">'+data[i].level_name+'</option>';
                                    }
                                   
                                    // set value to the academic batch
                                    $('.academicBatch').html("");
                                    $('.academicBatch').append('<option value="" selected>--- Select Class ---</option>');

                                    // set value to the academic batch
                                    $('.academicLevel').html("");
                                    $('.academicLevel').append(op);
                                }else{
                                    alert(response.msg);
                                }
                            },

                            error:function(data){
                                alert(JSON.stringify(data));
                            }
                        });
                    }else{
                        // alert
                        alert('School Information not found');
                    }
                });

                // request for batch list using level id
                jQuery(document).on('change','.academicLevel',function(){
                    // console.log("hmm its change");

                    // get academic level id
                    var level_id = $(this).val();
                    var div = $(this).parent();
                    var op="";

                    // checking
                    if(campus_id && institute_id){
                        $.ajax({
                            url: "/get-academic-batch-list",
                            type: 'GET',
                            cache: false,
                            data: {
                                "institute":institute_id,
                                "campus":campus_id,
                                "id":level_id
                            }, //see the $_token
                            datatype: 'application/json',

                            beforeSend: function() {
                                // clear std list container
                                $('#std_list_container_row').html('');
                            },

                            success:function(response){
                                if(response.status=='success') {
                                    var data = response.data;

                                    //console.log(data.length);
                                    op += '<option value="" selected>--- Select Class ---</option>';
                                    for (var i = 0; i < data.length; i++) {
                                        op += '<option value="' + data[i].id + '">' + data[i].batch_name + '</option>';
                                    }

                                    // set value to the academic batch
                                    $('.academicBatch').html("");
                                    $('.academicBatch').append(op);
                                }else {
                                    alert(response.msg);
                                }
                            },

                            error:function(){
                                alert(JSON.stringify(data));
                            }
                        });
                    }else{
                        // alert
                        alert('School Information not found');
                    }
                });
                
                 //checkbox selected method
               // $('input[type="checkbox"]').on('change', function() {
               //      $('input[name="' + this.name + '"]').not(this).prop('checked', false);
               //  });

            });
    </script>

@endsection
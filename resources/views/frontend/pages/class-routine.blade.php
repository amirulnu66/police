 @extends('frontend.master')

@section('title')

@section('contant')
                                            
<header class="page-heading clearfix">
     <h1 class="heading-title pull-left">
      ক্লাস রুটিন
     </h1>           
     <div class="breadcrumbs pull-right">                       
          <ul>
              <li class="breadcrumbs-label">আপনি এখানে আছেন:</li>
              <li> একাডেমিক <i class="fa fa-angle-right"></i> </li>
              <li class="current"> ক্লাস রুটিন</li>
               
          </ul>  
     </div>
</header>

<div class="section-content">                     
     <div class="entry-content step-container">
       <div class="details col-md-9 col-sm-8 col-xs-12">
          <span id="MainContent_lblbcontent">
          <div class="course-item-wrapper border-top2">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 student-database">
               <form id="time_table_search_form" class="form-horizontal">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                        <div class="col-md-3">
                            <label for="firstname" class="control-label">Level</label>
                            <select class="form-control academicLevel" id="academic_level" name="academic_level">
                              <option value="" disabled selected>Choose an option</option>
                              @if(!empty($academicLevelList))
                                @foreach($academicLevelList as $level)
                                  <option value="{{$level->id}}">{{$level->level_name}}</option>
                                @endforeach
                              @endif
                            </select>
                        </div>
                        <div class="col-md-3">
                       <label for="firstname" class="control-label">Batch</label>
                        <select class="form-control academicBatch" id="batch" name="batch">
                        <option value="" disabled selected>Choose an option</option>
                      </select>
                      </div>

                    <div class="col-md-3">
                      <label for="firstname" class="control-label">Section</label>
                      <select class="form-control academicSection" id="section" name="section">
                        <option value="" disabled selected>Choose an option</option>
                      </select>
                    </div>

                    <div class="col-md-3">
                      <label for="firstname" class="control-label">Shift</label>
                      <select class="form-control academicShift" id="shift" name="shift">
                        <option value="" disabled selected>Choose an option</option>
                        <option value="0">Day</option>
                        <option value="1">Morning</option>
                      </select>
                    </div>
                </div><br>

                <div class="row">   
                          <div class="col-md-12 col-xs-12 student-data-btn text-center">
                          <button id="time_table_search_button" type="button" class="btn btn-success tran3s p-color-bg themehover text-transform" title="Send">
                          View Routine</button>
                        </div>  
                      </div>
                 </form>
 
            </div>
            <div class="clearfix"></div>
            <div id="academic_class_routine_container" class="tab-rutne">

            </div><!--//tab-rutne-->
          </div> <!-- /.course-item-wrapper -->  

          </span>
        </div>

    </div><!-- .entry-content -->
    
 <!-- right sitebar here -->
 <div class="col-md-3 col-sm-4 col-xs-12">
    @include('frontend.layouts.includes.importenLink')
  </div>

   </div><!--//page-row-->
 


  <script>
        $(document).ready(function () {
            var campus_id = "{{env('CAMPUS_ID')}}";
            var institute_id = "{{env('INSTITUTE_ID')}}";

            // request for parent list using batch section id
            $('#time_table_search_button').click(function () {
                // section
                var section = $('#section').val();
                var shift = $('#shift').val();
                // checking
                if(campus_id && institute_id && section && shift){
                    // ajax request
                    $.ajax({
                        url: "/academic/class-routine",
                        type: 'POST',
                        cache: false,
                        data: $('form#time_table_search_form').serialize(),
                        datatype: 'html',

                        beforeSend: function() {
                            // show waiting dialog
                              waitingDialog.show('Loading...');
                        },

                        success:function(data){
                            // hide waiting dialog
                             waitingDialog.hide();
                            // append data
                            var academic_class_routine_container = $('#academic_class_routine_container');
                            academic_class_routine_container.html('');
                            academic_class_routine_container.append(data);
                        },

                        error:function(data){
                            // hide waiting dialog
                            waitingDialog.hide();
                            // alert
                            alert('No response form server');
                        }
                    });
                }else{
                    // alert
                    alert('Please check all inputs are selected');
                }
            });

            // request for batch list using level id
            jQuery(document).on('change','.academicLevel',function(){
                // get academic level id
                var level_id = $(this).val();
                var div = $(this).parent();
                var op="";

                // checking
                if(campus_id && institute_id){
                    $.ajax({
                        url: "/api/get-academic-batch-list/"+level_id,
                        type: 'GET',
                        cache: false,
                        datatype: 'application/json',

                        beforeSend: function() {
                            // clear academic_class_routine_container
                            $('#academic_class_routine_container').html('');
                        },

                        success:function(response){
                            // checking response data
                            if(response.length>0) {

                                //console.log(data.length);
                                op += '<option value="" selected>--- Select Class ---</option>';
                                for (var i = 0; i < response.length; i++) {
                                    op += '<option value="' + response[i].id + '">' + response[i].batch_name + '</option>';
                                }

                                // set value to the academic batch
                                $('.academicBatch').html("");
                                $('.academicBatch').append(op);

                                // set value to the academic secton
                                $('.academicSection').html("");
                                $('.academicSection').append('<option value="0" selected>--- Select Section ---</option>');
                            }else {
                                // alert(response.msg);
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

            // request for section list using batch id
            jQuery(document).on('change','.academicBatch',function(){
                // get academic level id
                var batch_id = $(this).val();
                var div = $(this).parent();
                var op="";
                // checking
                if(campus_id && institute_id){
                    $.ajax({
                        url: "/api/get-academic-section-list/"+batch_id,
                        type: 'GET',
                        cache: false,
                        datatype: 'application/json',

                        beforeSend: function() {
                            // clear academic_class_routine_container
                            $('#academic_class_routine_container').html('');
                        },

                        success:function(response){
                            // checking 
                            if(response.length>0) {
                                //console.log(data.length);
                                op+='<option value="" selected>--- Select Section ---</option>';
                                for(var i=0;i<response.length;i++){
                                    op+='<option value="'+response[i].id+'">'+response[i].section_name+'</option>';
                                }

                                // set value to the academic batch
                                $('.academicSection').html("");
                                $('.academicSection').append(op);
                            }else {
                               // alert(response.msg);
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


            // request for section list using batch id
            jQuery(document).on('change','.academicSection',function(){
                // clear std list container
                $('#academic_class_routine_container').html('');
                // shift reset
                $('#shift option:first').prop('selected', true);
            });

        });
  </script>
  
  @endsection  

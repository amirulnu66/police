<?php $__env->startSection('title'); ?>

<?php $__env->startSection('contant'); ?>
    <header class="page-heading clearfix">
        <h1 class="heading-title pull-left">
            <span id="MainContent_lbletitle"> শিক্ষার্থীর তথ্য </span>
        </h1>
        <div class="breadcrumbs pull-right">
            <ul>
                <li class="breadcrumbs-label">আপনি এখানে আছেন:</li>
                <li> একাডেমিক  <i class="fa fa-angle-right"></i> </li>
                <li class="current">  শিক্ষার্থীর তথ্য</li>

            </ul>
        </div>
    </header>

    <div class="section-content">
        <div class="entry-content step-container">
            <div class="details col-md-9 col-sm-8 col-xs-12">
                <div class="course-item-wrapper border-top2">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 student-database ">
                        <form id="std_list_search_form" class="form-horizontal">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div class="row">

                                <div class="col-md-3">

                                    <label for="firstname" class="control-label">Academic Year</label>
                                    <select class="form-control academicYear" id="academic_year" name="academic_year">
                                        <option value="" disabled selected>Choose an option</option>
                                        <?php if(!empty($academicYearList) AND count($academicYearList)>0): ?>
                                            <?php $__currentLoopData = $academicYearList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($year->id); ?>"><?php echo e($year->year_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>

                                </div>

                                <div class="col-md-3">

                                    <label for="firstname" class="control-label">Academic Level</label>
                                    <select class="form-control academicLevel" id="academic_level" name="academic_level">
                                        <option value="" disabled selected>Choose an option</option>
                                    </select>

                                </div>


                                <div class="col-md-3">

                                    <label for="firstname" class="control-label">Class</label>
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

                                <div class="row">
                                    <div class="col-md-12 col-xs-12 student-data-btn text-center margin-top15">
                                        <button id="std_list_search_button" type="button" class="btn btn-success tran3s p-color-bg themehover text-transform" title="Send">
                                            View Students</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div> <!-- /.course-item-wrapper -->
                
                <div class="clearfix"></div>
                <div id="std_list_container_row" class="row"> </div>

            </div>
        

        </div><!-- .entry-content -->

        <!-- right sitebar here -->
        <div class="col-md-3 col-sm-4 col-xs-12">
            <?php echo $__env->make('frontend.layouts.includes.importenLink', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
    </div><!--//page-row-->
   <script>
            $(document).ready(function () {
                var campus_id = "<?php echo e(env('CAMPUS_ID')); ?>";
                var institute_id = "<?php echo e(env('INSTITUTE_ID')); ?>";


                // request for parent list using batch section id
                $('#std_list_search_button').click(function () {
                    // section
                    var section = $('#section').val();
                    // checking
                    if(campus_id && institute_id && section){
                        // ajax request
                        $.ajax({
                             url: "/student-list/search",
                            type: 'POST',
                            cache: false,
                            data: $('form#std_list_search_form').serialize(),
                            datatype: 'html',

                            beforeSend: function() {
                                // show waiting dialog
                                 waitingDialog.show('Loading...');
                            },

                            success:function(data){
                                // hide waiting dialog
                                 waitingDialog.hide();
                                // append data
                                var std_list_container_row = $('#std_list_container_row');
                                std_list_container_row.html('');
                                std_list_container_row.append(data);
                            },

                            error:function(data){
                                // hide waiting dialog
                                waitingDialog.hide();
                                alert('No response form server');
                            }
                        });
                    }else{
                        // alert
                        alert('Please check all inputs are selected');
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
                            url: "/api/get-academic-level-list/",
                            type: 'GET',
                            cache: false,
                            datatype: 'application/json',

                            beforeSend: function() {
                                // clear std list container
                                $('#std_list_container_row').html('');
                            },

                            success:function(response){
                                // checking
                                if(response.length>0){
                                    //console.log(data.length);
                                    op+='<option value="0" selected>--- Select Level ---</option>';
                                    for(var i=0;i<response.length;i++){
                                        // console.log(data[i].level_name);
                                        op+='<option value="'+response[i].id+'">'+response[i].level_name+'</option>';
                                    }

                                    // set value to the academic secton
                                    $('.academicSection').html("");
                                    $('.academicSection').append('<option value="" selected>--- Select Section ---</option>');

                                    // set value to the academic batch
                                    $('.academicBatch').html("");
                                    $('.academicBatch').append('<option value="" selected>--- Select Class ---</option>');

                                    // set value to the academic batch
                                    $('.academicLevel').html("");
                                    $('.academicLevel').append(op);
                                }else{
                                    // alert
                                    //alert('School Information not found');
                                }
                            },

                            error:function(data){
                                alert(JSON.stringify(data));
                            }
                        });
                    }else{
                        // alert
                        //alert('School Information not found');
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
                            url: "/api/get-academic-batch-list/"+level_id,
                            type: 'GET',
                            cache: false,
                            datatype: 'application/json',

                            beforeSend: function() {
                                // clear std list container
                                $('#std_list_container_row').html('');
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

                            error:function(){
                                alert(JSON.stringify(data));
                            }
                        });
                    }else{
                        // alert
                        // alert('School Information not found');
                    }
                });

                // request for section list using batch id
                jQuery(document).on('change','.academicBatch',function(){
                    console.log("hmm its change");

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
                                // clear std list container
                                $('#std_list_container_row').html('');
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

                            error:function(){
                                alert(JSON.stringify(data));
                            }
                        });
                    }else{
                        // alert
                        // alert('School Information not found');
                    }
                });


                // request for section list using batch id
                jQuery(document).on('change','.academicSection',function(){
                    // clear std list container
                    $('#std_list_container_row').html('');
                });

            });
    </script>   

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
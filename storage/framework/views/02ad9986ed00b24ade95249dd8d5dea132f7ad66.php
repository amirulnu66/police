<?php $__env->startSection('title'); ?>

<?php $__env->startSection('contant'); ?>
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
                       <h4><i class="icon fa fa-check"></i> <?php echo e(Session::get('warning')); ?> </h4>
                   </div>
               <?php endif; ?>
               </div>
            </div>   <!--.//col-->
        <div class="admison-heade-section">
            <div class="col-sm-2 form-logo-inner">
                <?php if(settingsInfo()->institute_logo): ?>
                    <img class="admision-form-logo" src="<?php echo e(URL::to('/assets/settings/'.settingsInfo()->institute_logo)); ?>" alt="logo" width="90" height="90">
                <?php endif; ?>    
            </div>
            <div class="col-sm-10">
                <h2 class="admission-scl-name">Police Line High School & College, Dinajpur </h2>
            </div>
            <div class="clear-fix"></div>
        </div>

        <?php if($applicantProfile): ?>
        <span id="MainContent_lblbcontent">আপডেট  ফরম 
                <div class="admission-pdf pull-right">
                    
                   <?php  
                        $application = (object) ($applicantProfile?$applicantProfile->application:null);
                        $user = (object) ($applicantProfile?$applicantProfile->user:null);
                     ?>
                    
                    <?php if($application->payment_status=='Paid'): ?>
                        <span><a class="btn btn-success applicant-logout" href="http://ems.alokitosoftware.com/admission/download/admit-card/<?php echo e($user->id); ?>" target="_blank">Admit Card</a> </span>
                    <?php endif; ?>
                   
                    
                    <?php if($user): ?>
                        <a class="admission-pdf-btn" href="http://ems.alokitosoftware.com/admission/download/application/<?php echo e($user->id); ?>" target="_blank">Applicant Copy </a>
                    <?php endif; ?>

                    
                    <a class="btn btn-success applicant-logout" href="<?php echo e(url('/applicant-logout')); ?>">Log Out</a>  
            </div>

        </span>
        
        <form method="post" action="<?php echo e(URL::to('/online/admission/data/store')); ?>">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="campus_id" value="<?php echo e(env('CAMPUS_ID')); ?>">
            <input type="hidden" name="institute_id" value="<?php echo e(env('INSTITUTE_ID')); ?>">
            <input type="hidden" name="email" value="<?php echo e(env('CAMPUS_ID').env('INSTITUTE_ID').rand(10,100).rand(101,1000)); ?>@gmail.com">
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
                <!-- applicant photo -->
                <div class="col-md-3">
                    <div class="applicant-img">
                        <div class="main-img-preview">
                            <img class="img-preview" src="<?php echo e(url('assets/profile/st1.jpg')); ?>" alt="preview img" width="150" height="150">
                        </div>
                    </div>
                </div>
                <!--.// applicant photo -->
                <!-- pesonal infomation -->
                <?php  $personal = (object) ($applicantProfile?$applicantProfile->personal:[]);  ?>
                <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>বাংলায়</label>
                        <input type="text" name="std_name_bn" value="<?php echo e($personal?$personal->std_name_bn : ''); ?>" class="form-control">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>ইংরেজী</label>
                        <input type="text" value="<?php echo e($personal?$personal->std_name : ''); ?>" name="std_name" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label> জন্ম তারিখ (জন্ম সনদ অনুযায়ী) </label>
                        <input type="text" name="birth_date" value="<?php echo e($personal?$personal->birth_date : ''); ?>" class="form-control datepicker" required>
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class="control-label">লিঙ্গ</label>
                        
                       
                        
                        <input type="text" name="gender" value="<?php echo e($personal?$personal->gender : ''); ?>" class="form-control " required>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>জাতীয়তা </label>
                        <input type="text" name="nationality" value="<?php echo e($personal?$personal->nationality_name : ''); ?>" class="form-control" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>ধর্ম </label>
                        
                        <?php  
                            $religionName = null;
                            switch($personal?$personal->religion:0) {
                                case '1': $religionName = "Islam"; break;
                                case '2': $religionName = "Hinduism"; break;
                                case '3': $religionName = "Christianity"; break;
                                case '4': $religionName = "Buddhism"; break;
                                case '5': $religionName = "Others"; break;
                            }
                         ?>
                        <input type="text" name="religion" value="<?php echo e($religionName?$religionName : 'Not Available'); ?>" class="form-control" required>
                        
                       
                    </div>
                </div>
                
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <legend>
                            <abbr title="" data-toggle="tooltip" data-original-title="Enter your personal information like">
                                <i class="fa fa-user"></i>
                                পিতার নাম
                            </abbr>
                        </legend>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>বাংলায়</label>
                        <input type="text" name="father_name_bn" value="<?php echo e($personal?$personal->father_name_bn : ''); ?>" class="form-control" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>ইংরেজী</label>
                        <input type="text" name="father_name" value="<?php echo e($personal?$personal->father_name : ''); ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>পেশা</label>
                        <input type="text" name="father_occupation" value="<?php echo e($personal?$personal->father_occupation : ''); ?>" class="form-control" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>শিক্ষাগত যোগ্যতা</label>
                        <input type="text" name="father_education" value="<?php echo e($personal?$personal->father_education : ''); ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <legend>
                            <abbr title="" data-toggle="tooltip" data-original-title="Enter your personal information like">
                                <i class="fa fa-user"></i>
                                মাতার নাম
                            </abbr>
                        </legend>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>বাংলায়</label>
                        <input type="text" name="mother_name_bn" value="<?php echo e($personal?$personal->mother_name_bn : ''); ?>" class="form-control" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>ইংরেজী</label>
                        <input type="text" name="mother_name" value="<?php echo e($personal?$personal->mother_name : ''); ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>পেশা</label>
                        <input type="text" name="mother_occupation" value="<?php echo e($personal?$personal->mother_occupation : ''); ?>" class="form-control" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>শিক্ষাগত যোগ্যতা</label>
                        <input type="text" name="mother_education" value="<?php echo e($personal?$personal->mother_education : ''); ?>" class="form-control" required>
                    </div>
                </div>

                 <?php  $permanent = (object) ($applicantProfile?$applicantProfile->address->permanent:[]);  ?>
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
                        <label>গ্রাম/মহল্লা</label>
                        <input type="text" name="add_per_address" value="<?php echo e($permanent?$permanent->address : ''); ?>" class="form-control" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>ডাকঘর</label>
                        <input type="text" name="add_per_post" value="<?php echo e($permanent?$permanent->post : ''); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label>মোবাইল</label>
                        <input type="number" name="add_per_phone" value="<?php echo e($permanent?$permanent->phone : ''); ?>" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="per_state" class="control-label">জেলা </label>
                        <input type="text" name="add_per_state" value="<?php echo e($permanent?$permanent->state : ''); ?>" class="form-control" required>
                        
                    </div>
                    <div class="col-md-4">
                        <label for="per_city" class="control-label">উপজেলা </label>
                        <input type="text" name="add_per_city" value="<?php echo e($permanent?$permanent->city : ''); ?>" class="form-control" required>
                        
                    </div>
                </div>

                 <?php  $present = (object) ($applicantProfile?$applicantProfile->address->present:[]);  ?>
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
                        <label>গ্রাম/মহল্লা</label>
                        <input type="text" name="add_pre_address" value="<?php echo e($present?$present->address : ''); ?>" class="form-control" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>ডাকঘর</label>
                        <input type="text" name="add_pre_post" value="<?php echo e($present?$present->post : ''); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label>মোবাইল</label>
                        <input type="number" name="add_pre_phone" value="<?php echo e($present?$present->phone : ''); ?>"  class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="present" class="control-label">জেলা </label>
                        <input type="text" name="add_pre_state" value="<?php echo e($permanent?$permanent->state : ''); ?>" class="form-control" required>

                    </div>
                    <div class="col-md-4">
                        <label for="pre_city" class="control-label">উপজেলা </label>
                        <input type="text" name="add_pre_city" value="<?php echo e($permanent?$permanent->city : ''); ?>" class="form-control" required>
                    </div>
                </div>


                <?php  $guardian = (object) ($applicantProfile?$applicantProfile->guardian:[]);  ?>
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
                        <input type="text" name="gud_name" value="<?php echo e($guardian?$guardian->gud_name : ''); ?>" class="form-control" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>মোবাইল</label>
                        <input type="number" name="gud_phone" value="<?php echo e($guardian?$guardian->gud_phone : ''); ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label>পিতা/মাতা/অভিভাবকের বাৎসরিক আয়(টাকা)</label>
                        <input type="text" name="gud_income" value="<?php echo e($guardian?$guardian->gud_income : ''); ?>" class="form-control" required>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label>পিতা/মাতা/অভিভাবকের বাৎসরিক আয়(কথায়)</label>
                        <input type="text" name="gud_income_bn" value="<?php echo e($guardian?$guardian->gud_income_bn : ''); ?>" class="form-control" required>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label>জমির পরিমান (শতাংশ) </label>
                        <input type="text" name="area_of_land" value="<?php echo e($guardian?$guardian->area_of_land : ''); ?>" class="form-control" required>
                    </div>

                </div>

                <?php  $enrollment = (object) ($applicantProfile?$applicantProfile->enrollment:[]);  ?>
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
                        <label for="academic_year" class="control-label">প্রাতিষ্ঠানিক বৎসর </label>
                        <input type="text" name="academic_year" value="<?php echo e($enrollment?$enrollment->academic_year : ''); ?>" class="form-control" required>

                    </div>
                    <div class="col-md-4">
                        <label for="academic_level" class="control-label">প্রাতিষ্ঠানিক লেভেল</label>

                        <input type="text" name="academic_level" value="<?php echo e($enrollment?$enrollment->academic_level : ''); ?>" class="form-control" required>
                       

                    </div>
                    <div class="col-md-4">
                        <label for="batch" class="control-label">শ্রেণী</label>
                        <input type="text" name="academic_batch" value="<?php echo e($enrollment?$enrollment->academic_batch : ''); ?>" class="form-control" required>
                       
                    </div>
                </div>
                <br>
                <?php  $previousSchool = (object) ($applicantProfile?$applicantProfile->previous_school:[]);  ?>
                <div class="row">
                    <div class="col-md-12">
                        <legend>
                            <abbr title="" data-toggle="tooltip" data-original-title="Enter your personal information like. First name, Middle name, Last name, Gender, DOB, etc.">
                                <i class="fa fa-home"></i>
                                অনান্য তথ্য
                            </abbr>
                        </legend>
                    </div>
                    <div class="" style="display: block; margin-bottom: 10px;">
                        <div class="col-sm-6">
                            <label>বিশেষ যত্ন (ওটিজম) হ্যাঁ &nbsp;   </label>
                            <?php  $specialCare = $personal?$personal->special_care : null;  ?>

                           <input type="checkbox" name="special_care" value="1" <?php echo e($specialCare==1? 'checked' :''); ?>>&nbsp; না &nbsp;
                           <input type="checkbox" name="special_care" value="0" <?php echo e($specialCare==0? 'checked' :''); ?>>&nbsp;(টিক দিন)।

                        </div>
                         <div class="col-sm-6">
                            <?php  $tribal = $personal?$personal->tribal : null;  ?>

                            <label>নৃতাত্ত্বিক জনগোষ্ঠির হ্যাঁ &nbsp;    </label>
                           <input type="checkbox" name="tribal" value="1" <?php echo e($tribal==1? 'checked' :''); ?>>&nbsp; না &nbsp;
                           <input type="checkbox" name="tribal" value="0" <?php echo e($tribal==0? 'checked' :''); ?>>&nbsp;(টিক দিন)।
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="col-sm-4 form-group">
                        <label>সমাপনী পরীক্ষায় প্রাপ্ত (জি পি এ)</label>
                        <input type="text" name="psc_gpa" value="<?php echo e($previousSchool?$previousSchool->psc_gpa : ''); ?>" class="form-control" required>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label>সমাপনী পরীক্ষার রোল নম্বর </label>
                        <input type="text" name="psc_roll" value="<?php echo e($previousSchool?$previousSchool->psc_roll : ''); ?>" class="form-control" required>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label>পাসের সন</label>
                        <input type="text" name="psc_year" value="<?php echo e($previousSchool?$previousSchool->psc_year : ''); ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label>বিদ্যালয়ের নাম </label>
                        <input type="text" name="psc_school" value="<?php echo e($previousSchool?$previousSchool->psc_school : ''); ?>" class="form-control" required>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label>প্রশংসাপত্র/ছাড়পত্র নম্বর</label>
                        <input type="text" name="psc_tes_no" value="<?php echo e($previousSchool?$previousSchool->psc_tes_no : ''); ?>" class="form-control" required>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label>তারিখ</label>
                        <input type="text" name="psc_tes_date" class="form-control " required>
                    </div>
                </div>
               <!--  <div class="form-group student-panel">
                    <div class="routine-btn">
                        <button type="submit" class="p-color-bg themehover">Update</button>
                    </div>
                </div> -->
            </div>
        </form>
        <?php else: ?>
            <div class="clearfix"></div>
            <div>
                <h3 style="text-align: center;padding: 30px 60px; font-size: 26px; font-weight: bold; border:0;  border-top: 1px; border-style: solid;">You are not login !!</h3>
            </div>
        <?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-script'); ?>
// <script>
//       $(document).ready(function () {

//                 //datepicker calender                      
//             $('.datepicker').datepicker();
          
//             });
//     </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
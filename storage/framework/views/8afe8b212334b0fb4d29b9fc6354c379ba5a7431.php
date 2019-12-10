<header class="header">
    <div class="header-top primary-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 header-top-left">
                    <div class="header-contact-info d-flex">
                        <?php if(!empty(settingsInfo())): ?> 
                        <div class="header-contact header-contact-phone">
                            <span class="fa fa-phone"></span>
                            <p class="phone-number"><?php echo e(settingsInfo()->phone_number); ?> </p>
                        </div>
                        <div class="header-contact header-contact-email">
                            <span class="fa fa-envelope-o"></span>
                            <p class="email-name"><?php echo e(settingsInfo()->email); ?></p>
                        </div>
                        <?php endif; ?>     
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 header-top-right">
                    <div class="header-social-icon-list">
                        <ul>
                            <li><a href="https://www.facebook.com/venusitltd/" target="_blank"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="/" target="_blank"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="/" target="_blank"><span class="fa fa-dribbble"></span></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//to-bar-->
    <div class="container">
        <div class="row">
            <div style="float: left;" class="main-logo-inner">
                <?php if(settingsInfo()): ?>    
                <a href="<?php echo e(URL::to('/')); ?>">
                    <img id="Img1" src="<?php echo e(url('assets/settings/'.settingsInfo()->institute_logo)); ?>" style="margin-top: 3px; margin-bottom: 3px;" height="80px"
                    width="80px" alt="Logo" />
                </a>
                <?php endif; ?>
            </div>
            <h1 class="logo col-md-7 col-sm-8">
                <span class="col-md-12 col-sm-12 col-xs-9 title-bng">
                    <a href="/">
                        <span id="lblbSchoolName" style=" font-weight: bold; font-family: SolaimanLipi,Arial,sans-serif;
                        color: #ff3d00d4;"><?php echo e(settingsInfo()?settingsInfo()->institute_name : ''); ?></span></a>
                    </span>
                    <span class="col-md-12 col-sm-12 col-xs-9">
                        <a href="/">
                            <span id="lblbSchoolNameEng" style=" font-weight: bold; font-family: SolaimanLipi,Arial,sans-serif;
                            color: #04727b;"><?php echo e(settingsInfo()?settingsInfo()->english_name : ''); ?></span></a>
                        </span>
                    <div class="clearfix"></div>    
                    </h1>
                    <!--//logo-->
                    <div class="info col-md-3 col-sm-2 col-xs-12 ems-login-inner " style="float: right; padding-right: 0">
                        <!--//menu-top-->
                        <br />
                        <div class="admission-open">
                            <a href="<?php echo e(URL::to('/admission/online/apply')); ?>" target="_blank">Admission Open</a>
                        </div>    
                        <div class="contact pull-right ems-login-btn">
                            <p class="parent">
                                <a href="<?php echo e(URL::to('http://ems.alokitosoftware.com/')); ?>" target="_blank" class="btn btn-success home-login" style="font-family:SolaimanLipi; letter-spacing: 1px;">Login </a>

                            </p>
                        </div>
                        <!--//contact-->
                    </div>
                    <!--//info-->
                </div>
            </div>
            <!--//header-main-->
        </header>
        <!--//header-->
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog" style="z-index: 99999">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="notice_header">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p><b>Date:</b> <span id="notice_date"> Notice Date</span></p><br/>
                        <p><b>Description:</b> <span id="notice_body">This is notice description.</span></p>
                        <br/>
                        <p id="notice_file_container" class="hidden"><b>File:</b>
                            <span>
                                <a id="notice_file" target="_blank" download>Download</a>
                            </span>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ******NAV****** -->
        <div class="header-bottom-area header-sticky header-bg" style="transition: .6s;">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-6">

                        <div class="main-menu">
                            <nav id="mobile-menu" style="display: block;">
                                <ul>
                                    <li id="liHome" class="nav-item"><a href="<?php echo e(URL::to('/')); ?>">
                                    হোম</a></li>
                                    <li>
                                        <a href="#home">আমাদের কথা <i class="fa fa-caret-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo e(URL::to('/message/from/director-message')); ?>">সভাপতির মহোদয়ের বাণী</a></li>
                                            <li><a href="<?php echo e(URL::to('/message/head/teacher-message')); ?>">অধ্যক্ষের বাণী  </a></li>

                                            <li><a href="<?php echo e(URL::to('/academic/managing-committee')); ?>">ব্যবস্থাপনা কমিটি</a></li>
                                            <li><a href="<?php echo e(URL::to('/academic/teacherInfo-web-form')); ?>">শিক্ষক পরিচিতি</a></li>
                                            <li><a href="<?php echo e(URL::to('/institute/history')); ?>">
                                            প্রতিষ্ঠানের ইতিহাস</a></li>
                                            <li><a href="<?php echo e(URL::to('/pages/mission-vision')); ?>">লক্ষ্য ও উদ্দেশ্য</a></li>

                                            <li><a href="<?php echo e(URL::to('/infrastructure/institute-infrastructure')); ?>">ভৌত অবকাঠামো</a></li>
                                            <li><a href="<?php echo e(URL::to('/academic/success-web-form')); ?>">অর্জন ও সাফল্য</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#about">তথ্য <i class="fa fa-caret-down"></i></a>
                                        <ul class="submenu">

                                            <li><a href="<?php echo e(URL::to('/pages/code-conducts')); ?>">আচরণবিধি</a></li>
                                            <li><a href="<?php echo e(URL::to('/pages/news-events')); ?>">নিউজ এন্ড ইভেন্টস</a></li>
                                            <li><a href="<?php echo e(URL::to('/gov/holiday/holiday-list')); ?>">ছুটির তালিকা</a></li>
                                            <li><a href="<?php echo e(URL::to('/student/dress/code/dress-code')); ?>">পোশাকরীতি</a></li>

                                            <li><a href="<?php echo e(URL::to('/policies/guidelines')); ?>">
                                            নীতিমালা ও নির্দেশাবলী</a></li>
                                            <li><a href="<?php echo e(URL::to('/pages/academic-facilities')); ?>">সুযোগ-সুবিধা</a></li>
                                            <li><a href="<?php echo e(URL::to('/pages/lesson-syllabus')); ?>">পাঠ পরিকল্পনা </a></li>

                                            <li><a href="<?php echo e(URL::to('/school/library-web-form')); ?>">লাইব্রেরী</a></li>
                                            <li><a href="<?php echo e(URL::to('/pages/publications-web')); ?>">প্রকাশনা</a></li>
                                            <li><a href="<?php echo e(URL::to('/pages/health-awareness')); ?>">স্বাস্থ্য ও পরিবেশ সচেতনামূলক তথ্য</a></li>

                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#about">একাডেমিক <i class="fa fa-caret-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo e(URL::to('/academic/student/student-database')); ?>"> শিক্ষার্থীর তথ্য </a></li>
                                            <li><a href="<?php echo e(url('/academic/result/exam-result')); ?>">একাডেমিক পরীক্ষার ফলাফল</a></li>
                                            <li><a href="<?php echo e(url('/achievements/public/exam/result')); ?>"> পাবলিক পরীক্ষার ফলাফল </a></li>
                                            <!-- <li><a href="#">আমাদের কৃতী শিক্ষার্থীগণ </a></li> -->
                                            <li><a href="<?php echo e(url('/pages/exam-notice')); ?>">পরীক্ষার সময়সূচি </a></li>
                                            <li><a href="<?php echo e(url('/academic/class-routine')); ?>">ক্লাস রুটিন</a></li>

                                            <li><a href="<?php echo e(url('/pages/guideline-parents')); ?>">অভিভাবকের জন্য নির্দেশিকা</a></li>

                                            <li><a href="<?php echo e(url('/academic/academic-calendar')); ?>">একাডেমিক ক্যালেন্ডার</a></li>

                                            <!-- <li><a href="<?php echo e(url('/academic/booklist/syllabus')); ?>">পাঠ্যবইয়ের তালিকা ও সিলেবাস </a></li> -->

                                            <li><a href="<?php echo e(url('/pages/curricular-activitie')); ?>">সহশিক্ষাক্রমিক কার্যাবলী</a></li>

                                        </ul>
                                    </li>


                                    

                                    <li>
                                        <a href="#"> ভর্তি কার্যক্রম <i class="fa fa-caret-down"></i></a>
                                        <ul class="submenu">
                                            <!-- <li><a href="<?php echo e(URL::to('/admission/online/apply')); ?>">অনলাইন অ্যাডমিশন  </a></li> -->

                                            <li><a href="<?php echo e(url('/academic/admission-result')); ?>">ভর্তির ফলাফল</a></li>
                                            <li><a href="<?php echo e(url('/pages/short-information')); ?>">সংক্ষিপ্ত তথ্যাবলী</a></li>

                                            <li><a href="<?php echo e(url('academic/fees-payments-web-form')); ?>">ফিস ও পেমেন্টস্</a></li>

                                            <li><a href="<?php echo e(url('/academic/student-scholarship')); ?>">স্কলারশীপ</a></li>
                                            <li><a href="<?php echo e(url('/pages/transfer-web')); ?>">ট্রান্সফার পদ্ধতি</a></li>

                                        </ul>
                                    </li>
                                    <li id="li1" class="nav-item fontHeader"><a href="<?php echo e(URL::to('/academic/notice-web-form')); ?>">নোটিশ</a></li>

                                    <li>
                                        <a href="#"> নিয়োগ <i class="fa fa-caret-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo e(URL::to('/employment/job-circuler')); ?>">চাকুরী বিজ্ঞপ্তি</a></li>
                                            <li><a href="<?php echo e(URL::to('/recruitment/exam/result-web-form')); ?>">নিয়োগ পরীক্ষার ফলাফল</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#"> আর্কাইভস <i class="fa fa-caret-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo e(URL::to('/institute/previous/teachers')); ?>">পূর্ববর্তী প্রতিষ্ঠান প্রধানগন </a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">গ্যালারি <i class="fa fa-caret-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="<?php echo e(url('/school/photo/photo-gallery')); ?>">ফটো গ্যালারি</a></li>

                                            <li><a href="javascript:">ভিডিও গ্যালারি</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="<?php echo e(url('/contact/contact-Us-web-form')); ?>">যোগাযোগ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
            <!-- .//header-bottom-area -->
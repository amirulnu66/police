 <div class="subscribe-style-one">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-8 col-sm-12 col-xs-12 footer-top-left">
                    <h2 class="sign-up">Sign up for Newsletter</h2>
                    <div class="text">Submit your email and stay in touch by notify our news &amp; update regularly</div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <form method="post" action="contact.html">
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Enter your email" required="">
                            <button type="submit"><span class="icon flaticon-send-message-button" ><i class="fa fa-paper-plane" aria-hidden="true"></i>
</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
<footer class="footer">
        <div class="footer-content footer-bg" id="change-bg-color">
            <div class="container footer-toper">
                <div class="footer-col col-md-3 col-sm-3 about" style="padding-right: 0">
                    <div class="footer-col-inner">
                        <h4 class="makeBold ft-title">আমাদের কথা </h4>
                        <!--<div class="calendar"></div>-->
                        <p style="font-size: 16px;">পুলিশ লাইন হাই স্কুল এন্ড কলেজ একটি আদর্শ বিদ্যাপীঠ । আমি এই প্রবিদ্যাপীঠ এর সাথে জরিত থেকে গর্ব বোধ করি। মানুষের জীবনের শ্রেষ্ঠ অর্জন হল শিক্ষা । শিক্ষার প্রথম এবং প্রধান কাজ হল পরিবেশের সাথে শিক্ষার্থীর সংগতি । </p>
                        
                            
                        <!--.//designAside-->
                    </div>
                    <!--//footer-col-inner-->
                </div>
                <!--//foooter-col-->
               
                <div class="footer-col col-md-3 col-sm-3 about">
                    <div class="footer-col-inner ">
                        <h4 class="makeBold ft-title">
                            প্রয়োজনীয় লিংক</h4>
                        
                            <div id="QuickLinksDiv" class="section-content footer-important-link" style="min-height: 140px;">

                           <p style="padding-left:5px;"><a href="http://www.ntrca.gov.bd" target="_blank">   <i class="fa fa-caret-right" style="padding-left:5px;"> &nbsp;বেসরকারি শিক্ষক নিবন্ধন ও প্রত্যয়ন কর্তৃপক্ষ (এনটিআরসিএ) </i></a></p>                            

                            <p style="padding-left:5px;"><a href="http://www.banbeis.gov.bd" target="_blank">   <i class="fa fa-caret-right" style="padding-left:5px;"> &nbsp;বাংলাদেশ শিক্ষাতথ্য ও পরিসংখ্যান ব্যুরো (ব্যানবেইস)  </i></a></p>

                            <p style="padding-left:5px;"><a href="http://www.nctb.gov.bd" target="_blank">   <i class="fa fa-caret-right" style="padding-left:5px;"> &nbsp;জাতীয় শিক্ষাক্রম ও পাঠ্যপুস্তক বোর্ড (এনসিটিবি)   </i></a></p>

                            <p style="padding-left:5px;"><a href="http://www.moedu.gov.bd" target="_blank">   <i class="fa fa-caret-right" style="padding-left:5px;"> &nbsp;শিক্ষা মন্ত্রণালয়  </i></a></p>

                            <p style="padding-left:5px;"><a href="http://www.shed.gov.bd" target="_blank">   <i class="fa fa-caret-right" style="padding-left:5px;"> &nbsp;মাধ্যমিক ও উচ্চ শিক্ষা বিভাগ  </i></a></p>

                            <p style="padding-left:5px;"><a href="http://www.mopme.gov.bd" target="_blank">   <i class="fa fa-caret-right" style="padding-left:5px;"> &nbsp;প্রাথমিক ও গণশিক্ষা মন্ত্রণালয়    </i></a></p>
                            <!--old link-->
                             <p style="padding-left:5px;"><a href="http://dinajpureducationboard.gov.bd/" target="_blank">   <i class="fa fa-caret-right" style="padding-left:5px;">&nbsp;  দিনাজপুর শিক্ষা বোর্ড</i></a></p>                             

                        </div>
                        <!--//footer-col-inner-->
                    </div>

                </div>
  
                
                <div class="col-md-3 col-sm-3">
                    <div class="">
                        <h4 class="makeBold ft-title">
                            ফেইসবুক পেজ</h4>
                        <div class="fb-page">
                        <iframe style="margin-left: 0; ,margin-top: 5px;" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fvenusitltd%2F&tabs=timeline&width=360&height=250&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=2108457959371481" width="100%" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                
                        
                        </div>    
                    </div>
                    <!--//footer-col-inner-->
                </div>
                <!--//foooter-col-->
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="footer-widget mb-30">
                        <div class="footer-heading">
                            <h4 class="makeBold ft-title">যোগাযোগ</h4>
                        </div>
                       
                            <ul class="list-style-one">
                                @if(!empty(settingsInfo()))
                                <li><span class="icon fa fa-map-marker"></span>{{settingsInfo()->institute_address}} </li>
                                <li><span class="icon fa fa-phone"></span>{{settingsInfo()->phone_number}}</li>
                                <li><span class="icon fa fa-envelope"></span>{{settingsInfo()->email}}</li>
                                <li><span class="icon fa fa-globe"></span>plhsd.edu.bd</li><br>
                                @endif    
                                <li class="total-visitor">Total Visitor:&nbsp;
                                    
                                <a href="/" target="_blank" title="Visitor Counter">
                                <img src="https://smallseotools.com/counterDisplay?code=7ab0eac53adb73a9642188d525a54c7f&style=0014&pad=6&type=page&initCount=100"  title="Visitor Counter" Alt="Visitor Counter" border="0">
                                </a>

                                </li>
                            </ul>
                        

                    </div>
                        
                </div> <!--//footer-col3-->
            </div>
            <!--.//container-->
            <!--.//footer-toper  -->
            <div class="bottom-bar">
                <div class="container">
                    <div class="row">
                        <div class="copyright col-md-5" style="float: left;">
                            <p>
                                Copyright @ 2018,<a href="/" target="_blank">
                                    <span id="lblCopyRightSchoolName" class="copyrightSclName">Venus IT Ltd</span></a></p>
                        </div>
                        <div class="col-md-3" style="text-align: center;">
                            <p style="margin-top: 0;">
                                
                            </p>
                            <p>
                                
                            </p>
                        </div>
                        <div class="copyright col-md-4">
                            <p style="float: left">
                                Powered by<a href="http://venusitltd.com">&nbsp;Venus IT LTD</a></p>
                        </div>
                        
                    </div>
                    <!--//row-->
                </div>
            </div>
            <!-- //bottom-bar -->
        </div>  
        <!--.//footer-content-->  
    </footer>

<script type="text/javascript">
    $(function() {
        $('.calendar').pignoseCalendar();
    });

</script>
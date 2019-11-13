 <section class="achievements">
         <h1 class="section-heading text-highlight">
       <span class="line student-title"> আমাদের সেরা ছাত্র ছাত্রী </span> </h1>
       <!-- frontend\HomeController -->
        @if(!empty($academicTopper))
        <div id="MainContent_achievementDiv1" class="section-content" style="">   
            <div class="student-carousel owl-carousel owl-theme">
                @foreach($academicTopper as $topper)  
                <div class="item">
                    
                    <img src="{{$topper->photo}}" alt="" height="100" />
                    <h3>{{$topper->name}}</h3>
                    <p><span>{{$topper->batch}}</span></p>
                    <p>Section: <span>{{$topper->section}}</span></p>
                </div>
                @endforeach
            </div>
        </div> 
        @else

                        
            <h5 class="text-center" style="font-size: 16px; padding: 10px; letter-spacing: 1px; height: 60px; display: block;color: red;">
                <strong>No Records Found</strong> 
            </h5>

            
        @endif
            <!--//section-content-->
    </section>
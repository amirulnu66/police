<div class="tab-rutne">
    <div class="panel panel-info ">
        <div class="panel-heading result-title">
            <h3 class="class-routine-title"> এস.এস.সি পরীক্ষার ফলাফল</h3>
        </div>
        <div class="table-overflow result-tab">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="10%">পাশের বছর</th>
                        <th width="20%">পরীক্ষার্থীর সংখ্যা</th>
                        <th width="20%">কৃতকার্যের সংখ্যা</th>
                        <th width="20%">মোট জি.পি.এ-৫</th>
                        <th width="15%">মোট জি.পি.এ-৪</th>
                        <th width="15%">পাশের হার</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(!empty(sscPublicexamResult())): ?>    
                    <?php $__currentLoopData = sscPublicexamResult(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($resultInfo->pass_year); ?></td>
                        <td><?php echo e($resultInfo->total_std); ?></td>
                        <td><?php echo e($resultInfo->total_pass); ?></td>
                        <td><?php echo e($resultInfo->gread_aplus); ?></td>
                        <td><?php echo e($resultInfo->gread_a); ?></td>
                        <td><?php echo e($resultInfo->pass_presen); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>    

                </tbody>
            </table>
        </div>
    </div>
</div><!--//tab-rutne-->

<!-- <div class="tab-rutne">
    <div class="panel panel-info">
        <div class="panel-heading result-title">
            <h3 class="class-routine-title">জে.এস.সি পরীক্ষার ফলাফল</h3>
        </div>
        <div class="table-overflow result-tab">
            <table class="table table-bordered table-hover ">
                <thead>
                    <tr>
                        <th width="10%">পাশের বছর</th>
                        <th width="15%">পরীক্ষার্থীর সংখ্যা</th>
                        <th width="15%">ট্যালেন্টপুল</th>
                        <th width="15%">সাধারণ গ্রেড</th>
                        <th width="20%">বৃত্তি প্রাপ্ত সংখ্যা</th>
                        <th width="15%">জি.পি.এ-৫</th>
                        <th width="10%">পাশের হার</th>
                    </tr>
                </thead>
                <tbody>
            <?php if(!empty(jscPublicexamResult())): ?>        
                <?php $__currentLoopData = jscPublicexamResult(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>        
                    <tr>
                        <td><?php echo e($resultInfo->pass_year); ?></td>
                        <td><?php echo e($resultInfo->total_std); ?></td>
                        <td><?php echo e($resultInfo->total_pass); ?></td>
                        <td><?php echo e($resultInfo->gread_aplus); ?></td>
                        <td><?php echo e($resultInfo->gread_a); ?></td>
                        <td><?php echo e($resultInfo->pass_presen); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            <?php endif; ?>  
                    <tr>
                        <td>2018</td>
                        <td>250</td>
                        <td>25</td>
                        <td>50</td>
                        <td>75</td>
                        <td>56</td>
                        <td>100%</td>
                        
                    </tr> 
                    <tr>
                        <td>2017</td>
                        <td>200</td>
                        <td>15</td>
                        <td>40</td>
                        <td>55</td>
                        <td>50</td>
                        <td>100%</td>
                        
                    </tr> 
                    <tr>
                        <td>2016</td>
                        <td>170</td>
                        <td>22</td>
                        <td>42</td>
                        <td>70</td>
                        <td>40</td>
                        <td>100%</td>
                        
                    </tr>  
                </tbody>
            </table>
        </div>
    </div>
</div> -->
<!--//tab-rutne-->
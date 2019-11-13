

    <div class="details col-lg-12 col-md-12">
        <div class="panel panel-tab rounded shadow padding-right15">
            <h4 class="text-center text-bold bg-blue-gradient">Student List</h4>
            <div id="datatable-dom_wrapper" class="dataTables_wrapper form-inline table-responsive">
                <?php if(!empty($studentList)): ?>
                    <table id="example1" class="table table-striped table-lilac" role="grid" aria-describedby="datatable-dom_info">
                        <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Roll No.</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <!--This variable get frontend\HomeController-->
                        
                        <?php $__currentLoopData = $studentList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <img class="center-block img-circle img-thumbnail img-responsive" src="<?php echo e(url($student->photo)); ?>" alt="No Image" style="width:40px;height:40px">
                                </td>
                                <td><?php echo e($student->gr_no); ?></td>
                                <td><?php echo e($student->name); ?></td>
                                <td><?php echo e($student->email); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                <?php else: ?>
                    <div id="w0-success-0" class="alert-warning alert-auto-hide alert fade in text-center" style="opacity: 423.642;">
                        <h4><i class="fa fa-warning"></i> No result found. </h4>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>


<script>
    $(function () {
        $("#example2").DataTable();
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false
        });
    });
</script>
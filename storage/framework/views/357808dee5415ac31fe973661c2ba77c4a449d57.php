;

<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#dashboard").addClass("active")
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="d-ib">Dashboard</span>
        </h1>
    </div>
    <p class="title-bar-description">
    <h5>Welcome to <span style="font-weight: bold"> Rokhan </span> Hospital Management System.</h5>
    </p>
    <div class="row gutter-xs">
        <div class="col-md-6 col-lg-3 col-lg-push-0">
            <div class="card bg-default">
                <div class="card-body">
                    <div class="media">
                        <div class="media-middle media-left">
                      <span class="bg-default-inverse circle sq-48" style="padding-top: 22%;">
                        <span class="icon icon-user"></span>
                      </span>
                        </div>
                        <div class="media-middle media-body">
                            <h6 class="media-heading">Total Employees</h6>
                            <h3 class="media-heading">
                                <span class="fw-l">
                                    <?php
                                    $ros = DB::table("hr_employee_mangement")->select('*', DB::raw('count(id) as couts'))->get();
                                    ?>
                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php echo e($ro->couts); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-lg-push-3">
            <div class="card bg-warning">
                <div class="card-body">
                    <div class="media">
                        <div class="media-middle media-left">
                      <span class="bg-warning-inverse circle sq-48" style="padding-top: 22%;">
                        <span class="icon icon-group"></span>
                      </span>
                        </div>
                        <div class="media-middle media-body">
                            <h6 class="media-heading">Total Customers</h6>
                            <h3 class="media-heading">
                                <span class="fw-l">
                                    <?php
                                    $ros = DB::table("reception_patient")->select('*', DB::raw('count(id) as couts'))->get();
                                    ?>
                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php echo e($ro->couts); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-lg-pull-3">
            <div class="card bg-default">
                <div class="card-body">
                    <div class="media">
                        <div class="media-middle media-left">
                      <span class="bg-default-inverse circle sq-48" style="padding-top: 22%;">
                        <span class="icon icon-sitemap"></span>
                      </span>
                        </div>
                        <div class="media-middle media-body">
                            <h6 class="media-heading">Total Departments</h6>
                            <h3 class="media-heading">
                                <span class="fw-l">
                                     <?php
                                    $ros = DB::table("setting_department")->select('*', DB::raw('count(id) as couts'))->get();
                                    ?>
                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php echo e($ro->couts); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-lg-pull-0">
            <div class="card bg-warning">
                <div class="card-body">
                    <div class="media">
                        <div class="media-middle media-left">
                      <span class="bg-warning-inverse circle sq-48" style="padding-top: 22%;">
                        <span class="icon icon-group"></span>
                      </span>
                        </div>
                        <div class="media-middle media-body">
                            <h6 class="media-heading">Today Customers</h6>
                            <h3 class="media-heading">
                                <span class="fw-l"> <?php
                                    $ros = DB::table("reception_patient")->select('*', DB::raw('count(id) as couts'))->where('date', date('Y-m-d'))->get();
                                    ?>
                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php echo e($ro->couts); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?></span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row gutter-xs">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body" style="background-color: #f0f0f0;box-shadow: 0px -1px 1px #c9c9c9">
                    <h4 class="card-title"><i class="icon icon-calendar-check-o"></i> Today </h4>
                </div>
                <div class="" style="height: 315px;
                background-color: #6185a8;padding-top: 100px; margin: 10px;margin-top: 10px; box-shadow: 0px 0px 1px #ffffff;
                 border-radius: 5px;">
                    
                    
                    <div style="color: #ffffff; font-size: 25px;
                    align-content: center; text-align: center; font-weight: bold; text-shadow: 0px 0px 1px black">
                        <span> <?php echo date('Y - m - d')?></span><br>
                        <span> <?php echo date('Y - F - l')?></span>
                        <span><hr style="border: 2px solid #e4ab3e;margin-left: 10%;margin-right: 10%"></span>
                    </div>
                </div>
                <script>
                    $(function () {
                        var x = document.getElementById['calendar'].value;
                        if (x = 15) {
                            $(".day").addClass("active");
                        }
                        $("#jan").val("Dolly Duck");
                    });
                </script>
                <div id="jan"></div>
                
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body" style="background-color: #f0f0f0;box-shadow: 0px -1px 1px #c9c9c9">
                    <h4 class="card-title"><i class="icon icon-hospital-o"></i> Rokhan Hospital</h4>
                </div>
                <div class="card-body" style="height: 330px;">
                    <div class="card-chart">
                        <img src="<?php echo e(URL::asset('assets/image/rohan.png')); ?>" width="50%"
                             style="height: auto; margin: 20%;">

                    </div>
                </div>

            </div>
        </div>


    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('hms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
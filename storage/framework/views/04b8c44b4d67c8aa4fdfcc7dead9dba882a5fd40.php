;
<?php $__env->startSection('javascrip'); ?>
    <script>
              $(document).ready(function () {
                  $("#settings").addClass("active")
              });
    </script>
<?php $__env->stopSection(); ?>

<style>
    
        
    
    #headeradd {
        border-radius: 5px;
        padding: 10px !important;
        background: #e67e22;
    }

    th {
        align-content: center
    }

    tbody td {
        border: 1px solid #f0f0f0
    }

    #hid {
        visibility: hidden;
    }
</style>

<?php $__env->startSection('content'); ?>

    <div style="margin-top: -25px;">
        <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
            <li><a href="#">Profile </a></li>
        </ul>
    </div>
    <?php $__currentLoopData = App\User::take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="table-responsive">


                                        <div class="col-lg-8 col-lg-offset-2">
                                            <div class="demo-form-wrapper">

                                                <div class="modal-body"
                                                     style="overflow-y: hidden!important;overflow-x: hidden;">
                                                    <form id="demo-form-wizard-1" novalidate method="post"
                                                          data-toggle="validator"
                                                          enctype="multipart/form-data"
                                                          action="<?php echo e(url('/userNameupdates')); ?>">
                                                        <div class="col-sm-10"
                                                             style="color: #1a252f; align-content: center; text-align: center; font-size:25px ">
                                                            Update Your Account Info
                                                        </div>
                                                        <br> <br> <br>
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                                                        <div class="form-group">
                                                            <div class="col-sm-4">
                                                                <label class="control-label">Current Email
                                                                    Address </label>
                                                            </div>
                                                            <div class="col-sm-6 input-group">
                                                                <input type="email" placeholder="Current Email"
                                                                       name="email" id="email"
                                                                       class="form-control">

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-4">
                                                                <label class="control-label">New Email Address </label>
                                                            </div>
                                                            <div class="col-sm-6 input-group">
                                                                <input type="email" placeholder="New Email"
                                                                       name="email1" id="email"
                                                                       class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <img src="<?php echo e(URL::to('/assets/image/'.$rows->photo)); ?>" alt=""> </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">  </div>
                                                                <div>
                                                                        <span class="btn default btn-file">
                                                                            <input type="file" required name="photo"> </span>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix margin-top-10">
                                                            </div>
                                                            <input type="hidden" name="id" value="<?php echo e($rows->id); ?>">
                                                            <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <button type="submit" value=""
                                                                    name="submit" id="submit"
                                                                    class="form-control btn btn-info"
                                                                    style="margin-left: 10px; background-color: #1d6fa5; border: 0px solid black">
                                                                Update
                                                            </button>

                                                        </div>
                                                    </form>
                                                    <div class="col-sm-10">
                                                        <hr>
                                                    </div>
                                                    <form id="demo-form-wizard-1" novalidate method="post"
                                                          data-toggle="validator"
                                                          enctype="multipart/form-data"
                                                          action="<?php echo e(url('/userPasswordupdates')); ?>">

                                                        <div class="form-group">
                                                            <div class="col-sm-4">
                                                                <label class="control-label">Current Password </label>
                                                            </div>
                                                            <div class="col-sm-6 input-group">
                                                                <input type="password" value=""
                                                                       placeholder="Current Password"
                                                                       name="curP" id="text"
                                                                       class="form-control">

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-4">
                                                                <label class="control-label">New Password </label>
                                                            </div>
                                                            <div class="col-sm-6 input-group">
                                                                <input type="password" value=""
                                                                       placeholder="New Password"
                                                                       name="newP" id="password"
                                                                       class="form-control">

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-4">
                                                                <label class="control-label">Confirm Password </label>
                                                            </div>
                                                            <div class="col-sm-6 input-group">
                                                                <input type="password" value=""
                                                                       placeholder="Confrim Password"
                                                                       name="conP" id="password1"
                                                                       class="form-control">

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <button type="submit" value=""
                                                                    name="submit" id="submit"
                                                                    class="form-control btn btn-primary"
                                                                    style="margin-left: 10px"> Update
                                                            </button>

                                                        </div>
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#settings").addClass("active")
        });
    </script>
<?php $__env->stopSection(); ?>
<style>
    #hr_management {
        color: white;
    }

    #headeradd {
        border-radius: 5px;
        padding: 10px !important;
        background: #0090ff;
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
    <div class="layout-content-body">
        <div style="margin-top: -25px;">
            <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
                <li><a href="<?php echo e(url('/userp')); ?>">User </a></li>
                <li><a href="#">Edit User</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-content">
                        <div class="panel panel-default">
                            <div class="panel-header">
                        <h1>Edit User</h1>
                            </div>
                            <div class="panel-body">
                        <form action="<?php echo e(url('/update_user')); ?>" method="post" enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="user_id" value="<?php echo e(isset($find_user) ? $find_user->id : ''); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    <label for="productName">Enter User First Name</label>
                                    <input type="text" name="f_name" id="f_name" class="form-control" value="<?php echo e(isset($find_user)? $find_user->f_name :''); ?>">
                                </p>
                                
                                <p>
                                        <label for="productName">Enter User Last Name</label>
                                        <input type="text" name="l_name" id="l_name" class="form-control" value="<?php echo e(isset($find_user)? $find_user->l_name :''); ?>">
                                    </p>
                                    <p>
                                            <label for="productName">Enter User Email</label>
                                            <input type="text" name="email" id="email" class="form-control" value="<?php echo e(isset($find_user)? $find_user->email :''); ?>">
                                        </p>
                                </p>
                                <input type="hidden" name="old_ps" id="old_ps" value="<?php echo e(isset($find_user) ? $find_user->password : ''); ?>">
                                <p>
                                    <label for="saleprice">New Password </label>
                                    <input class="form-control" name="password" id="password" type="password">
                                    <br>
                                    <span class="error5 text-center alert alert-danger hidden"></span>
                                </p>
                                <input type="hidden" name="id" value="<?php echo e($_SESSION['access']); ?>">
                               
                            </div>
                            <div class="col-md-6">
                                    <p>
                                            <label for="">Current Photo</label>
                                            <img src="/assets/image/<?php echo e(isset($find_user) ? $find_user->photo : ''); ?>" alt="" width="78px" height="78px" class="thumbnail">
                                        </p>
                                        <p>
                                            <input type="hidden" name="old_photo" value="<?php echo e(isset($find_user) ? $find_user->photo : ''); ?>">
                                        </p>
                                        <p>
                                                <label for="saleprice">Choose Photo</label>
                                                <input class="form-control" name="image" id="image" type="file">
                                                <br>
                                                <span class="error5 text-center alert alert-danger hidden"></span>
                                            </p>
                                    <p>
                                            <label for="type">Choose User Type</label>
                                            <select name="type" id="type" class="form-control">
                                                    <option value="<?php echo e(isset($find_user)? $find_user->type :''); ?>"><?php if((isset($find_user)? $find_user->type :'') == '1'): ?> Admin <?php else: ?> 
                                                        User
                                                        <?php endif; ?></option>
                                                    <option value="1">Admin</option>
                                                    <option value="0">User</option>
                                            </select>
                                            </p>
                                
                            </div>
                        </div>
                        <div style="padding-top: 5px; padding-bottom: 5px; margin-left: 500px;">
                            <button type="submit"  class="btn btn-primary">
                                <i class="glyphicon glyphicon-check"></i> Update
                            </button>
                            <a href="<?php echo e(url('/userp')); ?>"  type="button" class="btn btn-default">
                                Back
                            </a>

                        </div>
                    </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                <li><a href="#">User </a></li>
                <li><a href="<?php echo e(url('/userp')); ?>">Add User</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-content">
                        <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i
                                        class="sidenav-icon icon icon-plus"></i> Add User
                            </button>

                           

                            <div class="modal fade lg modal1" tabindex="-1" id="myModal" role="dialog"
                                 style="color: black; display: none;">
                                <style>
                                    .form-group div {
                                        margin: 2px !important;
                                    }
                                </style>
                                <div class="modal-dialog" role="document"
                                     style="width: 60vw !important; margin-left: 20vw !important;">
                                    <div class="modal-content">
                                        <form action="<?php echo e(url('/userstore')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                           
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"> Add User </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>
                                                            <label for="product_name">Enter User First Name</label>
                                                            <input class="form-control" id="name" name="name" type="text">
                                                            <br>
                                                            <span class="error1 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                        <p>
                                                            <label for="product_name">Enter User Email</label>
                                                            <input class="form-control" id="email" name="email" type="email">
                                                            <br>
                                                            <span class="error1 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                        <br>
                                                        <p>
                                                            <label for="product_name">Choose User Type</label>
                                                            <select name="type" id="type" class="form-control select2">
                                                                <option value="1">Admin</option>
                                                                <option value="0">User</option>
                                                            </select>
                                                           
                                                            <br>
                                                            <span class="error1 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                        <p><span class="label lable-info">Note: User does not have the (edit,delete) And (Settings) access</span></p>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>
                                                            <label for="product_name">Enter User Last Name</label>
                                                            <input class="form-control" id="l_name" name="l_name" type="text">
                                                            <br>
                                                            <span class="error1 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                       
                                                            <p>
                                                                    <label for="product_name">Enter User Password</label>
                                                                    <input class="form-control" id="password" name="password" type="password">
                                                                    <br>
                                                                    <span class="error1 text-center alert alert-danger hidden"></span>
                                                                </p>
                                                        <br>
                                                        <p>
                                                            <label for="product_name">Choose User Photo</label>
                                                            <input class="form-control" id="image" name="image" type="file">
                                                            <br>
                                                            <span class="error1 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div style="padding-top: 0px;">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="glyphicon glyphicon-check"></i> Add
                                                    </button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Close
                                                    </button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Bellow Row For Showing Data -->
                        <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                        <table class="table responsive  table-hover dataTable table-borderd " id="sample_1" role="grid" aria-describedby="sample_1" style="font-size: 14px; border: 1px solid black;">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 103px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">User Name
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 103px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Email
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                style="width: 103px;" aria-sort="ascending"
                                aria-label="Name: activate to sort column descending">User Type
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                style="width: 103px;" aria-sort="ascending"
                                aria-label="Name: activate to sort column descending">User Pic
                                </th>
                                
                               
                                <?php $user=DB::table('users')->where('id',$_SESSION['access'])->first(); ?>
                                <?php if($user->type==1): ?>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="2"
                                    style="width: 103px;" aria-label="Office: activate to sort column ascending">Action
                                </th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            <tbody id="showRowcompany">
                            <?php $__currentLoopData = $userShow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr role="row" class="odd item<?php echo e($item->id); ?>" >
                                    <td tabindex="0" class="sorting_1"><?php echo e($item->f_name); ?>&nbsp;<?php echo e($item->l_name); ?></td>
                                    <td><?php echo e($item->email); ?></td>
                                    <td><?php if($item->type==1): ?> Admin <?php else: ?> User <?php endif; ?></td>
                                    <td><img src="assets/image/<?php echo e($item->photo); ?>" alt="" width="50px" height="50px" class="thumbnail"></td>
                                    
                                    <?php $user=DB::table('users')->where('id',$_SESSION['access'])->first(); ?>
                                    <?php if($user->type==1): ?>
                                    <td style="white-space: nowrap !important;">
                                        <a class="edit-modalcustomer btn btn-info" href="<?php echo e(url('/updateUser/'.$item->id)); ?>" 
                                        >
                                            <span class="glyphicon glyphicon-edit"></span> Edit
                                    </a>
                                        <a class="delete-modals1 btn btn-danger" href="<?php echo e(url('/delete_user/'.$item->id)); ?>">
                                            <span class="glyphicon glyphicon-trash"></span> Delete
                                        </a>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-10 col-sm-12">
                                <div class="dataTables_paginate paging_bootstrap_number" id="sample_1_paginate">
                                    <ul class="pagination" style="visibility: visible;">
                                        <li class="active"><?php echo e($userShow->links()); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        </div
                        <!--Bellow Row For Showing Data -->
                                </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
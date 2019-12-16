<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#Customer").addClass("active")
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
                <li><a href="#">Setting </a></li>
                <li><a href="<?php echo e(url('/add_customer')); ?>">Add Customer</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-content">
                        <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i
                                        class="sidenav-icon icon icon-plus"></i> Add Customer
                            </button>
                            <button id="excel" class="btn btn-success" type="button"><i
                                        class="sidenav-icon icon icon-file-excel-o" style="font-size:larger;"></i>
                            </button>

                            <form class="pull-right" method="post" action="<?php echo e(route('/searchcustomer')); ?>">
                                <div class="col-sm-3 pull-right input-group" style="margin-top: -35px">
                                    <?php echo csrf_field(); ?>

                                    <input type="text" name="term" placeholder="Search for Customer Name"
                                           class="form-control">
                                    <span class="input-group-addon" style="padding: 0px !important; background-color: #e67e22 !important;
border: 0px solid black;">
                                      <button type="submit" class="btn btn-info form-control">
                                     <i class="icon icon-search" style="font-size: larger;font-weight: bold"></i>
                                   </button> </span>
                                </div>
                            </form>

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
                                        <form id="example-form-customer" novalidate="novalidate" method="post"
                                              data-toggle="validator" enctype="multipart/form-data"
                                        >
                                            <?php
                                            $encrypter = app('Illuminate\Encryption\Encrypter');
                                            $encrypted_token = $encrypter->encrypt(csrf_token());
                                            ?>
                                            <input id="token" type="hidden" value="<?php echo e($encrypted_token); ?>">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"> Add Customer </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>
                                                            <label for="product_name">Enter Customer Name</label>
                                                            <input class="form-control" id="name" name="name" type="text">
                                                            <br>
                                                            <span class="error1 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                        <p>
                                                            <label for="product_name">Enter Customer Address</label>
                                                            <input class="form-control" id="customer_add" name="customer_add" type="text">
                                                            <br>
                                                            <span class="error1 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div style="padding-top: 0px;">
                                                    <button type="submit" name="addmaininfo" class="btn btn-primary">
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

                        <table class="table table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-size: 14px; border: 1px solid black; width: 40%; margin-left: 20%">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 141px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Customer Name
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 141px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Customer address
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="2"
                                    style="width: 103px;" aria-label="Office: activate to sort column ascending">Action
                                </th>
                            </tr>
                            </thead>
                            <tbody id="showRowcompany">
                            <?php $__currentLoopData = $CustShow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr role="row" class="odd item<?php echo e($item->id); ?>" >
                                    <td tabindex="0" class="sorting_1"><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->address); ?></td>
                                    <td style="white-space: nowrap !important;">
                                        <button class="edit-modal1 btn btn-info" data-id="<?php echo e($item->id); ?>"
                                                data-name="<?php echo e($item->name); ?>" data-name1="<?php echo e($item->address); ?>"
                                        >
                                            <span class="glyphicon glyphicon-edit"></span> Edit
                                        </button>
                                        <button class="delete-modals1 btn btn-danger"
                                                data-id="<?php echo e($item->id); ?>" data-name="<?php echo e($item->name); ?>">
                                            <span class="glyphicon glyphicon-trash"></span> Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-10 col-sm-12">
                                <div class="dataTables_paginate paging_bootstrap_number" id="sample_1_paginate">
                                    <ul class="pagination" style="visibility: visible;">
                                        <li class="active"><?php echo e($CustShow->links()); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Bellow Row For Showing Data -->

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="myModald" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fid" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Customer Name:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="n"><br>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Customer Address:</label>
                            <div class="col-sm-10">
                                <input type="name1" class="form-control" id="n1"><br>

                            </div>
                        </div>
                    </form>
                    <div class="deleteContent">
                        Do you want to delete product <span class="dname"></span> ? <span
                                class="hidden did"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn actionBtn" data-dismiss="modal">
                            <span id="footer_action_button" class='glyphicon'> </span>
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#hr").addClass("active")
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
                <li><a href="<?php echo e(url('/add_purchases')); ?>">Add Purchases</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-content">
                        <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i
                                        class="sidenav-icon icon icon-plus"></i> Add Purchases
                            </button>
                            <button id="excel" class="btn btn-success" type="button"><i
                                        class="sidenav-icon icon icon-file-excel-o" style="font-size:larger;"></i>
                            </button>

                            <form class="pull-right" method="post" action="<?php echo e(route('/searchPurchase')); ?>">
                                <div class="col-sm-3 pull-right input-group" style="margin-top: -35px">

                                    <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                                    <input type="text" name="term" placeholder="Search for product Name or Form"
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
                                        <form id="example-form" novalidate="novalidate" method="post"
                                              data-toggle="validator" enctype="multipart/form-data"
                                              >
                                            <?php
                                            $encrypter = app('Illuminate\Encryption\Encrypter');
                                            $encrypted_token = $encrypter->encrypt(csrf_token());
                                            ?>
                                            <input id="token" type="hidden" value="<?php echo e($encrypted_token); ?>">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"> Add Purchases </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>
                                                            <label for="productName">Chose Product Name</label>
                                                            <select name="prodcutName" id="productName" class="form-control">
                                                                <?php $__currentLoopData = App\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->product_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </select>
                                                            </p>
                                                        <p>
                                                            <label for="weight">Weight</label>
                                                            <input class="form-control" id="weight" name="weight" type="text">
                                                            <br>
                                                            <span class="error2 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                        <p>
                                                            <label for="quantity">Quantity</label>
                                                            <input class="form-control" name="quantity" id="quantity" type="text">
                                                            <br>
                                                            <span class="error3 text-center alert alert-danger hidden"></span></p>
                                                        <p>
                                                            <label for="netprice">Net Price (Net Rate + Rent)</label>
                                                            <input class="form-control"  name="netprice" id="netprice" type="text">
                                                            <br>
                                                            <span class="error4 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                        <p>
                                                            <label for="saleprice">Sales Price</label>
                                                            <input class="form-control" name="saleprice" id="saleprice" type="text">
                                                            <br>
                                                            <span class="error5 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                        <input type="hidden" name="id" value="<?php echo e($_SESSION['access']); ?>">
                                                        <p>
                                                            <label for="currency">Chose Currency</label>
                                                            <select name="currency" class="form-control" id="currency">
                                                                <option value="9">AFG</option>
                                                                <option value="8">PAK</option>
                                                                <option value="7">$</option>
                                                            </select>
                                                             </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>
                                                            <label for="issuedate">Chose Issue Date</label>
                                                            <input class="form-control" name="issued" id="issuedate" type="date">                                                               <br>
                                                            <span class="error7 text-center alert alert-danger hidden"></span>
                                                        </p>

                                                        <p>
                                                            <label for="expirydate">Chose Expiry Date</label>
                                                            <input class="form-control" name="expiry" id="expirydate" type="date">
                                                            <br>
                                                            <span class="error8 text-center alert alert-danger hidden"></span>
                                                        </p>
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

                        <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 11px; border: 1px solid black; width: 100%;">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 141px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Product Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 229px;" aria-label="Position: activate to sort column ascending">
                                    Product Form
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 103px;" aria-label="Office: activate to sort column ascending">Weight
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 103px;" aria-label="Office: activate to sort column ascending">Quantity
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 103px;" aria-label="Office: activate to sort column ascending">Net Price
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 103px;" aria-label="Office: activate to sort column ascending">Total Net Cost
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 55px;" aria-label="Age: activate to sort column ascending">Sales Price
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 103px;" aria-label="Office: activate to sort column ascending">Benefits
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 103px;" aria-label="Office: activate to sort column ascending">Currency
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 108px;" aria-label="Start date: activate to sort column ascending">
                                    Issue date
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 79px;" aria-label="Salary: activate to sort column ascending">Expiry Date
                                </th>
                            </tr>
                            </thead>
                            <tbody id="showRow">
                            <?php $__currentLoopData = $showStock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr role="row" style="font-size: 14px;" class="odd">
                                <td tabindex="0" class="sorting_1"><?php echo e($item->product->product_name); ?></td>
                                <td><?php echo e($item->product->product_form); ?></td>
                                <td><?php echo e($item->weight); ?></td>
                                <td><?php echo e($item->quantity); ?></td>
                                <td><?php echo e($item->net_price); ?></td>
                                <td><?php echo e($item->quantity * $item->net_price); ?></td>
                                <td><?php echo e($item->sales_price); ?></td>
                                <td><?php echo e($item->total_benefit); ?></td>
                              <td> <?php $ros = DB::table("setting_exchange")->where('id', $item->currency)->get();
                                  ?>
                                  <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                      <?php if($ro->curna1=='1'): ?>
                                          AFN
                                      <?php elseif($ro->curna1=='3'): ?>
                                          PAK
                                      <?php elseif($ro->curna1=='2'): ?>
                                          $
                                      <?php endif; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?></td>
                                <td><?php echo e($item->isseu_date); ?></td>
                                <td><?php echo e($item->expirey_date); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="dataTables_paginate paging_bootstrap_number" id="sample_1_paginate">
                                    <ul class="pagination" style="visibility: visible;">
                                        <li class="active"><?php echo e($showStock->links()); ?></li>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
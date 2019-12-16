<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#stock").addClass("active")
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
                <li><a href="#">Stock </a></li>
                <li><a href="<?php echo e(url('/view_stock')); ?>">View All Stock</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-content">
                        <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                            <button id="excel" class="btn btn-success" type="button"><i
                                        class="sidenav-icon icon icon-file-excel-o" style="font-size:larger;"></i>
                            </button>

                            <form class="pull-right" method="post" action="<?php echo e(route('/searchStockView')); ?>">
                                <div class="col-sm-3 pull-right input-group" style="margin-top: -35px">

                                    <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                                    <input type="text" name="term" placeholder="Search for product Name"
                                           class="form-control">
                                    <span class="input-group-addon" style="padding: 0px !important; background-color: #e67e22 !important;
border: 0px solid black;">
                <button type="submit" class="btn btn-info form-control">
                    <i class="icon icon-search" style="font-size: larger;font-weight: bold"></i>
                </button> </span>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="panel-header">
                                            <h3>Stock Item Quantity</h3>
                                        </div>
                                        <div class="table-responsive">
                                            <!--Bellow Row For Showing Data -->

                                            <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 11px; border: 1px solid black; width: 100%;">
                                                <thead>
                                                <tr  role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                        style="width: 141px;padding-left: 5px" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">Product Details
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                        style="width: 103px;padding-left: 5px" aria-label="Office: activate to sort column ascending">Total Quantity
                                                    </th>
                                                </tr>
                                                </thead>

                                                <tbody id="showRow">
                                                <?php  $products = DB::table("products")->get();


                                                ?>

                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <tr role="row" style="font-size: 14px;" class="odd">
                                                        <td tabindex="0" class="sorting_1" style="padding-left: 5px">  <?php if ($mids = DB::table("products")->where('id', $pro->id)->first()) {
                                                                echo$mids->product_s . " - " .$mids->product_name;
                                                            } ?></td>
                                                        <td style="padding-left: 5px">
                                                            <?php   $rosale = DB::table("stocks")->where('product_id',$pro->id)->get();
                                                            $tot = 0;
                                                            ?>
                                                            <?php $__currentLoopData = $rosale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ros): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                                <?php  $tot = $tot + $ros->quantity;?>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            <?php if($tot<50): ?>
                                                                <span class="label label-danger"><?php echo $tot; ?></span>
                                                            <?php else: ?>
                                                                <span class="label label-success"><?php echo $tot; ?></span>
                                                            <?php endif; ?>
                                                        </td>

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
                                        </div></div></div></div>

                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="panel">
                                        <div class="panel-header">
                                                <h3>Purchases</h3>
                                            </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                        <!--Bellow Row For Showing Data -->

                        <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 11px; border: 1px solid black; width: 100%;">
                            <thead>
                            <tr  role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 141px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Product Details
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
                                style="width: 108px;" aria-label="Start date: activate to sort column ascending">
                                Purchases type
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                style="width: 108px;" aria-label="Start date: activate to sort column ascending">
                                Vendore Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 108px;" aria-label="Start date: activate to sort column ascending">
                                    Purchases date
                                </th>
                                
                            </tr>
                            </thead>
                            <tbody id="showRow">
                            <?php $__currentLoopData = $showStock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr role="row" style="font-size: 14px;" class="odd">
                                    <td tabindex="0" class="sorting_1"><?php echo e($item->product->product_s ."-".$item->product->product_name); ?></td>
                                    
                                    <?php if($item->quantity <= 10): ?>
                                        <td  title="The Quantity Is Less Then  10"><span class="label label-danger"><?php echo e($item->quantity); ?></span> </td>
                                    <?php endif; ?>
                                    <?php if($item->quantity > 10): ?>
                                        <td ><span class="label label-success"><?php echo e($item->quantity); ?></span> </td>
                                    <?php endif; ?>
                                    <td><?php echo e($item->net_price); ?></td>
                                    <td ><span class="label label-warning"><?php echo e($item->quantity * $item->net_price); ?></span></td>
                                    <td><?php echo e($item->sales_price); ?></td>
                                    <td ><span class="label label-info"><?php echo e(($item->sales_price - $item->net_price) * $item->quantity); ?></span></td>
                                   <!-- <td ><span class="label label-primary"></span></td> -->
                                   <td><?php if($item->sales_type==0): ?><span class="label label-danger">Credit</span><?php else: ?> <span class="label label-success">Cash</span> <?php endif; ?></td>
                                   <td> <?php
                                    if($item->customer_id==='null' || $item->customer_id===''){
                                     ?>
                                     <p>No Vendore</p>
                                     <?php }else{   
                                    $ros = DB::table("customers")->where('id',$item->customer_id)->get();
                                      ?>
                                      <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                          <?php echo e($ro->name); ?>

                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <?php } ?>
                                    </td>
                                   <td><?php echo date('Y-m-d',strtotime($item->created_at)) ?></td>
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
                                        </div></div></div></div>

                    </div>



                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
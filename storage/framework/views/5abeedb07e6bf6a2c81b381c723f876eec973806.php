<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#Remaining").addClass("active")
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
                <li><a href="<?php echo e(url('/view_sales')); ?>">View Sales</a></li>
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

                            <form class="pull-right" method="post" action="<?php echo e(url('/remin_id_view')); ?>">
                                <div class="col-sm-3 pull-right input-group" style="margin-top: -35px">

                                    <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                                    <input type="text" name="id" placeholder="Search for Bill Number"
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
                                        <div class="table-responsive">
                                            <!--Bellow Row For Showing Data -->
                                            <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 11px; border: 1px solid black; width: 100%;">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                        style="width: 100px;" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">Sp
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                        style="width: 100px;" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">Customer Name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                        style="width: 229px;" aria-label="Position: activate to sort column ascending">
                                                        Address
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                        style="width: 103px;" aria-label="Office: activate to sort column ascending">Bill Number
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                        style="width: 103px;" aria-label="Office: activate to sort column ascending">Product Name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                        style="width: 103px;" aria-label="Office: activate to sort column ascending">Quantity
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                        style="width: 55px;" aria-label="Age: activate to sort column ascending">Total Sales
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                        style="width: 103px;" aria-label="Office: activate to sort column ascending">Pay Bill
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                        style="width: 103px;" aria-label="Office: activate to sort column ascending">Benefits
                                                    </th>

                                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                        style="width: 108px;" aria-label="Start date: activate to sort column ascending">
                                                        Sales Type
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="3"
                                                        style="width: auto;" aria-label="Start date: activate to sort column ascending">
                                                        Action
                                                    </th>
                                                </tr>
                                                </thead>
                                                <?php  $idR = 0;?>
                                                <tbody id="showRowSale">
                                                <?php $__currentLoopData = $show_sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <tr role="row" style="font-size: 14px;" class="odd">
                                                        <td id="hid1" style="border:0px solid black!important;border-bottom-color: white!important;border-right-color: white">
                                                            <?php
                                                            if($item->giveback == "false") {?>
                                                            <i class="sidenav-icon icon icon-times"
                                                               style="background-color: #e74c3c;color: white;border-radius: 5px;"></i>
                                                            <?php }else { ?>
                                                            <i class="sidenav-icon icon icon-check"
                                                               style="background-color: #35cf76;color: white;border-radius: 5px;"></i>
                                                            <?php }?>
                                                        </td>

                                                        <?php
                                                        $custName = DB::table("customers")->where('id', $item->customer_id)->get();
                                                        ?>
                                                        <?php $__currentLoopData = $custName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                            <td tabindex="0" class="sorting_1"><?php echo e($name->name); ?></td>
                                                            <td><?php echo e($name->address); ?></td>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        <td><?php
                                                            $max = $item->bene;
                                                            echo "sartaj-" ."/". $max;
                                                            ?></td>
                                                        <td><?php echo e($item->Product->product_name); ?></td>
                                                        <td><?php echo e($item->quantity); ?></td>
                                                        <td><?php echo e($item->total_price); ?> Paid :
                                                            <?php // $ros = DB::table("setting_exchange")->where('id', $item->currency)->get();
                                                            ?>
                                                          
                                                        </td>

                                                        <?php if($item->paybill == $item->total_price): ?>
                                                            <td><span class="label label-success"><?php echo e($item->paybill); ?></span></td>
                                                        <?php endif; ?>

                                                        <?php if($item->paybill != $item->total_price): ?>
                                                            <td><span class="label label-danger"><?php echo e($item->paybill); ?></span></td>
                                                        <?php endif; ?>
                                                        <td><?php echo e($item->mid); ?></td>
                                                        <?php if($item->sales_type == '1'): ?>
                                                            <td ><span class="label label-danger time">
                                            DEBT
                                        </span></td>
                                                        <?php endif; ?>
                                                        <?php if($item->sales_type == '2'): ?>
                                                            <td><span class="label label-success time">CREDIT</span></td>
                                                        <?php endif; ?>
                                                        <?php $idR = $item->bene;?>
                                                        <td> <button class="btn btn-outline-danger btn-icon sq-32"  title="Give back This Record"
                                                                     href="#giveback" data-toggle="modal"
                                                                     data-target="#giveback<?php echo $idR?>">
                                                                <i class="icon icon-signing"></i>
                                                            </button></td>
                                                        <td><a title="Update The Selected Record" href="<?php echo e(route('/edit_sales',['id'=>$item->id])); ?>" >  <button class="btn btn-outline-success btn-icon sq-32"
                                                                                                                                                               type="button">
                                                                    <i class="icon icon-edit"></i>
                                                                </button></a></td><td><a title="Delete The Selected Record" href="<?php echo e(route('/delete_sales',['id'=>$item->id])); ?>">  <button class="btn btn-outline-danger btn-icon sq-32" title="Delete this Record "><i class=" icon icon-remove"></i>
                                                                </button></a></td>
                                                    </tr>
                                                    <?php echo $__env->make('page.sales_giveback', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="dataTables_paginate paging_bootstrap_number" id="sample_1_paginate">
                                                        <ul class="pagination" style="visibility: visible;">
                                                            <li class="active"><?php echo e($show_sales->links()); ?></li>
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
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
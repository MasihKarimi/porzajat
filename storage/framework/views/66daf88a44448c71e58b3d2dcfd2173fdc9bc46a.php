<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#procurement").addClass("active")
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

                            <form class="pull-right" method="post" action="<?php echo e(url('/sales_id_view')); ?>">
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
                        <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 14px; border: 1px solid black; width: 100%;">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 100px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Sp
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
                                    style="width: 55px;" aria-label="Age: activate to sort column ascending">Sales Date
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="4"
                                    style="width: auto;" aria-label="Start date: activate to sort column ascending">
                                   Action
                                </th>
                            </tr>
                            </thead>
                            <?php  $idR = 0;?>
                            <tbody id="showRowSale">
                            <?php $__currentLoopData = $comp_sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
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
                                    <td><?php
                                        $max = $item->bene;
                                        echo "sartaj-" ."/". $max;
                                        ?></td>
                                    <td><?php echo e($item->Product->product_name); ?></td>
                                    <td><?php echo e($item->quantity); ?>&nbsp;<?php echo e($item->unit); ?></td>
                                    <td><?php echo e($item->date); ?>

                                    </td>
                                    <td> <a href="<?php echo e(url('pharmacy_salesdetail', $item->id)); ?>" title="Details of the Record Shows">
                                            <button class="btn btn-outline-default btn-icon sq-32"
                                                    type="button">
                                                <i class="icon icon-info-circle"></i>
                                            </button>
                                        </a></td>
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
                                        <li class="active"><?php echo e($comp_sales->links()); ?></li>
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
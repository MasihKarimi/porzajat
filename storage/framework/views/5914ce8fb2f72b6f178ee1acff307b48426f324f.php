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
                        <?php echo $__env->make('include.add_sales', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table id="demo-dynamic-tables-1" class="table table-middle">
                            <thead>
                            <tr>
                                <th id="hid"></th>
                                <th >No</th>
                                <th style="width: 25%">Bill Number</th>
                                <th style="width: 25%">Medicine Name</th>
                                <th style="width: 25%">Quantity </th>
                                <th style="width: 25%">Sales Date</th>
                                <th style="white-space: nowrap">Action</th>
                            </tr>
                            </thead>
                            <?php $id = 0; $idR = 0;?>
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
                                   // $custName = DB::table("customers")->where('id', $item->customer_id)->get();
                                    ?>
                                  
                                    <td><?php echo $id++;?></td>
                                    <td><?php
                                        $max = $item->bene;
                                        echo "sartaj-" ."/". $max;
                                        ?></td>
                                    <td ><?php echo e($item->Product->product_name); ?></td>
                                    <td><?php echo e($item->quantity); ?></td>
                                    <td><?php echo e($item->date); ?></td>
                                    <?php $idR = $item->bene;?>
                                    <td style="width: 20%"> <button class="btn btn-outline-danger btn-icon sq-32"  title="Give back This Record"
                                                 href="#giveback" data-toggle="modal"
                                                 data-target="#giveback<?php echo $idR?>">
                                            <i class="icon icon-signing"></i>
                                        </button>
                                    <a href="<?php echo e(url('pharmacy_salesdetail', $item->id)); ?>" title="Details of the Record Shows">
                                            <button class="btn btn-outline-default btn-icon sq-32"
                                                    type="button">
                                                <i class="icon icon-info-circle"></i>
                                            </button>
                                        </a>
                                    <a title="Update The Selected Record" href="<?php echo e(route('/edit_sales',['id'=>$item->id])); ?>" >  <button class="btn btn-outline-success btn-icon sq-32"
                                                                                                                                                               type="button">
                                                <i class="icon icon-edit"></i>
                                            </button></a>
                                    <a title="Delete The Selected Record" href="<?php echo e(route('/delete_sales',['id'=>$item->id])); ?>">  <button class="btn btn-outline-danger btn-icon sq-32" title="Delete this Record "><i class=" icon icon-remove"></i>
                                            </button></a>
                                    </td>
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
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
                <li><a href="<?php echo e(url('/view_purchase')); ?>">View Purchases</a></li>
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
                        </div>
                        <form action="<?php echo e(route('/update_purchase')); ?>" method="post" enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="singleID" value="<?php echo e(isset($edit_purchase) ? $edit_purchase->id : ''); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    <label for="productName">Chose Product Name</label>
                                    <select name="prodcutName" id="productName" class="form-control">
                                        <?php $__currentLoopData = App\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->product_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <font style="color: red;"> The Current Product Name Is : <span style="font-weight: bold;"><?php echo e(isset($edit_purchase) ? $edit_purchase->product->product_name : ''); ?></span></font>
                                </p>
                                <p>
                                    <label for="weight">Weight</label>
                                    <input class="form-control" value="<?php echo e(isset($edit_purchase) ? $edit_purchase->weight : ''); ?>" id="weight" name="weight" type="text">
                                    <br>
                                    <span class="error2 text-center alert alert-danger hidden"></span>
                                </p>
                                <p>
                                    <label for="quantity">Quantity</label>
                                    <input class="form-control" value="<?php echo e(isset($edit_purchase) ? $edit_purchase->quantity : ''); ?>" name="quantity" id="quantity" type="text">
                                    <br>
                                    <span class="error3 text-center alert alert-danger hidden"></span></p>
                                <p>
                                    <label for="netprice">Net Price (Net Rate + Rent)</label>
                                    <input class="form-control"  value="<?php echo e(isset($edit_purchase) ? $edit_purchase->net_price : ''); ?>" name="netprice" id="netprice" type="text">
                                    <br>
                                    <span class="error4 text-center alert alert-danger hidden"></span>
                                </p>
                                <p>
                                    <label for="saleprice">Sales Price</label>
                                    <input class="form-control" value="<?php echo e(isset($edit_purchase) ? $edit_purchase->sales_price : ''); ?>" name="saleprice" id="saleprice" type="text">
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
                                    <font style="color: red;"> The Current Sales Currency Is : <span style="font-weight: bold;">
                                                <?php $ros = DB::table("setting_exchange")->where('id', isset($edit_purchase) ? $edit_purchase->currency : '')->get();
                                            ?>
                                            <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php if($ro->curna1=='1'): ?>
                                                    AFN
                                                <?php elseif($ro->curna1=='3'): ?>
                                                    PAK
                                                <?php elseif($ro->curna1=='2'): ?>
                                                    $
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </span></font>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <label for="issuedate">Chose Issue Date</label>
                                    <input class="form-control" name="issued" id="issuedate" type="date">
                                    <br>
                                    <font style="color: red;"> The Current Product Issue Date Is : <span style="font-weight: bold;"><?php echo e(isset($edit_purchase) ? $edit_purchase->isseu_date : ''); ?></span></font>
                                    <span class="error7 text-center alert alert-danger hidden"></span>
                                </p>

                                <p>
                                    <label for="expirydate">Chose Expiry Date</label>
                                    <input class="form-control" name="expiry" id="expirydate" type="date">
                                    <br>
                                    <font style="color: red;"> The Current Product Expiry Date Is : <span style="font-weight: bold;"><?php echo e(isset($edit_purchase) ? $edit_purchase->expirey_date : ''); ?></span></font>
                                    <span class="error8 text-center alert alert-danger hidden"></span>
                                </p>
                            </div>
                        </div>
                        <div style="padding-top: 5px; padding-bottom: 5px; margin-left: 500px;">
                            <button type="submit" name="addmaininfo" class="btn btn-primary">
                                <i class="glyphicon glyphicon-check"></i> Update
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Back
                            </button>

                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
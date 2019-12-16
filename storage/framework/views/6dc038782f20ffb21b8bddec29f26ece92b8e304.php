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
                <li><a href="<?php echo e(url('/view_purchase')); ?>">Purchases </a></li>
                <li><a href="#">Edit Purchases</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-content">
                        <div class="panel panel-default">
                            <div class="panel-header">
                        <h1>Edit Purchases</h1>
                            </div>
                            <div class="panel-body">
                        <form action="<?php echo e(route('/update_purchase')); ?>" method="post" enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="singleID" value="<?php echo e(isset($edit_purchase) ? $edit_purchase->id : ''); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    <label for="productName">Chose Product Name</label>
                                    <select name="prodcutName" id="productName" class="form-control">
                                        <option value="<?php echo e(isset($edit_purchase) ? $edit_purchase->product_id : ''); ?>"><?php echo e(isset($edit_purchase) ? $edit_purchase->Product->product_name : ''); ?></option>
                                        <?php $__currentLoopData = App\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->product_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
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
                              
                            </div>
                            <div class="col-md-6">
                                    <p>
                                            <label for="customer_id">Chose Vendore Name</label>
                                            <select name="customer_id" id="customer_id" class="form-control">
                                                    <option value="<?php echo e(isset($edit_purchase)? $edit_purchase->customer_id :''); ?>"><?php if((isset($edit_purchase)? $edit_purchase->customer_id :'') == ''): ?> No vendore <?php else: ?> 
                                                        <?php $custo=DB::table('customers')->where('id',$edit_purchase->customer_id)->first(); echo $custo->name; ?>
                                                        <?php endif; ?></option>
                                                    <option value="">No Vendore</option>    
                                                <?php $__currentLoopData = App\Customer::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                            </p>
                                <p>
                                        <label for="ptype">Purchase Type</label>
                                        <select name="ptype" class="form-control" id="ptype">
                                            <option value="<?php echo e(isset($edit_purchase)? $edit_purchase->sales_type :''); ?>"><?php if((isset($edit_purchase)? $edit_purchase->sales_type :'') == 0): ?> Credit <?php else: ?> Cash <?php endif; ?></option>
                                            <option value="0">Credit</option>
                                            <option value="1">Cash</option>
                                        </select>
                                    </p>
                            </div>
                        </div>
                        <div style="padding-top: 5px; padding-bottom: 5px; margin-left: 500px;">
                            <button type="submit" name="addmaininfo" class="btn btn-primary">
                                <i class="glyphicon glyphicon-check"></i> Update
                            </button>
                            <a href="<?php echo e(url('/view_purchase')); ?>"  type="button" class="btn btn-default">
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
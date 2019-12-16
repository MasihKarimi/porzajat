<style>
    #Msales {
        color: white;
    }

    #headeradd {
        border-radius: 5px;
        padding: 10px !important;
        background: #e67e22;
    }



    /*tbody td {*/
    /*border: 1px solid #f0f0f0*/
    /*}*/

    /*#hid {*/
    /*visibility: hidden;*/
    /*}*/
</style>

;

<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#quotation").addClass("active")
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div style="margin-top: -25px;">
        <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
            <li><a href="#">Quotations </a></li>
            <li><a href="#">Quotation</a></li>
            <li><a href="#">Edit</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <?php $row=DB::table('quotations')->where('id',isset($edit_qu) ? $edit_qu->id :'')->get(); ?>

                <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                    <div class="box-content">
                        <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                            <a href="<?php echo e(url('add_q')); ?>">
                                <button type="button" class="btn btn-info">
                                <span style="font-size: larger"><i
                                            class="sidenav-icon icon icon-chevron-left"></i></span> Back
                                </button>
                            </a>
                            <a href="<?php echo e(url('add_q')); ?>">
                            <button type="submit" class="btn btn-success pull-right"
                                    style="box-shadow: 0px 0px 5px 0px white"><i
                                        class="icon icon-edit"></i> Done
                            </button>
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="hidden" name="id" value="<?php echo e($rows ->id); ?>">
                                        <div class="col-lg-10 ">
                                            <div class="demo-form-wrapper">
                                                <div class="modal-body"
                                                     style="">
                                                    <div class="form-group">
                                                        <div class="col-sm-4">
                                                            <label class="control-label">Quotation Number </label>
                                                            <select disabled class="form-control">
                                                                <option value="<?php echo e($rows->bene); ?>">
                                                                    <?php echo e($rows->bene); ?>

                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label class="control-label">Date </label>
                                                            <input type="text" name="discount" disabled
                                                                   style="background-color: rgba(0, 0, 0, 0.03)"
                                                                   class="form-control" value="<?php echo e($rows->date); ?>">
                                                        </div>


                                                        <div class="col-sm-12">
                                                            <hr>
                                                        </div>

                                                        <table style="border: 0px solid black!important;">
                                                            <tr>
                                                                <td>
                                                                    <div class="col-sm-2" style="white-space: nowrap">
                                                                        <label class="control-label">Part
                                                                            Number </label>
                                                                    </div>
                                                                </td>
                         
                                                                <td style="white-space: nowrap">
                                                                    <div class="col-sm-2">
                                                                        <label class="control-label">Quantity
                                                                             </label>
                                                                    </div>
                                                                </td>
                                                                <td style="white-space: nowrap">
                                                                    <div class="col-sm-2">
                                                                        <label class="control-label">Sales Price Per Item
                                                                             </label>
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="col-sm-1">
                                                                        <label class="control-label">Action </label>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                            <?php $ids = 0; ?>
                                                            <?php
                                                            $ros = DB::table("quotations")->where('bene', $rows->bene)->get();
                                                            ?>
                                                            <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <form id="" novalidate method="post"
                                                                      data-toggle=""
                                                                      enctype="multipart/form-data"
                                                                      action="<?php echo e(url('/update_q')); ?>">
                                                                    <input type="hidden" value="<?php echo e($ro->id); ?>" name="id"
                                                                           id="id">
                                                                    <input type="hidden" value="<?php echo e($ro->bene); ?>" name="bill_number"
                                                                           id="bill_number">
                                                                    <input type="hidden" value="<?php echo e($ro->product_id); ?>" name="product_id"
                                                                           id="product_id">
                                                                    <input type="hidden" name="customer_id" value="<?php echo e($ro->customer_id); ?>">       
                                                                    <tr>
                                                                        <td style="border-bottom: 5px!important; ">
                                                                            <div class="col-sm-2">
                                                                                <select class="chzn-select form-control selects"
                                                                                        data-placeholder="Select a Product "
                                                                                         id="item"
                                                                                        style="width: 5%!important;"
                                                                                        name="item" required>
                                                                                    <option value="<?php echo e($ro->product_id); ?>">
                                                                                        <?php
                                                                                        if ($ross = DB::table("products")->where('id', $ro->product_id)->first()) {
                                                                                           echo $ross->product_s;
                                                                                        }?>
                                                                                    </option>
                                                                                    <?php
                                                                                    $ros = DB::table("products")->where('id', $ro->product_id)->get();
                                                                                    ?>
                                                                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roo): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>{
                                                                                    <option value="<?php echo e($roo->id); ?>

                                                                                    <?php $ids = $roo->id; ?>"><?php echo e($roo->product_s); ?></option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                        <input type="hidden" name="_token"
                                                                               value="<?php echo e(csrf_token()); ?>">

                                                                        <td>
                                                                            <div class="col-sm-2">
                                                                                <input class="form-control"
                                                                                       style="width: 100px!important;"
                                                                                       type="number"
                                                                                       name="quantity"
                                                                                       value="<?php echo $ro->quantity; ?>">
                                                                            </div>
                                                                        </td>
                                                                        <td style="border-bottom: 5px!important; ">
                                                                            <div class="col-sm-8">
                                                                                <input type="number" name="sales_price" class="form-control" value="<?php echo e($ro->sales_price); ?>" id="sales_price">
                                                                            </div>    
                                                                        </td>
                                                                        
                                                                        <td>
                                                                            <div class="col-sm-1">
                                                                                <button class="btn btn-outline-success btn-icon sq-32"
                                                                                        type="submit">
                                                                                    <i class="icon icon-edit"></i>
                                                                                </button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </form>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        </table>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
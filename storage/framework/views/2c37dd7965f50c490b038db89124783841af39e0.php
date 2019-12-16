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
                        </div>
                        <form action="<?php echo e(route('/update_sales')); ?>" method="post" enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="singleID" value="<?php echo e(isset($edit_sales) ? $edit_sales->id : ''); ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        <label for="buyerName">Customer Name</label>
                                        <input class="form-control" value="<?php echo e(isset($edit_sales) ? $edit_sales->seller_name : ''); ?>" id="buyerName" name="buyerName" type="text">

                                        <span class="error2 text-center alert alert-danger hidden"></span>
                                    </p>
                                    <p>
                                        <label for="address">Customer Address</label>
                                        <input class="form-control" value="<?php echo e(isset($edit_sales) ? $edit_sales->address : ''); ?>" name="address" id="address" type="text">

                                        <span class="error3 text-center alert alert-danger hidden"></span></p>
                                    <p>
                                    <p>
                                        <label for="bill_number">Bill Number</label>
                                        <input class="form-control" readonly value="sartaj-/<?php echo e(isset($edit_sales) ? $edit_sales->bene : ''); ?>" name="bill_number" id="bill_number" type="text">

                                        <span class="error3 text-center alert alert-danger hidden"></span></p>
                                    <p>
                                    <p>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Chose Product </label>
                                        </div>
                                        <div class="col-sm-7 input-group">
                                            <select class="chzn-select form-control edit "
                                                    data-placeholder="Select an Option" style="" id="recept_id"
                                                    name="recept_id" required>
                                                <?php
                                                $ros = DB::table("products")->where('id',isset($edit_sales) ? $edit_sales->product_id : '')->get();
                                                ?>
                                                <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option value="<?php echo e($ro->id); ?>"> <?php echo e($ro->product_name); ?></option>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                <?php
                                                $ross = DB::table("products")->get();
                                                ?>
                                                <?php $__currentLoopData = $ross; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option value="<?php echo e($ro->id); ?>"> <?php echo e($ro->product_name); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                            <font style="color: red;"> The Current Product Is : <span style="font-weight: bold;">
                                                <?php echo e(isset($edit_sales) ? $edit_sales->Product->product_name : ''); ?>

                                                    </span></font>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('.edit').change(function () {
                                                var id = $(this).val();
                                                $('#data ').html("Loading...");
                                                $('#data').load('<?php echo e(url("medicineName")); ?>/' + id);
                                            });
                                        });
                                    </script>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Detail In Stock </label>
                                        </div>
                                        <div class="col-sm-7 input-group">
                                            <textarea name="data" id="data" style="background-color:#ffffff" disabled
                                                      class="form-control" rows="5"></textarea></div>
                                    </div>

                                    <p>
                                    <input type="hidden" name="id" value="<?php echo e($_SESSION['access']); ?>">
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('.fees').keyup(function () {
                                                var id = $(this).val();
                                                var cur = $("#currencyType").val();
                                                $('#echangeResult').load('<?php echo e(url("exchangeTypeSendto")); ?>/' + id + '/' + cur);
                                            });
                                        });
                                    </script>
                                    <p>
                                        <label for="salestype">Chose Sales Type</label>
                                        <select name="salestype" class="form-control" id="salestype">
                                            <?php
                                            $ros = DB::table("sales")->where('id',isset($edit_sales) ? $edit_sales->id : '')->get();
                                            ?>
                                            <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <option value="<?php echo e($ro->sales_type); ?>"> <?php if($ro->sales_type==1): ?> Debt <?php else: ?> Credit <?php endif; ?></option>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            <option value="1">Debt</option>
                                            <option value="2">Credit</option>
                                        </select>
                                        <font style="color: red;"> The Current  Sales Type Is : <span style="font-weight: bold;">
                                                <?php if((isset($edit_sales) ? $edit_sales->sales_type : '') == '2'): ?>
                                                    Credit
                                                <?php endif; ?>
                                                <?php if((isset($edit_sales) ? $edit_sales->sales_type : '')=='1'): ?>
                                                    Debit
                                                <?php endif; ?>
                                            </span></font>
                                    </p>
                                </div>
                                <div class="col-md-6">


                                    <p>
                                        <label for="netprice">Net price</label>
                                        <input class="form-control" value="0"  name="netprice" id="netprice" type="text">
                                        <span class="error3 text-center alert alert-danger hidden"></span></p>
                                    <p>
                                    <p>
                                        <label for="salesprice">sales price</label>
                                        <input class="form-control" value="0"  name="salesprice" id="salesprice" type="text">
                                        <span class="error3 text-center alert alert-danger hidden"></span></p>
                                    <p>
                                        <label for="quantity">Quantity</label>
                                        <input class="form-control" value="<?php echo e(isset($edit_sales) ? $edit_sales->quantity : ''); ?>" name="quantity" id="quantity" type="text">
                                        <span class="error3 text-center alert alert-danger hidden"></span></p>
                                    <p>
                                        <label for="quantity">return product quantity</label>
                                        <input class="form-control" value="<?php echo e(isset($edit_sales) ? $edit_sales->return_p : ''); ?>" name="rtp" id="rtp" type="text">
                                        <span class="error3 text-center alert alert-danger hidden"></span></p>
                                    <p>
                                        <label for="tsalesm">Total Price</label>
                                        <input class="form-control" name="tsalesm" id="tsalesm" value="<?php echo e(isset($edit_sales) ? $edit_sales->total_price : ''); ?>" type="text">
                                        <span class="error7 text-center alert alert-danger hidden"></span>
                                    </p>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Exchange AFN Currency</label>
                                        </div>
                                        <div class="col-sm-7  input-group">
                                            <select class="form-control Type" name="currencyType" required id="currencyType">
                                                <?php $ros = DB::table("setting_exchange")->where('id',isset($edit_sales) ? $edit_sales->currency : '' )->get();
                                                ?>
                                                <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php if($ro->curna1=='1'): ?>
                                                            <option value="0">AFN</option>
                                                    <?php elseif($ro->curna1=='3'): ?>
                                                            <option value="2">PAK</option>
                                                    <?php elseif($ro->curna1=='2'): ?>
                                                            <option value="1">$</option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                <option value="0">AFN</option>
                                                <option value="2">PAK</option>
                                                <option value="1">$</option>
                                            </select>
                                            <font style="color: red;"> The Current Sales Currency Is : <span style="font-weight: bold;">
                                                 <?php $ros = DB::table("setting_exchange")->where('id',isset($edit_sales) ? $edit_sales->currency : '' )->get();
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
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">* Exchange Currency</label>
                                        </div>
                                        <div class="col-sm-7 input-group ">
                                            <input type="number" required name="tsales" id="tsales" class="form-control fees">
                                            <span class="input-group-addon">AFN</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Discount %</label>
                                        </div>
                                        <div class="col-sm-7  input-group">
                                            <select class="form-control edit" name="percent" id="percent"
                                                    style="width: 100%;border: 1px solid #6fa0ff">
                                                <option value=""></option>
                                                <option value="0">0 %</option>
                                                <option value="1">1 %</option>
                                                <option value="2">2 %</option>
                                                <option value="3">3 %</option>
                                                <option value="4">4 %</option>
                                                <option value="5">5 %</option>
                                                <option value="6">6 %</option>
                                                <option value="7">7 %</option>
                                                <option value="8">8 %</option>
                                                <option value="9">9 %</option>
                                                <option value="10">10 %</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" style="background-color: #f0f0f0">
                                        <div class="col-sm-4">
                                            <label class="control-label">Total Amount </label>
                                        </div>
                                        <div class="col-sm-7 input-group" id="sales">
                                            <input type="text" value="" style="background-color: rgba(255, 255, 255, 0.35)"
                                                   name="sales" id="sales" class="form-control totalsale"> <span
                                                    class="input-group-addon">AFN</span>
                                        </div>
                                    </div>


                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('.edit').change(function () {
                                                var percen = $(this).val();
                                                var price = $("#amountes").val();
                                                $('#sales ').html("<input type='text' value='Loading ...' style='background-color: rgba(255, 255, 255, 0.35)' name='sales' id='sales' class='form-control'>  <span class='input-group-addon'>AFN</span>");
                                                $('#sales ').load('<?php echo e(url("procurementSales")); ?>/' + percen + '/' + price);
                                            });
                                        });
                                    </script>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Exchange Detail</label>
                                        </div>
                                        
                                        <div class="col-sm-7 input-group" id="echangeResult">
                                            <textarea rows="3" name="exchange" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    </p>

                                    <p>
                                        <label for="pbill">Pay Bill</label>
                                        <input class="form-control" name="pbill" id="pbill" value="<?php echo e(isset($edit_sales) ? $edit_sales->paybill : ''); ?>" type="text">
                                        <span class="error7 text-center alert alert-danger hidden"></span>
                                    </p>
                                    <p>
                                        <label for="mid">benefit</label>
                                        <input class="form-control" name="mid" id="mid" value="<?php echo e(isset($edit_sales) ? $edit_sales->mid : ''); ?>" type="text">
                                        <span class="error7 text-center alert alert-danger hidden"></span>
                                    </p>
                                    <script>
                                        $(document).ready(function(){
                                            $("#quantity").on('keyup',function () {
                                                var quantity=$(this).val();
                                                var salesprice=$('#salesprice').val();
                                                var sum=quantity * salesprice ;
                                                var netprice=$('#netprice').val();

                                                var mido=(salesprice-netprice) * quantity;
                                                $('#tsalesm ').val(sum);
                                                var mid=$("#mid").val(mido);
                                            })
                                        });
                                    </script>
                                </div>
                            </div>
                            <div style="padding-top: 5px; padding-bottom: 5px; margin-left: 500px;">
                                <button type="submit" name="addmaininfo" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-check"></i> Update
                                </button>
                                <a href="<?php echo e(url('/view_sales')); ?>">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Back
                                </button>
                                </a>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
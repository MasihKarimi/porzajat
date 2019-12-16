<style>
    #fexpenses {
        color: white;
    }

    #headeradd {
        border-radius: 5px;
        padding: 10px !important;
        background: #e67e22;
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

;

<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#rdm").addClass("active")
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div style="margin-top: -25px;">
        <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
            <li><a href="#">Finance </a></li>
            <li><a href="#">Cash Payment</a></li>
            <li><a href="#">Edit</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">

                <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <form id="demo-form-wizard-1" novalidate method="post"
                          data-toggle="validator"
                          enctype="multipart/form-data"
                          action="<?php echo e(url('/cash_payment_updatesd')); ?>">
                        <div class="box-content">
                            <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                                <a href="javascript:;" onclick="history.go(-1)">
                                    <button type="button" class="btn btn-info">
                                <span style="font-size: larger"><i
                                            class="sidenav-icon icon icon-chevron-left"></i></span> Back
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-success pull-right"
                                        style="box-shadow: 0px 0px 5px 0px white"><i
                                            class="icon icon-edit"></i> Update
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="table-responsive">


                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                <input type="hidden" name="id" value="<?php echo e($rows ->id); ?>">
                                                <input type="hidden" name="tl_amount" value="<?php echo e($rows->tl_amount); ?>">
                                                <div class="col-lg-8 col-lg-offset-2">
                                                    <div class="demo-form-wrapper">

                                                        <div class="modal-body"
                                                             style="overflow-y: hidden!important;overflow-x: hidden;">
                                                            <div class="form-group">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label">Date </label>
                                                                </div>
                                                                <div class="col-sm-6 input-group">
                                                                    <input type="date" value="<?php echo e($rows->date); ?>"
                                                                           name="date" id="date"
                                                                           class="form-control">

                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label">Amount</label>
                                                                </div>
                                                                <div class="col-sm-6 input-group">
                                                                    <input type="amount" name="amount"
                                                                           value="<?php echo e($rows->pay_amount); ?>" id="amount"
                                                                           class="form-control"><span
                                                                            class="input-group-addon"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label">Serial Number</label>
                                                                </div>
                                                                <div class="col-sm-6 input-group">
                                                                    <input readonly type="serial" name="serial"
                                                                           value="<?php echo e($rows->id); ?>" id="amount"
                                                                           class="form-control">
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
                        </div>
                    </form>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
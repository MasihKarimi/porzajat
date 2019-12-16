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
            $("#finance").addClass("active")
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div style="margin-top: -25px;">
        <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
            <li><a href="#">Reception </a></li>
            <li><a href="#">Expense</a></li>
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
                          action="<?php echo e(url('/finance_expensesupdates')); ?>">
                        <div class="box-content">
                            <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                                <a href="<?php echo e(url('finance_expenses')); ?>">
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

                                                <div class="col-lg-8 col-lg-offset-2">
                                                    <div class="demo-form-wrapper">

                                                        <div class="modal-body"
                                                             style="overflow-y: hidden!important;overflow-x: hidden;">


                                                            <div class="form-group">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label">Expenses Type </label>
                                                                </div>
                                                                <div class="col-sm-7 input-group">
                                                                    <select class="chzn-select form-control selects"
                                                                            data-placeholder="Select a Doctor " style=""
                                                                            id="expenses"
                                                                            name="expenses" required>
                                                                        
                                                                        <?php
                                                                        $ros = DB::table("setting_expenses")->where('id', $rows->expenses_type)->get();
                                                                        ?>
                                                                        <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                            <option value="<?php echo e($ro->id); ?>"> <?php echo e($ro->expensesna); ?></option>

                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                                        <?php
                                                                        $ross = DB::table("setting_expenses")->get();
                                                                        ?>
                                                                        <?php $__currentLoopData = $ross; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                            <option value="<?php echo e($ro->id); ?>"> <?php echo e($ro->expensesna); ?> </option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>

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
                                                                    <label class="control-label">Res Person Name</label>
                                                                </div>
                                                                <div class="col-sm-7 input-group">
                                                                    <input type="text" name="r_name" value="<?php echo e($rows->r_name); ?>" id="r_name" class="form-control fees">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label">Amount</label>
                                                                </div>
                                                                <div class="col-sm-6 input-group">
                                                                    <input type="amount" name="amount"
                                                                           value="<?php echo e($rows->amount); ?>" id="amount"
                                                                           class="form-control"><span
                                                                            class="input-group-addon"> <?php if($rows->currencytype==0): ?> AFG <?php endif; ?> <?php if($rows->currencytype==2): ?> PAK <?php endif; ?>  <?php if($rows->currencytype==1): ?> $ <?php endif; ?></span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label">Remark</label>
                                                                </div>
                                                                <div class="col-sm-6 input-group">
                                                                    <textarea name="remark" class="form-control"
                                                                              rows="5"
                                                                              id="remark"><?php echo e($rows->remark); ?></textarea>
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
<style>
    #expenses,#settings {
        color: white;
        font-weight: bold;

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
<?php $__env->startSection('content'); ?>
    <div style="margin-top: -25px;">
        <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
            <li><a href="#">Setting </a></li>
            <li><a href="#">Expenses</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    <div class="alert alert-info" id="headeradd" style="border: 0px solid black;">
                       <a href="<?php echo e(url('expenses')); ?>">
                        <button type="button" class="btn btn-info">
                            <span style="font-size: larger"><i class="sidenav-icon icon icon-chevron-left"></i></span> Back
                        </button>
                       </a>
                        </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="table-responsive">

                                        <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <form method="post" action="<?php echo e(url('/expensesupdates')); ?>">

                                                <input type="hidden" name="id" value="<?php echo e($rows ->id); ?>">
                                                <div class="modal-body" style="height: 55vh; overflow-y: auto">
                                                    <div class="form-group">
                                                        <div class="col-sm-4">
                                                            <label class="control-label">Expenses Type </label>
                                                        </div>
                                                        <div class="col-sm-7 input-group">
                                                            <input type="text" name="expenses_na" value="<?php echo e($rows->expensesna); ?>" required class="form-control">
                                                            <span class="input-group-addon"></span>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <div>
                                                        <button type="submit" name="addmaininfo"
                                                                class="btn btn-primary">
                                                            <i class="glyphicon glyphicon-check"></i> Update
                                                        </button>

                                                    </div>
                                                </div>
                                            </form>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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
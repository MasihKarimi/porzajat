;

<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#finance").addClass("active")
        });
    </script>
<?php $__env->stopSection(); ?>
<style>
    #fexpenses {
        color: white;
    }

    #headers {
        margin-right: 10px;
        font-weight: bold;

    }

    #printhr td {
        border: 0px solid black !important;
    }

    #detailtable td {
        /*border-color: white !important;*/
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

<?php $__env->startSection('content'); ?>
    <div style="margin-top: -25px;">
        <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
            <li><a href="#">Reception </a></li>
            <li><a href="#">Expenses</a></li>
            <li><a href="#">Detail</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    
                    <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                        <a href="<?php echo e(url('finance_expenses')); ?>">
                            <button type="button" class="btn btn-info">
                                <span style="font-size: larger"><i
                                            class="sidenav-icon icon icon-chevron-left"></i></span> Back
                            </button>
                        </a>
                        <a href="javascript:void(0);" id="print_button">
                            <button type="button" class="btn btn-success pull-right"
                                    style="box-shadow: 0px 0px 5px 0px white"><i
                                        class="icon icon-print"></i> Print
                            </button>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <div class="panel-body" style="padding-left: 20%;padding-right:30%">
                                    <div class="dibs">
                                        <style>
                                            @media  print {
                                                #detailtable td {
                                                    /*border-color: white !important;*/
                                                }

                                                #headers {
                                                    margin-right: 10px;
                                                    font-weight: bold;

                                                }

                                                td #detailtable {
                                                    font-weight: bold !important;
                                                    text-decoration: underline !important;
                                                    color: #0e84b5 !important;
                                                }

                                            }
                                        </style>
                                        <div class="table-responsive">
                                            <?php $__env->startSection('users'); ?>
                                                <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php
                                                    $ros = DB::table("users")->where('id', $_SESSION['access'])->get();
                                                    ?>
                                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php echo e($ro->f_name); ?> <?php echo e($ro->l_name); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            <?php $__env->stopSection(); ?>
                                            <?php echo $__env->make('page.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            Expenses Information
                                            <table id="demo-dynamic-tables-2" class="table table-middle">

                                                <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                    <tr id="detailtable">
                                                        <td id="headers">Expenses Type</td>
                                                        <td> <?php
                                                        $ros = DB::table("setting_expenses")->where('id', $rows->expenses_type)->get();
                                                        ?>
                                                        <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                            <?php echo e($ro->expensesna); ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        </td>
                                                    </tr>

                                                    <tr id="detailtable">
                                                        <td id="headers">Date</td>
                                                        <td><?php echo e($rows->date); ?></td>


                                                    </tr>
                                                    <tr id="detailtable">
                                                        <td id="headers">Res Person Name</td>
                                                        <td><?php echo e($rows->r_name); ?></td>


                                                    </tr>
                                                    <tr id="detailtable">
                                                        <td id="headers">Amount</td>
                                                        <td><?php echo e(number_format($rows->amount)); ?> <?php //$ros = DB::table("setting_exchange")->orderBy('date','desc')->where('id', $rows->currencytype)->get();
                                                            ?>
                                                           </td>
                                                    </tr>
                                                    <tr id="detailtable">
                                                        <td id="headers" colspan="5">Detail:</td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" width=""><textarea rows="10" readonly
                                                                                           style="background-color: rgba(240, 240, 240, 0)!important; width: 100%;font-weight: bold; color: #0e84b5"
                                                                                           class=" form-control"> <?php echo e($rows->remark); ?> </textarea>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    </tbody>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
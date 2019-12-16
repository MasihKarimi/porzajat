;
<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#bb").addClass("active")
        });
    </script>
<?php $__env->stopSection(); ?>
<style>
    #freport {
        color: white;
    }

    #headers {
        margin-right: 10px;
        font-weight: bold;

    }

    #detailtable th {
        background-color: rgba(148, 143, 160, 0.35) !important;
        color: #1a252f;

    }

    #demo-dynamic-tables-2 td {
        border: 1px solid black !important;
    }

    #detailtable td {
        border-color: white !important;
    }

    #printreception_report td {
        border: 0px solid black !important;
    }

    #headeradd {
        border-radius: 5px;
        padding: 10px !important;
        background: #0090ff;
    }

    tr #datahead {
        border: 1px solid silver !important;
    }

    tr #databody {
        border: 1px solid silver !important;
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
            <li><a reception_reportef="#">Finance </a></li>
            <li><a reception_reportef="#">Report</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    
                    <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                        <button class="btn btn-info" style="box-shadow: 0px 0px 5px 0px white"
                                reception_reportef="#report" data-toggle="modal"
                                data-target="#report">Create Report
                        </button>

                        <button id="excel" class="btn btn-success"
                                type="button"><i class="sidenav-icon icon icon-file-excel-o"
                                                 style="font-size:larger;"></i>
                        </button>

                        <a reception_reportef="javascript:void(0);" id="print_button">
                            <button type="button" class="btn btn-success pull-right"
                                    style="box-shadow: 0px 0px 5px 0px white"><i
                                        class="icon icon-print"></i> Print
                            </button>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="dibs">
                                        <style>
                                            @media  print {
                                                #detailtable td {
                                                    border-color: white !important;
                                                }

                                                #detailtable th {
                                                    background-color: rgba(148, 143, 160, 0.35) !important;
                                                    color: #1a252f;

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

                                                tr #datahead {

                                                    border: 1px solid silver !important;
                                                }

                                                tr #databody {
                                                    border: 1px solid silver !important;
                                                }
                                            }
                                        </style>

                                        <?php if(!empty($section) and !empty($start) and !empty($end) and empty($year)): ?>
                                            <div class="table-responsive">
                                                <?php $__env->startSection('users'); ?>
                                                    <?php
                                                    $ros = DB::table("users")->where('id', $_SESSION['access'])->get();
                                                    ?>
                                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>


                                                            <?php echo e($ro->f_name); ?> <?php echo e($ro->l_name); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                <?php $__env->stopSection(); ?>
                                                <?php echo $__env->make('page.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                                <table id="demo-dynamic-tables-2" class="table table-middle">
                                                    <?php if ($section == "all") {?>

                                                    <tr id="detailtable">
                                                        <th id="datahead">No</th>
                                                        <th id="datahead">Expanses Type</th>
                                                        <th id="datahead">Date</th>
                                                        <th id="datahead" >Amount</th>
                                                        <th id="datahead" colspan="4">Remark</th>
                                                        <?php $id = 1;?>
                                                    </tr>

                                                    <?php
                                                    $ros = DB::table("finance_expenses")->whereBetween('date', [$start, $end])->where('giveback', '=', 'true')->get();
                                                    $totalPa = 0;
                                                    ?>
                                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                        <tr id="detailtable">
                                                            <td id="databody"><?php echo e($id); ?><?php
                                                                ;$id++;?></td>
                                                            <td id="databody"><?php
                                                                $ros = DB::table("setting_expenses")->where('id', $rows->expenses_type)->get();
                                                                ?>
                                                                <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <?php echo e($ro->expensesna); ?>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?></td>
                                                            <td id="databody"><?php echo e($rows->date); ?></td>
                                                            <td id="databody"><?php echo e(number_format($rows->amount)); ?>&nbsp;
                                                                <?php //$ros = DB::table("setting_exchange")->where('id', $rows->currencytype)->get();
                                                                $totalfromc=0;
                                                                ?>
                                                             
                                                                <?php $totalPa = $totalPa + $rows->amount?>
                                                            </td>
                                                            <td id="databody" style=" width: auto;" ><?php echo e($rows->remark); ?></td>

                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    <tr id="detailtable">
                                                        <th colspan="3" id="datahead"
                                                            style="">
                                                            Total Amount
                                                        </th>
                                                        <th colspan="1" id="datahead"
                                                            style="">

                                                            <?php echo $totalPa; ?>
                                                            &nbsp;
                                                        </th>
                                                     <?php   $rosale = DB::table("sales")->whereBetween('date', [$start, $end])->where('giveback', '=', 'true')->get();
                                                        $tot = 0;

                                                        ?>


                                                        <?php $__currentLoopData = $rosale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ros): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                            <?php  $tot = $tot + $ros->mid;?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        <th  id="datahead"
                                                            style="">
                                                            Total Benefit
                                                        </th>
                                                        <th id="datahead"><?php echo $tot."&nbsp;";?>&nbsp;

                                                        </th>


                                                    </tr>
                                                        <tr id="detailtable">
                                                            <th colspan="3" id="datahead"
                                                                style="">
                                                                Total Receive Money
                                                            </th>
                                                            <?php   $rowdebt = DB::table("debts")->whereBetween('date', [$start, $end])->get();
                                                            $tot = 0;
                                                            ?>


                                                            <?php $__currentLoopData = $rowdebt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ros): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                                <?php  $tot = $tot + $ros->debt_money;?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            <th id="datahead"><?php echo $tot."&nbsp;";?>
                                                                 &nbsp;</th>
                                                            <th id="datahead">Total Cash Money</th>
                                                            <th id="datahead"><?php echo $bdc=$tot-$totalPa;?>&nbsp;

                                                            </th>
                                                            <th colspan="1" id="datahead"
                                                                style="">
                                                                From : <?php echo $start ?> , To : <?php echo $end ?></th>
                                                        </tr>
                                                    <?php }
                                                    else{
                                                    ?>
                                                    <tr id="detailtable">
                                                        <th id="datahead">No</th>
                                                        <th id="datahead">Expanses Type</th>
                                                        <th id="datahead">Date</th>
                                                        <th id="datahead">Amount</th>
                                                        <th id="datahead">Remark</th>
                                                        <?php $id = 1;?>
                                                    </tr>

                                                    <?php
                                                    $ros = DB::table("finance_expenses")->where('expenses_type', '=', $section)->where('giveback', '=', 'true')->whereBetween('date', [$start, $end])->get();
                                                    $totalPa = 0;
                                                    ?>
                                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                        <tr id="detailtable">
                                                            <td id="databody"><?php echo e($id); ?><?php
                                                                ;$id++;?></td>
                                                            <td id="databody"><?php
                                                                $ros = DB::table("setting_expenses")->where('id', $rows->expenses_type)->get();
                                                                ?>
                                                                <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <?php echo e($ro->expensesna); ?>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?></td>
                                                            <td id="databody"><?php echo e($rows->date); ?></td>
                                                            <td id="databody"><?php echo e(number_format($rows->amount)); ?>&nbsp;
                                                                <?php $totalPa = $totalPa + $rows->amount?>
                                                            </td>
                                                            <?php $tot=0; ?>
                                                            <?php
                                                            $rosale = DB::table("sales")->where('currency', '=', $rows->currencytype)->where('giveback', '=', 'true')->get();
                                                            $tot = 0;
                                                            ?>
                                                            <?php $__currentLoopData = $rosale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <?php  $tot = $tot + $ro->mid;?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                                                            <td id="databody"><?php echo e($rows->remark); ?></td>

                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    <tr id="detailtable">
                                                        <th colspan="3" id="datahead"
                                                            style="">
                                                            Total Amount
                                                        </th>
                                                        <th colspan="1" id="datahead"
                                                            style=""><?php echo number_format($totalPa); ?>&nbsp;
                                                        </th>


                                                        <th colspan="1" id="datahead"
                                                            style=""> From : <?php echo $start ?> , To : <?php echo $end ?></th>

                                                    </tr>
                                                        <tr id="detailtable">
                                                            <th colspan="3" id="datahead"
                                                                style="">
                                                                Total Receive Money
                                                            </th>
                                                            <?php   $rowdebt = DB::table("debts")->whereBetween('date', [$start, $end])->get();
                                                            $tot = 0;
                                                            ?>


                                                            <?php $__currentLoopData = $rowdebt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ros): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                                <?php  $tot = $tot + $ros->debt_money;?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            <th id="datahead"><?php echo $tot."&nbsp;";?>&nbsp;
                                                                </th>
                                                            <th id="datahead">Total Cash Money</th>
                                                            <th id="datahead"><?php echo $bdc=$tot-$totalPa;?>&nbsp;
                                                            </th>
                                                        </tr>
                                                    <?php
                                                    }?>
                                                </table>

                                            </div>

                                        <?php endif; ?>

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
<div class="modal fade lg modal1" tabindex="-1" id="report" role="dialog" style=" color: black;">
    <style>
        .form-group div {
            margin: 2px !important;
        }
    </style>
    <div class="modal-dialog" role="document"
         style=" margin-left: 30vw !important; height: 150px !important;width: 450px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> Reception Report</h4>
            </div>
            <form method="post" action="<?php echo e(url('/create_report_expense')); ?>">
                <input type="hidden" name="_token"
                       value="<?php echo e(csrf_token()); ?>">

                <div class="modal-body" style="overflow: hidden !important;border: 0px solid black;">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">Reception Sections</label>
                        </div>
                        <div class="col-sm-7 input-group">
                            <select class="form-control" name="section" required>
                                <option></option>
                                <?php
                                $receptName = DB::table("setting_expenses")->get();
                                ?>
                                <?php $__currentLoopData = $receptName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($name->id); ?>"><?php echo e($name->expensesna); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <option value="all">All</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">From</label>
                        </div>
                        <div class="col-sm-7 input-group">
                            <input type="date" class="form-control" name="from" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">To</label>
                        </div>
                        <div class="col-sm-7 input-group">
                            <input type="date" class="form-control" name="to" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="">
                        <button type="submit" class="btn btn-info">
                            Create
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            No
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
;
<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#bb").addClass("active")
        });
    </script>
<?php $__env->stopSection(); ?>
<style>
    #pharmacyReport {
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
            <li><a reception_reportef="#">Sales Benefit </a></li>
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

                                        <?php if(!empty($section) and !empty($start) and !empty($end)): ?>
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
                                                    Sales benefit Report
                                                    <?php if ($section == "Benefit") {?>

                                                    <tr id="detailtable">
                                                        <th id="datahead">No</th>
                                                        <th id="datahead">Customer Name</th>
                                                        <th id="datahead">Date</th>
                                                        <th id="datahead">Product List</th>
                                                        <th id="datahead">Quantity</th>
                                                        <th id="datahead">Price</th>
                                                        <th id="datahead">Total Benefit</th>
                                                        <?php $id = 1;?>
                                                    </tr>

                                                    <?php
                                                    $ros = DB::table("sales")->whereBetween('date', [$start, $end])->where('giveback', '=', 'true')->get();
                                                    $totalIncomes = 0;
                                                    ?>
                                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                        <tr id="detailtable">
                                                            <td id="databody"><?php echo e($id); ?><?php
                                                                ;$id++;?></td>
                                                            <td id="databody">
                                                                <?php echo e($rows->seller_name); ?>

                                                            </td>
                                                            <td id="databody"><?php echo e($rows->created_at); ?></td>
                                                            <td id="databody">
                                                                <?php
                                                                $receptName = DB::table("products")->where('id', $rows->product_id)->get();
                                                                ?>
                                                                <?php $__currentLoopData = $receptName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <?php echo e($name->product_name); ?>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </td>
                                                            <td id="databody">
                                                                <?php $mids = DB::table("sales")->where('id', $rows->id)->get();
                                                                $totalPa = 0;
                                                                ?>
                                                                <?php $__currentLoopData = $mids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemsName): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <?php if ($mids = DB::table("products")->where('id', $itemsName->product_id)->first()) {
                                                                        echo $itemsName->quantity. " " . $mids->product_name . "<br>";
                                                                    }
                                                                    $totalPa = $itemsName->mid + $totalPa;
                                                                    ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </td>

                                                            <td id="databody"> <?php echo $itemsName->total_price ?>&nbsp;Afg
                                                                <?php $totalIncomes=$totalIncomes+$totalPa;?></td>
                                                            <?php if($itemsName->sales_type == '1'): ?>
                                                                <td id="databody" title="this amount is debt"><span class="label label-danger time"> <?php echo $itemsName->mid ?>&nbsp;Afg</span>
                                                                    <?php endif; ?>
                                                                    <?php if($itemsName->sales_type == '2'): ?>
                                                                <td id="databody"  title="this amount is credit"><span class="label label-success time"> <?php echo $itemsName->mid ?>&nbsp;Afg</span>
                                                                    <?php endif; ?>

                                                                </td>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    <tr id="detailtable">
                                                        <th colspan="3" id="datahead"
                                                            style="">
                                                            Total Amount
                                                        </th>

                                                        <th colspan="3" id="datahead"
                                                            style="">
                                                            From : <?php echo $start ?> , To : <?php echo $end ?></th>
                                                        <th colspan="1" id="datahead"
                                                            style=""><?php echo number_format($totalIncomes); ?>
                                                            Afg
                                                        </th>
                                                    </tr>
                                                    <?php }?>
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
            <form method="post" action="<?php echo e(url('/create_report_sales_benefit')); ?>">
                <input type="hidden" name="_token"
                       value="<?php echo e(csrf_token()); ?>">

                <div class="modal-body" style="overflow: hidden !important;border: 0px solid black;">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">Reception Sections</label>
                        </div>
                        <div class="col-sm-7 input-group">
                            <select class="form-control" name="section" required>
                                <option value="Benefit">Benefit</option>
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
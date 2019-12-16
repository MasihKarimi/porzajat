;

<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#rdm").addClass("active")
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
            <li><a href="#">Finance </a></li>
            <li><a href="#">Cash Receive</a></li>
            <li><a href="#">Detail</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    
                    <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                        <a href="javascript:" onclick="history.go(-1)">
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
                                            Cash Received Invoice
                                            <table id="demo-dynamic-tables-2" class="table table-middle">

                                                <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                    <tr id="detailtable">
                                                        <td id="headers">Serial Number&nbsp;| Customer Name&nbsp;|Address  </td>
                                                        <td>
                                                            <?php echo e("HLLTD-/".$rows->id); ?> |
                                                                <?php
                                                                $rose = DB::table("customers")->where('id', $rows->customer_id)->get();
                                                                ?>
                                                                <?php $__currentLoopData = $rose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ros): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <?php echo e($ros->name); ?>&nbsp;|<?php echo e($ros->address); ?>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        
                                                        </td>
                                                    </tr>
                                                    <tr id="detailtable">
                                                        <td id="headers">Date</td>
                                                        <td><?php echo e($rows->date); ?></td>


                                                    </tr>
                                                    <tr id="detailtable">
                                                            <td id="headers">Paid Amount</td>
                                                            <td><?php echo e(number_format($rows->pay_amount)); ?></td>
                                                        </tr>
                                                    <tr id="detailtable">
                                                        <td id="headers">Total Loan Amount</td>
                                                        <td><?php echo e(number_format($rows->tl_amount)); ?></td>
                                                    </tr>
                                                    <tr id="detailtable">
                                                        <td id="headers">Total New Loan Amount</td>
                                                        <td><?php echo e(number_format($rows->tl_amount-$rows->pay_amount)); ?></td>

                                                    </tr>
                                                    <tr id="detailtable">
                                                            <td id="headers">Cash Received By</td>
                                                            <td><?php $users=DB::table('users')->where('id',$rows->user_id)->get();
                                                                 ?>
                                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <?php echo e($user->f_name." ".$user->l_name); ?>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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
;

<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#pharmacy").addClass("active")
        });
    </script>
<?php $__env->stopSection(); ?>
<style>
    #Msales {
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
    #total td {
        background-color:silver !important;
        border: 1px solid rgba(0, 0, 0, 0.46) !important;
        color: black  !important;
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

<?php $__env->startSection('content'); ?>
    <div style="margin-top: -25px;">
        <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
            <li><a href="#">Sales </a></li>
            <li><a href="<?php echo e(url('/add_sale')); ?>">Sales</a></li>
            <li><a href="#">Detail</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    
                    <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                        <a href="<?php echo e(url('view_sales')); ?>">
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
                                <div class="panel-body" style="padding-left: 15%;padding-right: 15%;">
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
                                                #total td {
                                                    background-color:silver !important;
                                                    border: 1px solid rgba(0, 0, 0, 0.46) !important;
                                                    color: black  !important;
                                                    font-weight: bold;
                                                }

                                            }
                                        </style>
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
                                        <table id="demo-dynamic-tables-2" class="table table-middle">


                                            <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <tr id="detailtable">
                                                    <td>Customer Name</td>
                                                    <?php
                                                    $ros = DB::table("customers")->where('id',$rows->customer_id)->get();
                                                    ?>
                                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <td>
                                                        <?php echo e($ro->name); ?>

                                                    </td>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    <td>Bill Number</td>

                                                    <td>
                                                        <?php
                                                        $max = $rows->bene;
                                                        echo "sartaj-" ."/". $max;
                                                        ?>
                                                    </td>
                                                    <td>Sales Type</td>

                                                    <td>
                                                        <?php
                                                        $max = $rows->sales_type;
                                                        if ($max=='1')
                                                            {


                                                                        echo "DEBT";

                                                            }
                                                            else
                                                                {
                                                                    echo "<span class='label label-success'>CREDIT</span>";
                                                                }
                                                        ?>
                                                    </td>
                                                    <td id="headers">date</td>
                                                    <td><?php echo e(date('d-m-Y',strtotime($rows->created_at))); ?>

                                                </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                        </table>
                                        <table id="demo-dynamic-tables-2" class="table table-middle">
                                            <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <tr id="detailtable">
                                                    <td>Discount</td>
                                                    <td><?php echo e($rows->discount); ?> %</td>
                                                    <td>Return Product</td>
                                                    <td><?php echo e($rows->return_p); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                        </table>
                                        <table id="demo-dynamic-tables-2" class="table table-middle">
                                              <tr id="total">
                                                <td id="headers">Medicine Name</td>
                                                <td id="headers">Amount Medicine</td>
                                                <td id="headers">Price</td>
                                            </tr>
                                            <?php $total = 0; $currency="" ;?>
                                            <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php $get = DB::table("sales")->where('bene', $rows->bene)->get();?>
                                                <?php $__currentLoopData = $get; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gets): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <tr id="detailtable">
                                                        <td>
                                                            <?php
                                                            $ros = DB::table("products")->where('id', $gets->product_id)->get();
                                                            $product_name = 0
                                                            ?>
                                                            <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <?php echo e($ro->product_name); ?>

                                                                <?php $product_name = $ro->product_name ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        </td>
                                                        <td><?php echo e($gets->quantity); ?></td>
                                                        <td>
                                                            <?php
                                                            $ros = DB::table("stocks")->take(1)->where('product_id', $gets->product_id)->get();
                                                            $sales_price = 0;

                                                            ?>
                                                            <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <?php echo e($ro->sales_price); ?>

                                                                <?php $sales_price = $ro->sales_price ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        </td>
                                                        <?php $total = $gets->total_price + $total;
                                                        $currency=$gets->currency;
                                                        ?>

                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            <tr id="total">
                                                <td colspan="2" id="" align="center">Total</td>
                                                <td> <?php echo number_format($total) ?>&nbsp;
                                                    <?php //$ros = DB::table("setting_exchange")->orderBy('date','desc')->where('id', $rows->currency)->get();
                                                    ?>
                                                  

                                                </td>
                                            </tr>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                                        
                                        <style>
                                            #info {
                                                border: 0px solid black !important;
                                                font-size: 15px !important;
                                                color: #6b8eb2;
                                        
                                            }
                                        
                                            .forms tr td {
                                        
                                                border: 1px solid #587593 !important;
                                            }
                                        
                                            #title {
                                                color: #58588a;
                                                font-size: larger;
                                                font-weight: bold;
                                                text-align: center
                                            }
                                        </style>
                                        <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <table id="printhr">
                                            <style>
                                                @media  print {
                                                    textarea {
                                                        background-color: rgba(240, 240, 240, 0) !important;
                                                        width: 100% !important;
                                                        font-weight: bold !important;
                                                        color: #0e84b5 !important;
                                                    }
                                        
                                                    #info {
                                                        border: 0px solid black !important;
                                                        font-size: 15px !important;
                                                        color: #6b8eb2;
                                        
                                                    }
                                        
                                                    #printhr td {
                                                        border: 0px solid black !important;
                                                    }
                                        
                                                    #title {
                                                        color: #58588a !important;
                                                        font-size: larger !important;
                                                        font-weight: bold !important;
                                                    }
                                        
                                                    .forms tr td {
                                        
                                                        border: 1px solid #587593 !important;
                                                    }
                                        
                                                    #rights {
                                                        /*float: right!important;*/
                                                    }
                                                }
                                            </style>
                                            <tr>
                                                <td style="width: 40vw !important; text-align: left" colspan="2">
                                                    <span style="color: #58588a;" id="title">  HamidLemar Ltd </span>
                                                    <br><br>
                                                    <table>
                                                            <br>
                                                            <tr><p style="color:white;font-size:19px;background-color:gray;float:left;">Shipping Address</p></tr><br>
                                                        <br>
                                                        <tr style="float:left;">
                                                                
                                                                        Name: <?php
                                                                        $customer=DB::table('customers')->where('id',$rows->customer_id)->first();
                                                                        if($customer){
                                                                        echo $customer->name;
                                                                        }else{
                                                                            echo $rows->one_name;
                                                                        }
                                                                        ?><br>
                                                                    
                                                                Contact Name: 
                                                            </tr><br>
                                                            <tr style="float:left;">Address: <?php $customer=DB::table('customers')->where('id',$rows->customer_id)->first();
                                                                    if($customer){
                                                                    echo $customer->address;
                                                                    }else{
                                                                        echo "";
                                                                    }
                                                                    ?></tr><br>
                                                            <tr style="float:left;">Phone: <?php $customer=DB::table('customers')->where('id',$rows->customer_id)->first();
                                                                    if($customer){
                                                                    echo $customer->phone;
                                                                    }else{
                                                                        echo "";
                                                                    }
                                                                    ?></tr>
                                                    </table>
                                                </td>
                                        
                                                <td style="padding-top: 25px; text-align: center;width: 20%!important;"><img
                                                            src="<?php echo e(URL::asset('assets/image/logo.png')); ?>"
                                                            style="width: auto; margin-top: -10px;" height="70px">
                                                </td>
                                        
                                                <td id="rights" style="width: 40vw !important; text-align: right; " colspan="2">
                                                    <span style="" id="title">Delivery Note</span>
                                                    <br><br>
                                                    <table>
                                                            <br>
                                                            <tr><p style="color:white;font-size:19px;background-color:gray;float:right;">Inovice Address</p></tr><br>
                                                        <br>
                                                        <tr style="float:right;">
                                                                
                                                                        Name:Hamid Lemar Co Ltd <br>
                                                                    
                                                                Contact Name: <?php echo $__env->yieldContent('users'); ?>
                                                            </tr><br>
                                                            <tr style="float:right;">Address: QUWE-E-MARKAZ KABUL AFG</tr><br>
                                                            <tr style="float:right;">Phone: +93 (0) 79955565</tr>
                                                    </table>
                                                </td>
                                        
                                            </tr>
                                        </table>
                                        <table style="border-bottom: 2px solid #6b8eb2!important;">
                                            <tr>
                                                <td id="info" style="white-space: nowrap !important;"></td>
                                                <td   id="info" style="width: 50%"></td>
                                                <td id="info" style="white-space: nowrap !important;padding-right: 5px !important;"></td>
                                                <td  id="info" style="width: 50%"></td>
                                                
                                                    
                                                
                                            </tr>
                                        </table>                                        
                                        <table id="demo-dynamic-tables-2" class="table table-middle">


                                           
                                                <tr id="detailtable">
                                                   
                                                    <td>Order Number</td>

                                                    <td>
                                                        <?php
                                                        $max = $rows->bene;
                                                        echo "HLLTD-" ."/". $max;
                                                        ?>
                                                    </td>
                                                    <td>Delivery Note</td>

                                                    <td>
                                                        <?php
                                                        $max = $rows->bene;
                                                        echo "HLLTD-" ."/". $max;
                                                        ?>
                                                    </td>
                                                    <td>Customer</td>

                                                    <td>
                                                        <?php
                                                        $customer=DB::table('customers')->where('id',$rows->customer_id)->first();
                                                        if($customer){
                                                        echo $customer->name;
                                                        }else{
                                                            echo $rows->one_name;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td id="headers">Order date</td>
                                                    <td><?php echo e(date('d-m-Y',strtotime($rows->date))); ?>

                                                </tr>

                                                <tr id="detailtable">
                                                        <td>TIN #</td>
                                                        <td> <?php
                                                            $customer=DB::table('customers')->where('id',$rows->customer_id)->first();
                                                            if($customer){
                                                            echo $customer->tin;
                                                            }else{
                                                                echo "";
                                                            }
                                                            ?></td>
                                                            <td>LICENSE #</td>
                                                        <td> <?php
                                                            $customer=DB::table('customers')->where('id',$rows->customer_id)->first();
                                                            if($customer){
                                                            echo $customer->lic;
                                                            }else{
                                                                echo "";
                                                            }
                                                            ?></td>
                                                            <td>REGISTRATION#</td>
                                                        <td colspan="4"> <?php
                                                            $customer=DB::table('customers')->where('id',$rows->customer_id)->first();
                                                            if($customer){
                                                            echo $customer->reg;
                                                            }else{
                                                                echo "";
                                                            }
                                                            ?></td>
                                                    </tr>

                                        </table>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <table id="demo-dynamic-tables-2" class="table table-middle">
                                              <tr id="total">
                                                <td id="headers">No</td>  
                                                <td id="headers">Part Number/Name</td>
                                                <td id="headers">Ordered Quantity</td>
                                                <td id="headers">Deliver Quantity</td>
                                                <td id="headers">Outstanding</td>
                                            </tr>
                                            <?php $total = 0;$id=1;?>
                                            <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php $get = DB::table("sales")->where('bene', $rows->bene)->get();?>
                                                <?php $__currentLoopData = $get; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gets): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <tr id="detailtable">
                                                        <td><?php echo $id++;?></td>
                                                        <td>
                                                            <?php
                                                            $ros = DB::table("products")->where('id', $gets->product_id)->get();
                                                            $product_name = 0
                                                            ?>
                                                            <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                            <?php echo e($ro->product_s ."-".$ro->product_name); ?>

                                                                <?php $product_name = $ro->product_name ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        </td>
                                                        <td><?php echo e($gets->quantity); ?></td>
                                                        <td>
                                                                <?php echo e($gets->quantity); ?>

                                                        </td>
                                                        <td>0</td>
                                                        
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
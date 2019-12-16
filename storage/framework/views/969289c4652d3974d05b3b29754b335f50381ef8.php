;

<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#Customer").addClass("active")
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
            <li><a href="#">Customer </a></li>
            <li><a href="<?php echo e(url('/add_customer')); ?>">See Records</a></li>
            <li><a href="#">Detail</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    
                    <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                        <a href="<?php echo e(url('add_customer')); ?>">
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
                                                        <span style="color: #58588a;" id="title"> </span>
                                                        <br><br>
                                                        <table>
                                                                <br>
                                                                <tr><p style="color:white;font-size:19px;background-color:gray;float:left;">
                                                                        Loan amount on Us: 
                                                                        <?php $totalReceive=0; 
                                                                        $dbAllReceive=DB::table('cash_paids')->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')->get(); ?>
                                                                        <?php $__currentLoopData = $dbAllReceive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                            <?php $totalReceive=$totalReceive+$item->tl_amount; ?>
                                                                
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                        <?php echo e($totalReceive); ?>    
                                                                </p></tr><br>
                                                            <br>
                                                            <tr style="float:left;">
                                                                    
                                                                            Name: <?php echo e(isset($allCustomer) ? $allCustomer->name : ''); ?><br>
                                                                        
                                                                    Contact Name: <?php echo e(isset($allCustomer) ? $allCustomer->p_contact : ''); ?>

                                                                </tr><br>
                                                                <tr style="float:left;">Address: <?php $customer=DB::table('customers')->where('id',isset($allCustomer) ? $allCustomer->id : '')->first();
                                                                        if($customer){
                                                                        echo $customer->address;
                                                                        }else{
                                                                            echo "";
                                                                        }
                                                                        ?></tr><br>
                                                                <tr style="float:left;">Phone: <?php $customer=DB::table('customers')->where('id',isset($allCustomer) ? $allCustomer->id : '')->first();
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
                                                        <span style="" id="title"></span>
                                                        <br><br>
                                                        <table>
                                                                <br>
                                                                <tr><p style="color:white;font-size:19px;background-color:gray;float:right;">Loan amount on customer: 
                                                                        <?php $totalReceive=0; 
                                                                        $dbAllReceive=DB::table('cash_receives')->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')->get(); ?>
                                                                        <?php $__currentLoopData = $dbAllReceive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                            <?php $totalReceive=$totalReceive+($item->pay_amount); ?>
                                                                
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                        <?php $totalResales=0; 
                                                                        $dbAllReceive=DB::table('sales')->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')->where('giveback','true')->where('sales_type',5)->get(); ?>
                                                                        <?php $__currentLoopData = $dbAllReceive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                            <?php $totalResales=$totalResales+($item->quantity * $item->sales_price); ?>
                                                                
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                        <?php echo e($totalResales-$totalReceive); ?>    
                                                                </p></tr><br>
                                                            <br>


                                                        </table>
                                                    </td>
                                            
                                                </tr>
                                        </table>                                       
                                        
                                        
                                        <div class="form-group">
                                            <br>
                                            <label for="">Cash receive records</label>
                                            <br>
                                           <?php $row = DB::table("cash_receives")->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')->orderBy('id', 'desc')->paginate('30');
                                                $check = DB::table("cash_receives")->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')->orderBy('id', 'desc')->paginate('30')->count();
                                             ?>
                                             <div class="table-responsive">
                                                    <?php if($check>0): ?>
                                                        <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 14px; border: 1px solid black; width: 100%;">
                                                            <thead>
                                                            <tr role="row" style="text-align: center">
                                                                <th>No</th>
                                                                <th style="width: 15%">Customer Name</th>
                                                                <th style="width: 10%">Serial NO</th>
                                                                
                                                                <th style="width: 19%">Total Loan Amount</th>
                                                                <th style="width: 15%">Paid Amount</th>
                                                                <th style="width: 25%">T New Loan Amount</th>
                                                                <th style="width: 15%">Cash Receiver</th>
                                                                <th style="width: 15%">Date</th>
                                                            </tr>
                                                            </thead>
                                                            <?php  $id = 0;$idR = 0; $total=0;?>
                                                            <tbody style="text-align: center">
                                                            <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <tr>
                                                                    <td style=""><?php $id++;echo $id; ?></td>
                                                                    <td style="width: 15%">
            
                                                                    <span style="">
                                                                            <?php
                                                                            $rose = DB::table("customers")->where('id', $rows->customer_id)->get();
                                                                            ?>
                                                                                <?php $__currentLoopData = $rose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ros): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                            <?php echo e($ros->name); ?>

                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                        </span>
            
                                                                    </td>
                                                                    <td><?php echo e("HLLTD-/".$rows->id); ?></td>
                                                                   
                                                                    <td style="width: 15%">
                                                                           <label class="label label-info"> <?php echo e(number_format($rows->tl_amount)); ?></label>     
                                                                         </td>
                                                                         <td style="width: 15%">
            
                                                                            <span class="label label-success"><?php echo e(number_format($rows ->pay_amount)); ?> </span>
                    
                                                                            </td>
                                                                    <td>
                                                                            <label class="label label-danger"> <?php echo e(number_format($rows->tl_amount-$rows->pay_amount)); ?></label>
                                                                    </td>
                                                                    
                                                                    <td style="width: 15%">
            
                                                                            <?php
                                                                            $rose = DB::table("users")->where('id', $rows->user_id)->get();
                                                                            ?>
                                                                                <?php $__currentLoopData = $rose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ros): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                    <?php echo e($ros->f_name." ".$ros->l_name); ?>

                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            
                                                                    </td>
            
                                                                    <td style="width: 30%">
                                                                        <?php echo e($rows->date); ?>

                                                                    </td>
                                                                    
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            <tr id="total" style="text-align: center">
                                                                <td colspan="4" id="" align="center">Total</td>

                                                                <td colspan="3"> <?php echo e($row->sum('pay_amount')); ?>


                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    <?php else: ?><span class="text-red padding-20"><?php echo e('*No Record Added Yet'); ?></span><?php endif; ?><div class="shows"> <ul id="paginator-example-1" class="pagination-purple hidden-print"><?php echo e($row->links()); ?></ul> </div>
                                                        <br>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <br>
                                                <label for="">Cash payment records</label>
                                                <br>
                                                <?php 
                                                $row = DB::table("cash_payments")->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')->orderBy('id', 'desc')->paginate('30');
                                                $check = DB::table("cash_payments")->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')->orderBy('id', 'desc')->paginate('30')->count();
                                                ?>
                                                <div class="table-responsive">
                                                        <?php if($check>0): ?>
                                                            <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 14px; border: 1px solid black; width: 100%;">
                                                                <thead>
                                                                <tr role="row">
                                                                    <th>No</th>
                                                                    <th style="width: 15%">Cash Depositor</th>
                                                                    <th style="width: 10%">Serial NO</th>
                                                                    
                                                                    <th style="width: 19%">Total Loan Amount</th>
                                                                    <th style="width: 15%">Paid Amount</th>
                                                                    <th style="width: 20%">T New Loan Amount</th>
                                                                    <th style="width: 15%">Cash Receiver</th>
                                                                    <th style="width: 15%">Date</th>
                                                                </tr>
                                                                </thead>
                                                                <?php  $id = 0;$idR = 0; $total=0;?>
                                                                <tbody style="">
                                                                <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <tr>
                                                                        <td style=""><?php $id++;echo $id; ?></td>
                                                                        <td style="width: 15%">
                
                                                                        <span style="">
                                                                                <?php
                                                                                $rose = DB::table("users")->where('id', $rows->user_id)->get();
                                                                                ?>
                                                                                    <?php $__currentLoopData = $rose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ros): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                        <?php echo e($ros->f_name." ".$ros->l_name); ?>

                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                            </span>
                
                                                                        </td>
                                                                        <td><?php echo e("HLLTD-/".$rows->id); ?></td>
                                                                       
                                                                        <td style="width: 15%">
                                                                               <label class="label label-info"> <?php echo e(number_format($rows->tl_amount)); ?></label>     
                                                                             </td>
                                                                             <td style="width: 15%">
                
                                                                                <span class="label label-success"><?php echo e(number_format($rows ->pay_amount)); ?> </span>
                        
                                                                                </td>
                                                                        <td>
                                                                                <label class="label label-danger"> <?php echo e(number_format($rows->tl_amount-$rows->pay_amount)); ?></label>
                                                                        </td>
                                                                        
                                                                        <td style="width: 15%">
                
                                                                                <?php
                                                                                $rose = DB::table("customers")->where('id', $rows->customer_id)->get();
                                                                                ?>
                                                                                    <?php $__currentLoopData = $rose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ros): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                        <?php echo e($ros->name); ?>

                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                
                                                                        </td>
                
                                                                        <td style="width: 30%">
                                                                            <?php echo e($rows->date); ?>

                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                <tr id="total" style="text-align: center">
                                                                    <td colspan="4" id="" align="center">Total</td>

                                                                    <td colspan="3"> <?php echo e($row->sum('pay_amount')); ?>


                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        <?php else: ?><span class="text-red padding-20"><?php echo e('*No Record Added Yet'); ?></span><?php endif; ?><div class="shows"> <ul id="paginator-example-1" class="pagination-purple hidden-print"><?php echo e($row->links()); ?></ul> </div>
                                                            <br>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <br>
                                                    <label for="">Sales records</label>
                                                    <br>
                                                    <?php  $show_sales=DB::table("sales")->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')
                                                                        ->where('giveback','true')->orderBy('id','desc')->get(); ?>
                                                    <div class="table-responsive">
                                                            <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 11px; border: 1px solid black; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th >No</th>
                                                <th style="width: 25%">Bill Number</th>
                                                
                                                <th style="width: 25%">Customer</th>
                                               
                                                <th style="width: 25%">Sales Date</th>
                                                
                                                <th style="width: 25%">Sales Detail</th>
                
                                                
                                                <th style="width: 25%">Contact Name</th>
                                            </tr>
                                            </thead>
                                            <?php $id = 1; $idR = 0; $bene_id=null; $totalIncomes = 0;?>
                                            <tbody id="showRowSale">
                                            <?php $__currentLoopData = $show_sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php if($item->bene!=$bene_id): ?>
                                                <tr role="row" style="font-size: 14px;" class="odd">
                                                    
                                                    <?php
                                                   // $custName = DB::table("customers")->where('id', $item->customer_id)->get();
                                                    ?>
                                                    <td><?php echo $id++;?></td>
                                                    <td><?php
                                                        $bene_id = $item->bene;
                                                        echo "HLLTD-" ."/". $bene_id;
                                                        ?></td>
                                                  <td> <?php $cust=DB::table('customers')->where('id',$item->customer_id)->get();?>
                                                    <?php $__currentLoopData = $cust; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                       <?php if($c_name->id==$item->customer_id){
                                                           echo $c_name->name;
                                                       }
                                                       else
                                                       {
                                                        echo "One time customer";
                                                        }
                                                        
                                                        ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?></td>
                                                    <td><?php echo e(date('d-m-Y',strtotime($item->date))); ?></td>
                                                    <td id="databody">
                                                        <table >
                                                            <thead>
                                                            <tr>
                                                                
                                                                
                                                               <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                                
                                                                        <tr>
                                                                               
                                                                    <?php $total=0; $product_name=DB::table('sales')->where('bene',$bene_id)->get(); ?>
                                                                    <?php $__currentLoopData = $product_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2nd): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                       
                                                                            <?php $tot=($item2nd->quantity * $item2nd->sales_price);
                                                                            
                                                                            ?>&nbsp;
                                                                            <?php $total=$total+$tot;?>
                
                
                                                                            <?php //$totalIncomes=$totalIncomes+$totalPa;?>
                                                                           
                                                                            
                                                                            
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                            <td><?php echo e($total); ?></td>
                                                                        <tr>
                                                                   
                                                    
                                                        </table>
                                                    </td>
                                                    <td> <?php
                                                        $ros = DB::table("users")->where('id', $_SESSION['access'])->get();
                                                        ?>
                                                        <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                            <?php echo e($ro->f_name); ?> <?php echo e($ro->l_name); ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?></td>
                                                   
                                                </tr>
                                                
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </tbody>
                                        </table>
                                        
                                        <!--Bellow Row For Showing Data -->
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <br>
                                                        <label for="">Purchases records</label>
                                                        <br>
                                                        <?php
                                                        $showStock=DB::table("stocks")->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')
                                                        ->where('sales_type',0)
                                                        ->orderBy('id','desc')->get();
                                                        ?>
                                                        <div class="table-responsive">
                                                                <!--Bellow Row For Showing Data -->
                                        
                                                                <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 11px; border: 1px solid black; width: 100%;">
                                                                    <thead>
                                                                    <tr role="row">
                                                                        <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                            style="width: 141px;" aria-sort="ascending"
                                                                            aria-label="Name: activate to sort column descending">Product Name
                                                                        </th>
                                                                       
                                                                        
                                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                            style="width: 103px;" aria-label="Office: activate to sort column ascending">Quantity
                                                                        </th>
                                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                            style="width: 103px;" aria-label="Office: activate to sort column ascending">Net Price
                                                                        </th>
                                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                            style="width: 103px;" aria-label="Office: activate to sort column ascending">Total Net Cost
                                                                        </th>
                                                                        
                                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                        style="width: 103px;" aria-label="Office: activate to sort column ascending">Vendore Name
                                                                        </th>
                                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                            style="width: 79px;" aria-label="Salary: activate to sort column ascending">Date
                                                                        </th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="showRow">
                                                                    <?php $__currentLoopData = $showStock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <tr role="row" style="font-size: 14px;" class="odd">
                                                                        <td tabindex="0" class="sorting_1">
                                                                            <?php $Dbproduct=DB::table('products')->where('id',$item->product_id)->get();
                                                                            ?>
                                                                            <?php $__currentLoopData = $Dbproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemProd): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                <?php echo e($itemProd->product_name); ?>

                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                        </td>
                                                                        
                                                                        <td><?php echo e($item->quantity); ?></td>
                                                                        <td><?php echo e($item->net_price); ?></td>
                                                                        <td><?php echo e($item->quantity * $item->net_price); ?></td>
                                                                        
                                                                        <td> <?php
                                                                            if($item->customer_id==='null' || $item->customer_id===''){
                                                                             ?>
                                                                             <p>No Vendore</p>
                                                                             <?php }else{   
                                                                            $ros = DB::table("customers")->where('id',$item->customer_id)->get();
                                                                              ?>
                                                                              <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                  <?php echo e($ro->name); ?>

                                                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                            <?php } ?>
                                                                            </td>
                                                                        <td><?php  echo date('Y-m-d',strtotime($item->created_at)) ?></td>
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
            <li><a reception_reportef="#">Customer </a></li>
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

                                        <?php if(!empty($section) and !empty($start) and !empty($end) and !empty($type)): ?>
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
                                                    <?php if($type=='loan'){echo "Total Loan on us Report"; } ?>
                                                    <?php if ($type == "all") {?>
                                                        Cash /Loan from Sales Report
                                                    <tr >
                                                        <th id="datahead">No</th>
                                                        <th id="datahead">Bill Number</th>
                                                        <th id="datahead">Customer Name</th>
                                                        
                                                        <th id="datahead">Date</th>
                                                        <th id="datahead">Sales Details</th>
                                                        <th></th>
                                                        <?php $id = 1;?>
                                                    </tr>

                                                    <?php
                                                    $bene_id=null;

                                                    $ros = DB::table("sales")->whereBetween('date', [$start, $end])->where('customer_id',$section)->where('giveback', '=', 'true')->get();
                                                    $totalIncomes = 0;
                                                    ?>
                                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php if($rows->bene!=$bene_id): ?>
                                                        <tr id="detailtable">
                                                            <td id="databody"><?php echo e($id); ?><?php
                                                                ;$id++;?></td>

                                                                <td id="databody">
                                                                    <?php
                                                                   
                                                                    
                                                                    
                                                                        $bene_id=$rows->bene;
                                                                        echo "HLLTD-/".$bene_id;
                                                                    
                                                                    ?>
                                                                </td>
                                                                <td id="databody">
                                                                    <?php $cust=DB::table('customers')->where('id',$rows->customer_id)->get();?>
                                                                    <?php $__currentLoopData = $cust; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                       <?php if($c_name->id==$rows->customer_id){
                                                                           echo $c_name->name;
                                                                       }
                                                                       else
                                                                       {
                                                                        echo "One time customer";
                                                                        }
                                                                        
                                                                        ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                    
                                                                </td>

                                                            <td id="databody"><?php echo e(date('d-m-Y',strtotime($rows->date))); ?></td>
                                                            <td id="databody">
                                                                <table id="demo-dynamic-tables-2" class="table table-middle">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Product List</th>
                                                                        <th>Quantity</th>
                                                                        <th>Sales Price</th>
                                                                       <th>Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                        
                                                                            <?php $product_name=DB::table('sales')->where('bene',$bene_id)->get(); ?>
                                                                            <?php $__currentLoopData = $product_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                <?php $prod=DB::table('products')->where('id',$item->product_id)->get(); ?>
                                                                                <?php $__currentLoopData = $prod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                <tr>
                                                                                <td>
                                                                                    <?php echo e($it->product_name); ?>

                                                                                </td>
                                                                                <td> <?php $mids = DB::table("sales")->where('id', $rows->id)->get();
                                                                                    $totalPa = 0;
                                                                                    ?>
                                                                                    <?php $__currentLoopData = $mids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemsName): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                        <?php if ($mids = DB::table("stocks")->where('product_id', $item->product_id)->first()) {
                                                                                            echo $item->quantity. "<br>";
                                                                                        }
                                                                                            $totalPa = $item->total_price + $totalPa;
                                                                                        ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?></td>
                                                                                <td> <?php
                                                                                    $ros = DB::table("stocks")->take(1)->where('product_id', $it->id)->get();
                                                                                    $total = 0;
                    
                                                                                    ?>
                                                                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                        <?php echo $sales_price = $item->sales_price ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    
                    
                                                                                    <?php $total=$total+($item->quantity * $item->sales_price);
                                                                                    
                                                                                    ?>&nbsp;
                                                                                    <?php $totalIncomes=$totalIncomes+$total;?>
                    
                    
                                                                                    <?php //$totalIncomes=$totalIncomes+$totalPa;?>
                                                                                    </td>
                                                                                    <td><?php echo e($total); ?></td>
                                                                                <tr>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            
                                                                </table>
                                                            </td>
                                                            

                                                        
                                                           
                                                        </tr>
                                                    </tbody>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    <tr id="detailtable">
                                                        <th colspan="1" id="datahead"
                                                            style="">
                                                            Total Amount
                                                        </th>

                                                        <th colspan="3" id="datahead"
                                                            style="">
                                                            From : <?php echo $start ?> , To : <?php echo $end ?></th>
                                                        <th colspan="1" id="datahead"
                                                            ><p style="float:right;"><?php echo number_format($totalIncomes); ?></p>
                                                        </th>
                                                    </tr>
                                                    <?php }
                                                    else{
                                                    ?>
                                                    <tr >
                                                        <th id="datahead">No</th>
                                                        <th id="datahead">Purchase Number</th>
                                                        <th id="datahead">Customer Name</th>
                                                        <th id="datahead">Date</th>
                                                        <th id="datahead">Purchase Detail </th>
                                                        <th></th>
                                                        <?php $id = 1;?>
                                                    </tr>

                                                    <?php
                                                    
                                                    $comp_sales=\App\Stock::whereHas('product',function ($query) use ($section){
                                                        $query->where('customer_id',$section);
                                                        
                                                    })->whereBetween('date', [$start, $end])->get();
                                                  //  $ros = DB::table("sales")->whereBetween('date', [$start, $end])->where('giveback', '=', 'true')->get();
                                                    $totalIncomes = 0;
                                                    ?>
                                                    <?php $__currentLoopData = $comp_sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php if($rows->id): ?>
                                                        <tr id="detailtable">
                                                            <td id="databody"><?php echo e($id); ?><?php
                                                                ;$id++;?></td>

                                                                <td id="databody">
                                                                    <?php
                                                                   
                                                                    
                                                                    
                                                                        $bene_id=$rows->bene;
                                                                        echo "HLLTD-/".$id;
                                                                    
                                                                    ?>
                                                                </td>
                                                                <td id="databody">
                                                                    <?php $cust=DB::table('customers')->where('id',$rows->customer_id)->get();?>
                                                                    <?php $__currentLoopData = $cust; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                       <?php if($c_name->id==$rows->customer_id){
                                                                           echo $c_name->name;
                                                                       }
                                                                       else
                                                                       {
                                                                        echo "One time customer";
                                                                        }
                                                                        
                                                                        ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                    
                                                                </td>

                                                            <td id="databody"><?php echo e(date('d-m-Y',strtotime($rows->date))); ?></td>
                                                            <td id="databody">
                                                                <table id="demo-dynamic-tables-2" class="table table-middle">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Product List</th>
                                                                        <th>Quantity</th>
                                                                        <th>Net Price</th>
                                                                       <th>Total</th>
                                                                       <?php echo e($rows->product_id); ?>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                        
                                                                            <?php $product_name=DB::table('stocks')->where('product_id',$rows->product_id)->get(); ?>
                                                                            <?php $__currentLoopData = $product_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                <?php $prod=DB::table('products')->where('id',$item->product_id)->get(); ?>
                                                                                <?php $__currentLoopData = $prod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                <tr>
                                                                                <td>
                                                                                    <?php echo e($it->product_name); ?>

                                                                                </td>
                                                                                <td> <?php $mids = DB::table("stocks")->where('id', $rows->id)->get();
                                                                                    $totalPa = 0;
                                                                                    ?>
                                                                                    <?php $__currentLoopData = $mids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemsName): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                        <?php if ($mids = DB::table("stocks")->where('product_id', $item->product_id)->first()) {
                                                                                            echo $item->quantity. "<br>";
                                                                                        }
                                                                                           //$totalPa = $item->total_price + $totalPa;
                                                                                        ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?></td>
                                                                                <td> <?php
                                                                                    $ros = DB::table("stocks")->take(1)->where('product_id', $it->id)->get();
                                                                                    $total = 0;
                    
                                                                                    ?>
                                                                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                        <?php echo $sales_price = $item->net_price ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    
                    
                                                                                    <?php $total=$total+($item->quantity * $item->net_price);
                                                                                    
                                                                                    ?>&nbsp;
                                                                                    <?php $totalIncomes=$totalIncomes+$total;?>
                    
                    
                                                                                    <?php //$totalIncomes=$totalIncomes+$totalPa;?>
                                                                                    </td>
                                                                                    <td><?php echo e($total); ?></td>
                                                                                <tr>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            
                                                                </table>
                                                            </td>
                                                            

                                                        
                                                           
                                                        </tr>
                                                    </tbody>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    <tr id="detailtable">
                                                        <th colspan="2" id="datahead"
                                                            style="">
                                                            Total Amount
                                                        </th>

                                                        <th colspan="2" id="datahead"
                                                            style="">
                                                            From : <?php echo $start ?> , To : <?php echo $end ?></th>
                                                        <th colspan="1" id="datahead"
                                                            style=""><p style="float:right;"><?php echo number_format($totalIncomes); ?></p>
                                                        </th>
                                                        
                                                    </tr>
                                                    <?php } ?>
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
                <h4 class="modal-title" id="myModalLabel">Customer Report</h4>
            </div>
            <form method="post" action="<?php echo e(url('/create_report_customer')); ?>">
                <input type="hidden" name="_token"
                       value="<?php echo e(csrf_token()); ?>">

                <div class="modal-body" style="overflow: hidden !important;border: 0px solid black;">
                    <div class="form-group">
                        <div class="col-sm-2">
                            
                        </div>
                        <div class="col-sm-4 input-group">
                                <label class="control-label">Choose Customer</label>
                            <select class="chzn-select form-control selects"  name="section" required>
                                <?php $custom=DB::table('customers')->get(); ?>
                                <?php $__currentLoopData = $custom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="col-sm-2">
                                
                            </div>
                            <div class="col-sm-4 input-group">
                                    <label class="control-label">Choose Type</label>
                                <select class="chzn-select form-control selects"  name="type" required>
                                        <option value="all">Total Sales Cash/Loan</option>
                                        <option value="loan">Total Purchase Loan on us </option>
                                </select>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                           
                        </div>
                        <div class="col-sm-7 input-group">
                                <label class="control-label">From</label>
                            <input type="date" class="form-control" name="from" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                           
                        </div>
                        <div class="col-sm-7 input-group">
                                <label class="control-label">To</label>
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
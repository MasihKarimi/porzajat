<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#quotation").addClass("active")
        });
    </script>
<?php $__env->stopSection(); ?>
<style>
    #hr_management {
        color: white;
    }

    #headeradd {
        border-radius: 5px;
        padding: 10px !important;
        background: #0090ff;
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
    <div class="layout-content-body">
        <div style="margin-top: -25px;">
            <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
                <li><a href="#">Quotation </a></li>
                <li><a href="<?php echo e(url('/add_q')); ?>">View Quotation</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-content">
                        <?php echo $__env->make('include.add_q', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table id="demo-dynamic-tables-1" class="table table-middle">
                            <thead>
                            <tr>
                                <th id="hid"></th>
                                <th >No</th>
                                <th style="width: 25%">Quotation Number</th>
                                
                                <th style="width: 25%">Customer</th>
                               
                                <th style="width: 25%">Quotation Date</th>
                                
                                <th style="width: 25%">Quotation Detail</th>

                                
                                <th style="width: 25%">Contact Name</th>
                                <th style="white-space: nowrap">Action</th>
                            </tr>
                            </thead>
                            <?php $id = 1; $idR = 0; $bene_id=null; $totalIncomes = 0;?>
                            <tbody id="showRowSale">
                            <?php $__currentLoopData = $show_sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php if($item->bene!=$bene_id): ?>
                                <tr role="row" style="font-size: 14px;" class="odd">
                                    <td id="hid1" style="border:0px solid black!important;border-bottom-color: white!important;border-right-color: white">
                                       
                                    </td>
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
                                    <td><?php echo e(date('d-m-Y',strtotime($item->created_at))); ?></td>
                                    <td id="databody">
                                        <table id="demo-dynamic-tables-2" class="table table-middle">
                                            <thead>
                                            <tr>
                                                <th>Part No</th>
                                                <th>Quantity</th>
                                                <th>Sales Price</th>
                                               <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                
                                                    <?php $product_name=DB::table('quotations')->where('bene',$bene_id)->get(); ?>
                                                    <?php $__currentLoopData = $product_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2nd): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php $prod=DB::table('products')->where('id',$item2nd->product_id)->get(); ?>
                                                        <?php $__currentLoopData = $prod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <tr>
                                                        <td>
                                                            <?php echo e($it->product_s); ?>

                                                        </td>
                                                        <td> 
                                                                <?php echo e($item2nd->quantity); ?>

                                                               
                                                        </td>
                                                        <td> <?php
                                                            $ros = DB::table("stocks")->take(1)->where('product_id', $it->id)->get();
                                                            $total = 0;

                                                            ?>
                                                            <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <?php echo $sales_price = $item2nd->sales_price ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                                                            <?php $total=$total+($item2nd->quantity * $item2nd->sales_price);
                                                            
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
                                    <td> <?php
                                        $ros = DB::table("users")->where('id', $_SESSION['access'])->get();
                                        ?>
                                        <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php echo e($ro->f_name); ?> <?php echo e($ro->l_name); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?></td>
                                    <?php $idR = $item->bene;?>
                                    <td style="width: 20%"> 
                                        <!-- <button class="btn btn-outline-danger btn-icon sq-32"  title="Give back This Record"
                                                 href="#giveback" data-toggle="modal"
                                                 data-target="#giveback<?php echo $idR?>">
                                            <i class="icon icon-signing"></i>
                                        </button> -->
                                        
                                    <a href="<?php echo e(url('quoutation_salesdetail', $item->id)); ?>" title="Details of the Record Shows">
                                            <button class="btn btn-outline-default btn-icon sq-32"
                                                    type="button">
                                                <i class="icon icon-info-circle"></i>
                                            </button>
                                        </a>
                                       
                                            <?php $user=DB::table('users')->where('id',$_SESSION['access'])->first(); ?>
                                            <?php if($user->type==1): ?>
                                    <a title="Update The Selected Record" href="<?php echo e(url('/edit_q',['id'=>$item->id])); ?>" >  <button class="btn btn-outline-success btn-icon sq-32"
                                                                                                                                                               type="button">
                                                <i class="icon icon-edit"></i>
                                            </button></a>
                                    <a title="Delete The Selected Record" href="<?php echo e(url('/delete_q',['id'=>$item->id])); ?>">  <button class="btn btn-outline-danger btn-icon sq-32" title="Delete this Record "><i class=" icon icon-remove"></i>
                                            </button></a>
                                            <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="dataTables_paginate paging_bootstrap_number" id="sample_1_paginate">
                                    <ul class="pagination" style="visibility: visible;">
                                        <li class="active"><?php echo e($show_sales->links()); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Bellow Row For Showing Data -->
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


<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#procurement").addClass("active")
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
        background: #466074;
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
                <li><a href="#">Sales </a></li>
                <li><a href="<?php echo e(url('/view_sales')); ?>">View Sales</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-content">
                        <?php echo $__env->make('include.add_sales', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
                                <th style="width: 20% ;text-align: center">Invoice#</th>
                                <th style="width: 25% ;text-align: center">Customer Name</th>
                                <th style="width: 20% ;text-align: center">Sales Date</th>
                                <th style="width: 25% ;text-align: center">Invoice Total</th>
                                <th style="width: 25% ;text-align: center">Contact Name</th>
                                <th style="white-space: nowrap;text-align: center">Action</th>
                            </tr>
                            </thead>
                            <?php $id = 1; $idR = 0; $bene_id=null; $totalIncomes = 0;?>
                            <tbody id="showRowSale">
                            <?php $__currentLoopData = $show_sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php if($item->bene!=$bene_id): ?>
                                <tr role="row" style="font-size: 14px;" class="odd">
                                    <td id="hid1" style="border:0px solid black!important;border-bottom-color: white!important;border-right-color: white">
                                        <?php
                                        if($item->giveback == "false") {?>
                                        <i class="sidenav-icon icon icon-times"
                                           style="background-color: #e74c3c;color: white;border-radius: 5px;"></i>
                                        <?php }else { ?>
                                        <i class="sidenav-icon icon icon-check"
                                           style="background-color: #35cf76;color: white;border-radius: 5px;"></i>
                                        <?php }?>
                                    </td>
                                    <?php
                                   // $custName = DB::table("customers")->where('id', $item->customer_id)->get();
                                    ?>
                                    <td><?php echo $id++;?></td>
                                    <td><?php
                                        $bene_id = $item->bene;
                                        echo "HLLTD-" ."/". $bene_id;
                                        ?></td>
                                  <td style="text-align: center">

                                   <?php if($item->one_name =="Name"): ?>
                                          <?php $cust=DB::table('customers')->where('id',$item->customer_id)->get();?>
                                          <?php $__currentLoopData = $cust; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                              <?php if($c_name->id == $item->customer_id){
                                                  echo $c_name->name;
                                              }
                                              else
                                              {
                                                  echo $item->one_name;
                                              }

                                              ?>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                       <?php else: ?>
                                      <?php echo e($item->one_name); ?>

                                       <?php endif; ?>
                                    </td>

                                    <td style="text-align: center"><?php echo e(date('d-m-Y',strtotime($item->date))); ?></td>
                                    <td style="text-align: center">
                                                               
                                                    <?php $total=0; $product_name=DB::table('sales')->where('bene',$bene_id)->get(); ?>
                                                    <?php $__currentLoopData = $product_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2nd): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                       
                                                            <?php $tot=($item2nd->quantity * $item2nd->sales_price);
                                                            
                                                            ?>&nbsp;
                                                            <?php $total=$total+$tot;?>

                                                            <?php //$totalIncomes=$totalIncomes+$totalPa;?>
                                                           
                                                            
                                                            
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                           <?php echo e($total); ?>


                                    </td>
                                    <td style="text-align: center"> <?php
                                        $ros = DB::table("users")->where('id', $_SESSION['access'])->get();
                                        ?>
                                        <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php echo e($ro->f_name); ?> <?php echo e($ro->l_name); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?></td>
                                    <?php $idR = $item->bene;?>
                                    <td style="width: 20%;text-align: center"> <button class="btn btn-outline-danger btn-icon sq-32"  title="Give back This Record"
                                                 href="#giveback" data-toggle="modal"
                                                 data-target="#giveback<?php echo $idR?>">
                                            <i class="icon icon-signing"></i>
                                        </button>
                                        
                                    <a href="<?php echo e(url('product_salesdetail', $item->id)); ?>" title="Details of the Record Shows">
                                            <button class="btn btn-outline-default btn-icon sq-32"
                                                    type="button">
                                                <i class="icon icon-info-circle"></i>
                                            </button>
                                        </a>
                                        <a href="<?php echo e(url('product_salesdelivery', $item->id)); ?>" title="Delivery Note of the Record Shows">
                                                <button class="btn btn-outline-info btn-icon sq-32"
                                                        type="button">
                                                    <i class="icon icon-info-circle"></i>
                                                </button>
                                            </a>
                                            <?php $user=DB::table('users')->where('id',$_SESSION['access'])->first(); ?>
                                            <?php if($user->type==1): ?>
                                    <a title="Update The Selected Record" href="<?php echo e(route('/edit_sales',['id'=>$item->id])); ?>" >  <button class="btn btn-outline-success btn-icon sq-32"
                                                                                                                                                               type="button">
                                                <i class="icon icon-edit"></i>
                                            </button></a>
                                    <a title="Delete The Selected Record" href="<?php echo e(route('/delete_sales',['id'=>$item->id])); ?>">  <button class="btn btn-outline-danger btn-icon sq-32" title="Delete this Record "><i class=" icon icon-remove"></i>
                                            </button></a>
                                            <?php endif; ?>
                                    </td>
                                </tr>
                                <?php echo $__env->make('page.sales_giveback', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
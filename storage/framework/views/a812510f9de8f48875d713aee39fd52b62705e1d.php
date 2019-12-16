<div class="alert alert-info" id="headeradd" style=" border: 0px solid black;" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i
                class="sidenav-icon icon icon-plus"></i> Add Debt Money
    </button>
    <button id="excel" class="btn btn-success"
            type="button"><i class="sidenav-icon icon icon-file-excel-o"
                             style="font-size:larger;"></i>
    </button>


  <!--  <form class="pull-right" method="post" action="<?php echo e(url('/debtSearch')); ?>">
        <div class="col-sm-3 pull-right input-group" style="margin-top: -35px">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="text" name="id" placeholder="Search for Expenses Type. " class="form-control">
            <span class="input-group-addon" style="padding: 0px !important; background-color: #e67e22 !important;
border: 0px solid black;">
                <button type="submit" class="btn btn-info form-control">
                    <i class="icon icon-search" style="font-size: larger;font-weight: bold"></i>
                </button> </span>
        </div>
    </form>
-->
</div>
<div class="modal fade lg modal1" tabindex="-1" id="myModal" role="dialog" style=" color: black;">
    <style>
        .form-group div {
            margin: 2px !important;
        }


    </style>
    <div class="modal-dialog" role="document"
         style="width: 40vw !important; margin-left: 30vw !important;">
        <div class="modal-content">
            <form id="demo-form-wizard-1" novalidate method="post" data-toggle="validator"
                  enctype="multipart/form-data" action="<?php echo e(url('/moeny_add_debt_customer')); ?>">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Expenses</h4>
                </div>
                <div class="modal-body" style="height: 60vh; overflow-y: auto">

                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Customer Name </label>
                            </div>
                            <div class="col-sm-7 input-group">
                                <select class="chzn-select form-control edit"
                                        data-placeholder="Select an Option" style="" id="customer"
                                        name="customer" required>
                                    <option></option>
                                    <?php
                                  //  $ros = DB::select("select * from customers,products,sales where customers.id=sales.customer_id AND sales.sales_type=1 AND sales.product_id=products.id AND products.comp_id=".Request::segment(2));
                                    $ros = DB::select("select * from products,sales where sales.sales_type=1 AND sales.product_id=products.id AND products.comp_id=".Request::segment(2));

                                    ?>
                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                    <option value="<?php echo e($ro->id); ?>"> <?php
                                        $rose = DB::table("customers")->where('id', $ro->customer_id)->get();
                                        ?><?php $__currentLoopData = $rose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ros): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php echo e($ros->name); ?>&nbsp;<?php echo e($ros->address); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?></option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="comp_id" id="comp_id" value="<?php echo e(Request::segment(2)); ?>"/>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('.edit').change(function () {
                                    var id = $(this).val();
                                    var comp=$('#comp_id').val();
                                    $('#data ').html("Loading...");
                                    $('#data').load('<?php echo e(url("money_debt_add")); ?>/' + id +'/'+comp);
                                });
                            });
                        </script>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Detail In Debt </label>
                            </div>
                            <div class="col-sm-7 input-group">
                                            <textarea name="data" id="data" style="background-color:#ffffff" disabled
                                                      class="form-control" rows="5"></textarea></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Date </label>
                            </div>
                            <div class="col-sm-7 input-group">
                                <input type="date" value=" " name="date" id="date"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">PayBilled Money</label>
                            </div>
                            <div class="col-sm-7 input-group">

                                <input type="number" name="kpk" id="kpk" class="form-control">

                                
                            </div>
                        </div>
                        
                            
                                
                            
                            
                                
                                
                            
                        
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Current PayBilled Money</label>
                            </div>
                            <div class="col-sm-7 input-group">

                                <input type="number" name="ct" id="ct" class="form-control">

                                
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#ct').keyup(function () {
                                   var ct=$('#ct').val();
                                   var kpk=$('#kpk').val();

                                   $('#paybilled').val(parseInt(ct)+parseInt(kpk));
                                });
                            });
                        </script>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Total PayBilled Money</label>
                            </div>
                            <div class="col-sm-7 input-group">

                                <input type="number" name="paybilled" id="paybilled" class="form-control">

                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Enter DRM Serial No</label>
                            </div>
                            <div class="col-sm-7 input-group">

                                <input type="number" name="serial" id="serial" class="form-control">

                                
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                </div>

                <div class="modal-footer">
                    <div style="padding-top: 5px;">
                        <button type="submit" id="submit" name="addmaininfo" class="btn btn-primary">
                            <i class="glyphicon glyphicon-check"></i> Add
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>



<div class="alert alert-info" id="headeradd" style=" border: 0px solid black;" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i
                class="sidenav-icon icon icon-plus"></i> Add Cash Receive
    </button>
    <button id="excel" class="btn btn-success"
            type="button"><i class="sidenav-icon icon icon-file-excel-o"
                             style="font-size:larger;"></i>
    </button>


   <form class="pull-right" method="post" action="<?php echo e(url('/cashcSearch')); ?>">
        <div class="col-sm-3 pull-right input-group" style="margin-top: -35px">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="text" name="id" placeholder="Search for Serial NO. " class="form-control">
            <span class="input-group-addon" style="padding: 0px !important; background-color: #e67e22 !important;
border: 0px solid black;">
                <button type="submit" class="btn btn-info form-control">
                    <i class="icon icon-search" style="font-size: larger;font-weight: bold"></i>
                </button> </span>
        </div>
    </form>
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
                  enctype="multipart/form-data" action="<?php echo e(url('/cash_receive_add')); ?>">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Cash Receive</h4>
                </div>
                <div class="modal-body" style="height: 60vh; overflow-y: auto">
                        <input type="hidden" name="user_id" value="<?php echo e($_SESSION['access']); ?>">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Customer Name </label>
                            </div>
                            <div class="col-sm-7 input-group">
                                <select class="chzn-select form-control edit"
                                        data-placeholder="Select an Option" style="" id="customer_id"
                                        name="customer_id" required>
                                    <option></option>
                                    <?php
                                  //  $ros = DB::select("select * from customers,products,sales where customers.id=sales.customer_id AND sales.sales_type=1 AND sales.product_id=products.id AND products.comp_id=".Request::segment(2));
                                    //$ros = DB::select("select * from sales,customers where sales.sales_type=5 AND customers.id=sales.customer_id");
                                    $ros=DB::table('customers')->get();
                                    ?>
                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                    <option value="<?php echo e($ro->id); ?>"><?php echo e($ro->name); ?></option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('.edit').change(function () {
                                    var id = $(this).val();
                                    //$('#tl ').html("Loading...");
                                    //$('#tl').load('<?php echo e(url("money_receive_add")); ?>/' + id);
                                    $.ajax({
                                        type:"GET",
                                        url:'money_receive_add/'+id,
                                        success:function(response){
                                           
                                            $("#tl").val(response);
                                           
                                        }
                                    });
                                });
                            });
                        </script>
                       
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Date </label>
                            </div>
                            <div class="col-sm-7 input-group">
                                <input type="date"  name="date" id="date"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Total Loan</label>
                            </div>
                            <div class="col-sm-7 input-group">

                                <input type="number" name="tl" id="tl" readonly class="form-control">

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Pay Amount</label>
                            </div>
                            <div class="col-sm-7 input-group">

                                <input type="number" name="pa" id="pa" class="form-control">
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#pa').keyup(function () {
                                   var ct=$('#pa').val();
                                   var kpk=$('#tl').val();

                                   $('#tla').val(parseInt(kpk)-parseInt(ct));
                                });
                            });
                        </script>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">New Loan Amount</label>
                            </div>
                            <div class="col-sm-7 input-group">

                                <input type="number" readonly name="tla" id="tla" class="form-control">
                            </div>
                        </div>
                        <div class="form-group hide">
                            <div class="col-sm-4">
                                <label class="control-label">Cash Receive Serial No</label>
                            </div>
                            <div class="col-sm-7 input-group">
                                <?php $idss=0; ?>
                                <input type="hidden" readonly name="serial" id="serial" value="<?php echo random_int(0, 100) . $idss; ?>" class="form-control">
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



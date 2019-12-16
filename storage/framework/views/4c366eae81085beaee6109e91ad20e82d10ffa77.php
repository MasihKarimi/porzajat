<div class="alert alert-info" id="headeradd" style=" border: 0px solid black;" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i
                class="sidenav-icon icon icon-plus"></i> Add Expenses
    </button>
    <button id="excel" class="btn btn-success"
            type="button"><i class="sidenav-icon icon icon-file-excel-o"
                             style="font-size:larger;"></i>
    </button>


    <form class="pull-right" method="post" action="<?php echo e(url('/finance_manage_id')); ?>">
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
                  enctype="multipart/form-data" action="<?php echo e(url('/finance_expensesstore')); ?>">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Expenses</h4>
                </div>
                <div class="modal-body" style="height: 60vh; overflow-y: auto">

                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Expenses Type </label>
                            </div>
                            <div class="col-sm-7 input-group">
                                <select class="chzn-select form-control "
                                        data-placeholder="Select an Option" style="" id="expenses"
                                        name="expenses" required>
                                    <option></option>
                                    <?php
                                    $ros = DB::table("setting_expenses")->get();
                                    ?>
                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>{
                                    <option value="<?php echo e($ro->id); ?>"><?php echo e($ro->expensesna); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                            </div>
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
                                <label class="control-label">Currency Type</label>
                            </div>
                            <div class="col-sm-7  input-group">
                                <select class="form-control Type" name="currencyType" required id="currencyType">
                                    <option value=""></option>
                                    <option value="0">AFN</option>
                                    <option value="2">PAK</option>
                                    <option value="1">$</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Amount</label>
                            </div>
                            <div class="col-sm-7 input-group">
                                <input type="number" name="amount" id="amount" class="form-control fees">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Exchange Detail</label>
                            </div>
                            
                            <div class="col-sm-7 input-group" id="echangeResult">
                                <textarea rows="3" name="exchange" class="form-control"></textarea>
                            </div>
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('.fees').keyup(function () {
                                    var id = $(this).val();
                                    var cur = $("#currencyType").val();
                                    $('#echangeResult').load('<?php echo e(url("exchangeTypeIncomes")); ?>/' + id +'/' +cur );
                                });
                            });
                        </script>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Remark</label>
                            </div>
                            <div class="col-sm-7 input-group">
                                <textarea rows="5" name="remark" id="remark" class="form-control "></textarea>
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



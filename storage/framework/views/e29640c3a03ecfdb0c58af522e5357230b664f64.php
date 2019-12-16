<div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i
                class="sidenav-icon icon icon-plus"></i> Add Exchange
    </button>
    <div class="modal fade lg modal1" tabindex="-1" id="myModal" role="dialog" style=" color: black">
        <style>
            .form-group div {
                margin: 2px !important;
            }
        </style>
        <div class="modal-dialog" role="document"
             style="width: 40vw !important; margin-left: 30vw !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> Add Exchange </h4>
                </div>
                <form method="post" action="<?php echo e(url('/exchangestore')); ?>">
                    <div class="modal-body" style="height: 55vh; overflow-y: auto">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Currency Name </label>
                            </div>
                            <div class="col-sm-5 " style="padding-right: 0px !important;">
                                <input type="text" name="cur_ma1" required class="form-control numeric"
                                       style="width: 100%">
                            </div>
                            <div class="col-sm-2" style="padding-left: 0px !important;">
                                <select class="form-control"  required name="cur_na1" style="width: 80px;border: 1px solid #6fa0ff">
                                    <option value=""></option>
                                    <?php
                                    $ros = DB::table("setting_currency")->get();
                                    ?>
                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>{
                                    <option value="<?php echo e($ro->id); ?>"><?php echo e($ro->cur_symbol); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Currency Exchange </label>
                            </div>
                            <div class="col-sm-5 " style="padding-right: 0px !important;">
                                <input type="text" name="cur_ma2" required class="form-control numeric"
                                       style="width: 100%">
                            </div>
                            <div class="col-sm-2" style="padding-left: 0px !important;">
                                <select class="form-control" name="cur_na2" style="width: 80px;border: 1px solid #6fa0ff">
                                    
                                    <?php
                                    $ros = DB::table("setting_currency")->where("cur_name",'afghani')->get();
                                    ?>
                                    <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>{
                                    <option value="<?php echo e($ro->id); ?>"><?php echo e($ro->cur_symbol); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Date</label>
                            </div>
                            <div class="col-sm-7 " style="padding-right: 0px !important;">
                                <input type="date" name="date" value="<?php echo date("Y-m-d"); ?>" required class="form-control numeric"
                                       style="width: 100%">
                            </div>
                        </div>



                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    </div>
                    <div class="modal-footer">
                        <div style="padding-top: 5px;">
                            <button type="submit" name="addmaininfo" class="btn btn-primary">
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
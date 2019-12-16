<div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i
                class="sidenav-icon icon icon-plus"></i> Add Unit
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
                    <h4 class="modal-title" id="myModalLabel"> Add Unit </h4>
                </div>
                <form method="post" action="<?php echo e(url('/unitstore')); ?>">
                    <div class="modal-body" style="height: 55vh; overflow-y: auto">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="control-label">Unit Name </label>
                            </div>
                            <div class="col-sm-7 input-group">
                                <input type="text" name="unit_na" class="form-control">
                                
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
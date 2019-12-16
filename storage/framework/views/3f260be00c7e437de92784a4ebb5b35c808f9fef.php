<div class="modal fade lg modal1" tabindex="-1" id="giveback<?php  echo $idR?>" role="dialog" style=" color: black;">
    <style>
        .form-group div {
            margin: 2px !important;
        }
    </style>
    <div class="modal-dialog" role="document" style=" margin-left: 30vw !important; height: 150px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> Confirm Dialog </h4>
            </div>
            <div class="modal-body" style="overflow-y: auto;border: 0px solid black;">
                <?php if($item->giveback=="true"): ?>
                    Are you sure you did not get that money ?
                <?php elseif($item->giveback=="false"): ?>
                    Are you sure you got the money ?
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <div style="">
                    
                    
                    
                    <a href="<?php echo e(url('sales_giveback',$idR)); ?>">
                        <button class="btn btn-primary" type="submit"
                                style="align-content: center; padding-left: 11px;padding-right: 11px;">
                            Yes
                        </button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        No
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

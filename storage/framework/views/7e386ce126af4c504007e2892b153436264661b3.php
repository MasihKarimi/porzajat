<div class="alert alert-info" id="headeradd" style=" border: 0px solid black;" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i
                class="sidenav-icon icon icon-plus"></i> Add Sales
    </button>
    <button id="excel" class="btn btn-success"
            type="button"><i class="sidenav-icon icon icon-file-excel-o"
                             style="font-size:larger;"></i>
    </button>
    
  <!--
    <form class="pull-right" method="post" action="<?php echo e(url('/sales_id')); ?>">
        <div class="col-sm-3 pull-right input-group" style="margin-top: -35px">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="text" name="id" placeholder="Search For Bill Number " class="form-control">
            <span class="input-group-addon" style="padding: 0px !important; background-color: #e67e22 !important;
border: 0px solid black;">
                <button type="submit" class="btn btn-info form-control">
                    <i class="icon icon-search"
                       style="font-size: larger;font-weight: bold"></i>
                </button> </span>
        </div>
    </form>
    -->
    
    <form class="pull-right" method="post" action="<?php echo e(url('/sales_id_view')); ?>">
        <div class="col-sm-3 pull-right input-group" style="margin-top: -35px">

            <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
            <input type="text" name="id" placeholder="Search for Bill Number"
                   class="form-control">
            <span class="input-group-addon" style="padding: 0px !important; background-color: #e67e22 !important;
border: 0px solid black;">
                <button type="submit" class="btn btn-info form-control">
                    <i class="icon icon-search" style="font-size: larger;font-weight: bold"></i>
                </button> </span>
        </div>
    </form>
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
                      enctype="multipart/form-data">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add</h4>
                    </div>
                    <div class="modal-body" style="height: 60vh; overflow-y: auto">

                        <div class="row">


                            <div class="tab-content" style="">
                                <div class="modal-body" style="overflow-y: hidden!important;overflow-x: hidden;">

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Chose Product </label>
                                        </div>
                                        <div class="col-sm-7 input-group">
                                            <select class="chzn-select form-control edit"
                                                    data-placeholder="Select an Option" id="recept_id"
                                                    name="recept_id" required>
                                                <?php
                                                $ros = DB::select("select * from products");
                                                ?>
                                                <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>{
                                                <option value="<?php echo e($ro->id); ?>"><?php echo e($ro->product_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('.edit').change(function () {
                                                var id = $(this).val();
                                                $('#data ').html("Loading...");
                                                $('#data').load('<?php echo e(url("medicineName")); ?>/' + id);
                                                });
                                            });
                                    </script>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Detail </label>
                                        </div>
                                        <div class="col-sm-7 input-group">
                                            <textarea name="data" id="data" style="background-color:#ffffff" disabled
                                                      class="form-control" rows="5"></textarea></div>
                                    </div>


                                </div>
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="control-label">Medicine Amount</label>
                                    </div>
                                    <div class="col-sm-4" style="padding-left: 0px !important;">
                                        <input type="number" id="quantity" name="quantity" style="" required
                                               class="form-control numeric">
                                    </div>
                                    <div class="col-sm-3" style="">
                                        <button type="button" id="button" name="addmaininfo"
                                                class="btn btn-primary button">
                                            <i class="glyphicon glyphicon-check"></i> Sales
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php
                        $ros = DB::table("sales")->get();
                        $ids = 0;
                        ?>
                        <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php  $ids = $ro->id + 1  ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                        <input type="hidden" name="mid" value="<?php echo random_int(0, 100) . $ids ?>"
                               id="mid">

                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('.button').click(function () {
                                    var recept_id = $("#recept_id").val();
                                    var quantity = $("#quantity").val();
                                    var bene=$("#mid").val();
                                    $('#result').html(" <label>Loading... </label>");
                                    $('#result').load('<?php echo e(url("medicineAdd")); ?>/'  + recept_id + '/' + quantity + '/' +bene);;
                                });
                            });
                        </script>
                        <div id="result"></div>
                        <div id="result1" style="display: none">

                        </div>
                    </div>

                    <div class="modal-footer">
                        <div style="padding-top: 5px;">
                            <a href="<?php echo e(url('/view_sales')); ?>" class="btn btn-default">

                                Close
                            </a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
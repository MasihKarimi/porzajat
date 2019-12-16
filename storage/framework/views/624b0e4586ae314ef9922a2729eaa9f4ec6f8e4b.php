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
                                            <label class="control-label">Customer Name </label>
                                        </div>
                                        <div class="col-sm-7 input-group">
                                            <input type="text" required name="buyerName" id="buyerName" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Customer Address </label>
                                        </div>
                                        <div class="col-sm-7 input-group">

                                            <input type="text" required name="address" id="address" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Bill Number </label>
                                        </div>
                                        <div class="col-sm-7 input-group">
                                            <input type="text " name="billnumber" value="<?php
                                            $item = DB::table("sales")->max('id');
                                            $max = $item + 1;
                                            echo "sartaj-" ."/". $max . $item;

                                            ?>" disabled id="billnumber" class="form-control" >

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Chose Product </label>
                                        </div>
                                        <div class="col-sm-7 input-group">
                                            <select class="chzn-select form-control edit "
                                                    data-placeholder="Select an Option" style="" id="recept_id"
                                                    name="recept_id" required>
                                                <option></option>
                                                <?php
                                                $ros = DB::table("products")->get();
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
                                            <label class="control-label">Detail In Stock </label>
                                        </div>
                                        <div class="col-sm-7 input-group">
                                            <textarea name="data" id="data" style="background-color:#ffffff" disabled
                                                      class="form-control" rows="5"></textarea></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Quantity </label>
                                        </div>
                                        <div class="col-sm-7 input-group">

                                            <input type="text" required name="quantity" id="quantity" class="form-control" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function(){
                                            $("#quantity").on('keyup',function () {
                                                var quantity=$(this).val();
                                                var id=$('.edit').val();
                                                $('#total ').html("Loading...");
                                                $('#total').load('<?php echo e(url("medicineTotal")); ?>/' + quantity + '/' + id);
                                            })
                                        });
                                    </script>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Total & Benefit </label>
                                        </div>
                                        <div class="col-sm-7 input-group">
                                            <textarea name="total" id="total" style="background-color:#ffffff" disabled
                                                      class="form-control total" rows="5"></textarea></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Exchange AFN Currency</label>
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
                                            <label class="control-label">Total Sale</label>
                                        </div>
                                        <div class="col-sm-7 input-group ">
                                            <input type="number" required name="tsales" id="tsales" class="form-control fees">
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
                                                $('#echangeResult').load('<?php echo e(url("exchangeTypeSendto")); ?>/' + id + '/' + cur);
                                            });
                                        });
                                    </script>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Discount %</label>
                                        </div>
                                        <div class="col-sm-7  input-group">
                                            <select class="form-control edit" name="percent" id="percent"
                                                    style="width: 100%;border: 1px solid #6fa0ff">
                                                <option value=""></option>
                                                <option value="0">0 %</option>
                                                <option value="1">1 %</option>
                                                <option value="2">2 %</option>
                                                <option value="3">3 %</option>
                                                <option value="4">4 %</option>
                                                <option value="5">5 %</option>
                                                <option value="6">6 %</option>
                                                <option value="7">7 %</option>
                                                <option value="8">8 %</option>
                                                <option value="9">9 %</option>
                                                <option value="10">10 %</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" style="background-color: #f0f0f0">
                                        <div class="col-sm-4">
                                            <label class="control-label">Total Amount </label>
                                        </div>
                                        <div class="col-sm-7 input-group" id="sales">
                                            <input type="text" value="" style="background-color: rgba(255, 255, 255, 0.35)"
                                                   name="sales" id="sales" class="form-control totalsale"> <span
                                                    class="input-group-addon">AFN</span>
                                        </div>
                                    </div>


                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('.edit').change(function () {
                                                var percen = $(this).val();
                                                var price = $("#amountes").val();
                                                $('#sales ').html("<input type='text' value='Loading ...' style='background-color: rgba(255, 255, 255, 0.35)' name='sales' id='sales' class='form-control'>  <span class='input-group-addon'>AFN</span>");
                                                $('#sales ').load('<?php echo e(url("procurementSales")); ?>/' + percen + '/' + price);
                                            });
                                        });
                                    </script>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Pay Bill </label>
                                        </div>
                                        <div class="col-sm-7 input-group">

                                            <input type="number" required name="bill" id="bill" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Benefit </label>
                                        </div>
                                        <div class="col-sm-7 input-group">

                                            <input type="number" required name="benefit" id="benefit" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Sales Type</label>
                                        </div>
                                        <div class="col-sm-7  input-group">
                                            <select class="form-control Type" name="salestype" required id="salestype">
                                                <option value=""></option>
                                                <option value="1">debt</option>
                                                <option value="2">credit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-sm-7"
                                             style="align-content: center; border: 0px solid black !important;">
                                            <lable name="check" id="check" class=""></lable>
                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                            </div>
                            <div class="col-sm-3" style="">
                                <button type="button" id="button" name="addmaininfo"
                                        class="btn btn-primary button">
                                    <i class="glyphicon glyphicon-check"></i> Sales
                                </button>
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
                                    var buyerName = $("#buyerName").val();
                                    var address = $("#address").val();
                                    var recept_id = $("#recept_id").val();
                                    var quantity = $("#quantity").val();
                                    var tsales = $("#amountes").val();
                                    var salestype = $("#salestype").val();
                                    var currencyType = $("#idcurency").val();
                                    var mid = $("#benefit").val();
                                    var bene=$("#mid").val();
                                    var payBill=$("#bill").val();
                                    var perce=$("#percent").val();
                                    $('#result').html(" <label>Loading... </label>");
                                    $('#result').load('<?php echo e(url("medicineAdd")); ?>/' + buyerName + '/' + address + '/' + recept_id + '/' + quantity + '/' + tsales +  '/' + salestype +   '/' + currencyType + '/' + mid + '/' +bene + '/' + payBill + '/'+perce);;
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
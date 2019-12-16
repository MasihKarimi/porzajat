<style>
    #Msales {
        color: white;
    }
    #headeradd {
        border-radius: 5px;
        padding: 10px !important;
        background: #e67e22;
    }
    /*tbody td {*/
    /*border: 1px solid #f0f0f0*/
    /*}*/
    /*#hid {*/
    /*visibility: hidden;*/
    /*}*/
</style>

@extends('layouts.main');

@section('javascrip')
    <script>
        $(document).ready(function () {
            $("#procurement").addClass("active")
        });
    </script>
@stop
@section('content')
    <div style="margin-top: -25px;">
        <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
            <li><a href="#">Quotations </a></li>
            <li><a href="#">Quotation</a></li>
            <li><a href="#">Add</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
                <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;" xmlns="http://www.w3.org/1999/html">
                    <a type="button" class="btn btn-info" href="{{ url('/add_q') }}" ><i
                                class="sidenav-icon icon icon-arrow-left"></i> View All Quotations
                    </a>
                </div>                
           <div class="panel panel-defualt">
               <div class="panel-heading">
                   <div class="panel-body">
                    <div class="row">


                        <div class="tab-content" style="">
                            <div class="modal-body" style="overflow-y: hidden!important;overflow-x: hidden;">
                                    <div class="form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">Chose Customer </label>
                                            </div>
                                            <?php $idnum=101;?>
                                            <div class="col-sm-7 input-group">
                                                <select class="chzn-select form-control selects"
                                                        data-placeholder="Select an Option" id="customer_id"
                                                        name="customer_id" required>
                                                        <option onclick="clickedOnce()" value="<?php echo $onceId=random_int(0, 100) . $idnum; ?>">One Time Customer</option>
                                                    <?php
                                                    $ros = DB::select("select * from customers");
                                                    ?>
                                                    @foreach($ros as $ro){
                                                    <option value="{{$ro->id }}">{{$ro->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group hide" id="name">
                                                <div class="col-sm-4">
                                                    <label class="control-label">Name</label>
                                                </div>
                                                <div class="col-sm-7" style="padding-left: 0px !important;">
                                                        <input type="text" id="c_name" name="name" value="Name" style="" required
                                                               class="form-control">
                                                </div>
                                               
                                        </div>   
                                        <div class="form-group hide" id="phone">
                                        <div class="col-sm-4">
                                                <label class="control-label">Phone</label>
                                            </div>
                                            <div class="col-sm-7" style="padding-left: 0px !important;">
                                                    <input type="text" id="c_phone" name="phone" value="Phone" style="" required
                                                           class="form-control">
                                            </div>
                                        </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="control-label">Choose Product </label>
                                    </div>
                                    <div class="col-sm-7 input-group">
                                        <select class="chzn-select form-control selects edit"
                                                data-placeholder="Select an Option" id="product_id"
                                                name="product_id" required>
                                            <?php
                                            $ros = DB::select("select * from products");
                                            ?>
                                            @foreach($ros as $ro){
                                            <option value="{{$ro->id }}">{{$ro->product_s}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    
                                    $(document).ready(function () {
                                        $('.edit').change(function () {
                                            var id = $(this).val();
                                            $('#data ').html("Loading...");
                                            $('#data').load('{{ url("productName") }}/' + id);
                                           
                                            });
                                         $('#customer_id').change(function(){
                                             var id=$(this).val()
                                             if(id>100){
                                             $('#phone').removeClass('hide');
                                             $('#name').removeClass('hide');
                                            }
                                            else{
                                                $('#phone').addClass('hide');
                                                $('#name').addClass('hide');
                                            }
                                         })   
                                        });
                                </script>
                                
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="control-label">Detail </label>
                                    </div>
                                    <div class="col-sm-7 input-group">
                                        <textarea name="data" id="data" style="background-color:#ffffff" disabled
                                                  class="form-control" rows="5"></textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Sales Price </label>
                                        </div>
                                        <div class="col-sm-7  input-group">
                                            <input type="number" name="sales_price" id="sales_price" required class="form-control">
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Product Quantity</label>
                                        </div>
                                        <div class="col-sm-4" style="padding-left: 0px !important;">
                                            <input type="number" id="quantity" name="quantity" style="" required
                                                   class="form-control numeric">
                                        </div>
                                        <div class="col-sm-3" style="">
                                            <button type="button" id="button" name="addmaininfo"
                                                    class="btn btn-primary button">
                                                <i class="glyphicon glyphicon-check"></i> Add
                                            </button>
                                        </div>
                                        
                                    </div>        
                                                   
                                                    
                                
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           
                                {{--  <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Choose Money Type </label>
                                        </div>
                                        <div class="col-sm-7 input-group">
                                            <select class=" form-control "
                                                    data-placeholder="Select an Option" id="c_c_money"
                                                    name="c_c_money" required>
                                                <option value="5">Cridet</option>
                                                <option value="1">Cash</option>
                                            </select>
                                        </div>
                                    </div>  --}}
                                   
                        </div>

                    </div>
                    <?php
                    $ros = DB::table("quotations")->get();
                    $ids = 1;
                    $idbene=null;
                    
                    $idperSale=0;
                    ?>
                    @foreach($ros as $ro)
                        <?php  $idbene = $ro->bene; $idperSale=$ro->id; ?>
                    @endforeach

                    <input type="hidden" name="mid" value="<?php echo $ids+$idbene; ?>"
                           id="mid">

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('.button').click(function () {
                                var customer_id=$("#customer_id").val();
                                var product_id = $("#product_id").val();
                                var quantity = $("#quantity").val();
                                var mid=$("#mid").val();
                                var name=$("#c_name").val();
                                var phone=$("#c_phone").val();
                                var sales_price=$("#sales_price").val();
                                $('#result').html(" <label>Loading... </label>");
                               
                                $('#result').load('{{ url("productAddQ") }}/' + customer_id + '/' + product_id + '/' + quantity + '/' +mid+ '/' +phone+ '/' +name+ '/' +sales_price);
                               
                                $('#quantity').val('');
                                $("#sales_price").val('');
                                return true;
                                
                               
                            });
                        });
                    </script>
                    <div style="float:right;">
                        <a href="{{url('quoutation_salesdetail', $ids+$idperSale)}}" title="Details of the Record Shows">
                                Generate Invoice
                                     <i class="icon icon-info-circle"></i>
                                
                            </a>
                     </div>
                    <div id="result"></div>
                    <div id="result1" style="display: none">

                    </div>            
                   </div>
               </div>
           </div>
        </div>
    </div>
@stop
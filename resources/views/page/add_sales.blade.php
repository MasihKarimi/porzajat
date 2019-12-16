@extends('layouts.main');
@section('javascrip')
    <script>
        $(document).ready(function () {
            $("#procurement").addClass("active")
        });
    </script>
@stop
<style>
    #sendto {
        color: white;
    }

    #headeradd {
        border-radius: 5px;
        padding: 10px !important;
        background: #0090ff;
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

@section('content')

    <div style="margin-top: -25px;">
        <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
            <li><a href="#">Sales </a></li>
            <li><a href="{{url('/add_sale')}}">Add Sales</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                        <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;" xmlns="http://www.w3.org/1999/html">
                            <a type="button" class="btn btn-info" href="{{ url('/add_sales') }}" ><i
                                        class="sidenav-icon icon icon-plus"></i> Add Sales
                            </a>
                            <button id="excel" class="btn btn-success"
                                    type="button"><i class="sidenav-icon icon icon-file-excel-o"
                                                     style="font-size:larger;"></i>
                            </button>
                            {{--<div  style="padding-top: -20px">--}}
                          <!--
                            <form class="pull-right" method="post" action="{{url('/sales_id')}}">
                                <div class="col-sm-3 pull-right input-group" style="margin-top: -35px">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                            {{--</div>--}}
                            <form class="pull-right" method="post" action="{{url('/searchStockView')}}">
                                <div class="col-sm-3 pull-right input-group" style="margin-top: -35px">
                        
                                    <input type="hidden" name="_token" value="{{Session::token()}}">
                                    <input type="text" name="id" placeholder="Search for product Name"
                                           class="form-control">
                                    <span class="input-group-addon" style="padding: 0px !important; background-color: #e67e22 !important;
                        border: 0px solid black;">
                                        <button type="submit" class="btn btn-info form-control">
                                            <i class="icon icon-search" style="font-size: larger;font-weight: bold"></i>
                                        </button> </span>
                                </div>
                            </form>
                            <!-- <div class="modal fade lg modal1" tabindex="-1" id="myModal" role="dialog" style=" color: black;">
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
                                                                            <label class="control-label">Chose Customer </label>
                                                                        </div>
                                                                        <?php $idnum=101;?>
                                                                        <div class="col-sm-7 input-group">
                                                                            <select class="chzn-select form-control"
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
                                                                    <label class="control-label">Chose Product </label>
                                                                </div>
                                                                <div class="col-sm-7 input-group">
                                                                    <select class="chzn-select form-control edit"
                                                                            data-placeholder="Select an Option" id="product_id"
                                                                            name="product_id" required>
                                                                        <?php
                                                                        $ros = DB::select("select * from products");
                                                                        ?>
                                                                        @foreach($ros as $ro){
                                                                        <option value="{{$ro->id }}">{{$ro->product_name}}</option>
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
                                                                        <label class="control-label">Product Quantity</label>
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
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                       
                                                            <div class="form-group">
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
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label">Discount %</label>
                                                                    </div>
                                                                    <div class="col-sm-7  input-group">
                                                                        <select class="form-control" name="percent" id="percent"
                                                                                style="width: 100%;border: 1px solid #6fa0ff">
                                                                        
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
                                                    </div>
                        
                                                </div>
                                                <?php
                                                $ros = DB::table("sales")->get();
                                                $ids = 1;
                                                $idbene=null;
                                                ?>
                                                @foreach($ros as $ro)
                                                    <?php  $idbene = $ro->bene;  ?>
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
                                                            var c_c_money=$("#c_c_money").val();
                                                            var name=$("#c_name").val();
                                                            var phone=$("#c_phone").val();
                                                            var disc=$("#percent").val();
                                                            $('#result').html(" <label>Loading... </label>");
                                                           
                                                            $('#result').load('{{ url("productAdd") }}/' + customer_id + '/' + product_id + '/' + quantity + '/' +mid+ '/' +c_c_money+ '/' +phone+ '/' +name+ '/' +disc);;
                                                            
                                                            $('#quantity').val('');
                                                            $('#c_c_money').val('');
                                                            $("#percent").val('0');
                                                            return true;
                                                            
                                                           
                                                        });
                                                    });
                                                </script>
                                                <div id="result"></div>
                                                <div id="result1" style="display: none">
                        
                                                </div>
                                            </div>
                        
                                            <div class="modal-footer">
                                                <div style="padding-top: 5px;">
                                                    <a href="{{url('/view_sales')}}" class="btn btn-default">
                        
                                                        Close
                                                    </a>
                        
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="panel">
                                        
                                            <div class="panel-header">
                                                    <h3>Stock Item Quantity</h3>
                                                </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <!--Bellow Row For Showing Data -->

                                                <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 11px; border: 1px solid black; width: 100%;">
                                                    <thead>
                                                    <tr  role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                            style="width: 141px;" aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending">Part Number/ Name
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                            style="width: 103px;" aria-label="Office: activate to sort column ascending">Total Quantity
                                                        </th>
                                                    </tr>
                                                    </thead>

                                                    <tbody id="showRow">
                                                    <?php  $products = DB::table("products")->get();


                                                    ?>

                                                    @foreach($products as $pro)
                                                        <tr role="row" style="font-size: 14px;" class="odd">
                                                            <td tabindex="0" class="sorting_1">  <?php if ($mids = DB::table("products")->where('id', $pro->id)->first()) {
                                                                    echo $mids->product_s."-".$mids->product_name;
                                                                } ?></td>
                                                            <td>
                                                                <?php   $rosale = DB::table("stocks")->where('product_id',$pro->id)->get();
                                                                $tot = 0;
                                                                ?>
                                                                @foreach($rosale as $ros)

                                                                    <?php  $tot = $tot + $ros->quantity;?>

                                                                @endforeach
                                                                    @if($tot<50)
                                                                        <span class="label label-danger"><?php echo $tot; ?></span>
                                                                    @else
                                                                        <span class="label label-success"><?php echo $tot; ?></span>
                                                                    @endif</td>

                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="dataTables_paginate paging_bootstrap_number" id="sample_1_paginate">
                                                            <ul class="pagination" style="visibility: visible;">
                                                                <li class="active">{{$showStock->links()}}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Bellow Row For Showing Data -->
                                            </div></div></div></div>

                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="panel">
                                        <div class="panel-header">
                                            <h3>Stock Item List</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <!--Bellow Row For Showing Data -->

                                                <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 11px; border: 1px solid black; width: 100%;">
                                                        <thead>
                                                        <tr  role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                style="width: 141px;" aria-sort="ascending"
                                                                aria-label="Name: activate to sort column descending">Part Number/ Name
                                                            </th>
                                                           
                                                            <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                style="width: 103px;" aria-label="Office: activate to sort column ascending">Quantity
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                style="width: 103px;" aria-label="Office: activate to sort column ascending">Net Price
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                style="width: 103px;" aria-label="Office: activate to sort column ascending">Total Net Cost
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                style="width: 55px;" aria-label="Age: activate to sort column ascending">Sales Price
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                style="width: 103px;" aria-label="Office: activate to sort column ascending">Benefits
                                                            </th>
                                                          
                                                            <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                            style="width: 108px;" aria-label="Start date: activate to sort column ascending">
                                                            Purchases type
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                            style="width: 108px;" aria-label="Start date: activate to sort column ascending">
                                                            Vendore Name
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                style="width: 108px;" aria-label="Start date: activate to sort column ascending">
                                                                Purchases date
                                                            </th>
                                                            
                                                        </tr>
                                                        </thead>
                                                        <tbody id="showRow">
                                                        @foreach($showStock as $item)
                                                            <tr role="row" style="font-size: 14px;" class="odd">
                                                                <td tabindex="0" class="sorting_1">{{ $item->product->product_s."-". $item->product->product_name }}</td>
                                                                
                                                                @if($item->quantity <= 10)
                                                                    <td  title="The Quantity Is Less Then  10"><span class="label label-danger">{{$item->quantity}}</span> </td>
                                                                @endif
                                                                @if($item->quantity > 10)
                                                                    <td ><span class="label label-success">{{$item->quantity}}</span> </td>
                                                                @endif
                                                                <td>{{$item->net_price}}</td>
                                                                <td ><span class="label label-warning">{{$item->quantity * $item->net_price}}</span></td>
                                                                <td>{{$item->sales_price}}</td>
                                                                <td ><span class="label label-info">{{($item->sales_price - $item->net_price) * $item->quantity}}</span></td>
                                                               <!-- <td ><span class="label label-primary"></span></td> -->
                                                               <td>@if($item->sales_type==0)<span class="label label-danger">Credit</span>@else <span class="label label-success">Cash</span> @endif</td>
                                                               <td> <?php
                                                                if($item->customer_id==='null' || $item->customer_id===''){
                                                                 ?>
                                                                 <p>No Vendore</p>
                                                                 <?php }else{   
                                                                $ros = DB::table("customers")->where('id',$item->customer_id)->get();
                                                                  ?>
                                                                  @foreach($ros as $ro)
                                                                      {{ $ro->name }}
                                                                  @endforeach
                                                                <?php } ?>
                                                                </td>
                                                               <td><?php echo date('Y-m-d',strtotime($item->created_at)) ?></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="dataTables_paginate paging_bootstrap_number" id="sample_1_paginate">
                                                            <ul class="pagination" style="visibility: visible;">
                                                                <li class="active">{{$showStock->links()}}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Bellow Row For Showing Data -->
                                            </div></div></div></div>

                            </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@stop

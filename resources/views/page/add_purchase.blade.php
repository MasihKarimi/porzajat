@extends('layouts.main')

@section('javascrip')
    <script>
        $(document).ready(function () {
            $("#hr").addClass("active")
        });
    </script>
@stop
<style>
    #hr_management {
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
    <div class="layout-content-body">
        <div style="margin-top: -25px;">
            <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
                <li><a href="#">Purchase </a></li>
                <li><a href="{{url('/add_purchases')}}">Add Purchases</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-content">
                        <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i
                                        class="sidenav-icon icon icon-plus"></i> Add Purchases
                            </button>
                            <button id="excel" class="btn btn-success" type="button"><i
                                        class="sidenav-icon icon icon-file-excel-o" style="font-size:larger;"></i>
                            </button>

                            <form class="pull-right" method="post" action="{{route('/searchPurchase')}}">
                                <div class="col-sm-3 pull-right input-group" style="margin-top: -35px">

                                    <input type="hidden" name="_token" value="{{Session::token()}}">
                                    <input type="text" name="term" placeholder="Search for product Name"
                                           class="form-control">
                                    <span class="input-group-addon" style="padding: 0px !important; background-color: #e67e22 !important;
border: 0px solid black;">
                <button type="submit" class="btn btn-info form-control">
                    <i class="icon icon-search" style="font-size: larger;font-weight: bold"></i>
                </button> </span>
                                </div>
                            </form>

                            <div class="modal fade lg modal1" tabindex="-1" id="myModal" role="dialog"
                                 style="color: black; display: none;">
                                <style>
                                    .form-group div {
                                        margin: 2px !important;
                                    }
                                </style>
                                <div class="modal-dialog" role="document"
                                     style="width: 60vw !important; margin-left: 20vw !important;">
                                    <div class="modal-content">
                                        <form id="example-form" novalidate="novalidate" method="post"
                                              data-toggle="validator" enctype="multipart/form-data"
                                              >
                                            <?php
                                            $encrypter = app('Illuminate\Encryption\Encrypter');
                                            $encrypted_token = $encrypter->encrypt(csrf_token());
                                            ?>
                                            <input id="token" type="hidden" value="{{$encrypted_token}}">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"> Add Purchases </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="productName">Choose Part Number</label>
                                                            <select name="prodcutName" id="productName" class="chzn-select form-control">
                                                                @foreach(App\Product::all() as $value)
                                                                <option value="{{$value->id}}">{{$value->product_s."-".$value->product_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>

                                                        <p>
                                                            <label for="quantity">Quantity</label>
                                                        <div style="padding-left: 0px !important;">
                                                            <input type="number" value="" width="150%" name="quantity" id="quantity"
                                                                   class="form-control">
                                                        </div>

                                                        </p>
                                                        <br>
                                                        <p>
                                                            <label for="netprice">Net Price (Net Rate + Rent)</label>
                                                            <input class="form-control"  name="netprice" id="netprice" type="text">
                                                            <br>
                                                            <span class="error4 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                        <p>
                                                            <label for="saleprice">Sales Price</label>
                                                            <input class="form-control" name="saleprice" id="saleprice" type="text">
                                                            <br>
                                                            <span class="error5 text-center alert alert-danger hidden"></span>
                                                        </p>



                                                        <p>
                                                            <label for="saleprice">Bill No#</label>
                                                            <input class="form-control" name="bill" id="bill" type="text">
                                                            <br>
                                                            <span class="error5 text-center alert alert-danger hidden"></span>
                                                        </p>

                                                        <input type="hidden" name="id" value="{{$_SESSION['access']}}">
                                                        <p>
                                                            <label for="customer_id">Chose Vendore Name</label>
                                                            <select name="customer_id" id="customer_id" class="chzn-select form-control">
                                                                <option value="">No Vendore</option>
                                                                @foreach(App\Customer::all() as $value)
                                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            </p>
                                                        <p>
                                                            <label for="ptype">Purchase Type</label>
                                                            <select name="ptype" class="form-control" id="ptype">
                                                                <option value="0">Credit</option>
                                                                <option value="1">Cash</option>
                                                            </select>
                                                             </p>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div style="padding-top: 0px;">
                                                    <button type="submit" name="addmaininfo" class="btn btn-primary">
                                                        <i class="glyphicon glyphicon-check"></i> Add
                                                    </button>
                                                    <a href="{{url('/view_purchase')}}" class="btn btn-default">
                                                    Close
                                                    </a>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                        <!--Bellow Row For Showing Data -->

                        <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 11px; border: 1px solid black; width: 100%;">
                            <thead>
                            <tr role="row" style="text-align: center">
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 100px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">No#
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 120px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Bill#
                                </th>

                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 141px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Product Name
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
                                    style="width: 103px;" aria-label="Office: activate to sort column ascending">Purchase Type
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                style="width: 103px;" aria-label="Office: activate to sort column ascending">Vendore Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 79px;" aria-label="Salary: activate to sort column ascending">Date
                                </th>
                            </tr>
                            </thead>
                            <tbody id="showRow">
                            <?php $id =1 ?>
                            @foreach($showStock as $item)
                            <tr role="row" style="font-size: 14px;;text-align: center" class="odd">
                                <td>{{$id++}}</td>
                                <td>{{$item->bill}}&nbsp</td>
                                <td tabindex="0" class="sorting_1">{{$item->product->product_name}}</td>
                                <td>{{$item->quantity}}&nbsp;{{$item->unit}}</td>
                                <td>{{$item->net_price}}</td>
                                <td>{{$item->quantity * $item->net_price}}</td>
                                <td>{{$item->sales_price}}</td>
                                <td>{{$item->total_benefit}}</td>
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
                                <td><?php  echo date('Y-m-d',strtotime($item->created_at)) ?></td>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--Bellow Row For Showing Data -->

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
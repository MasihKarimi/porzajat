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
                <li><a href="{{url('/view_purchase')}}">Purchases </a></li>
                <li><a href="#">Edit Purchases</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-content">
                        <div class="panel panel-default">
                            <div class="panel-header">
                        <h1>Edit Purchases</h1>
                            </div>
                            <div class="panel-body">
                        <form action="{{route('/update_purchase')}}" method="post" enctype="multipart/form-data" >
                            {!! csrf_field() !!}
                            <input type="hidden" name="singleID" value="{{isset($edit_purchase) ? $edit_purchase->id : ''}}">
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    <label for="productName">Chose Product Name</label>
                                    <select name="prodcutName" id="productName" class="form-control">
                                        <option value="{{isset($edit_purchase) ? $edit_purchase->product_id : ''}}">{{isset($edit_purchase) ? $edit_purchase->Product->product_name : ''}}</option>
                                        @foreach(App\Product::all() as $value)
                                            <option value="{{$value->id}}">{{$value->product_name}}</option>
                                        @endforeach
                                    </select>
                                </p>
                                
                                <p>
                                    <label for="quantity">Quantity</label>
                                    <input class="form-control" value="{{isset($edit_purchase) ? $edit_purchase->quantity : ''}}" name="quantity" id="quantity" type="text">
                                    <br>
                                    <span class="error3 text-center alert alert-danger hidden"></span></p>
                                <p>
                                    <label for="netprice">Net Price (Net Rate + Rent)</label>
                                    <input class="form-control"  value="{{isset($edit_purchase) ? $edit_purchase->net_price : ''}}" name="netprice" id="netprice" type="text">
                                    <br>
                                    <span class="error4 text-center alert alert-danger hidden"></span>
                                </p>
                                <p>
                                    <label for="saleprice">Sales Price</label>
                                    <input class="form-control" value="{{isset($edit_purchase) ? $edit_purchase->sales_price : ''}}" name="saleprice" id="saleprice" type="text">
                                    <br>
                                    <span class="error5 text-center alert alert-danger hidden"></span>
                                </p>
                                <input type="hidden" name="id" value="{{$_SESSION['access']}}">
                              
                            </div>
                            <div class="col-md-6">
                                    <p>
                                            <label for="customer_id">Chose Vendore Name</label>
                                            <select name="customer_id" id="customer_id" class="form-control">
                                                    <option value="{{isset($edit_purchase)? $edit_purchase->customer_id :''}}">@if((isset($edit_purchase)? $edit_purchase->customer_id :'') == '') No vendore @else 
                                                        <?php $custo=DB::table('customers')->where('id',$edit_purchase->customer_id)->first(); echo $custo->name; ?>
                                                        @endif</option>
                                                    <option value="">No Vendore</option>    
                                                @foreach(App\Customer::all() as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                            </p>
                                <p>
                                        <label for="ptype">Purchase Type</label>
                                        <select name="ptype" class="form-control" id="ptype">
                                            <option value="{{isset($edit_purchase)? $edit_purchase->sales_type :''}}">@if((isset($edit_purchase)? $edit_purchase->sales_type :'') == 0) Credit @else Cash @endif</option>
                                            <option value="0">Credit</option>
                                            <option value="1">Cash</option>
                                        </select>
                                    </p>
                            </div>
                        </div>
                        <div style="padding-top: 5px; padding-bottom: 5px; margin-left: 500px;">
                            <button type="submit" name="addmaininfo" class="btn btn-primary">
                                <i class="glyphicon glyphicon-check"></i> Update
                            </button>
                            <a href="{{url('/view_purchase')}}"  type="button" class="btn btn-default">
                                Back
                            </a>

                        </div>
                    </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
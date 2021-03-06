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
        background:#466074;
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
                <li><a href="#">Setting </a></li>
                <li><a href="{{url('/view_purchase')}}">View Purchases</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-content">
                        <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                            <button id="excel" class="btn btn-success" type="button"><i
                                        class="sidenav-icon icon icon-file-excel-o" style="font-size:larger;"></i>
                            </button>

                            <form class="pull-right" method="post" action="{{route('/searchPurchaseView')}}">
                                <div class="col-sm-3 pull-right input-group" style="margin-top: -35px">

                                    <input type="hidden" name="_token" value="{{Session::token()}}">
                                    <input type="text" name="term" placeholder="Search for By Bill number"
                                           class="form-control">
                                    <span class="input-group-addon" style="padding: 0px !important; background-color: #e67e22 !important;
border: 0px solid black;">
                <button type="submit" class="btn btn-info form-control">
                    <i class="icon icon-search" style="font-size: larger;font-weight: bold"></i>
                </button> </span>
                                </div>
                            </form>
                        </div>

                        <!--Bellow Row For Showing Data -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                        <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 11px; border: 1px solid black; width: 100%;">
                            <thead>
                            <tr role="row">
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
                                style="width: 103px;" aria-label="Office: activate to sort column ascending">Purchase Type
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                            style="width: 103px;" aria-label="Office: activate to sort column ascending">Vendore Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                style="width: 79px;" aria-label="Salary: activate to sort column ascending">Date
                            </th>
                               
                            <?php $user=DB::table('users')->where('id',$_SESSION['access'])->first(); ?>
                            @if($user->type==1)
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="2"
                                    style="width: 79px;" aria-label="Salary: activate to sort column ascending">Action
                                </th>
                                @endif
                            </tr>
                            </thead>
                            <tbody id="showRow">
                            <?php $id =1 ?>
                            @foreach($showStock as $item)
                                <tr role="row" style="font-size: 13px;text-align: center" class="odd">
                                    <td>{{$id++}}</td>
                                    <td>{{$item->bill}}&nbsp</td>
                                    <td tabindex="0" class="sorting_1">{{ $item->product->product_s."-".$item->product->product_name }}</td>
                            
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
                                    <?php $user=DB::table('users')->where('id',$_SESSION['access'])->first(); ?>
                                    @if($user->type==1)
                                    <td><a title="Update The Selected Record" href="{{route('/edit_purchase',['id'=>$item->id])}}" class="btn btn-info btn-sm">Edit</a></td>
                                    <td><a title="Delete The Selected Record" href="{{route('/delete_purchase',['id'=>$item->id])}}" class="btn btn-danger btn-sm">Delete</a></td>
                                    @endif
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
                        <!--Bellow Row For Showing Data -->

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
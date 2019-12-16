@extends('layouts.main')
@section('javascrip')
    <script>
        $(document).ready(function () {
            $("#Customer").addClass("active")
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
                <li><a href="#">Customer </a></li>
                <li><a href="{{url('/add_customer')}}">Add Customer</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-content">
                        <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i
                                        class="sidenav-icon icon icon-plus"></i> Add Customer
                            </button>
                            <button id="excel" class="btn btn-success" type="button"><i
                                        class="sidenav-icon icon icon-file-excel-o" style="font-size:larger;"></i>
                            </button>

                            <form class="pull-right" method="post" action="{{route('/searchcustomer')}}">
                                <div class="col-sm-3 pull-right input-group" style="margin-top: -35px">
                                    {!! csrf_field() !!}
                                    <input type="text" name="term" placeholder="Search for Customer Name"
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
                                        <form id="example-form-customer" novalidate="novalidate" method="post"
                                              data-toggle="validator" enctype="multipart/form-data"
                                        >
                                            <?php
                                            $encrypter = app('Illuminate\Encryption\Encrypter');
                                            $encrypted_token = $encrypter->encrypt(csrf_token());
                                            ?>
                                            <input id="token" type="hidden" value="{{$encrypted_token}}">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"> Add Customer </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>
                                                            <label for="product_name">Enter Customer Name</label>
                                                            <input class="form-control" id="name" name="name" type="text">
                                                            <br>
                                                            <span class="error1 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                        <p>
                                                            <label for="product_name">Enter Customer Address</label>
                                                            <input class="form-control" id="customer_add" name="customer_add" type="text">
                                                            <br>
                                                            <span class="error1 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                        <p>
                                                                <label for="product_name">Enter Customer Phone</label>
                                                                <input class="form-control" id="customer_phone" name="customer_phone" type="text">
                                                                <br>
                                                                <span class="error1 text-center alert alert-danger hidden"></span>
                                                            </p>
                                                            <p>
                                                                    <label for="product_name">Enter Customer Point Of Contacts</label>
                                                                    <input class="form-control" id="customer_p_contact" name="customer_p_contact" type="text">
                                                                    <br>
                                                                    <span class="error1 text-center alert alert-danger hidden"></span>
                                                                </p>
                                                        <br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>
                                                            <label for="product_name">Enter TIN # </label>
                                                            <input class="form-control" id="tin" name="tin" type="text">
                                                            <br>
                                                            <span class="error1 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                        <p>
                                                            <label for="product_name">Enter LICENSE #</label>
                                                            <input class="form-control" id="lic" name="lic" type="text">
                                                            <br>
                                                            <span class="error1 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                        <p>
                                                            <label for="product_name">Enter Registration #</label>
                                                            <input class="form-control" id="reg" name="reg" type="text">
                                                            <br>
                                                            <span class="error1 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                    </div>      
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div style="padding-top: 0px;">
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

                        <!--Bellow Row For Showing Data -->
                        <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                        <table class="table responsive  table-hover dataTable table-borderd " id="sample_1" role="grid" aria-describedby="sample_1" style="font-size: 14px; border: 1px solid black;">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 103px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Customer Name
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 103px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Customer address
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                style="width: 103px;" aria-sort="ascending"
                                aria-label="Name: activate to sort column descending">Customer Phone
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                style="width: 103px;" aria-sort="ascending"
                                aria-label="Name: activate to sort column descending">Customer POC
                                </th>
                                

                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                style="width: 103px;" aria-sort="ascending"
                                aria-label="Name: activate to sort column descending">TIN #
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                style="width: 103px;" aria-sort="ascending"
                                aria-label="Name: activate to sort column descending">LICENSE #
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                style="width: 103px;" aria-sort="ascending"
                                aria-label="Name: activate to sort column descending">Registration #
                                </th>

                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Loan Amount On Us
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: auto" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Loan Amount On Customer
                                </th>
                                <?php $user=DB::table('users')->where('id',$_SESSION['access'])->first(); ?>
                                @if($user->type==1)
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="2"
                                    style="width: 103px;" aria-label="Office: activate to sort column ascending">Action
                                </th>
                                @endif
                            </tr>
                            </thead>
                            <tbody id="showRowcompany" style="text-align: center">
                            @foreach($CustShow as $item)
                                <tr role="row" class="odd item{{$item->id}}" >
                                    <td tabindex="0" class="sorting_1">{{$item->name}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{ $item->phone }}

                                    </td>
                                    <td>{{ $item->p_contact }}</td>

                                    <td>{{ $item->tin }}</td>
                                    <td>{{ $item->lic }}</td>
                                    <td>{{ $item->reg }}</td>
                                    <td>
                                        <p style="display: none"> {{$id = $item->id}}</p>

                                    <?php $totalReceive=0;

                                    $dbAllReceive=DB::table('cash_paids')->where('customer_id',$id )->get(); ?>
                                    @foreach ($dbAllReceive as $jan)
                                        <?php $totalReceive=$totalReceive+$jan->tl_amount; ?>

                                    @endforeach
                                    <b>{{ $totalReceive }} </b>
                                    </td>
                                    <td>
                                        <p style="display: none"> {{$id = $item->id}}</p>

                                    <?php $totalReceive=0;
                                        $dbAllReceive=DB::table('cash_receives')->where('customer_id',$id)->get(); ?>
                                        @foreach ($dbAllReceive as $jan1)
                                            <?php $totalReceive=$totalReceive+($jan1->pay_amount); ?>

                                        @endforeach
                                        <?php $totalResales=0;
                                        $dbAllReceive=DB::table('sales')->where('customer_id',$id )->where('giveback','true')->where('sales_type',5)->get(); ?>
                                        @foreach ($dbAllReceive as $jan2)
                                            <?php $totalResales=$totalResales+($jan2->quantity * $jan2->sales_price); ?>

                                        @endforeach
                                        <b>{{ $totalResales-$totalReceive }} </b>
                                    </td>

                                    <?php $user=DB::table('users')->where('id',$_SESSION['access'])->first(); ?>
                                    @if($user->type==1)
                                    <td style="white-space: nowrap !important;">
                                        <button class="edit-modalcustomer btn btn-info" data-id="{{$item->id}}"
                                                data-name="{{$item->name}}" data-name1="{{$item->address}}"
                                                data-name2="{{ $item->phone }}" data-name3="{{ $item->p_contact }}"
                                                data-name4="{{ $item->tin }}" data-name5="{{ $item->lic }}"
                                                data-name6="{{ $item->reg }}"
                                        >
                                            <span class="glyphicon glyphicon-edit"></span> Edit
                                        </button>
                                        <button class="delete-modals1 btn btn-danger"
                                                data-id="{{$item->id}}" data-name="{{$item->name}}">
                                            <span class="glyphicon glyphicon-trash"></span> Delete
                                        </button>
                                        <a href="{{ url('/seeCustomerRecord/'.$item->id) }}"  class="btn btn-info">
                                        See Records</a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-10 col-sm-12">
                                <div class="dataTables_paginate paging_bootstrap_number" id="sample_1_paginate">
                                    <ul class="pagination" style="visibility: visible;">
                                        <li class="active">{{$CustShow->links()}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        </div
                        <!--Bellow Row For Showing Data -->
                                </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="myModaldcustomer" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal editcustomer" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fid" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Customer Name:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="n"><br>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Customer Address:</label>
                            <div class="col-sm-10">
                                <input type="name1" class="form-control" id="n1"><br>

                            </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Customer Phone:</label>
                                <div class="col-sm-10">
                                    <input type="name2" class="form-control" id="n2"><br>
    
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">Customer Point of contact:</label>
                                    <div class="col-sm-10">
                                        <input type="name3" class="form-control" id="n3"><br>
        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">TIN #:</label>
                                    <div class="col-sm-10">
                                        <input type="name4" class="form-control" id="n4"><br>
        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">LICENSE #:</label>
                                    <div class="col-sm-10">
                                        <input type="name5" class="form-control" id="n5"><br>
        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">Registration #:</label>
                                    <div class="col-sm-10">
                                        <input type="name6" class="form-control" id="n6"><br>
        
                                    </div>
                                </div>
                    </form>
                    <div class="deleteContent">
                        Do you want to delete product <span class="dname"></span> ? <span
                                class="hidden did"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn actionBtn" data-dismiss="modal">
                            <span id="footer_action_button" class='glyphicon'> </span>
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
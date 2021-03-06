@extends('layouts.main')
@section('javascrip')
    <script>
        $(document).ready(function () {
            $("#product").addClass("active")
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
                <li><a href="#">Product </a></li>
                <li><a href="{{url('/add_product')}}">Add Product</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-content">
                        <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i
                                        class="sidenav-icon icon icon-plus"></i> Add Product
                            </button>
                            <button id="excel" class="btn btn-success" type="button"><i
                                        class="sidenav-icon icon icon-file-excel-o" style="font-size:larger;"></i>
                            </button>

                            <form class="pull-right" method="post" action="{{route('/searchProduct')}}">
                                <div class="col-sm-3 pull-right input-group" style="margin-top: -35px">
                                    {!! csrf_field() !!}
                                    <input type="text" name="term" placeholder="Search for Product Name or Form"
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
                                        <form id="example-form-product" novalidate="novalidate" method="post"
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
                                                        <p>
                                                            <label for="product_name">Enter Product Name</label>
                                                            <input class="form-control" id="product_name" name="product_name" type="text">
                                                            <br>
                                                            <span class="error1 text-center alert alert-danger hidden"></span>
                                                        </p>
                                                       
                                                        <p>
                                                            <label for="product_form">Enter Part Number</label>
                                                            <input class="form-control" name="product_serial" id="product_s" type="text">
                                                            <br>
                                                            <span class="error2 text-center alert alert-danger hidden"></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div style="padding-top: 0px;">
                                                    <button type="submit" name="addmaininfo" class="btn btn-primary">
                                                        <i class="glyphicon glyphicon-check"></i> Add
                                                    </button>
                                                    <a href="{{url('/add_product')}}"  class="btn btn-default">

                                                        Close
                                                    </a>
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
                        <table class="table table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-size: 14px; border: 1px solid black; width: 40%; margin-left: 20%">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 141px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Product Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                    style="width: 229px;" aria-label="Position: activate to sort column ascending">
                                    Part Number
                                </th>
                                <?php $user=DB::table('users')->where('id',$_SESSION['access'])->first(); ?>
                                @if($user->type==1)
                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="2"
                                    style="width: 103px;" aria-label="Office: activate to sort column ascending">Action
                                </th>
                                @endif
                            </tr>
                            </thead>
                            <tbody id="showRowproduct">
                            @foreach($ProductShow as $item)
                            <tr role="row" class="odd item{{$item->id}}" >
                                <td tabindex="0" class="sorting_1">{{$item->product_name}}</td>
                                
                                
                                <td>{{$item->product_s}}</td>
                                <?php $user=DB::table('users')->where('id',$_SESSION['access'])->first(); ?>
                                @if($user->type==1)
                                <td style="white-space: nowrap !important;">
                                    <button class="edit-modal btn btn-info" data-id="{{$item->id}}"
                                            data-name="{{$item->product_name}}"
                                            data-name3="{{$item->product_s}}">
                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                    </button>
                                    <!--
                                    <button class="delete-modals btn btn-danger"
                                            data-id="{{$item->id}}" data-name="{{$item->product_name}}">
                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                    </button>
                                    -->
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
                                        <li class="active">{{$ProductShow->links()}}</li>
                                    </ul>
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
    </div>
    <div id="myModald" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal editProducts" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fid" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Product Name:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="n"><br>

                            </div>
                        </div>
                       
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name1">Part Number:</label>
                            <div class="col-sm-10">
                                <input type="product_serial" class="form-control" id="ps">
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
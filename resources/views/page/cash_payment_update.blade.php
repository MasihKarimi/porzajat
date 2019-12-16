<style>
    #fexpenses {
        color: white;
    }

    #headeradd {
        border-radius: 5px;
        padding: 10px !important;
        background: #e67e22;
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

@extends('layouts.main');

@section('javascrip')
    <script>
        $(document).ready(function () {
            $("#rdm").addClass("active")
        });
    </script>
@stop
@section('content')
    <div style="margin-top: -25px;">
        <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
            <li><a href="#">Finance </a></li>
            <li><a href="#">Cash Payment</a></li>
            <li><a href="#">Edit</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">

                @foreach($row as $rows)
                    <form id="demo-form-wizard-1" novalidate method="post"
                          data-toggle="validator"
                          enctype="multipart/form-data"
                          action="{{url('/cash_payment_updatesd')}}">
                        <div class="box-content">
                            <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                                <a href="javascript:;" onclick="history.go(-1)">
                                    <button type="button" class="btn btn-info">
                                <span style="font-size: larger"><i
                                            class="sidenav-icon icon icon-chevron-left"></i></span> Back
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-success pull-right"
                                        style="box-shadow: 0px 0px 5px 0px white"><i
                                            class="icon icon-edit"></i> Update
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="table-responsive">


                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{$rows ->id}}">
                                                <input type="hidden" name="tl_amount" value="{{ $rows->tl_amount }}">
                                                <div class="col-lg-8 col-lg-offset-2">
                                                    <div class="demo-form-wrapper">

                                                        <div class="modal-body"
                                                             style="overflow-y: hidden!important;overflow-x: hidden;">
                                                            <div class="form-group">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label">Date </label>
                                                                </div>
                                                                <div class="col-sm-6 input-group">
                                                                    <input type="date" value="{{$rows->date}}"
                                                                           name="date" id="date"
                                                                           class="form-control">

                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label">Amount</label>
                                                                </div>
                                                                <div class="col-sm-6 input-group">
                                                                    <input type="amount" name="amount"
                                                                           value="{{$rows->pay_amount}}" id="amount"
                                                                           class="form-control"><span
                                                                            class="input-group-addon"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label">Serial Number</label>
                                                                </div>
                                                                <div class="col-sm-6 input-group">
                                                                    <input readonly type="serial" name="serial"
                                                                           value="{{$rows->id}}" id="amount"
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>

            @endforeach
        </div>
    </div>

@stop

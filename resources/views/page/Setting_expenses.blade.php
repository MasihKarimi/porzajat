@extends('layouts.main');
@section('javascrip')
    <script>
        $(document).ready(function(){
            $("#settings").addClass("active")
        });
    </script>
@stop<style>
    #expenses {
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
            <li><a href="#">Setting </a></li>
            <li><a href="#">Expenses</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    @include('page.setting_add_expenses')
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="demo-dynamic-tables-2" class="table table-middle">
                                            <thead>
                                            <tr>
                                                <th id="hid" )></th>
                                                <th>ID</th>
                                                <th style="width: 100%">Expenses Type</th>
                                                <th style="white-space: nowrap">Action</th>
                                                <th id="hid"></th>
                                            </tr>
                                            </thead>
                                            <?php  $id = 0;$idR = 0;?>
                                            <tbody style="">
                                            @foreach($row as $rows)

                                                <tr>
                                                    <td id="hid"></td>
                                                    <td style="width: 25%"><?php $id++;echo $id; ?></td>
                                                    <td style="width: 75%">{{$rows ->expensesna}} </td>
                                                    <?php $idR = '' . $rows->id . '';?>
                                                    <td style="white-space: nowrap !important;">
                                                        <a href="{{url('expensesselectupdates',$idR)}}" title="Update this Record ">
                                                            <button class="btn btn-outline-success btn-icon sq-32"
                                                                    type="button">
                                                                <i class="icon icon-edit"></i>
                                                            </button>
                                                        </a>
                                                        <button class="btn btn-outline-danger btn-icon sq-32" title="Delete this Record "
                                                                href="#delete" data-toggle="modal"
                                                                data-target="#delete<?php echo $idR?>"><i class=" icon icon-remove"></i>
                                                        </button>
                                                    </td>
                                                    <td id="hid"></td>
                                                </tr>

                                            @include('page.setting_expenses_delete')
                                            @endforeach
                                            {{--@include('page.tax_update')--}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
@stop

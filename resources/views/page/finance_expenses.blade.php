@extends('layouts.main');
@section('javascrip')
    <script>
        $(document).ready(function () {
            $("#finance").addClass("active")
        });
    </script>
@stop
<style>
    #fexpenses {
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
            <li><a href="#">Finance </a></li>
            <li><a href="#">Expenses</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    @include('page.finance_expenses_add')
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        @if($check>0)
                                            <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 14px; border: 1px solid black; width: 100%;">
                                                <thead>
                                                <tr role="row">
                                                    <th id="hid"></th>
                                                    <th>No</th>
                                                    <th style="width: 20%">Expenses Type</th>
                                                    <th style="width: 5%">Amount</th>
                                                    <th style="width: 8%">Date</th>
                                                    <th style="width: 25%">Res Person Name</th>
                                                    <th style="width: 25%">Remark</th>
                                                    <th style="white-space: nowrap">Action</th>
                                                </tr>
                                                </thead>
                                                <?php  $id = 0;$idR = 0;?>
                                                <tbody style="">
                                                @foreach($row as $rows)
                                                    <tr>
                                                        <td id="hid1"
                                                            style="border:0px solid black!important;border-bottom-color: white!important;border-right-color: white">
                                                            <?php
                                                            if($rows->giveback == "false") {?>
                                                            <i class="sidenav-icon icon icon-times"
                                                               style="background-color: #e74c3c;color: white;border-radius: 5px;"></i>
                                                            <?php }else { ?>
                                                            <i class="sidenav-icon icon icon-check"
                                                               style="background-color: #35cf76;color: white;border-radius: 5px;"></i>
                                                            <?php }?>
                                                        </td>
                                                        <td style=""><?php $id++;echo $id; ?></td>
                                                        <td style="width: 20%">

                                                        <span style=""><?php
                                                            $ros = DB::table("setting_expenses")->where('id', $rows->expenses_type)->get();
                                                            ?>
                                                            @foreach($ros as $ro)
                                                                {{$ro->expensesna}}
                                                            @endforeach</span>

                                                        </td>
                                                        <td style="width: 15%">{{number_format($rows ->amount)}}  </td>
                                                       
                                                        <td style="width: 15%">


                                                            <span class="label label-success">{{$rows ->date}} </span>
                                                        </td>
                                                        <td>{{ $rows->r_name }}</td>
                                                        <td style="width: 30%"><?php echo substr($rows->remark, 0, 30) . "..."; ?></td>

                                                        <?php $idR = $rows->id;?>
                                                        <td style="white-space: nowrap !important;">
                                                            <button class="btn btn-outline-danger btn-icon sq-32"  title="Give back This Record"
                                                                    href="#giveback" data-toggle="modal"
                                                                    data-target="#giveback<?php echo $idR?>">
                                                                <i class="icon icon-signing"></i>
                                                            </button>

                                                            <a href="{{url('finance_expensesdetail',$idR)}}"  title="Details of the Record Shows">
                                                                <button class="btn btn-outline-default btn-icon sq-32"
                                                                        type="button">
                                                                    <i class="icon icon-info-circle"></i>
                                                                </button>
                                                            </a>
                                                            <?php $user=DB::table('users')->where('id',$_SESSION['access'])->first(); ?>
                                                            @if($user->type==1)
                                                            <a href="{{url('finance_expensesselectupdates',$idR)}}" title="Update this Record ">
                                                                <button class="btn btn-outline-success btn-icon sq-32"
                                                                        type="button">
                                                                    <i class="icon icon-edit"></i>
                                                                </button>
                                                            </a>
                                                            <button class="btn btn-outline-danger btn-icon sq-32" title="Delete this Record "
                                                                    href="#delete" data-toggle="modal"
                                                                    data-target="#delete<?php echo $idR?>"><i
                                                                        class=" icon icon-remove"></i>
                                                            </button>
                                                            @endif
                                                        </td>
                                                        @include('page.finance_expenses_delete')
                                                        @include('page.finance_expenses_giveback')
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else<span class="text-red padding-20">{{ '*No Record Added Yet' }}</span>@endif<div class="shows"> <ul id="paginator-example-1" class="pagination-purple hidden-print">{{ $row->links() }}</ul> </div>
                                            <br>
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

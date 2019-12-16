@extends('layouts.main');
@section('javascrip')
    <script>
        $(document).ready(function () {
            $("#rdm").addClass("active")
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
            <li><a href="#">Finance</a></li>
            <li><a href="#">Cash Payment</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    @include('page.cash_payment_add')
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        @if($check>0)
                                            <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 14px; border: 1px solid black; width: 100%;">
                                                <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th style="width: 15%">Cash Depositor</th>
                                                    <th style="width: 10%">Serial NO</th>
                                                    
                                                    <th style="width: 19%">Total Loan Amount</th>
                                                    <th style="width: 15%">Paid Amount</th>
                                                    <th style="width: 20%">T New Loan Amount</th>
                                                    <th style="width: 15%">Cash Receiver</th>
                                                    <th style="width: 15%">Date</th>
                                                    <th style="white-space: nowrap">Action</th>
                                                </tr>
                                                </thead>
                                                <?php  $id = 0;$idR = 0; $total=0;?>
                                                <tbody style="">
                                                @foreach($row as $rows)
                                                    <tr>
                                                        <td style=""><?php $id++;echo $id; ?></td>
                                                        <td style="width: 15%">

                                                        <span style="">
                                                                <?php
                                                                $rose = DB::table("users")->where('id', $rows->user_id)->get();
                                                                ?>
                                                                    @foreach($rose as $ros)
                                                                        {{ $ros->f_name." ".$ros->l_name }}
                                                                    @endforeach
                                                            </span>

                                                        </td>
                                                        <td>{{ "HLLTD-/".$rows->id}}</td>
                                                       
                                                        <td style="width: 15%">
                                                               <label class="label label-info"> {{ number_format($rows->tl_amount) }}</label>     
                                                             </td>
                                                             <td style="width: 15%">

                                                                <span class="label label-success">{{ number_format($rows ->pay_amount)}} </span>
        
                                                                </td>
                                                        <td>
                                                                <label class="label label-danger"> {{ number_format($rows->tl_amount-$rows->pay_amount) }}</label>
                                                        </td>
                                                        
                                                        <td style="width: 15%">

                                                                <?php
                                                                $rose = DB::table("customers")->where('id', $rows->customer_id)->get();
                                                                ?>
                                                                    @foreach($rose as $ros)
                                                                        {{ $ros->name }}
                                                                    @endforeach

                                                        </td>

                                                        <td style="width: 30%">
                                                            {{$rows->date}}
                                                        </td>
                                                        <?php $idR = $rows->id;?>
                                                        <td style="white-space: nowrap !important;">

                                                            <a href="{{url('cash_payment_detail',$idR)}}"  title="Details of the Record Shows">
                                                                <button class="btn btn-outline-default btn-icon sq-32"
                                                                        type="button">
                                                                    <i class="icon icon-info-circle"></i>
                                                                </button>
                                                            </a>
                                                            <?php $user=DB::table('users')->where('id',$_SESSION['access'])->first(); ?>
                                                            @if($user->type==1)
                                                            <a href="{{url('cash_payment_updates',$idR)}}" title="Update this Record ">
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
                                                        @include('page.cash_payment_delete')
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

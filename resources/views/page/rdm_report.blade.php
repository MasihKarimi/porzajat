@extends('layouts.main');
@section('javascrip')
    <script>
        $(document).ready(function () {
            $("#bb").addClass("active")
        });
    </script>
@stop
<style>
    #freport {
        color: white;
    }

    #headers {
        margin-right: 10px;
        font-weight: bold;

    }

    #detailtable th {
        background-color: rgba(148, 143, 160, 0.35) !important;
        color: #1a252f;

    }

    #demo-dynamic-tables-2 td {
        border: 1px solid black !important;
    }

    #detailtable td {
        border-color: white !important;
    }

    #printreception_report td {
        border: 0px solid black !important;
    }

    #headeradd {
        border-radius: 5px;
        padding: 10px !important;
        background: #0090ff;
    }

    tr #datahead {
        border: 1px solid silver !important;
    }

    tr #databody {
        border: 1px solid silver !important;
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
            <li><a reception_reportef="#">Finance </a></li>
            <li><a reception_reportef="#">Report</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    {{--@include('page.adds.reception_add_management')--}}
                    <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                        <button class="btn btn-info" style="box-shadow: 0px 0px 5px 0px white"
                                reception_reportef="#report" data-toggle="modal"
                                data-target="#report">Create Report
                        </button>

                        <button id="excel" class="btn btn-success"
                                type="button"><i class="sidenav-icon icon icon-file-excel-o"
                                                 style="font-size:larger;"></i>
                        </button>

                        <a reception_reportef="javascript:void(0);" id="print_button">
                            <button type="button" class="btn btn-success pull-right"
                                    style="box-shadow: 0px 0px 5px 0px white"><i
                                        class="icon icon-print"></i> Print
                            </button>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="dibs">
                                        <style>
                                            @media print {
                                                #detailtable td {
                                                    border-color: white !important;
                                                }

                                                #detailtable th {
                                                    background-color: rgba(148, 143, 160, 0.35) !important;
                                                    color: #1a252f;

                                                }

                                                #headers {
                                                    margin-right: 10px;
                                                    font-weight: bold;

                                                }

                                                td #detailtable {
                                                    font-weight: bold !important;
                                                    text-decoration: underline !important;
                                                    color: #0e84b5 !important;
                                                }

                                                tr #datahead {

                                                    border: 1px solid silver !important;
                                                }

                                                tr #databody {
                                                    border: 1px solid silver !important;
                                                }
                                            }
                                        </style>

                                        @if(!empty($section) and !empty($start) and !empty($end) and empty($year))
                                            <div class="table-responsive">
                                                @section('users')
                                                    <?php
                                                    $ros = DB::table("users")->where('id', $_SESSION['access'])->get();
                                                    ?>
                                                    @foreach($ros as $ro)

                                                            {{$ro->f_name}} {{$ro->l_name}}
                                                    @endforeach
                                                @stop
                                                @include('page.info')

                                                <table id="demo-dynamic-tables-2" class="table table-middle">
                                                    <?php if ($section == "all") {?>

                                                    <tr id="detailtable">
                                                        <th id="datahead">No</th>
                                                        <th id="datahead">Bill Number&nbsp;|Name&nbsp;|Address</th>
                                                        <th id="datahead">Date</th>
                                                        <th id="datahead" >Amount</th>
                                                        <?php $id = 1;?>
                                                    </tr>

                                                    <?php
                                                    $ros = DB::table("debts")->whereBetween('date', [$start, $end])->get();
                                                    $totalPa = 0;
                                                    ?>
                                                    @foreach($ros as $rows)

                                                        <tr id="detailtable">
                                                            <td id="databody">{{$id}}<?php
                                                                ;$id++;?></td>
                                                            <td id="databody"><?php
                                                                $ros = DB::table("sales")->where('id', $rows->sale_id)->get();
                                                                ?>
                                                                @foreach($ros as $ro)
                                                                    {{$ro->bene}}&nbsp;
                                                                    <?php
                                                                    $rosed = DB::table("customers")->where('id', $ro->customer_id)->get();
                                                                    ?>
                                                                @foreach($rosed as $rose)
                                                                    |&nbsp;{{$rose->name}}&nbsp;|&nbsp;{{$rose->address}}
                                                                    @endforeach
                                                                @endforeach</td>
                                                            <td id="databody">{{$rows->date}}</td>
                                                            <td id="databody">{{number_format($rows->debt_money)}}&nbsp;
                                                                <?php // $ros = DB::table("setting_exchange")->where('id', $rows->currencytype)->get();
                                                                $totalfromc=0;
                                                                ?>
                                                             {{--   @foreach($ros as $ro)
                                                                    {{number_format(ceil($rows->debt_money * $ro->cur_ma1 / $ro->cur_ma2))}}
                                                                    @if($ro->curna1=='1')
                                                                        AFN
                                                                    @elseif($ro->curna1=='3')
                                                                        PAK
                                                                        &nbsp;
                                                                    @elseif($ro->curna1=='2')
                                                                        $
                                                                    @endif


                                                                @endforeach--}}
                                                                <?php $totalPa = $totalPa + $rows->debt_money?>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                    <tr id="detailtable">
                                                        <th colspan="3" id="datahead"
                                                            style="">
                                                            Total Amount
                                                        </th>
                                                        <th colspan="1" id="datahead"
                                                            style="">
                                                            <?php echo $totalPa; ?>
                                                            &nbsp;

                                                        </th>
                                                        <th colspan="1" id="datahead"
                                                            style="">
                                                            From : <?php echo $start ?> , To : <?php echo $end ?></th>

                                                    </tr>
                                                    <?php }
                                                    else{
                                                    ?>
                                                    <tr id="detailtable">
                                                        <th id="datahead">No</th>
                                                        <th id="datahead">Bill Number&nbsp;|Name&nbsp;|Address</th>
                                                        <th id="datahead">Date</th>
                                                        <th id="datahead" >Amount</th>
                                                        <th id="datahead" >Selected Company</th>
                                                        <?php $id = 1;?>
                                                    </tr>

                                                    <?php
                                                    $ros = DB::table("debts")->where('comp_id', '=', $section)->whereBetween('date', [$start, $end])->get();
                                                    $totalPa = 0;
                                                    ?>
                                                    @foreach($ros as $rows)

                                                        <tr id="detailtable">
                                                            <td id="databody">{{$id}}<?php
                                                                ;$id++;?></td>
                                                            <td id="databody"><?php
                                                                $ros = DB::table("sales")->where('id', $rows->sale_id)->get();
                                                                ?>
                                                                @foreach($ros as $ro)
                                                                    {{$ro->bene}}&nbsp;
                                                                    <?php
                                                                    $rosed = DB::table("customers")->where('id', $ro->customer_id)->get();
                                                                    ?>
                                                                    @foreach($rosed as $rose)
                                                                        |&nbsp;{{$rose->name}}&nbsp;|&nbsp;{{$rose->address}}
                                                                    @endforeach
                                                                @endforeach</td>
                                                            <td id="databody">{{$rows->date}}</td>
                                                            <td id="databody">{{number_format($rows->debt_money)}}  <?php //$ros = DB::table("setting_exchange")->orderBy('date','desc')->where('id', $rows->currencytype)->get();
                                                                ?>
                                                              {{--  @foreach($ros as $ro)
                                                                    {{number_format(ceil($rows->debt_money * $ro->cur_ma1 / $ro->cur_ma2))}}
                                                                    @if($ro->curna1=='1')
                                                                        AFN
                                                                    @elseif($ro->curna1=='3')
                                                                        PAK
                                                                    @elseif($ro->curna1=='2')
                                                                        $
                                                                    @endif
                                                                @endforeach --}}
                                                                <?php $totalPa = $totalPa + $rows->debt_money?>
                                                            </td>
                                                            <?php $tot=0; ?>
                                                            <?php
                                                            $rosale = DB::table("sales")->where('currency', '=', $rows->currencytype)->where('giveback', '=', 'true')->where('id',$rows->sale_id)->get();
                                                            $tot = 0;
                                                            ?>
                                                            @foreach($rosale as $ro)
                                                                <?php  $tot = $tot + $ro->paybill;?>
                                                            @endforeach
                                                            <?php
                                                            $comps = DB::table("comps")->where('id', '=', $section)->get();
                                                            ?>
                                                            @foreach($comps as $cop)
                                                            <td>{{$cop->comp_name}}</td>
                                                            @endforeach

                                                        </tr>
                                                    @endforeach
                                                    <tr id="detailtable">
                                                        <th colspan="3" id="datahead"
                                                            style="">
                                                            Total Amount
                                                        </th>
                                                        <th colspan="1" id="datahead"
                                                            style=""><?php echo number_format($totalPa); ?>
                                                        </th>


                                                        <th colspan="1" id="datahead"
                                                            style=""> From : <?php echo $start ?> , To : <?php echo $end ?></th>

                                                    </tr>
                                                    <?php
                                                    }?>
                                                </table>

                                            </div>

                                        @endif

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
<div class="modal fade lg modal1" tabindex="-1" id="report" role="dialog" style=" color: black;">
    <style>
        .form-group div {
            margin: 2px !important;
        }
    </style>
    <div class="modal-dialog" role="document"
         style=" margin-left: 30vw !important; height: 150px !important;width: 450px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> Companies Based DRM Report</h4>
            </div>
            <form method="post" action="{{url('/create_report_rdm')}}">
                <input type="hidden" name="_token"
                       value="{{ csrf_token() }}">

                <div class="modal-body" style="overflow: hidden !important;border: 0px solid black;">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">Chose Sections</label>
                        </div>
                        <div class="col-sm-7 input-group">
                            <select class="form-control" name="section" required>
                                <option></option>
                                <?php
                                $compName = DB::table("comps")->get();
                                ?>
                                @foreach($compName as $name)
                                    <option value="{{$name->id}}">{{$name->comp_name}}</option>
                                @endforeach
                                <option value="all">All</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">From</label>
                        </div>
                        <div class="col-sm-7 input-group">
                            <input type="date" class="form-control" name="from" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">To</label>
                        </div>
                        <div class="col-sm-7 input-group">
                            <input type="date" class="form-control" name="to" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="">
                        <button type="submit" class="btn btn-info">
                            Create
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            No
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{--</div>--}}

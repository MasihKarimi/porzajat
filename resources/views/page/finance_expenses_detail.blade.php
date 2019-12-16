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

    #headers {
        margin-right: 10px;
        font-weight: bold;

    }

    #printhr td {
        border: 0px solid black !important;
    }

    #detailtable td {
        /*border-color: white !important;*/
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

@section('content')
    <div style="margin-top: -25px;">
        <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
            <li><a href="#">Reception </a></li>
            <li><a href="#">Expenses</a></li>
            <li><a href="#">Detail</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    {{--@include('page.adds.hr_patient_add_management')--}}
                    <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                        <a href="{{url('finance_expenses')}}">
                            <button type="button" class="btn btn-info">
                                <span style="font-size: larger"><i
                                            class="sidenav-icon icon icon-chevron-left"></i></span> Back
                            </button>
                        </a>
                        <a href="javascript:void(0);" id="print_button">
                            <button type="button" class="btn btn-success pull-right"
                                    style="box-shadow: 0px 0px 5px 0px white"><i
                                        class="icon icon-print"></i> Print
                            </button>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <div class="panel-body" style="padding-left: 20%;padding-right:30%">
                                    <div class="dibs">
                                        <style>
                                            @media print {
                                                #detailtable td {
                                                    /*border-color: white !important;*/
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

                                            }
                                        </style>
                                        <div class="table-responsive">
                                            @section('users')
                                                @foreach($row as $rows)
                                                    <?php
                                                    $ros = DB::table("users")->where('id', $_SESSION['access'])->get();
                                                    ?>
                                                    @foreach($ros as $ro)
                                                        {{$ro->f_name}} {{$ro->l_name}}
                                                    @endforeach
                                                @endforeach
                                            @stop
                                            @include('page.info')
                                            Expenses Information
                                            <table id="demo-dynamic-tables-2" class="table table-middle">

                                                @foreach($row as $rows)

                                                    <tr id="detailtable">
                                                        <td id="headers">Expenses Type</td>
                                                        <td> <?php
                                                        $ros = DB::table("setting_expenses")->where('id', $rows->expenses_type)->get();
                                                        ?>
                                                        @foreach($ros as $ro)
                                                            {{$ro->expensesna}}
                                                        @endforeach
                                                        </td>
                                                    </tr>

                                                    <tr id="detailtable">
                                                        <td id="headers">Date</td>
                                                        <td>{{$rows->date}}</td>


                                                    </tr>
                                                    <tr id="detailtable">
                                                        <td id="headers">Res Person Name</td>
                                                        <td>{{$rows->r_name}}</td>


                                                    </tr>
                                                    <tr id="detailtable">
                                                        <td id="headers">Amount</td>
                                                        <td>{{number_format($rows->amount)}} <?php //$ros = DB::table("setting_exchange")->orderBy('date','desc')->where('id', $rows->currencytype)->get();
                                                            ?>
                                                           {{-- @foreach($ros as $ro)
                                                                {{number_format(ceil($rows->amount * $ro->cur_ma1 / $ro->cur_ma2))}}
                                                                @if($ro->curna1=='1')
                                                                    AFN
                                                                @elseif($ro->curna1=='3')
                                                                    PAK
                                                                @elseif($ro->curna1=='2')
                                                                    $
                                                                @endif

                                                            @endforeach --}}</td>
                                                    </tr>
                                                    <tr id="detailtable">
                                                        <td id="headers" colspan="5">Detail:</td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" width=""><textarea rows="10" readonly
                                                                                           style="background-color: rgba(240, 240, 240, 0)!important; width: 100%;font-weight: bold; color: #0e84b5"
                                                                                           class=" form-control"> {{$rows->remark}} </textarea>
                                                        </td>
                                                    </tr>
                                                    @endforeach
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
    </div>
@stop

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
            <li><a href="#">Finance </a></li>
            <li><a href="#">Cash Payment</a></li>
            <li><a href="#">Detail</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    {{--@include('page.adds.hr_patient_add_management')--}}
                    <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                        <a href="javascript:" onclick="history.go(-1)">
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
                                            Cash Payment Invoice
                                            <table id="demo-dynamic-tables-2" class="table table-middle">

                                                @foreach($row as $rows)

                                                    <tr id="detailtable">
                                                        <td id="headers">Serial Number&nbsp;| Customer Name&nbsp;|Address  </td>
                                                        <td>
                                                            {{ "HLLTD-/".$rows->id}} |
                                                                <?php
                                                                $rose = DB::table("customers")->where('id', $rows->customer_id)->get();
                                                                ?>
                                                                @foreach($rose as $ros)
                                                                    {{$ros->name}}&nbsp;|{{$ros->address}}
                                                                @endforeach
                                                        
                                                        </td>
                                                    </tr>
                                                    <tr id="detailtable">
                                                        <td id="headers">Date</td>
                                                        <td>{{$rows->date}}</td>


                                                    </tr>
                                                    <tr id="detailtable">
                                                            <td id="headers">Paid Amount</td>
                                                            <td>{{number_format($rows->pay_amount)}}</td>
                                                        </tr>
                                                    <tr id="detailtable">
                                                        <td id="headers">Total Loan Amount</td>
                                                        <td>{{number_format($rows->tl_amount)}}</td>
                                                    </tr>
                                                    <tr id="detailtable">
                                                        <td id="headers">Total New Loan Amount</td>
                                                        <td>{{number_format($rows->tl_amount-$rows->pay_amount)}}</td>

                                                    </tr>
                                                    <tr id="detailtable">
                                                            <td id="headers">Cash Deposit By</td>
                                                            <td><?php $users=DB::table('users')->where('id',$rows->user_id)->get();
                                                                 ?>
                                                                @foreach ($users as $user)
                                                                    {{ $user->f_name." ".$user->l_name }}
                                                                @endforeach
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

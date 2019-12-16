@extends('layouts.main');
@section('javascrip')
    <script>
        $(document).ready(function () {
            $("#bb").addClass("active")
        });
    </script>
@stop
<style>
    #pharmacyReport {
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
            <li><a reception_reportef="#">Customer </a></li>
            <li><a reception_reportef="#">Report</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
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

                                        @if(!empty($section) and !empty($start) and !empty($end) and !empty($type))
                                            <div class="table-responsive">
                                                @section('users')
                                                    <?php
                                                    $ros = DB::table("users")->where('id', $_SESSION['access'])->get();
                                                    ?>
                                                    @foreach($ros as $ro)

                                                            {{$ro->f_name}} {{ $ro->l_name}}

                                                    @endforeach
                                                @stop
                                                @include('page.info')

                                                <table id="demo-dynamic-tables-2" class="table table-middle">
                                                    <?php if($type=='payment'){echo "Total Cash Payment Report"; } ?>
                                                    <?php if ($type == "receive") { ?>
                                                       Total Cash Receive Report
                                                    <tr >
                                                        <th id="datahead">No</th>
                                                        <th id="datahead">Serial Number</th>
                                                        <th id="datahead">Customer Name</th>
                                                        
                                                        <th id="datahead">Total Loan Amount</th>
                                                        <th id="datahead">Paid Amount</th>
                                                        <th id="datahead">Total New Loan Amount</th>
                                                        <th id="datahead">Cash Reciver</th>
                                                        <th id="datahead">Date</th>                                                        
                                                        <th></th>
                                                        <?php $id = 1;?>
                                                    </tr>

                                                    <?php
                                                    $bene_id=null;
                                                    $ros = DB::table("cash_receives")->whereBetween('date', [$start, $end])->where('customer_id',$section)->get();
                                                    $totalIncomes = 0;
                                                    ?>
                                                    @foreach($ros as $rows)
                                                  
                                                        <tr id="detailtable">
                                                            <td id="databody">{{$id}}<?php
                                                                ;$id++;?></td>

                                                                <td id="databody">
                                                                    <?php
                                                                   
                                                                    
                                                                    
                                                                        $bene_id=$rows->id;
                                                                        echo "HLLTD-/".$bene_id;
                                                                    
                                                                    ?>
                                                                </td>
                                                                <td id="databody">
                                                                    <?php $cust=DB::table('customers')->where('id',$rows->customer_id)->get();?>
                                                                    @foreach ($cust as $c_name)
                                                                       <?php if($c_name->id==$rows->customer_id){
                                                                           echo $c_name->name;
                                                                       }
                                                                       else
                                                                       {
                                                                        echo "One time customer";
                                                                        }
                                                                        
                                                                        ?>
                                                                    @endforeach
                                                                    
                                                                </td>

                                                            <td id="databody">{{ $rows->tl_amount }}</td>
                                                            <td id="databody">
                                                               {{ $rows->pay_amount }}
                                                               <?php $totalIncomes=$totalIncomes+$rows->pay_amount; ?>
                                                            </td>
                                                            <td id="databody">{{number_format($rows->tl_amount-$rows->pay_amount)}}</td>
                                                            <td id="databody">
                                                                <?php
                                                                $ros = DB::table("users")->where('id', $rows->user_id)->get();
                                                                ?>
                                                                @foreach($ros as $ro)
                                                                    {{$ro->f_name}} {{$ro->l_name}}
                                                                @endforeach
                                                            </td>
                                                            <td id="databody">{{ date('d-m-Y',strtotime($rows->date))}}</td>
                                                           
                                                        </tr>
                                                    </tbody>
                                                    @endforeach
                                                    <tr id="detailtable">
                                                        <th colspan="2" id="datahead"
                                                            style="">
                                                            Total Receive Amount
                                                        </th>
                                                        
                                                        <th colspan="2" id="datahead"
                                                            style="">
                                                            From : <?php echo $start ?> , To : <?php echo $end ?></th>
                                                        <th colspan="1" id="datahead"
                                                            ><p style="float:right;"><?php echo number_format($totalIncomes); ?></p>
                                                        </th>
                                                        <th colspan="3" id="datahead"></th>
                                                    </tr>
                                                    <br>
                                                    <br>
                                                    <hr>
                                                    <table id="demo-dynamic-tables-2" class="table table-middle">
                                                       
                                                           Total Cash Payment Report
                                                    <tr >
                                                        <th id="datahead">No</th>
                                                        <th id="datahead">Serial Number</th>
                                                        <th id="datahead">Cash Depositor</th>
                                                        
                                                        <th id="datahead">Total Loan Amount</th>
                                                        <th id="datahead">Paid Amount</th>
                                                        <th id="datahead">Total New Loan Amount</th>
                                                        <th id="datahead">Cash Reciver</th>
                                                        <th id="datahead">Date</th>                                                        
                                                        <th></th>
                                                        <?php $id = 1;?>
                                                    </tr>

                                                    <?php
                                                    
                                                    $roso = DB::table("cash_payments")->whereBetween('date', [$start, $end])->where('customer_id',$section)->get();
                                                   
                                                  //  $ros = DB::table("sales")->whereBetween('date', [$start, $end])->where('giveback', '=', 'true')->get();
                                                    $totalIncomes = 0;
                                                    ?>
                                                    @foreach($roso as $rows)
                                                   
                                                        <tr id="detailtable">
                                                            <td id="databody">{{$id}}<?php
                                                                ;$id++;?></td>

                                                                <td id="databody">
                                                                    <?php
                                                                   
                                                                    
                                                                    
                                                                        $bene_id=$rows->id;
                                                                        echo "HLLTD-/".$id;
                                                                    
                                                                    ?>
                                                                </td>
                                                                <td id="databody">
                                                                        <?php
                                                                        $ros = DB::table("users")->where('id', $rows->user_id)->get();
                                                                        ?>
                                                                        @foreach($ros as $ro)
                                                                            {{  $ro->f_name}} {{$ro->l_name}}
                                                                        @endforeach
                                                                                                                                        
                                                                </td>

                                                            <td id="databody">{{ $rows->tl_amount }}</td>
                                                            <td id="databody">{{ $rows->pay_amount }}
                                                                    <?php $totalIncomes=$totalIncomes+$rows->pay_amount; ?>
                                                            </td>
                                                            <td id="databody">{{number_format($rows->tl_amount-$rows->pay_amount)}}</td>
                                                            <td id="databody">
                                                                    <?php $cust=DB::table('customers')->where('id',$rows->customer_id)->get();?>
                                                                    @foreach ($cust as $c_name)
                                                                       <?php if($c_name->id==$rows->customer_id){
                                                                           echo $c_name->name;
                                                                       }
                                                                       else
                                                                       {
                                                                        echo "One time customer";
                                                                        }
                                                                        
                                                                        ?>
                                                                    @endforeach
                                                            </td>
                                                            <td id="databody">{{ date('d-m-Y',strtotime($rows->date))}}</td>
                                                        
                                                           
                                                        </tr>
                                                    </tbody>
                                                    @endforeach
                                                    <tr id="detailtable">
                                                        <th colspan="2" id="datahead"
                                                            style="">
                                                            Total Amount
                                                        </th>

                                                        <th colspan="2" id="datahead"
                                                            style="">
                                                            From : <?php echo $start ?> , To : <?php echo $end ?></th>
                                                        <th colspan="1" id="datahead"
                                                            style=""><p style="float:right;"><?php echo number_format($totalIncomes); ?></p>
                                                        </th>
                                                        <th colspan="3" id="datahead"></th>
                                                    </tr>
                                                    </table>
                                                    <?php }
                                                    else{
                                                    ?>
                                                    <tr >
                                                        <th id="datahead">No</th>
                                                        <th id="datahead">Serial Number</th>
                                                        <th id="datahead">Cash Depositor</th>
                                                        
                                                        <th id="datahead">Total Loan Amount</th>
                                                        <th id="datahead">Paid Amount</th>
                                                        <th id="datahead">Total New Loan Amount</th>
                                                        <th id="datahead">Cash Reciver</th>
                                                        <th id="datahead">Date</th>                                                        
                                                        <th></th>
                                                        <?php $id = 1;?>
                                                    </tr>

                                                    <?php
                                                    
                                                    $roso = DB::table("cash_payments")->whereBetween('date', [$start, $end])->where('customer_id',$section)->get();
                                                   
                                                  //  $ros = DB::table("sales")->whereBetween('date', [$start, $end])->where('giveback', '=', 'true')->get();
                                                    $totalIncomes = 0;
                                                    ?>
                                                    @foreach($roso as $rows)
                                                   
                                                        <tr id="detailtable">
                                                            <td id="databody">{{$id}}<?php
                                                                ;$id++;?></td>

                                                                <td id="databody">
                                                                    <?php
                                                                   
                                                                    
                                                                    
                                                                        $bene_id=$rows->id;
                                                                        echo "HLLTD-/".$id;
                                                                    
                                                                    ?>
                                                                </td>
                                                                <td id="databody">
                                                                        <?php
                                                                        $ros = DB::table("users")->where('id', $rows->user_id)->get();
                                                                        ?>
                                                                        @foreach($ros as $ro)
                                                                            {{  $ro->f_name}} {{$ro->l_name}}
                                                                        @endforeach
                                                                                                                                        
                                                                </td>

                                                            <td id="databody">{{ $rows->tl_amount }}</td>
                                                            <td id="databody">{{ $rows->pay_amount }}
                                                                    <?php $totalIncomes=$totalIncomes+$rows->pay_amount; ?>
                                                            </td>
                                                            <td id="databody">{{number_format($rows->tl_amount-$rows->pay_amount)}}</td>
                                                            <td id="databody">
                                                                    <?php $cust=DB::table('customers')->where('id',$rows->customer_id)->get();?>
                                                                    @foreach ($cust as $c_name)
                                                                       <?php if($c_name->id==$rows->customer_id){
                                                                           echo $c_name->name;
                                                                       }
                                                                       else
                                                                       {
                                                                        echo "One time customer";
                                                                        }
                                                                        
                                                                        ?>
                                                                    @endforeach
                                                            </td>
                                                            <td id="databody">{{ date('d-m-Y',strtotime($rows->date))}}</td>
                                                        
                                                           
                                                        </tr>
                                                    </tbody>
                                                    @endforeach
                                                    <tr id="detailtable">
                                                        <th colspan="2" id="datahead"
                                                            style="">
                                                            Total Amount
                                                        </th>

                                                        <th colspan="2" id="datahead"
                                                            style="">
                                                            From : <?php echo $start ?> , To : <?php echo $end ?></th>
                                                        <th colspan="1" id="datahead"
                                                            style=""><p style="float:right;"><?php echo number_format($totalIncomes); ?></p>
                                                        </th>
                                                        <th colspan="3" id="datahead"></th>
                                                    </tr>
                                                    <br>
                                                    <br>
                                                    <hr>
                                                    <table id="demo-dynamic-tables-2" class="table table-middle">
                                                       
                                                           Total Cash Receive Report
                                                        <tr >
                                                            <th id="datahead">No</th>
                                                            <th id="datahead">Serial Number</th>
                                                            <th id="datahead">Customer Name</th>
                                                            
                                                            <th id="datahead">Total Loan Amount</th>
                                                            <th id="datahead">Paid Amount</th>
                                                            <th id="datahead">Total New Loan Amount</th>
                                                            <th id="datahead">Cash Reciver</th>
                                                            <th id="datahead">Date</th>                                                        
                                                            <th></th>
                                                            <?php $id = 1;?>
                                                        </tr>
    
                                                        <?php
                                                        $bene_id=null;
    
                                                        $ros = DB::table("cash_receives")->whereBetween('date', [$start, $end])->where('customer_id',$section)->get();
                                                        $totalIncomes = 0;
                                                        ?>
                                                        @foreach($ros as $rows)
                                                      
                                                            <tr id="detailtable">
                                                                <td id="databody">{{$id}}<?php
                                                                    ;$id++;?></td>
    
                                                                    <td id="databody">
                                                                        <?php
                                                                       
                                                                        
                                                                        
                                                                            $bene_id=$rows->id;
                                                                            echo "HLLTD-/".$bene_id;
                                                                        
                                                                        ?>
                                                                    </td>
                                                                    <td id="databody">
                                                                        <?php $cust=DB::table('customers')->where('id',$rows->customer_id)->get();?>
                                                                        @foreach ($cust as $c_name)
                                                                           <?php if($c_name->id==$rows->customer_id){
                                                                               echo $c_name->name;
                                                                           }
                                                                           else
                                                                           {
                                                                            echo "One time customer";
                                                                            }
                                                                            
                                                                            ?>
                                                                        @endforeach
                                                                        
                                                                    </td>
    
                                                                <td id="databody">{{ $rows->tl_amount }}</td>
                                                                <td id="databody">
                                                                   {{ $rows->pay_amount }}
                                                                   <?php $totalIncomes=$totalIncomes+$rows->pay_amount; ?>
                                                                </td>
                                                                <td id="databody">{{number_format($rows->tl_amount-$rows->pay_amount)}}</td>
                                                                <td id="databody">
                                                                    <?php
                                                                    $ros = DB::table("users")->where('id', $rows->user_id)->get();
                                                                    ?>
                                                                    @foreach($ros as $ro)
                                                                        {{$ro->f_name}} {{$ro->l_name}}
                                                                    @endforeach
                                                                </td>
                                                                <td id="databody">{{ date('d-m-Y',strtotime($rows->date))}}</td>
                                                               
                                                            </tr>
                                                        </tbody>
                                                        @endforeach
                                                        <tr id="detailtable">
                                                            <th colspan="2" id="datahead"
                                                                style="">
                                                                Total Receive Amount
                                                            </th>
                                                            
                                                            <th colspan="2" id="datahead"
                                                                style="">
                                                                From : <?php echo $start ?> , To : <?php echo $end ?></th>
                                                            <th colspan="1" id="datahead"
                                                                ><p style="float:right;"><?php echo number_format($totalIncomes); ?></p>
                                                            </th>
                                                            <th colspan="3" id="datahead"></th>
                                                        </tr>
                                                    
                                                    <?php } ?>
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
                <h4 class="modal-title" id="myModalLabel">Customer Report</h4>
            </div>
            <form method="post" action="{{url('/create_report_customer')}}">
                <input type="hidden" name="_token"
                       value="{{ csrf_token() }}">

                <div class="modal-body" style="overflow: hidden !important;border: 0px solid black;">
                    <div class="form-group">
                        <div class="col-sm-2">
                            
                        </div>
                        <div class="col-sm-4 input-group">
                                <label class="control-label">Choose Customer</label>
                            <select class="chzn-select form-control selects"  name="section" required>
                                <?php $custom=DB::table('customers')->get(); ?>
                                @foreach ($custom as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="col-sm-2">
                                
                            </div>
                            <div class="col-sm-4 input-group">
                                    <label class="control-label">Choose Type</label>
                                <select class="chzn-select form-control selects"  name="type" required>
                                        <option value="receive">Cash Receive</option>
                                        <option value="payment">Cash Payment </option>
                                </select>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                           
                        </div>
                        <div class="col-sm-7 input-group">
                                <label class="control-label">From</label>
                            <input type="date" class="form-control" name="from" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                           
                        </div>
                        <div class="col-sm-7 input-group">
                                <label class="control-label">To</label>
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
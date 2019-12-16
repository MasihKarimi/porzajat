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
            <li><a reception_reportef="#">Sales </a></li>
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

                                        @if(!empty($section) and !empty($start) and !empty($end))
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
                                                    <?php if($section=='5'){echo "Total Loan Report"; } if($section=='1'){ echo "Total Cash Report";} ?>
                                                    <?php if ($section == "all") {?>
                                                        Sales Report
                                                    <tr >
                                                        <th id="datahead">No</th>
                                                        <th id="datahead">Bill Number</th>
                                                        <th id="datahead">Customer Name</th>
                                                        
                                                        <th id="datahead">Date</th>
                                                        <th id="datahead">Sales Details</th>
                                                        <th></th>
                                                        <?php $id = 1;?>
                                                    </tr>

                                                    <?php
                                                    $bene_id=null;

                                                    $ros = DB::table("sales")->whereBetween('date', [$start, $end])->where('giveback', '=', 'true')->get();
                                                    $totalIncomes = 0;
                                                    ?>
                                                    @foreach($ros as $rows)
                                                    @if($rows->bene!=$bene_id)
                                                        <tr id="detailtable">
                                                            <td id="databody">{{$id}}<?php
                                                                ;$id++;?></td>

                                                                <td id="databody">
                                                                    <?php
                                                                   
                                                                    
                                                                    
                                                                        $bene_id=$rows->bene;
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

                                                            <td id="databody">{{ date('d-m-Y',strtotime($rows->date))}}</td>
                                                            <td id="databody">
                                                                <table id="demo-dynamic-tables-2" class="table table-middle">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Product List</th>
                                                                        <th>Quantity</th>
                                                                        <th>Sales Price</th>
                                                                       <th>Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                        
                                                                            <?php $product_name=DB::table('sales')->where('bene',$bene_id)->get(); ?>
                                                                            @foreach ($product_name as $item)
                                                                                <?php $prod=DB::table('products')->where('id',$item->product_id)->get(); ?>
                                                                                @foreach ($prod as $it)
                                                                                <tr>
                                                                                <td>
                                                                                        {{ $it->product_s."-".$it->product_name }}
                                                                                </td>
                                                                                <td> <?php $mids = DB::table("sales")->where('id', $rows->id)->get();
                                                                                    $totalPa = 0;
                                                                                    ?>
                                                                                    @foreach($mids as $itemsName)
                                                                                        <?php if ($mids = DB::table("stocks")->where('product_id', $item->product_id)->first()) {
                                                                                            echo $item->quantity. "<br>";
                                                                                        }
                                                                                            $totalPa = $item->total_price + $totalPa;
                                                                                        ?>
                                                                                    @endforeach</td>
                                                                                <td> <?php
                                                                                    $ros = DB::table("stocks")->take(1)->where('product_id', $it->id)->get();
                                                                                    $total = 0;
                    
                                                                                    ?>
                                                                                    @foreach($ros as $ro)
                                                                                        <?php echo $sales_price = $item->sales_price ?>
                                                                                    @endforeach
                    
                    
                                                                                    <?php $total=$total+($item->quantity * $item->sales_price);
                                                                                    
                                                                                    ?>&nbsp;
                                                                                    <?php $totalIncomes=$totalIncomes+$total;?>
                    
                    
                                                                                    <?php //$totalIncomes=$totalIncomes+$totalPa;?>
                                                                                    </td>
                                                                                    <td>{{ $total }}</td>
                                                                                <tr>
                                                                                @endforeach
                                                                            @endforeach
                                                            
                                                                </table>
                                                            </td>
                                                            

                                                        
                                                           
                                                        </tr>
                                                    </tbody>
                                                        @endif
                                                    @endforeach
                                                    <tr id="detailtable">
                                                        <th colspan="1" id="datahead"
                                                            style="">
                                                            Total Amount
                                                        </th>

                                                        <th colspan="3" id="datahead"
                                                            style="">
                                                            From : <?php echo $start ?> , To : <?php echo $end ?></th>
                                                        <th colspan="1" id="datahead"
                                                            ><p style="float:right;"><?php echo number_format($totalIncomes); ?></p>
                                                        </th>
                                                    </tr>
                                                    <?php }
                                                    else{
                                                    ?>
                                                    <tr >
                                                        <th id="datahead">No</th>
                                                        <th id="datahead">Bill Number</th>
                                                        <th id="datahead">Customer Name</th>
                                                        <th id="datahead">Date</th>
                                                        <th id="datahead">Sales Detail </th>
                                                        <th></th>
                                                        <?php $id = 1;?>
                                                    </tr>

                                                    <?php
                                                    $bene_id=null;
                                                    $comp_sales=\App\Sale::whereHas('product',function ($query) use ($section){
                                                        $query->where('sales_type',$section);
                                                    })->whereBetween('date', [$start, $end])->where('giveback', '=', 'true')->get();
                                                  //  $ros = DB::table("sales")->whereBetween('date', [$start, $end])->where('giveback', '=', 'true')->get();
                                                    $totalIncomes = 0;
                                                    ?>
                                                    @foreach($comp_sales as $rows)
                                                    @if($rows->bene!=$bene_id)
                                                        <tr id="detailtable">
                                                            <td id="databody">{{$id}}<?php
                                                                ;$id++;?></td>

                                                                <td id="databody">
                                                                    <?php
                                                                   
                                                                    
                                                                    
                                                                        $bene_id=$rows->bene;
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

                                                            <td id="databody">{{ date('d-m-Y',strtotime($rows->date))}}</td>
                                                            <td id="databody">
                                                                <table id="demo-dynamic-tables-2" class="table table-middle">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Product List</th>
                                                                        <th>Quantity</th>
                                                                        <th>Sales Price</th>
                                                                       <th>Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                        
                                                                            <?php $product_name=DB::table('sales')->where('bene',$bene_id)->get(); ?>
                                                                            @foreach ($product_name as $item)
                                                                                <?php $prod=DB::table('products')->where('id',$item->product_id)->get(); ?>
                                                                                @foreach ($prod as $it)
                                                                                <tr>
                                                                                <td>
                                                                                    {{ $it->product_s."-".$it->product_name }}
                                                                                </td>
                                                                                <td> <?php $mids = DB::table("sales")->where('id', $rows->id)->get();
                                                                                    $totalPa = 0;
                                                                                    ?>
                                                                                    @foreach($mids as $itemsName)
                                                                                        <?php if ($mids = DB::table("stocks")->where('product_id', $item->product_id)->first()) {
                                                                                            echo $item->quantity. "<br>";
                                                                                        }
                                                                                            $totalPa = $item->total_price + $totalPa;
                                                                                        ?>
                                                                                    @endforeach</td>
                                                                                <td> <?php
                                                                                    $ros = DB::table("stocks")->take(1)->where('product_id', $it->id)->get();
                                                                                    $total = 0;
                    
                                                                                    ?>
                                                                                    @foreach($ros as $ro)
                                                                                        <?php echo $sales_price = $item->sales_price ?>
                                                                                    @endforeach
                    
                    
                                                                                    <?php $total=$total+($item->quantity * $item->sales_price);
                                                                                    
                                                                                    ?>&nbsp;
                                                                                    <?php $totalIncomes=$totalIncomes+$total;?>
                    
                    
                                                                                    <?php //$totalIncomes=$totalIncomes+$totalPa;?>
                                                                                    </td>
                                                                                    <td>{{ $total }}</td>
                                                                                <tr>
                                                                                @endforeach
                                                                            @endforeach
                                                            
                                                                </table>
                                                            </td>
                                                            

                                                        
                                                           
                                                        </tr>
                                                    </tbody>
                                                        @endif
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
                <h4 class="modal-title" id="myModalLabel">Sales Report</h4>
            </div>
            <form method="post" action="{{url('/create_report_sales')}}">
                <input type="hidden" name="_token"
                       value="{{ csrf_token() }}">

                <div class="modal-body" style="overflow: hidden !important;border: 0px solid black;">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">Choose Sections</label>
                        </div>
                        <div class="col-sm-7 input-group">
                            <select class="form-control" name="section" required>
                                <option value=""></option>
                                <option value="1">Total Cash Report</option>
                                <option value="5">Total Loan Report</option>
                                <option value="all">All Sales Report</option>
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

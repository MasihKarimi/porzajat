@extends('layouts.main');

@section('javascrip')
    <script>
        $(document).ready(function () {
            $("#Customer").addClass("active")
        });
    </script>
@stop
<style>
    #Msales {
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
    #total td {
        background-color:silver !important;
        border: 1px solid rgba(0, 0, 0, 0.46) !important;
        color: black  !important;
        font-weight: bold;
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
            <li><a href="#">Customer </a></li>
            <li><a href="{{url('/add_customer')}}">See Records</a></li>
            <li><a href="#">Detail</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    
                    <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                        <a href="{{url('add_customer')}}">
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
                                <div class="panel-body" style="padding-left: 15%;padding-right: 15%;">
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
                                                #total td {
                                                    background-color:silver !important;
                                                    border: 1px solid rgba(0, 0, 0, 0.46) !important;
                                                    color: black  !important;
                                                    font-weight: bold;
                                                }

                                            }
                                        </style>
                                        
                                        
                                        <style>
                                            #info {
                                                border: 0px solid black !important;
                                                font-size: 15px !important;
                                                color: #6b8eb2;
                                        
                                            }
                                        
                                            .forms tr td {
                                        
                                                border: 1px solid #587593 !important;
                                            }
                                        
                                            #title {
                                                color: #58588a;
                                                font-size: larger;
                                                font-weight: bold;
                                                text-align: center
                                            }
                                        </style>
                                       
                                        <table id="printhr">
                                            <style>
                                                @media print {
                                                    textarea {
                                                        background-color: rgba(240, 240, 240, 0) !important;
                                                        width: 100% !important;
                                                        font-weight: bold !important;
                                                        color: #0e84b5 !important;
                                                    }
                                        
                                                    #info {
                                                        border: 0px solid black !important;
                                                        font-size: 15px !important;
                                                        color: #6b8eb2;
                                        
                                                    }
                                        
                                                    #printhr td {
                                                        border: 0px solid black !important;
                                                    }
                                        
                                                    #title {
                                                        color: #58588a !important;
                                                        font-size: larger !important;
                                                        font-weight: bold !important;
                                                    }
                                        
                                                    .forms tr td {
                                        
                                                        border: 1px solid #587593 !important;
                                                    }
                                        
                                                    #rights {
                                                        /*float: right!important;*/
                                                    }
                                                }
                                            </style>
                                            
                                            <tr>
                                                    <td style="width: 40vw !important; text-align: left" colspan="2">
                                                        <span style="color: #58588a;" id="title"> </span>
                                                        <br><br>
                                                        <table>
                                                                <br>
                                                                <tr><p style="color:white;font-size:19px;background-color:red;float:left;padding: 5px">
                                                                        Loan Amount On Us From {{$allCustomer->name}}:
                                                                        <?php $totalReceive=0; 
                                                                        $dbAllReceive=DB::table('cash_paids')->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')->get(); ?>
                                                                        @foreach ($dbAllReceive as $item)
                                                                            <?php $totalReceive=$totalReceive+$item->tl_amount; ?>
                                                                
                                                                        @endforeach
                                                                        <b>{{ $totalReceive }} </b>

                                                                </p></tr><br>
                                                            <br>


                                                        </table>
                                                    </td>
                                            
                                                    <td style="padding-top: 25px; text-align: center;width: 20%!important;"><img
                                                                src="{{ URL::asset('assets/image/logo.png') }}"
                                                                style="width: auto; margin-top: -10px;" height="70px">
                                                    </td>
                                            
                                                    <td id="rights" style="width: 40vw !important; text-align: right; " colspan="2">
                                                        <span style="" id="title"></span>
                                                        <br><br>
                                                        <table>
                                                                <br>
                                                                <tr>
                                                                    <p style="color:white;;padding: 5px;font-size:19px;background-color:green;float:right;">Loan amount on {{$allCustomer->name}}:
                                                                        <?php $totalReceive=0; 
                                                                        $dbAllReceive=DB::table('cash_receives')->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')->get(); ?>
                                                                        @foreach ($dbAllReceive as $item)
                                                                            <?php $totalReceive=$totalReceive+($item->pay_amount); ?>
                                                                
                                                                        @endforeach
                                                                        <?php $totalResales=0; 
                                                                        $dbAllReceive=DB::table('sales')->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')->where('giveback','true')->where('sales_type',5)->get(); ?>
                                                                        @foreach ($dbAllReceive as $item)
                                                                            <?php $totalResales=$totalResales+($item->quantity * $item->sales_price); ?>
                                                                
                                                                        @endforeach
                                                                        <b>{{ $totalResales-$totalReceive }} </b>

                                                                </p></tr><br>
                                                            <br>


                                                        </table>
                                                    </td>
                                            
                                                </tr>
                                        </table>                                       
                                        
                                        
                                        <div class="form-group">
                                            <br>
                                            <label for="">Cash receive records</label>
                                            <br>
                                           <?php $row = DB::table("cash_receives")->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')->orderBy('id', 'ASC')->paginate('30');
                                                $check = DB::table("cash_receives")->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')->orderBy('id', 'ASC')->paginate('30')->count();
                                             ?>
                                             <div class="table-responsive">
                                                    @if($check>0)
                                                        <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 14px; border: 1px solid black; width: 100%;">
                                                            <thead>
                                                            <tr role="row" style="text-align: center">
                                                                <th>No</th>
                                                                <th style="width: 15%">Customer Name</th>
                                                                <th style="width: 10%">Serial NO</th>
                                                                
                                                                <th style="width: 19%">Total Loan Amount</th>
                                                                <th style="width: 15%">Paid Amount</th>
                                                                <th style="width: 25%">T New Loan Amount</th>
                                                                <th style="width: 15%">Cash Receiver</th>
                                                                <th style="width: 15%">Date</th>
                                                            </tr>
                                                            </thead>
                                                            <?php  $id = 0;$idR = 0; $total=0;?>
                                                            <tbody style="text-align: center">
                                                            @foreach($row as $rows)
                                                                <tr>
                                                                    <td style=""><?php $id++;echo $id; ?></td>
                                                                    <td style="width: 15%">
            
                                                                    <span style="">
                                                                            <?php
                                                                            $rose = DB::table("customers")->where('id', $rows->customer_id)->get();
                                                                            ?>
                                                                                @foreach($rose as $ros)
                                                                            {{$ros->name}}
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
                                                                            $rose = DB::table("users")->where('id', $rows->user_id)->get();
                                                                            ?>
                                                                                @foreach($rose as $ros)
                                                                                    {{ $ros->f_name." ".$ros->l_name }}
                                                                                @endforeach
            
                                                                    </td>
            
                                                                    <td style="width: 30%">
                                                                        {{$rows->date}}
                                                                    </td>
                                                                    
                                                                </tr>
                                                            @endforeach
                                                            <tr id="total" style="text-align: center">
                                                                <td colspan="4" id="" align="center">Total</td>

                                                                <td colspan="3"> {{$row->sum('pay_amount')}}

                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    @else<span class="text-red padding-20">{{ '*No Record Added Yet' }}</span>@endif<div class="shows"> <ul id="paginator-example-1" class="pagination-purple hidden-print">{{ $row->links() }}</ul> </div>
                                                        <br>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <br>
                                                <label for="">Cash payment records</label>
                                                <br>
                                                <?php 
                                                $row = DB::table("cash_payments")->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')->orderBy('id', 'ASC')->paginate('30');
                                                $check = DB::table("cash_payments")->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')->orderBy('id', 'ASC')->paginate('30')->count();
                                                ?>
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
                                                                    </tr>
                                                                @endforeach
                                                                <tr id="total" style="text-align: center">
                                                                    <td colspan="4" id="" align="center">Total</td>

                                                                    <td colspan="3"> {{$row->sum('pay_amount')}}

                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        @else<span class="text-red padding-20">{{ '*No Record Added Yet' }}</span>@endif<div class="shows"> <ul id="paginator-example-1" class="pagination-purple hidden-print">{{ $row->links() }}</ul> </div>
                                                            <br>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <br>
                                                    <label for="">Sales records</label>
                                                    <br>
                                                    <?php  $show_sales=DB::table("sales")->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')
                                                                        ->where('giveback','true')->orderBy('id','desc')->get(); ?>
                                                    <div class="table-responsive">
                                                            <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 11px; border: 1px solid black; width: 100%;">
                                            <thead >
                                            <tr >
                                                <th >No</th>
                                                <th style="width: 15%">Bill Number</th>
                                                
                                                <th style="width: 15%">Customer</th>
                                               
                                                <th style="width: 20%">Sales Date</th>
                                                
                                                <th style="width: 25%">Total Invoice </th>
                
                                                
                                                <th style="width: 20%">Contact Name</th>
                                            </tr>
                                            </thead>
                                            <?php $id = 1; $idR = 0; $bene_id=null; $totalIncomes = 0;?>
                                            <tbody id="showRowSale" style="text-align: center">
                                            @foreach($show_sales as $item)
                                            @if($item->bene!=$bene_id)
                                                <tr role="row" style="font-size: 14px;" class="odd">
                                                    
                                                    <?php
                                                   // $custName = DB::table("customers")->where('id', $item->customer_id)->get();
                                                    ?>
                                                    <td><?php echo $id++;?></td>
                                                    <td><?php
                                                        $bene_id = $item->bene;
                                                        echo "HLLTD-" ."/". $bene_id;
                                                        ?></td>
                                                  <td> <?php $cust=DB::table('customers')->where('id',$item->customer_id)->get();?>
                                                    @foreach ($cust as $c_name)
                                                       <?php if($c_name->id==$item->customer_id){
                                                           echo $c_name->name;
                                                       }
                                                       else
                                                       {
                                                        echo "One time customer";
                                                        }
                                                        
                                                        ?>
                                                    @endforeach</td>
                                                    <td>{{ date('d-m-Y',strtotime($item->date))}}</td>

                                                        <td id="databody">
                                                     <?php global $total; $total=0; $product_name=DB::table('sales')->where('bene',$bene_id)->get(); ?>
                                                                    @foreach ($product_name as $item2nd)
                                                                       
                                                                            <?php $tot=($item2nd->quantity * $item2nd->sales_price);
                                                                            
                                                                            ?>&nbsp;
                                                                            <?php $total=$total+$tot;?>
                
                                                                            <?php //$totalIncomes=$totalIncomes+$totalPa;?>
                                                                            
                                                                            @endforeach
                                                            {{$total}}
                                                        </td>
                                                    <td>
                                                        <?php
                                                        $ros = DB::table("users")->where('id', $_SESSION['access'])->get();
                                                        ?>
                                                        @foreach($ros as $ro)
                                                            {{$ro->f_name}} {{$ro->l_name}}
                                                        @endforeach
                                                    </td>
                                                   
                                                </tr>
                                                @endif
                                            @endforeach

                                            <tr id="total" style="text-align: center">
                                                <td colspan="4" id="" align="center">Total</td>
                                                <td colspan="3"> {{$total_sales->total}}
                                                </td>
                                            </tr>

                                            </tbody>

                                        </table>
                                        
                                        <!--Bellow Row For Showing Data -->
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <br>
                                                        <label for="">Purchases records</label>
                                                        <br>
                                                        <?php
                                                        $showStock=DB::table("stocks")->where('customer_id',isset($allCustomer) ? $allCustomer->id : '')
                                                        ->where('sales_type',0)
                                                        ->orderBy('id','desc')->get();
                                                        ?>
                                                        <div class="table-responsive">
                                                                <!--Bellow Row For Showing Data -->
                                        
                                                                <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 11px; border: 1px solid black; width: 100%;">
                                                                    <thead>
                                                                    <tr role="row">
                                                                        <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                            style="width: 141px;" aria-sort="ascending"
                                                                            aria-label="Name: activate to sort column descending">Product Name
                                                                        </th>
                                                                       
                                                                        
                                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                            style="width: 103px;" aria-label="Office: activate to sort column ascending">Quantity
                                                                        </th>
                                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                            style="width: 103px;" aria-label="Office: activate to sort column ascending">Net Price
                                                                        </th>
                                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                            style="width: 103px;" aria-label="Office: activate to sort column ascending">Total Net Cost
                                                                        </th>
                                                                        
                                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                        style="width: 103px;" aria-label="Office: activate to sort column ascending">Vendore Name
                                                                        </th>
                                                                        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1"
                                                                            style="width: 79px;" aria-label="Salary: activate to sort column ascending">Date
                                                                        </th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="showRow">
                                                                    @foreach($showStock as $item)
                                                                    <tr role="row" style="font-size: 14px;" class="odd">
                                                                        <td tabindex="0" class="sorting_1">
                                                                            <?php $Dbproduct=DB::table('products')->where('id',$item->product_id)->get();
                                                                            ?>
                                                                            @foreach ($Dbproduct as $itemProd)
                                                                                {{ $itemProd->product_name }}
                                                                            @endforeach
                                                                        </td>
                                                                        
                                                                        <td>{{$item->quantity}}</td>
                                                                        <td>{{$item->net_price}}</td>
                                                                        <td>{{$item->quantity * $item->net_price}}</td>
                                                                        
                                                                        <td> <?php
                                                                            if($item->customer_id==='null' || $item->customer_id===''){
                                                                             ?>
                                                                             <p>No Vendor</p>
                                                                             <?php }else{   
                                                                            $ros = DB::table("customers")->where('id',$item->customer_id)->get();
                                                                              ?>
                                                                              @foreach($ros as $ro)
                                                                                  {{ $ro->name }}
                                                                              @endforeach
                                                                            <?php } ?>
                                                                            </td>
                                                                        <td><?php  echo date('Y-m-d',strtotime($item->created_at)) ?></td>
                                                                    </tr>

                                                                    @endforeach
                                                                    <tr id="total" style="text-align: center">
                                                                        <td colspan="4" id="" align="center">Total</td>

                                                                        <td colspan="3"> {{$total_purchase->total}}

                                                                        </td>
                                                                    </tr>

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
    </div>
@stop

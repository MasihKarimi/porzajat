@extends('layouts.main');

@section('javascrip')
    <script>
        $(document).ready(function () {
            $("#pharmacy").addClass("active")
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
        text-align: center;
    }

    #printhr td {
        border: 0px solid black !important;
    }

    #detailtable td {
        border-color: black !important;
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
            <li><a href="#">Sales </a></li>
            <li><a href="{{url('/add_sale')}}">Sales</a></li>
            <li><a href="#">Detail</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    
                    <div class="alert alert-info" id="headeradd" style=" border: 0px solid black;">
                        <a href="{{url('view_sales')}}">
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
                                                    border-color: black !important;

                                                }
                                                #inv{
                                                    font-size: 19px;
                                                    color:white;background-color:gray;float:right;
                                                    padding: 2px;
                                                }

                                                #headers {
                                                    margin-right: 10px;
                                                    font-weight: bold;

                                                }

                                                #detailtable td  {

                                                    color: #353535 !important;
                                                    border: 1px solid rgba(0, 0, 0, 0.46) !important;

                                                }
                                                #total td {
                                                    background-color: #323232 !important;
                                                    border: 1px solid rgba(0, 0, 0, 0.46) !important;
                                                    color: black  !important;
                                                    font-weight: bold;
                                                }

                                            }
                                        </style>
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
                                            #inv{
                                                font-size: 19px;
                                                color:white;background-color:gray;float:right;
                                                padding: 2px;
                                            }
                                        </style>
                                        @foreach($row as $rows)
                                            <table id="printhr">
                                                <style>
                                                    @media print {
                                                        textarea {
                                                            background-color: rgba(240, 240, 240, 0) !important;
                                                            width: 100% !important;
                                                            font-weight: bold !important;
                                                            color: #0e84b5 !important;
                                                        }
                                                        #inv{
                                                            font-weight: 600 !important;
                                                            border-bottom: 1px dotted grey;
                                                        }
                                                        #cus{
                                                            font-weight: 600 !important;
                                                            border-bottom: 1px dotted grey;
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
                                                        <span style="color: #58588a;" id="title">  Hamid Lemar Co Ltd </span>
                                                        <br><br>

                                                        <table>
                                                            <br>
                                                            <tr><p style="color:white;font-size:19px;background-color:gray;float:left;" id="cus">Shipping Address</p></tr><br>
                                                            <br>
                                                            <tr style="float:left;">

                                                                <sapn style="font-size: 14px"><b>Name: </b> <?php
                                                                    $customer=DB::table('customers')->where('id',$rows->customer_id)->first();
                                                                    if($customer){
                                                                        echo $customer->name;
                                                                    }else{
                                                                        echo $rows->one_name;
                                                                    }
                                                                    ?>
                                                                </sapn><br>

                                                                <span style="font-size: 14px"><b>Contact Name: </b> <?php
                                                                    $customer=DB::table('customers')->where('id',$rows->customer_id)->first();
                                                                    if($customer){
                                                                        echo $customer->p_contact;
                                                                    }else{
                                                                        echo $rows->one_name;
                                                                    }
                                                                    ?></span>


                                                            </tr><br>
                                                            <tr style="float:left;">
                                                                <span><b>Address: </b> <?php $customer=DB::table('customers')->where('id',$rows->customer_id)->first();
                                                                    if($customer){
                                                                        echo $customer->address;
                                                                    }else{
                                                                        echo "";
                                                                    }
                                                                    ?></span>
                                                            </tr><br>
                                                            <tr style="float:left;">
                                                               <span><b> Phone: </b>  <?php $customer=DB::table('customers')->where('id',$rows->customer_id)->first();
                                                                   if($customer){
                                                                       echo $customer->phone;
                                                                   }else{
                                                                       echo $rows->one_phone;;
                                                                   }
                                                                   ?>
                                                               </span>
                                                            </tr>
                                                            <br>
                                                            <tr style="float:left;">
                                                                <span><b>TIN#: </b>
                                                                    <?php $customer=DB::table('customers')->where('id',$rows->customer_id)->first();
                                                                    if($customer){
                                                                        echo $customer->tin;
                                                                    }else{
                                                                        echo "";
                                                                    }
                                                                    ?></span>
                                                            </tr><br>
                                                            <tr style="float:left;">
                                                                <span><b>License#: </b>
                                                                    <?php $customer=DB::table('customers')->where('id',$rows->customer_id)->first();
                                                                    if($customer){
                                                                        echo $customer->lic;
                                                                    }else{
                                                                        echo "";
                                                                    }
                                                                    ?></span>
                                                            </tr><br>
                                                            <tr style="float:left;">
                                                                <span><b>Registration#: </b>
                                                                    <?php $customer=DB::table('customers')->where('id',$rows->customer_id)->first();
                                                                    if($customer){
                                                                        echo $customer->reg;
                                                                    }else{
                                                                        echo "";
                                                                    }
                                                                    ?></span>
                                                            </tr>
                                                        </table>
                                                    </td>

                                                    <td style="padding-top: 25px; text-align: center;width: 40%!important;"><img
                                                                src="{{ URL::asset('assets/image/logo.png') }}"
                                                                style="width: auto; margin-top: -10px;" height="70px">
                                                                <h4>GENUINE AUTO PARTS</h4>
                                                    </td>

                                                    <td id="rights" style="width: 40vw !important; text-align: right; " colspan="2">
                                                        <span style="" id="title">Delivery Note</span>
                                                        <br><br>
                                                        <table>
                                                            <br>
                                                            <tr ><span id="inv">Invoice Address</span></tr><br>
                                                            <br>
                                                            <tr style="float:right;">

                                                                <span style="font-size: 14px"> <b>Name: </b>   Hamid Lemar Co Ltd </span><br>
                                                                {{--
                                                                                                                                    Contact Name: @yield('users')  --}}
                                                            </tr>
                                                            <tr style="float:right;">
                                                                <span style="font-size: 14px"> <b> Address:</b> Quwa-e-Markaz, Kabul, AFG</span>

                                                            </tr><br>
                                                            <tr style="float:right;">
                                                                    <span style="font-size: 14px"><b>Phone:</b>  +93 (0) 799 55 55 85
                                                                    <br> +93 (0) 788 85 59 99
                                                                        <br>
                                                                        +93 (0) 700 66 77 66
                                                                    </span>
                                                            </tr>
                                                        </table>
                                                        <br>
                                                        <br>
                                                    </td>

                                                </tr>
                                            </table>



                                        <table id="demo-dynamic-tables-2" class="table table-middle">


                                           
                                                <tr id="detailtable" style="text-align: center">
                                                   
                                                    <td><b>Invoice#</b> </td>

                                                    <td>
                                                        <?php
                                                        $max = $rows->bene;
                                                        echo "HLLTD-" ."/". $max;
                                                        ?>
                                                    </td>
                                                    <td><b> Delivery Note #</b></td>

                                                    <td>
                                                        <?php
                                                        $max = $rows->bene;
                                                        echo "HLLTD-" ."/". $max;
                                                        ?>
                                                    </td>

                                                    <td id="headers">Order Date</td>
                                                    <td>{{ date('d-m-Y',strtotime($rows->date))}}
                                                </tr>



                                        </table>
                                        @endforeach
                                        <table id="demo-dynamic-tables-2" class="table table-middle">
                                              <tr id="total">
                                                <td id="headers">No</td>  
                                                <td id="headers">Part Number/Name</td>
                                                <td id="headers">Ordered Quantity</td>
                                                <td id="headers">Deliver Quantity</td>
                                                <td id="headers">Outstanding</td>
                                            </tr>
                                            <?php $total = 0;$id=1;?>
                                            @foreach($row as $rows)
                                                <?php $get = DB::table("sales")->where('bene', $rows->bene)->get();?>
                                                @foreach($get as $gets)
                                                    <tr id="detailtable" style="text-align: center">
                                                        <td><?php echo $id++;?></td>
                                                        <td>
                                                            <?php
                                                            $ros = DB::table("products")->where('id', $gets->product_id)->get();
                                                            $product_name = 0
                                                            ?>
                                                            @foreach($ros as $ro)
                                                            {{$ro->product_s ." - ".$ro->product_name}}
                                                                <?php $product_name = $ro->product_name ?>
                                                            @endforeach
                                                        </td>
                                                        <td>{{$gets->quantity}}</td>
                                                        <td>
                                                                {{$gets->quantity}}
                                                        </td>
                                                        <td>0</td>
                                                        
                                                    </tr>
                                                @endforeach

                                            @endforeach
                                              <?php $remain_rows=22; ?>
                                            @for($i=$id; $i<$remain_rows; $i++)
                                             <tr id="detailtable">
                                                <td>&nbsp;</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @endfor
                                            

                                        </table>
                                        <h4 style="text-align: center">Thanks For Your Business!</h4>
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

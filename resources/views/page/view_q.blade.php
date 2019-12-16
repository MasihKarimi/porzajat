@extends('layouts.main')

@section('javascrip')
    <script>
        $(document).ready(function () {
            $("#quotation").addClass("active")
        });
    </script>
@stop
<style>
    #hr_management {
        color: white;
    }

    #headeradd {
        border-radius: 5px;
        padding: 10px !important;
        background: #466074;
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
    <div class="layout-content-body">
        <div style="margin-top: -25px;">
            <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
                <li><a href="#">Quotation </a></li>
                <li><a href="{{url('/add_q')}}">View Quotation</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-content">
                        @include('include.add_q')

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table id="demo-dynamic-tables-1" class="table table-middle">
                            <thead>
                            <tr>
                                <th id="hid"></th>
                                <th >No#</th>
                                <th style="width: 25%">Quotation Number</th>
                                <th style="width: 25%">Customer</th>
                                <th style="width: 25%">Quotation Date</th>
                                <th style="width: 25%">Contact Name</th>
                                <th style="white-space: nowrap">Action</th>
                            </tr>
                            </thead>
                            <?php $id = 1; $idR = 0; $bene_id=null; $totalIncomes = 0;?>
                            <tbody id="showRowSale">
                            @foreach($show_sales as $item)
                            @if($item->bene!=$bene_id)
                                <tr role="row" style="font-size: 14px;" class="odd">
                                    <td id="hid1" style="border:0px solid black!important;border-bottom-color: white!important;border-right-color: white">
                                       
                                    </td>
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
                                    <td>{{ date('d-m-Y',strtotime($item->created_at))}}</td>

                                    <td> <?php
                                        $ros = DB::table("users")->where('id', $_SESSION['access'])->get();
                                        ?>
                                        @foreach($ros as $ro)
                                            {{$ro->f_name}} {{$ro->l_name}}
                                        @endforeach</td>
                                    <?php $idR = $item->bene;?>
                                    <td style="width: 20%"> 
                                        <!-- <button class="btn btn-outline-danger btn-icon sq-32"  title="Give back This Record"
                                                 href="#giveback" data-toggle="modal"
                                                 data-target="#giveback<?php echo $idR?>">
                                            <i class="icon icon-signing"></i>
                                        </button> -->
                                        
                                    <a href="{{url('quoutation_salesdetail', $item->id)}}" title="Details of the Record Shows">
                                            <button class="btn btn-outline-default btn-icon sq-32"
                                                    type="button">
                                                <i class="icon icon-info-circle"></i>
                                            </button>
                                        </a>
                                       
                                            <?php $user=DB::table('users')->where('id',$_SESSION['access'])->first(); ?>
                                            @if($user->type==1)
                                    <a title="Update The Selected Record" href="{{ url('/edit_q',['id'=>$item->id])}}" >  <button class="btn btn-outline-success btn-icon sq-32"
                                                                                                                                                               type="button">
                                                <i class="icon icon-edit"></i>
                                            </button></a>
                                    <a title="Delete The Selected Record" href="{{ url('/delete_q',['id'=>$item->id])}}">  <button class="btn btn-outline-danger btn-icon sq-32" title="Delete this Record "><i class=" icon icon-remove"></i>
                                            </button></a>
                                            @endif
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="dataTables_paginate paging_bootstrap_number" id="sample_1_paginate">
                                    <ul class="pagination" style="visibility: visible;">
                                        <li class="active">{{$show_sales->links()}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Bellow Row For Showing Data -->
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

@endsection
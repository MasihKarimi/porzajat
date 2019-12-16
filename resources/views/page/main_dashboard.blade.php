@extends('layouts.main');

@section('javascrip')
    <script>
        $(document).ready(function () {
            $("#dashboard").addClass("active")
        });
    </script>
@stop
@section('content')
    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="d-ib">Dashboard</span>
        </h1>
    </div>
    <p class="title-bar-description">
    <h5>Welcome to <span style="font-weight: bold"> HamidLemar </span> Ltd Management System.</h5>
    </p>
    <div class="row gutter-xs">
        <div class="col-md-6 col-lg-3 col-lg-push-0">
            <div class="card bg-info">
                <div class="card-body">
                    <div class="media">
                        <div class="media-middle media-left">
                      <span class="bg-info-inverse circle sq-48" style="padding-top: 22%;">
                        <span class="icon icon-user"></span>
                      </span>
                        </div>
                        
                        <div class="media-middle media-body">
                            <h6 class="media-heading">Total User</h6>
                            <h3 class="media-heading">
                                <span class="fw-l">
                                    {{App\User::all()->count()}}
        </span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-lg-push-3">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="media">
                        <div class="media-middle media-left">
<span class="bg-primary-inverse circle sq-48" style="padding-top: 22%;">
<span class="icon icon-cart-plus"></span>
</span>
                        </div>
                        <div class="media-middle media-body">
                            <h6 class="media-heading">Total Sales</h6>
                            <h3 class="media-heading">
        <span class="fw-l">
             {{App\Sale::where('giveback','=','true')->count()}}
        </span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-lg-pull-3">
            <div class="card bg-info">
                <div class="card-body">
                    <div class="media">
                        <div class="media-middle media-left">
<span class="bg-info-inverse circle sq-48" style="padding-top: 22%;">
<span class="icon icon-sitemap"></span>
</span>
                        </div>
                        <div class="media-middle media-body">
                            <h6 class="media-heading">Total Purchase</h6>
                            <h3 class="media-heading">
        <span class="fw-l">
{{App\Stock::all()->count()}}
        </span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-lg-pull-0">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="media">
                        <div class="media-middle media-left">
<span class="bg-primary-inverse circle sq-48" style="padding-top: 22%;">
<span class="icon icon-cart-arrow-down"></span>
</span>
                        </div>
                        <div class="media-middle media-body">
                            <h6 class="media-heading">Today Sales</h6>
                            <h3 class="media-heading">
        <span class="fw-l">
         {{App\Sale::where('date','=',\Carbon\Carbon::today())->where('giveback','=','true')->count()}}
        </span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row gutter-xs">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body" style="background-color: #f0f0f0;box-shadow: 0px -1px 1px #c9c9c9">
                    <h4 class="card-title"><i class="icon icon-calendar-check-o"></i> Today </h4>
                </div>
                <div class="" style="height: 315px;
background-color: #fff;padding-top: 100px; margin: 10px;margin-top: 10px; box-shadow: 0px 0px 1px #ffffff;
border-radius: 5px;">

                    <div style="color: black; font-size: 25px;
align-content: center; text-align: center; font-weight: bold; text-shadow: 0px 0px 1px black">
                        <span> <?php echo date('Y - m - d')?></span><br>
                        <span> <?php echo date('Y - F - l')?></span>
                        <span><hr style="border: 2px solid blue;margin-left: 10%;margin-right: 10%"></span>
                    </div>
                </div>
                <script>
                    $(function () {
                        var x = document.getElementById['calendar'].value;
                        if (x = 15) {
                            $(".day").addClass("active");
                        }
                        $("#jan").val("Dolly Duck");
                    });
                </script>
                <div id="jan"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body" style="background-color: #f0f0f0;box-shadow: 0px -1px 1px #c9c9c9">
                    <h4 class="card-title"><i class="icon icon-gear"></i> HamidLemar Ltd</h4>
                </div>
                <div class="card-body" style="height: 330px;">
                    <div class="card-chart">
                        <img src="{{ URL::asset('assets/image/logo.png') }}"  width="50%"
                             style="height:auto;  margin-left: 30%; margin-top: 15%">

                    </div>
                </div>

            </div>
        </div>


    </div>
@stop

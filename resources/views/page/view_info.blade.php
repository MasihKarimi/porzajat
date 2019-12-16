@extends('layouts.main')

@section('javascrip')
    <script>
        $(document).ready(function () {
            $("#stock").addClass("active")
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
        <br>
        <div style="margin-top: -25px;">
            <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">

                <li><a href="#">Setting </a></li>
                <li><a href="{{url('/view_stock')}}">View All Stock</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <img src="{{asset('/assets/image/important.jpg')}}" alt="info about stock">
                </div>
            </div>
        </div>
    </div>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>">
    <title>Sartaj Enterprises</title>

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="manifest.json">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#2c3e50">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="<?php echo $url = asset('assets/css/vendor.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo $url = asset('assets/css/elephant.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo $url = asset('assets/css/application.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo $url = asset('assets/css/demo.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo $url = asset('assets/css/datepicker3.css'); ?>">
    <link href="<?php echo $url = asset('assets/css/chosen.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo $url = asset('assets/css/chosen.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('assets/js/jquery.js')); ?>"></script>




    <?php echo $__env->yieldContent('javascrip'); ?>
</head>
<style>
    a:hover {
        text-decoration: none;
    }

    /*Chosen Select CSS code*/
    .chzn-container-single .chzn-single {
        width: 22vw;
        position: relative;
        border-radius: 0% !important;
    }

    /*Alert CSS code*/
    #alert_popup_success {
        position: absolute;
        z-index: 1000;
        width: 50vw !important;
        min-width: 250px !important;
        margin: -23px auto !important;
        margin-right: 0 !important;
        margin-left: 31% !important;
        white-space: nowrap;
    }

    #info {
        color: #1f2c39;
        border-bottom: 1px solid #1f2c39;
        margin-bottom: 10px;
    }

    /*table CSS code*/
    #demo-dynamic-tables-1_paginate {
        display: none !important;
    }

    .shows ul li {
        align-content: center;
        display: inline !important;
    }

</style>
<body class="layout layout-header-fixed">
<div class="layout-header">
    <div class="navbar navbar-default">
        <div class="navbar-header">

            <a class="navbar-brand" style="color:#ffffff; font-size: medium;align-content: center">
                &blacktriangleleft;
                <span style="font-size: 25pt;color: #ffffff; " class="sidenav-icon icon icon-user-md"></span>
                Sartaj Enterprises &blacktriangleright;
            </a>

            <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse"
                    data-target="#sidenav">
                <span class="sr-only">Toggle navigation</span>
                <span class="bars">
              <span class="bar-line bar-line-1 out"></span>
              <span class="bar-line bar-line-2 out"></span>
              <span class="bar-line bar-line-3 out"></span>
            </span>
                <span class="bars bars-x">
              <span class="bar-line bar-line-4"></span>
              <span class="bar-line bar-line-5"></span>
              </span>
            </button>
            <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse"
                    data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="arrow-up"></span>
                <span class="ellipsis ellipsis-vertical">
              
            </span>
            </button>
        </div>
        <div class="navbar-toggleable">
            <nav id="navbar" class="navbar-collapse collapse">
                <button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true"
                        type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="bars">
                <span class="bar-line bar-line-1 out"></span>
                <span class="bar-line bar-line-2 out"></span>
                <span class="bar-line bar-line-3 out"></span>
                <span class="bar-line bar-line-4 in"></span>
                <span class="bar-line bar-line-5 in"></span>
                <span class="bar-line bar-line-6 in"></span>
              </span>
                </button>
                <ul class="nav navbar-nav navbar-right">
                    <li class="visible-xs-block">
                        <h4 class="navbar-text text-center">Powered By : <a href="https://facebook.com/mujeeb.haleemi">Mujib Halimi</a></h4>
                    </li>

                    <li class="dropdown hidden-xs" style="color: red; ">
                        <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">

                            <?php if($rows = DB::table('users')->where('id', $_SESSION['access'])->first()): ?>
                                <img class="rounded" width="36" height="36" src="<?php echo e(asset('assets/image/'.$rows->photo)); ?>"
                                     alt="Admin">
                                <?php
                                    echo ucfirst($rows->f_name) . " " . $rows->l_name;
                                    ?>

                            <?php endif; ?>



                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a></a></li>
                            <li>
                                <a id="logout" href="<?php echo e(url('/userp')); ?>">
                                    <h5 class="navbar-upgrade-heading">My Profile
                                    </h5>
                                </a>
                            </li>
                            <li>
                                <a id="logout" href="<?php echo e(url('/logout')); ?>">
                                    <h5 class="navbar-upgrade-heading"> Log Out
                                    </h5>
                                </a>
                            </li>
                        </ul>
                    </li>
                  <!--  <li  style="color: red; ">

                        <button style="margin-top: 10px; margin-right: 5px; " >

                            <a href="<?php echo e(url('/logout')); ?>"><i class="glyphicon glyphicon-log-out"></i>Logout</a>
                            <span class="caret"></span>
                        </button>
                    </li> -->
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="layout-main">
    
    <div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body ">
            <?php echo $__env->make('mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    
    <div class="layout-content">
        <div class="layout-content-body">
            <?php if(count($errors) > 0): ?>
                <br>
                <br>
                <div class="alert alert-info alert-danger" id="alert_popup_success"
                     style="height: 35px!important; padding-top: 5px !important;">
                    <a href="#" class="close" data-dismiss="true" aria-label="close">&times;</a>
                    <strong>Error!</strong> There were some problems with your input.
                </div>
            <?php endif; ?>
            <?php if(Session::has('success')): ?>
                    <br>
                    <br>
                <div class="alert alert-info alert-success" id="alert_popup_success"
                     style="height: 35px!important; padding-top: 5px !important;">
                    <a href="#" class="close" data-dismiss="true" aria-label="close">&times;</a>
                    <strong>Success!</strong> <?php echo e(Session::get('success')); ?>


                </div>
            <?php endif; ?>
            <?php if(isset($deleted)): ?>
                <?php if($deleted=='deleted'): ?>
                    <div class="alert alert-info alert-success" id="alert_popup_success"
                         style="height: 35px!important; padding-top: 5px !important;">
                        <a href="#" class="close" data-dismiss="true" aria-label="close">&times;</a>
                        <strong>Success!</strong> Successfully Deleted!

                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(session()->has('access')): ?>
                <div class="alert alert-info alert-success" id="alert_popup_success"
                     style="height: 35px!important; padding-top: 5px !important;">
                    <a href="#" class="close" data-dismiss="true" aria-label="close">&times;</a>
                    <strong>Error!</strong> You don't have Access This Operation!
                </div>
                
                
                
            <?php endif; ?>
            <?php if(isset($access)): ?>
                <?php if($access=='access'): ?>
                    <div class="alert alert-info alert-success" id="alert_popup_success"
                         style="height: 35px!important; padding-top: 5px !important;">
                        <a href="#" class="close" data-dismiss="true" aria-label="close">&times;</a>
                        <strong>Error!</strong> You don't have Access This Operation!
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(isset($error)): ?>

                <?php if($error=='error'): ?>
                    <div class="alert alert-info alert-success" id="alert_popup_success"
                         style="height: 35px!important; padding-top: 5px !important;">
                        <a href="#" class="close" data-dismiss="true" aria-label="close">&times;</a>
                        <strong>Error!</strong> Try Again!

                    </div>
                <?php endif; ?>
                <?php if($error=='user'): ?>
                    <div class="alert alert-info alert-success" id="alert_popup_success"
                         style="height: 35px!important; padding-top: 5px !important;">
                        <a href="#" class="close" data-dismiss="true" aria-label="close">&times;</a>
                        <strong>Error!</strong> Confirm Password is Wrong, Try Again!
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(isset($success)): ?>
                <?php if($success=='success'): ?>
                    <div class="alert alert-info alert-success" id="alert_popup_success"
                         style="height: 35px!important; padding-top: 5px !important;">
                        <a href="#" class="close" data-dismiss="true" aria-label="close">&times;</a>
                        <strong>Success!</strong> Successfully Updated!

                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    
    <div class="layout-footer">
        <div class="layout-footer-body  ">
            <small class="version">Sartaj Enterprises</small>
            <small class="copyright"><?php echo date('Y'); ?>&nbsp;&copy; By <a href="https://facebook.com/mujeeb.haleemi">Mujib Halimi</a></small>
        </div>
    </div>
</div>


<script src="<?php echo e(asset('assets/js/vendor.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/elephant.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/application.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chosen.jquery.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chosen.jquery.min.js')); ?>"></script>
<script>
    $(function () {

        $('.numeric').keypress(function (e) {
            if (((e.keyCode == 48) || (e.keyCode == 49) || (e.keyCode == 50) || (e.keyCode == 51) || (e.keyCode == 52) || (e.keyCode == 53) || (e.keyCode == 54) || (e.keyCode == 55) || (e.keyCode == 56) || (e.keyCode == 57) ) || ((e.charCode == 48) || (e.charCode == 49) || (e.charCode == 50) || (e.charCode == 51) || (e.charCode == 52) || (e.charCode == 53) || (e.charCode == 54) || (e.charCode == 55) || (e.charCode == 56) || (e.charCode == 57) ) || e.charCode == 46) {
                return true;
            }
            else  return false;
        })
    });
</script>
<script type="text/javascript">
    $(function () {
        setTimeout(function () {
            $("#alert_popup_success").hide("slow");
        }, 5000);
        setTimeout(function () {
            $("#alert_popup_warning").hide("slow");
        }, 5000);
    });
</script>
<script src="<?php echo e(asset('assets/js/bootstrap-datepicker.js')); ?>" type="text/JavaScript"></script>
<script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
<script src="<?php echo e(asset('assets/js/jquery.printarea.js')); ?>" type="text/JavaScript"></script>
<script>
    $(document).ready(function () {
        $("#print_button").click(function () {
            var mode = 'iframe';
            var close = mode == "popup";
            var options = {mode: mode, popClose: close};
            $("div.dibs").printArea(options);
        });
    });

</script>

<script src="<?php echo e(asset('assets/js/chosen.jquery.min.js')); ?>" type="text/JavaScript"></script>
<script>
    $(function () {
        $(".selects", this).chosen();
        $('#myModal').on('shown.bs.modal', function () {
            $('.chzn-select', this).chosen();
        });
        $('#myModal2').on('shown.bs.modal', function () {
            $('.chzn-select', this).chosen();
        });
        $('#myModal3').on('shown.bs.modal', function () {
            $('.chzn-select', this).chosen();
        });
        $('#myModal4').on('shown.bs.modal', function () {
            $('.chzn-select', this).chosen();
        });
        $('#myModal5').on('shown.bs.modal', function () {
            $('.chzn-select', this).chosen();
        });
        $('#myModal6').on('shown.bs.modal', function () {
            $('.chzn-select', this).chosen();
        });
        $('#village').on('shown.bs.modal', function () {
            $('.chzn-select', this).chosen();
        });
    });
</script>


<script src="<?php echo e(asset('assets/js/jquery.table2excel.js')); ?>" type="text/JavaScript"></script>
<script>
    $(function () {
        $("#excel").click(function () {
            $(".table").table2excel({
                exclude: ".noExl",
                name: "Excel Document Name"
            });
        });
    });
    //the bellow form submitting the purchase
    $("#example-form").submit(function(event){
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        var $_token = $('#token').val();
        $.ajax({
            url: '/add_purchase',
            type: 'POST',
            data: formData,
            success: function (data) {
                if ((data.errors)){
                    $('.error1').removeClass('hidden');
                    $('.error1').text(data.errors.prodcutName);
                    $('.error2').removeClass('hidden');
                    $('.error2').text(data.errors.weight);
                    $('.error3').removeClass('hidden');
                    $('.error3').text(data.errors.quantity);
                    $('.error4').removeClass('hidden');
                    $('.error4').text(data.errors.netprice);
                    $('.error5').removeClass('hidden');
                    $('.error5').text(data.errors.saleprice);
                    $('.error6').removeClass('hidden');
                    $('.error6').text(data.errors.currency);
                    $('.error7').removeClass('hidden');
                    $('.error7').text(data.errors.issued);
                    $('.error8').removeClass('hidden');
                    $('.error8').text(data.errors.expiry);

                }
                else {
                    $('.error').addClass('hidden');
                    $('#showRow').append('<tr role="row" class="odd"><td tabindex="0" class="sorting_1">'+data.product_id+'</td><td>'+data.product_id+'</td> <td>'+data.weight+'</td> <td>'+data.quantity+'+'+data.unit+'</td><td>'+data.net_price+'</td> <td>'+data.net_price+'</td> <td>'+data.sales_price+'</td> <td>'+data.sales_price+'</td> <td>'+data.currency+'</td> <td>'+data.isseu_date+'</td> <td>'+data.expirey_date+'</td></tr>');
                }
            },
            headers: { 'X-XSRF-TOKEN' : $_token },
            contentType: false,
            processData: false,
            cache:false

        });

        $('#productName').val('');
        $('#weight').val('');
        $('#currency').val('');
        $('#issueDate').val('');
        $('#expiryDate').val('');
        $('#quantity').val('');
        $('#netprice').val('');
        $('#saleprice').val('');
        return false;

    });
    //the bellow form submitting the product
    $("#example-form-product").submit(function(event){
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        var $_token = $('#token').val();
        $.ajax({
            url: '/add_products',
            type: 'POST',
            data: formData,
            success: function (data) {
                if ((data.errors)){
                    $('.error1').removeClass('hidden');
                    $('.error1').text(data.errors.product_name);
                    $('.error2').removeClass('hidden');
                    $('.error2').text(data.errors.product_form);

                }
                else {
                    $('.error').addClass('hidden');
                    $('#showRowproduct').append('<tr role="row" class="odd"><td tabindex="0" class="sorting_1">'+data.product_name+'</td><td>'+data.product_form+'</td><td>'+data.company_id+'</td><td>'+data.product_s+'</td><td style="white-space: nowrap !important;"><button class="edit-modal btn btn-info" data-id="'+data.id+'"data-name="'+data.product_name+'" data-name1="'+data.product_form+'"><span class="glyphicon glyphicon-edit"></span> Edit  </button> <button class="delete-modals btn btn-danger" data-id="'+data.id+'" data-name="'+data.product_name+'"><span class="glyphicon glyphicon-trash"></span> Delete </button> </td></tr>');
                }
            },
            headers: { 'X-XSRF-TOKEN' : $_token },
            contentType: false,
            processData: false,
            cache:false

        });

        $('#product_name').val('');
        $('#product_form').val('');
        $('#product_c').val('');
        $('#product_s').val('');
        return false;

    });
    //the bellow form submitting the company
    $("#example-form-company").submit(function(event){
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        var $_token = $('#token').val();
        $.ajax({
            url: '/add_company',
            type: 'POST',
            data: formData,
            success: function (data) {
                if ((data.errors)){
                    $('.error1').removeClass('hidden');
                    $('.error1').text(data.errors.comp_name);
                }
                else {
                    $('.error').addClass('hidden');
                    $('#showRowcompany').append('<tr role="row" class="odd"><td tabindex="0" class="sorting_1">'+data.comp_name+'</td><td><button class="edit-modal btn btn-info" data-id="'+data.id+'" data-name="'+data.comp_name+'"><span class="glyphicon glyphicon-edit"></span> Edit  </button>&nbsp;<button class="delete-modals btn btn-danger" data-id="'+data.id+'" data-name="'+data.comp_name+'"><span class="glyphicon glyphicon-trash"></span> Delete </button> </td></tr>');
                }
            },
            headers: { 'X-XSRF-TOKEN' : $_token },
            contentType: false,
            processData: false,
            cache:false

        });

        $('#comp_name').val('');
        return false;

    });
    $(document).on('click', '.delete-modals1', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModald').modal('show');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteComp',
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            data: {
                '_token': "<?php echo e(csrf_token()); ?>",
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });
    $(document).on('click', '.edit-modal1', function() {
        $('#footer_action_button').text("Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#n1').val($(this).data('name1'));
        $('#pc').val($(this).data('name2'));
        $('#ps').val($(this).data('name3'));
        $('#myModald').modal('show');
    });
    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: '/editComp',
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            data: {
                '_token': "<?php echo e(csrf_token()); ?>",
                'id': $("#fid").val(),
                'name': $('#n').val(),
                'form': $('#n1').val(),
                'comp':$('#pc').val(),
                'ser' : $('#ps').val()
            },
            success: function(data) {
                $('.item' + data.id).replaceWith('<tr class="odd item ' + data.id +'"><td tabindex="0" class="sorting_1">'+data.comp_name+'</td><td style="white-space: nowrap !important;"> <button class="edit-modal btn btn-info" data-id="'+data.id+'" data-name="'+data.name+'"><span class="glyphicon glyphicon-edit"></span> Edit </button><button class="delete-modals btn btn-danger" data-id="'+data.id+'" data-name="'+data.name+'"><span class="glyphicon glyphicon-trash"></span> Delete</button></td></tr>');
            }
        });
    });

    //the bellow form submitting the customer
    $("#example-form-customer").submit(function(event){
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        var $_token = $('#token').val();
        $.ajax({
            url: '/add_customer',
            type: 'POST',
            data: formData,
            success: function (data) {
                if ((data.errors)){
                    $('.error1').removeClass('hidden');
                    $('.error1').text(data.errors.comp_name);
                }
                else {
                    $('.error').addClass('hidden');
                    $('#showRowcompany').append('<tr role="row" class="odd"><td tabindex="0" class="sorting_1">'+data.name+'</td><td>'+data.address+'</td><td><button class="edit-modal btn btn-info" data-id="'+data.id+'" data-name="'+data.name+'"><span class="glyphicon glyphicon-edit"></span> Edit  </button>&nbsp;<button class="delete-modals btn btn-danger" data-id="'+data.id+'" data-name="'+data.name+'"><span class="glyphicon glyphicon-trash"></span> Delete </button> </td></tr>');
                }
            },
            headers: { 'X-XSRF-TOKEN' : $_token },
            contentType: false,
            processData: false,
            cache:false

        });

        $('#comp_name').val('');
        return false;

    });
    $(document).on('click', '.delete-modals1', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModald').modal('show');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deletecustomer',
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            data: {
                '_token': "<?php echo e(csrf_token()); ?>",
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });
    $(document).on('click', '.edit-modal1', function() {
        $('#footer_action_button').text("Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#n1').val($(this).data('name1'));
        $('#myModald').modal('show');
    });
    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: '/editcustomer',
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            data: {
                '_token': "<?php echo e(csrf_token()); ?>",
                'id': $("#fid").val(),
                'name': $('#n').val(),
                'address': $('#n1').val(),
            },
            success: function(data) {
                $('.item' + data.id).replaceWith('<tr class="odd item ' + data.id +'"><td tabindex="0" class="sorting_1">'+data.name+'</td><td>'+data.address+'</td><td style="white-space: nowrap !important;"> <button class="edit-modal btn btn-info" data-id="'+data.id+'" data-name="'+data.name+'"><span class="glyphicon glyphicon-edit"></span> Edit </button><button class="delete-modals btn btn-danger" data-id="'+data.id+'" data-name="'+data.name+'"><span class="glyphicon glyphicon-trash"></span> Delete</button></td></tr>');
            }
        });
    });
</script>
<script>
    $(document).on('click', '.delete-modals', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModald').modal('show');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteProducts',
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            data: {
                '_token': "<?php echo e(csrf_token()); ?>",
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });
</script>
<script>
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text("Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#n1').val($(this).data('name1'));
        $('#pc').val($(this).data('name2'));
        $('#ps').val($(this).data('name3'));
        $('#myModald').modal('show');
    });
    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: '/editProducts',
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            data: {
                '_token': "<?php echo e(csrf_token()); ?>",
                'id': $("#fid").val(),
                'name': $('#n').val(),
                'form': $('#n1').val(),
                'comp':$('#pc').val(),
                'ser' : $('#ps').val()
            },
            success: function(data) {
                $('.item' + data.id).replaceWith('<tr class="odd item ' + data.id +'"><td tabindex="0" class="sorting_1">'+data.product_name+'</td><td>'+data.product_form+'</td><td>'+data.comp_id+'</td><td>'+data.product_s+'</td><td style="white-space: nowrap !important;"> <button class="edit-modal btn btn-info" data-id="'+data.id+'" data-name="'+data.name+'" data-name1="'+data.form+'"><span class="glyphicon glyphicon-edit"></span> Edit </button><button class="delete-modals btn btn-danger" data-id="'+data.id+'" data-name="'+data.name+'"><span class="glyphicon glyphicon-trash"></span> Delete</button></td></tr>');
            }
        });
    });
</script>
<script>


    /*
    $("#demo-form-wizard-1").submit(function(event){
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        var $_token = $('#token').val();
        $.ajax({
            url: '/add_sales',
            type: 'POST',
            data: formData,
            success: function (data) {
                if ((data.errors)){
                    $('.error1').removeClass('hidden');
                    $('.error1').text(data.errors.product_name);
                    $('.error2').removeClass('hidden');
                    $('.error2').text(data.errors.product_form);

                }
                else {
                    $('.error').addClass('hidden');
                    $('#showRowSale').append('<tr role="row" class="odd"><td tabindex="0" class="sorting_1">'+data.seller_name+'</td> <td>'+data.address+'</td><td></td><td>'+data.product_id+'</td><td>'+data.quantity+'</td><td>'+data.currency+'</td><td>'+data.total_price+'</td><td></td><td>'+data.sales_type+'</td></tr>');
                }
            },
            headers: { 'X-XSRF-TOKEN' : $_token },
            contentType: false,
            processData: false,
            cache:false

        });

        $('#product_name').val('');
        $('#product_form').val('');
        return false;

    });
    */
</script>
</body>
</html>


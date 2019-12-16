<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hamid Lemar Ltd </title>
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

    <link rel="stylesheet" href="<?php echo $url = asset('assets/css/login-2.min.css'); ?>">

    <link href="<?php echo $url = asset('assets/css/chosen.min.css'); ?>" rel="stylesheet" media="screen">
    <script src="{{ asset('assets/js/jquery.js') }}"></script>

  </head>
  <body>

  @if (count($errors) > 0)
      <div class="alert alert-danger" style="width: 500px; float: right;">
          <strong>Whoops!</strong> There were some problems with your input.
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  @if (isset($wrong))
      <div
              class="alert alert-info alert-danger" id="alert_popup_success"
              style="height:70px!important; float: right; width: 400px; padding-top: 5px !important;">
          <strong>Whoops!</strong> <br>Your Email or Password is Incorrect! Please Try Again.
      </div>
  @endif

    <div class="login">
      <div class="login-body">
        <a class="login-brand" href="#">
            <img src="{{ URL::asset('assets/image/logo.png') }}" width="70%" style="height: auto; margin-left: 5%">
        </a>
        <div class="login-form">
          <form data-toggle="validator"  role="form" method="POST" action="{{ url('/login') }}">
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" class="form-control" type="email" name="email" required>
            </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" class="form-control" type="password" name="password" required>
            </div>

            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>
      </div>
      <div class="login-footer">
         Hamid Lemar Ltd<br>
          Copy &copy;   By <a href="https://zeersign.com"> ZeerSign Software Solutions </a>
      </div>
    </div>
    <script src="js/vendor.min.js"></script>
    <script src="js/elephant.min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>
</html>
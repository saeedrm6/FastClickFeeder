<!--
    Webgardi 24 Exclusive CMS ver 1.0
    By :     Saeed Rahimi Manesh
    Web :    Https://RahimiManesh.com
    Mobile : +98 919 335 0901
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    @yield('header')

    <!-- Bootstrap -->
    <link href="{{asset('website/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('website/css/custom.css')}}">
    <link href="{{asset('dashboard/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@yield('content')

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('website/js/jquery.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('website/js/bootstrap.js')}}"></script>
@yield('footer')
</body>
</html>
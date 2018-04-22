<!--
    Webgardi 24 Exclusive CMS ver 1.0
    By :     Saeed Rahimi Manesh
    Web :    Https://RahimiManesh.com
    Mobile : +98 919 335 0901
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WebGardi24 - @yield('pagetitle')</title>

    <link href="{{asset('dashboard/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/css/styles.css')}}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <script src='{{asset('js/tinymce/tinymce.min.js')}}'></script>
    @yield('headmeta')

    <!--Theme Switcher-->
    <style id="hide-theme">
        body{
            display:none;
        }
    </style>
    <script type="text/javascript">
        function setTheme(name){
            var theme = document.getElementById('theme-css');
            var style = 'css/theme-' + name + '.css';
            if(theme){
                theme.setAttribute('href', style);
            } else {
                var head = document.getElementsByTagName('head')[0];
                theme = document.createElement("link");
                theme.setAttribute('rel', 'stylesheet');
                theme.setAttribute('href', style);
                theme.setAttribute('id', 'theme-css');
                head.appendChild(theme);
            }
            window.localStorage.setItem('lumino-theme', name);
        }
        var selectedTheme = window.localStorage.getItem('lumino-theme');
        if(selectedTheme) {
            setTheme(selectedTheme);
        }
        window.setTimeout(function(){
            var el = document.getElementById('hide-theme');
            el.parentNode.removeChild(el);
        }, 5);
    </script>
    <!-- End Theme Switcher -->


    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('dashboard/js/html5shiv.js')}}"></script>
    <script src="{{asset('dashboard/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="#"><span>Web</span>Gardi24<span>.com</span></a>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-envelope"></em><span class="label label-info">15</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="images/profile-pic-2.jpg" width="40">
                                </a>
                                <div class="message-body"><small class="pull-right">3 mins ago</small>
                                    <a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
                                    <br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="images/profile-pic-1.jpg" width="40">
                                </a>
                                <div class="message-body"><small class="pull-right">1 hour ago</small>
                                    <a href="#">New message from <strong>Jane Doe</strong>.</a>
                                    <br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="all-button"><a href="#">
                                    <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                                </a></div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-bell"></em><span class="label label-primary">5</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li><a href="#">
                                <div><em class="fa fa-envelope"></em> 1 New Message
                                    <span class="pull-right text-muted small">3 mins ago</span></div>
                            </a></li>
                        <li class="divider"></li>
                        <li><a href="#">
                                <div><em class="fa fa-heart"></em> 12 New Likes
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                        <li class="divider"></li>
                        <li><a href="#">
                                <div><em class="fa fa-user"></em> 5 New Followers
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div><!-- /.container-fluid -->
</nav>
@include('dashboard.sidebar')
<!--/.sidebar-->

<div class="col-sm-10 main rtl">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">
                @yield('breadcumb')
            </li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">@yield('pagetitle')</h1>
        </div>
    </div><!--/.row-->
    @include('partiuals.success')
    @yield('content')
</div>	<!--/.main-->

<script src="{{asset('dashboard/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script>
<script src="{{asset('dashboard/js/chart.min.js')}}"></script>
<script src="{{asset('dashboard/js/chart-data.js')}}"></script>
<script src="{{asset('dashboard/js/easypiechart.js')}}"></script>
<script src="{{asset('dashboard/js/easypiechart-data.js')}}"></script>
<script src="{{asset('dashboard/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('dashboard/js/custom.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#cateogries_list').select2();
    });
</script>

</body>
</html>
@extends('website.layout')

@section('header')
    <title>وبگردی 24 - صفحه اصلی</title>
@endsection

@section('content')
    @include('website.header')
    <div class="container">
        <section class="tagsdiv">
            <ul class="nav ">
                @foreach($hottags as $hot)
                    <li><a href="{{env('APP_URL')}}/tags/{{str_replace(' ','-',$hot->name)}}" target="_blank" title="">#{{$hot->name}}</a></li>
                @endforeach
            </ul>
        </section>
        <div class="clearfix"></div>
        <section id="mostview">
            @foreach($mostviews as $mostview)
                <?php
                $rss = \App\Rss::find($mostview->rss_id);
                $tags = \App\Post::find($mostview->id)->tags;
                ?>
                <div class="col-md-3">
                    <div class="grid-item" style="/*! position: absolute; */ /*! left: 25.4962%; */ /*! top: 0px; */">
                        <div class="post-card link-card style2 custom-bg animate fadeIn animated" data-animate="fadeIn" data-duration="1.5s" data-delay="0.2s" style="background-image: url(&quot;http://waulah.uipro.net/wp-content/uploads/2017/09/pexels-photo-25998-580x620.jpg&quot;); animation-duration: 1.5s; animation-delay: 0.2s; visibility: visible; min-height: 350px;">
                            <div class="overlay" style="background-color:#000;"></div>
                            <header class="card-header">
                                <ul class="list-inline post-stats">
                                    {{--<li><i class="fa fa-eye"></i> {{$mostview->meta_value}}</li>--}}
                                </ul>
                            </header>
                            <div class="card-body">
                                <ul class="cat-list clearfix">
                                    @foreach($rss->categories as $category)
                                        <li><a class="cat-label" href="http://waulah.uipro.net/category/internet/" style="background-color:#8519b7;" title="{{$category->name}}">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                                <h3 class="link-url"><a target="_blank" href="{{route('posts.show',[$mostview->id])}}" title="{{$mostview->title}}" class="text-justify">{{$mostview->title}}</a></h3>

                            </div>
                            <footer class="card-footer">
                                <p class="no-margin">{{$mostview->created_at}}</p>
                            </footer>
                        </div>
                    </div>
                </div>
            @endforeach

        </section>
        <div class="clearfix"></div>
        <section id="homemenu" dir="rtl">
            <div class="col-md-1 col-xs-2">
                <a href="">
                    <i class="fa fa-4x fa-internet-explorer"></i>
                    <h2>وب و اینترنت</h2>
                </a>
            </div>
            <div class="col-md-1 col-xs-2">
                <a href="">
                    <i class="fa fa-4x fa-gamepad"></i>
                    <h2>بازی</h2>
                </a>
            </div>
            <div class="col-md-1 col-xs-2">
                <a href="">
                    <i class="fa fa-4x fa-camera"></i>
                    <h2>هنر دیجیتال</h2>
                </a>
            </div>
            <div class="col-md-1 col-xs-2">
                <a href="">
                    <i class="fa fa-4x fa-mobile-phone"></i>
                    <h2>موبایل و تبلت</h2>
                </a>
            </div>
            <div class="col-md-1 col-xs-2">
                <a href="">
                    <i class="fa fa-4x fa-laptop"></i>
                    <h2>لپ تاپ</h2>
                </a>
            </div>
            <div class="col-md-1 col-xs-2">
                <a href="">
                    <i class="fa fa-4x fa-car"></i>
                    <h2>خودرو</h2>
                </a>
            </div>
            <div class="col-md-1 col-xs-2">
                <a href="">
                    <i class="fa fa-4x fa-rocket"></i>
                    <h2>هوا و فضا</h2>
                </a>
            </div>
            <div class="col-md-1 col-xs-2">
                <a href="">
                    <i class="fa fa-4x fa-hospital-o"></i>
                    <h2>پزشکی</h2>
                </a>
            </div>
            <div class="col-md-1 col-xs-2">
                <a href="">
                    <i class="fa fa-4x fa-windows"></i>
                    <h2>نرم افزار</h2>
                </a>
            </div>
            <div class="col-md-1 col-xs-2">
                <a href="">
                    <i class="fa fa-4x fa-television"></i>
                    <h2>صوت و تصویر</h2>
                </a>
            </div>
            <div class="col-md-1 col-xs-2">
                <a href="">
                    <i class="fa fa-4x fa-share-square"></i>
                    <h2>شبکه های اجتماعی</h2>
                </a>
            </div>
            <div class="col-md-1 col-xs-2">
                <a href="">
                    <i class="fa fa-4x fa-newspaper-o"></i>
                    <h2>سیاسی</h2>
                </a>
            </div>
        </section>
    </div>
@endsection
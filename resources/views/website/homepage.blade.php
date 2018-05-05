@extends('website.layout')

@section('header')
    <title>وبگردی 24 - صفحه اصلی</title>
@endsection

@section('content')
    @include('website.header')
    <div class="container">
        @include('website.hottags')
        <div class="clearfix"></div>
        @include('website.homemostview')
        <div class="clearfix"></div>
        <section id="homemenu" dir="rtl">

            @foreach($menus as $menu)
                <div class="col-lg-1 col-md-1 col-xs-6 col-sm-2">
                    <a href="{{$menu->permalink}}">
                        <i class="{{$menu->icon}}"></i>
                        <h2>{{$menu->name}}</h2>
                    </a>
                </div>
            @endforeach



            {{--<div class="col-lg-1 col-md-1 col-xs-6 col-sm-2">--}}
                {{--<a href="">--}}
                    {{--<i class="fa fa-4x fa-internet-explorer"></i>--}}
                    {{--<h2>وب و اینترنت</h2>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-lg-1 col-md-1 col-xs-6 col-sm-2">--}}
                {{--<a href="">--}}
                    {{--<i class="fa fa-4x fa-gamepad"></i>--}}
                    {{--<h2>بازی</h2>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-lg-1 col-md-1 col-xs-6 col-sm-2">--}}
                {{--<a href="">--}}
                    {{--<i class="fa fa-4x fa-camera"></i>--}}
                    {{--<h2>هنر دیجیتال</h2>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-lg-1 col-md-1 col-xs-6 col-sm-2">--}}
                {{--<a href="">--}}
                    {{--<i class="fa fa-4x fa-mobile-phone"></i>--}}
                    {{--<h2>موبایل و تبلت</h2>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-lg-1 col-md-1 col-xs-6 col-sm-2">--}}
                {{--<a href="">--}}
                    {{--<i class="fa fa-4x fa-laptop"></i>--}}
                    {{--<h2>لپ تاپ</h2>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-lg-1 col-md-1 col-xs-6 col-sm-2">--}}
                {{--<a href="">--}}
                    {{--<i class="fa fa-4x fa-car"></i>--}}
                    {{--<h2>خودرو</h2>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-lg-1 col-md-1 col-xs-6 col-sm-2">--}}
                {{--<a href="">--}}
                    {{--<i class="fa fa-4x fa-rocket"></i>--}}
                    {{--<h2>هوا و فضا</h2>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-lg-1 col-md-1 col-xs-6 col-sm-2">--}}
                {{--<a href="">--}}
                    {{--<i class="fa fa-4x fa-hospital-o"></i>--}}
                    {{--<h2>پزشکی</h2>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-lg-1 col-md-1 col-xs-6 col-sm-2">--}}
                {{--<a href="">--}}
                    {{--<i class="fa fa-4x fa-windows"></i>--}}
                    {{--<h2>نرم افزار</h2>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-lg-1 col-md-1 col-xs-6 col-sm-2">--}}
                {{--<a href="">--}}
                    {{--<i class="fa fa-4x fa-television"></i>--}}
                    {{--<h2>صوت و تصویر</h2>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-lg-1 col-md-1 col-xs-6 col-sm-2">--}}
                {{--<a href="">--}}
                    {{--<i class="fa fa-4x fa-share-square"></i>--}}
                    {{--<h2>شبکه های اجتماعی</h2>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-lg-1 col-md-1 col-xs-6 col-sm-2">--}}
                {{--<a href="">--}}
                    {{--<i class="fa fa-4x fa-newspaper-o"></i>--}}
                    {{--<h2>سیاسی</h2>--}}
                {{--</a>--}}
            {{--</div>--}}
            <div class="clearfix"></div>
        </section>
        <div class="clearfix"></div>
        <section id="homemain">
            <div class="row">
                <div class="col-md-2">
                    @include('website.homesidebar')
                </div>
                <div class="col-md-10">
                    @foreach($homeboxes as $box)
                        <div class="col-md-6 padding5 right">
                            <div class="news_box right">
                                <div class="box_head right">
                                    <a title="اخبار {{$box->category->name}}" href="{{env('APP_URL')}}/category/{{$box->category->slug}}">اخبار {{$box->category->name}}</a>
                                </div>
                                <ul class="">
                                    <?php
                                        $RssCategory = \App\CategoryRss::where('category_id',$box->category->id)->get();
                                        if (count($RssCategory)>0){
                                            $RSSids=array();
                                            foreach ($RssCategory as $id){
                                                $RSSids[]=$id->rss_id;
                                            }
//                                            $posts = \App\Post::whereIn('rss_id',$RSSids)->orderBy('created_at','desc')->take(10)->get();
                                            $posts = \Illuminate\Support\Facades\Cache::remember('homebox-category-'.$box->category->id,1,function () use ($RSSids){
                                                return \App\Post::whereIn('rss_id',$RSSids)->orderBy('created_at','desc')->take(10)->get();
                                            });
                                        }
                                    ?>
                                    @if($posts)
                                        @foreach($posts as $post)
                                            <li>
                                                <a class="newstitle" href="{{env('APP_URL')}}/posts/{{$post->id}}" title="{{$post->title}}" target="_blank">{{$post->title}}</a>
                                                @if($post->post_type == 'rss')
                                                    <a href="" class="pull-left">{{\App\Rss::find($post->rss_id)->name}}</a>
                                                @endif
                                            </li>
                                        @endforeach
                                    @endif
                                    {{$posts=null}}
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="clearfix"></div>
            </div>
        </section>
    </div>
    @include('website.footer')
@endsection


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
        <div class="clreafix"></div>
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
                                    <a title="اخبار {{$box->category->name}}" href="اخبار-{{str_replace(' ','-',$box->category->name)}}">اخبار {{$box->category->name}}</a>
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
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="clearfix"></div>
            </div>
        </section>
    </div>
    <div class="clearfix"></div>
    <footer class="webfooter">
        <div class="container">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="innerfooter text-center">
                    <h2>وبگردی 24</h2>
                    <br>
                    <h3>نرم افزار جستجوگر وبگردی 24  دریچه ای به اخبار ایران</h3>
                    <br>
                    <p class="">ما را در شبکه های اجتماعی دنبال کنید</p>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="clearfix"></div>
        </div>
        <div class="jeg_footer_bottom">
            <div class="container">

                <div class="footer_right">
                    <ul class="jeg_menu_footer"><li id="menu-item-140739" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-140739"><a href="#">درباره ما</a></li>
                        <li id="menu-item-140740" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-140740"><a href="#">تماس با ما</a></li>
                        <li id="menu-item-140741" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-140741"><a href="#">تبلیغات</a></li>
                    </ul>
                </div>

                <p class="copyright">  کلیه حقوق مادی و معنوی برای&nbsp;<a href="{{env('APP_URL')}}" title="وبگردی 24">وبگردی 24</a>&nbsp;محفوظ است </p>

            </div>
        </div>
    </footer>
@endsection
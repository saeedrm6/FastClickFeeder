@extends('website.layout')

@section('header')
    <title>وبگردی 24 - آخرین اخبار {{$tagname}}</title>
    <meta name="description" content="لحظه به لحظه با آخرین اخبار {{$tagname}} - وبگردی 24"/>
    <meta property="keywords" content="{{$tagname}}">  <!-- Develop -->
    <meta name="ROBOTS" content="index,follow"/>
@endsection

@section('content')
    @include('website.header')
    <div class="container">
        @include('website.hottags')
        <div class="clearfix"></div>
        <section id="homemain">
            <div class="row">
                <div class="col-md-12 padding5 right">
                    <div class="news_box">
                        <div class="box_head right">
                            <a title="آخرین اخبار {{$tagname}}" href="">آخرین اخبار {{$tagname}}</a>
                        </div>
                        <ul class="">
                            @foreach($posts as $post)
                                <li>
                                    <a class="newstitle pull-right" href="{{env('APP_URL')}}/posts/{{$post->id}}" title="{{$post->title}}" target="_blank">{{$post->title}}</a>
                                    @if($post->post_type == 'rss')
                                        <a href="" class="pull-left">{{\App\Rss::find($post->rss_id)->name}}</a>
                                    @endif
                                    <span class="text-right ltr">{{\Morilog\Jalali\jDateTime::strftime('Y-m-d', strtotime(date('Y-m-d', strtotime($post->created_at))))}} ساعت : {{date('G:i',strtotime($post->created_at))}}</span>
                                    <?php
//                                    dd();
                                    ?>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{ $posts->links() }}
            </div>
        </section>
    </div>
    @include('website.footer')
@endsection
@extends('website.layout')
@section('header')
    <title>{{$post->title}} - وبگردی 24</title>
    <meta name="description" content="<?php echo strip_tags($post->excerpt);?>"/>
    <meta name="ROBOTS" content="index,follow"/>
    <meta property="og:site_name" content="وبگردی 24" />
    <meta property="og:title" content="{{$post->title}}" />
    <meta property="og:description" content="<?php echo strip_tags($post->excerpt);?>" />
    <meta property="og:url" content="posts/{{$post->id}}"/>
@endsection

@section('content')
    @include('website.header')
    <div class="container">
        <div class="clearfix"></div>
        <section id="homemain">
            <div class="row">
                <div class="col-md-12 padding5 right">
                    <div class="news_box">
                        <div class="box_head right">
                            <a title="" href="">{{$post->title}}</a>
                        </div>
                        <div class="inner">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('website.footer')
@endsection
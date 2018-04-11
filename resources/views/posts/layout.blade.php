<!--
    Webgardi 24 Exclusive CMS ver 1.0
    By :     Saeed Rahimi Manesh
    Web :    Https://RahimiManesh.com
    Mobile : +98 919 335 0901
-->
<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$post->title}}</title>
    <meta name="description" content="<?php echo strip_tags($post->excerpt);?>"/>
    <meta property="keywords" content="@foreach($post->tags as $tag),{{$tag->name}}@endforeach">  <!-- Develop -->
    <meta name="ROBOTS" content="index,follow"/>
    <meta property="og:site_name" content="وبگردی 24" />
    <meta property="og:title" content="{{$post->title}}" />
    <meta property="og:description" content="<?php echo strip_tags($post->excerpt);?>" />
    <meta property="og:url" content="posts/{{$post->id}}"/>
    <style>
        body{
            direction: rtl;
            font-family: Tahoma;
            font-size: 11px;
            color: #666;
            line-height: 15px;
            margin: 0px;
            padding: 0px;
            overflow: hidden;
        }
        #webgardi{
            width: 100%;
            overflow: visible;
            height: 100%;
            position: absolute;
        }
    </style>
</head>
<body>
    <iframe  id="webgardi" name="webgardi"   src="{{$post->permalink}}" style=""  ></iframe>
</body>
</html>
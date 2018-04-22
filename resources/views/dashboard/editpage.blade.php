@extends('dashboard.layout')

@section('pagetitle')
 ویرایش برگه : {{$post->title}}
@endsection

@section('breadcumb')
    ویرایش برگه : {{$post->title}}
@endsection

@section('headmeta')
    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor'
            ],
            a_plugin_option: true,
            a_configuration_option: 400,
            skin: 'lightgray',
            height: 450,


        });
    </script>
@endsection

@section('content')
    <form method="post" action="#" class="form-group">
        {{csrf_field()}}
        <div class="col-md-6">
            <select name="status" id="status" class="">
                <option value="publish" @if($post->status == 'publish') selected @endif>عمومی</option>
                <option value="inherit" @if($post->status == 'inherit') selected @endif>پیش نویس</option>
            </select>
            <input type="submit" class="btn btn-success" value="بروزرسانی">
        </div>
        <div class="col-md-6">
            <div class="form-inline">
                <div class="form-group col-md-12">
                    <div class="col-md-10">
                        <input type="text" value="{{$post->title}}" style="width: 100%;" name="title" id="title" class="form-control col-md-12">
                    </div>
                    <div class="col-md-2">
                        <label for="title" style="padding: 10px;">عنوان</label>
                    </div>
                    <a class="pull-left" dir="ltr" href="{{$post->permalink}}">{{$post->permalink}}</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <br>
        <textarea id="mytextarea" name="content" dir="rtl" class="text-right">{{$post->content}}</textarea>
    </form>
@endsection
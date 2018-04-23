@extends('dashboard.layout')

@section('pagetitle')
    برگه جدید
@endsection

@section('breadcumb')
    برگه جدید
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
    <form method="post" action="{{route('adminpanel.savepage')}}" class="form-group">
        {{csrf_field()}}
        <div class="col-md-6">
            <select name="status" id="status" class="">
                <option value="publish" selected>عمومی</option>
                <option value="inherit">پیش نویس</option>
            </select>
            <input type="submit" class="btn btn-primary" value="انتشار">
        </div>
        <div class="col-md-6">
            <div class="form-inline">
                <div class="form-group col-md-12">
                    <div class="col-md-10">
                        <input type="text" style="width: 100%;" name="title" id="title" class="form-control col-md-12">
                    </div>
                    <div class="col-md-2">
                        <label for="title" style="padding: 10px;">عنوان</label>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <br>
        <textarea id="mytextarea" name="content" dir="rtl" class="text-right"></textarea>
        <br>
        <label for="excerpt">چکیده مطلب</label>
        <textarea name="excerpt" id="excerpt" cols="30" rows="6" class="form-control"></textarea>
    </form>
@endsection
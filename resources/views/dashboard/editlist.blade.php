@extends('dashboard.layout')

@section('pagetitle')
    ویرایش لیست با نام : {{$list->name}}
@endsection

@section('breadcumb')
    ویرایش لیست با نام : {{$list->name}}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <form method="post" action="{{route('adminpanel.listupdate',['list_id'=>$list->id])}}">
                {{csrf_field()}}
                @method('PUT')
                <div class="form-group">
                    <strong>نام منو : {{$menu}}</strong>
                </div>
                <div class="form-group">
                    <label for="name">نام</label>
                    <input value="{{$list->name}}" type="text" class="form-control" id="name" name="name" placeholder="نام">
                </div>
                <div class="form-group">
                    <label for="permalink">لینک</label>
                    <input value="{{$list->permalink}}" type="text" class="form-control" id="permalink" name="permalink" placeholder="لینک">
                </div>
                <div class="form-group">
                    <label for="icon">آیکون</label>
                    <input value="{{$list->icon}}" type="text" class="form-control" id="icon" name="icon" placeholder="آیکون">
                    <i class="{{$list->icon}} pull-left"></i>
                </div>

                <div class="clearfix"></div>
                <button type="submit" class="btn btn-success">بروزرسانی</button>
                <a onclick="redirect('{{route('adminpanel.listdelete',['list_id'=>$list->id])}}');" class="btn btn-danger">حذف</a>
                <div class="clearfix"></div>
                <br>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    <script>
        function redirect(url) {
            var $response = confirm('آیا میخواهید این لیست را حذف نمایید؟');
            if ($response){
                window.location = url;
            }
        }
    </script>
@endsection
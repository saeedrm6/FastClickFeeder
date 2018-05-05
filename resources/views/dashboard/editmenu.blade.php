@extends('dashboard.layout')

@section('pagetitle')
    ویرایش لیست های منو : {{$menu->name}}
@endsection

@section('breadcumb')
    ویرایش لیست های منو : {{$menu->name}}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <form method="post" action="{{route('adminpanel.newlistofmenu',['id'=>$menu->id])}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">نام</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="نام">
                </div>
                <div class="form-group">
                    <label for="permalink">لینک</label>
                    <input type="text" class="form-control" id="permalink" name="permalink" placeholder="لینک">
                </div>
                <div class="form-group">
                    <label for="icon">آیکون</label>
                    <input type="text" class="form-control" id="icon" name="icon" placeholder="آیکون">
                </div>
                <div class="clearfix"></div>
                <input type="hidden" name="menuid" value="{{$menu->id}}">
                <button type="submit" class="btn btn-info">ذخیره</button>
                <div class="clearfix"></div>
                <br>
            </form>
        </div>
        <div class="clearfix"></div>
        <div class="bs-example" data-example-id="simple-table">
            <table class="table text-right rtl">
                <thead>
                <tr class="text-right rtl">
                    <th class="text-right rtl">نام</th>
                    <th class="text-right rtl">لینک</th>
                    <th class="text-right rtl">آیکون</th>
                    <th class="text-right rtl">ویرایش</th>
                    <th class="text-right rtl">وضعیت</th>
                </tr>
                </thead>

                <tbody>
                @foreach($lists as $list)
                    <tr>
                        <td>{{$list->name}}</td>
                        <td><a href="{{$list->permalink}}">لینک</a></td>
                        <td><i class="{{$list->icon}}"></i>&nbsp;<span>{{$list->icon}}</span></td>
                        <td><a href="{{route('adminpanel.listedit',['id'=>$menu->id,'list_id'=>$list->id])}}" class="btn btn-primary">ویرایش</a></td>
                        <td>
                            @switch($list->status)
                                @case('publish')
                                <a href="#" onclick="deactivepost({{$list->id}});" class="fa fa-check-circle text-success"></a>
                                @break
                                @case('inherit')
                                <a href="#" onclick="reactivepost({{$list->id}});" class="fa fa-window-close-o text-danger"></a>
                                @break
                            @endswitch
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function deactivepost(list_id) {
            var $response = confirm('آیا میخواهید این لینک را غیر فعال کنید؟');
            if ($response){
                deactiveform = document.forms['deactivepost'];
                deactiveform.elements["list_id"].value = list_id;
                document.getElementById('deactivepost').submit();
            }
        }

        function reactivepost(list_id) {
            var $response = confirm('آیا میخواهید این لینک را دوباره فعال کنید؟');
            if ($response){
                reactiveform = document.forms['reactivepost'];
                reactiveform.elements["list_id"].value = list_id;
                document.getElementById('reactivepost').submit();
            }
        }
    </script>
    <form id="deactivepost" action="{{route('listt.deactive')}}" method="post" style="display: none;">
        {{csrf_field()}}
        <input type="hidden" id="list_id" name="list_id" value="">
        <input type="submit">
    </form>
    <form id="reactivepost" action="{{route('listt.republish')}}" method="post" style="display: none;">
        {{csrf_field()}}
        <input type="hidden" name="list_id" id="list_id" value="">
        <input type="submit">
    </form>
@endsection
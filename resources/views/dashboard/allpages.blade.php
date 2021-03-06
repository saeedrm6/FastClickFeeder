@extends('dashboard.layout')

@section('pagetitle')
    همه ی برگه ها
@endsection

@section('breadcumb')
    همه ی برگه ها
@endsection

@section('content')
    <div class="col-md-12">
        <div class="bs-example" data-example-id="simple-table">
            <table class="table text-right rtl">
                <thead>
                <tr class="text-right rtl">
                    <th class="text-right rtl">عنوان</th>
                    <th class="text-right rtl">ویرایش</th>
                    <th class="text-right rtl">تاریخ</th>
                    <th class="text-right rtl">بازدید</th>
                    <th class="text-right rtl">پست تایپ</th>
                    <th class="text-right rtl">وضعیت</th>
                </tr>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td width="350"><a target="_blank" href="{{$post->permalink}}" title="{{$post->title}}">{{$post->title}}</a></td>
                        <td><a target="_blank" href="{{route('adminpanel.editpage',['id'=>$post->id])}}" class="btn btn-info">ویرایش</a></td>
                        <td>
                            {{\Morilog\Jalali\jDateTime::strftime('Y-m-d', strtotime(date('Y-m-d', strtotime($post->created_at))))}} ساعت : {{date('G:i',strtotime($post->created_at))}}
                        </td>
                        <td>{{$post->getview->meta_value}}</td>
                        <td>
                            @if($post->post_type == 'rss')
                                <p class="btn btn-danger text-danger">
                                    {{$post->post_type}}
                                </p>
                            @else
                                <p class="btn btn-success text-success">
                                    {{$post->post_type}}
                                </p>
                            @endif
                        </td>
                        <td>
                            @switch($post->status)
                                @case('publish')
                                <a href="#" onclick="deactivepost({{$post->id}});" class="fa fa-check-circle text-success"></a>
                                @break
                                @case('inherit')
                                <a href="#" onclick="reactivepost({{$post->id}});" class="fa fa-window-close-o text-danger"></a>
                                @break
                            @endswitch
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </div>
    <script>
        function deactivepost(postid) {
            var $response = confirm('آیا میخواهید این پست را غیر فعال کنید؟');
            if ($response){
                deactiveform = document.forms['deactivepost'];
                deactiveform.elements["postid"].value = postid;
                document.getElementById('deactivepost').submit();
            }
        }

        function reactivepost(postid) {
            var $response = confirm('آیا میخواهید این پست را دوباره فعال کنید؟');
            if ($response){
                reactiveform = document.forms['reactivepost'];
                reactiveform.elements["postid"].value = postid;
                document.getElementById('reactivepost').submit();
            }
        }
    </script>
    <form id="deactivepost" action="{{route('posts.deactive')}}" method="post" style="display: none;">
        {{csrf_field()}}
        <input type="hidden" id="postid" name="postid" value="">
        <input type="submit">
    </form>
    <form id="reactivepost" action="{{route('posts.republish')}}" method="post" style="display: none;">
        {{csrf_field()}}
        <input type="hidden" name="postid" id="postid" value="">
        <input type="submit">
    </form>
@endsection
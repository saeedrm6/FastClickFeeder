@extends('dashboard.layout')

@section('pagetitle')
    پست ها
@endsection

@section('breadcumb')
    پست ها
@endsection

@section('content')
<div class="col-md-12">
    <div class="bs-example" data-example-id="simple-table">
        <table class="table text-right rtl">
            <thead>
                <tr class="text-right rtl">
                    <th class="text-right rtl">عنوان</th>
                    <th class="text-right rtl">نام</th>
                    <th class="text-right rtl">برچسب ها</th>
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
                        @if($post->post_type == 'rss')
                            <td>
                                <?php
                                    $rss = $post->rss_id;
                                    $rss = \App\Rss::find($rss);
                                    echo $rss->name;
                                ?>
                            </td>
                        @endif
                        <td width="150">
                            @foreach($post->tags as $tag)
                                 {{$tag->name}},
                                @endforeach
                        </td>
                        <td>
                            {{$post->created_at}}
                        </td>
                        <td>0</td>
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
                            @if($post->status == 'publish')
                                <b class="text-success" style="font-size: 12px;">منتشر شده</b> &nbsp; <a href="#" onclick="deactivepost();" class="fa fa-window-close-o text-danger">
                                @else
                                    <b class="text-danger">معلق</b> &nbsp; <a href="#" onclick="republish();" class="fa fa-check-circle text-success">
                                    <script>
                                        function republish() {
                                            var $response = confirm('آیا میخواهید این پست را دوباره فعال کنید؟');
                                            if ($response){
                                                document.getElementById('republish').submit();
                                            }
                                        }
                                    </script>
                                            <form id="republish" action="{{route('posts.republish',[$post->id])}}" method="post" style="display: none;">
                                                {{csrf_field()}}
                                                <input type="hidden" name="postid" value="{{$post->id}}">
                                                <input type="submit">
                                            </form>
                                @endif
                                <script>
                                    function deactivepost() {
                                        var $response = confirm('آیا میخواهید این پست را غیر فعال کنید؟');
                                        if ($response){
                                            document.getElementById('deactivepost').submit();
                                        }
                                    }
                                </script>
                            </a>
                            <form id="deactivepost" action="{{route('posts.deactive',[$post->id])}}" method="post" style="display: none;">
                                {{csrf_field()}}
                                <input type="hidden" name="postid" value="{{$post->id}}">
                                <input type="submit">
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
</div>
@endsection
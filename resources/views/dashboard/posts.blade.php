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
                    <th class="text-right rtl">دسته ها</th>
                    <th class="text-right rtl">برچسب ها</th>
                    <th class="text-right rtl">تاریخ</th>
                    <th class="text-right rtl">پست تایپ</th>
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
                        <td>
                            {{$post->post_type}}
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
</div>
@endsection
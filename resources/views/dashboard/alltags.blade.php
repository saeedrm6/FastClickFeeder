@extends('dashboard.layout')

@section('pagetitle')
    تگ ها
@endsection

@section('breadcumb')
    تگ ها
@endsection

@section('content')
<div class="col-md-12">
    <div class="bs-example" data-example-id="simple-table">
        <table class="table text-right rtl">
            <thead>
                <tr class="text-right rtl">
                    <th class="text-right rtl">عنوان</th>
                    <th class="text-right rtl">لینک</th>
                </tr>
            </thead>

            <tbody>
                @foreach($alltags as $tag)
                    <tr>
                        <td>{{$tag->name}}</td>
                        <td class="text-left" dir="ltr"><a target="_blank" href="{{env('APP_URL')}}/tags/{{\App\myfunctions\strip_tag($tag->name)}}">{{env('APP_URL')}}/tags/{{\App\myfunctions\strip_tag($tag->name)}}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $alltags->links() }}
    </div>
</div>
@endsection
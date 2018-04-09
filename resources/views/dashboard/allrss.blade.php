@extends('dashboard.layout')

@section('pagetitle')
    همه ی فید ها
@endsection

@section('breadcumb')
    همه ی فید ها
@endsection

@section('content')
    <div class="col-md-12">
        <div class="bs-example" data-example-id="simple-table">
            <table class="table text-right rtl">
                <thead>
                    <tr class="text-right rtl">
                        <th class="text-right rtl">نام</th>
                        <th class="text-right rtl">Rss Url</th>
                        <th class="text-right rtl">وب سایت</th>
                        <th class="text-right rtl">دسته بندی ها</th>
                        <th class="text-right rtl">نام کاربر</th>
                        <th class="text-right rtl">تغییرات</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($allrss as $rss)
                        <tr>
                            <td>{{$rss->name}}</td>
                            <td>{{$rss->url}}</td>
                            <td>{{$rss->homepage}}</td>
                            <td>
                                @foreach($rss->categories as $catname)
                                    {{$catname->name}},
                                @endforeach
                            </td>
                            <td>{{$rss->user->name}}</td>
                            <td><a href="{{route('rss.edit',[$rss->id])}}" class="btn btn-primary">تغییر</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $allrss->links() }}
        </div>
    </div>
@endsection
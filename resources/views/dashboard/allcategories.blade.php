@extends('dashboard.layout')

@section('pagetitle')
    همه ی دسته بندی ها
@endsection

@section('breadcumb')
    همه ی دسته بندی ها
@endsection

@section('content')
    <div class="col-md-12">
        <div class="bs-example" data-example-id="simple-table">
            <table class="table text-right rtl">
                <thead>
                    <tr class="text-right rtl">
                        <th class="text-right rtl">نام</th>
                        <th class="text-right rtl">slug</th>
                        <th class="text-right rtl">تغییر</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td><a href="{{route('category.edit',[$category->id])}}" class="btn btn-primary">تغییر</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
@endsection
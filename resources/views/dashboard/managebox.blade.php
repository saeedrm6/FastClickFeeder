@extends('dashboard.layout')

@section('pagetitle')
  مدیریت باکس اخبار صفحه اصلی
@endsection

@section('breadcumb')
    مدیریت باکس اخبار صفحه اصلی
@endsection

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <td>نام دسته بندی اخبار</td>
                <td>الویت نمایش</td>
                <td>تغییر</td>
            </tr>
        </thead>
        <tbody>
            @foreach($allcategory as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>
                        @if($category->homebox == null)
                            <span class="text-danger">نمایش داده نشده</span>
                            @else
                            <span class="text-success">{{$category->homebox->periorty}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('adminpanel.managehomebox',['id'=>$category->id])}}" class="btn btn-primary">ویرایش</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@extends('dashboard.layout')
@section('pagetitle')
   دسته بندی جدید
@endsection

@section('breadcumb')
    دسته بندی جدید
@endsection


@include('partiuals.errors')
@include('partiuals.success')


@section('content')
    <div class="container">
        <div class="col-md-12">
            <form class="form-horizontal" method="post" action="{{route('category.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="نام">
                    </div>
                    <label for="inputEmail3" class="col-sm-2 control-label">نام</label>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                    </div>
                    <label for="inputPassword3" class="col-sm-2 control-label">Slug</label>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">ذخیره</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="clearfix"></div>
    </div>
    @endsection
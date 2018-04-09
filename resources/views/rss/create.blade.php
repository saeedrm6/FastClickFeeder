@extends('dashboard.layout')

@section('pagetitle')
   افزودن فید جدید
@endsection

@section('breadcumb')
    افزودن فید جدید
@endsection



@section('content')
    <div class="container">
        <br><br><br>
        @include('partiuals.errors')
        @include('partiuals.success')
        <div class="col-md-12">
            <div class="panel panel-info">

                <div class="panel-body">
                    <form method="post" action="{{route('rss.store')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="نام" value="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="url" placeholder="Rss URL" value=""  dir="ltr">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="homepage" placeholder="وب سایت" value=""  dir="ltr">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="logo" placeholder="Logo URL" value="" dir="ltr">
                        </div>
                        <div class="form-group">

                            <select name="categories[]" id="cateogries_list" title="categories" class="form-control" multiple="multiple">
                                @foreach($all as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <button type="submit" class="btn btn-success text-center">ذخیره</button>
                        <a class="btn btn-info" href="{{ url()->previous() }}">بازگشت</a>
                    </form>
                </div>
            </div>
        </div>


        <br><br><br>
    </div>
@endsection
@extends('dashboard.layout')

@section('pagetitle')
    مدیریت باکس اخبار {{$cat->name}}
@endsection

@section('breadcumb')
    مدیریت باکس اخبار {{$cat->name}}
@endsection

@section('content')
    <div class="col-md-5 pull-right">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">    مدیریت باکس اخبار {{$cat->name}}</h3>
            </div>
            <div class="panel-body">
                <form class="form-inline" method="post" action="{{route('adminpanel.managehomebox')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputName2">الویت نمایش</label>
                        <input type="number" class="form-control" id="periorty" name="periorty" placeholder="الویت نمایش" value="{{@$box->periorty}}">
                    </div>
                    <input type="hidden" name="cat_id" value="{{$cat->id}}">
                    <button type="submit" class="btn btn-default">ثبت تغییرات</button>
                </form>
            </div>
        </div>
    </div>
@endsection
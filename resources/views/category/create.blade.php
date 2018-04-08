@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8">
            <form class="form-horizontal" method="post" action="{{route('category.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Enter</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            @include('category.all_category')
        </div>
        <div class="clearfix"></div>
    </div>
    @endsection
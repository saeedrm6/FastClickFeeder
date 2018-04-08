@extends('layouts.app')

@section('content')
    <div class="container">
        <br><br><br>

        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">New RSS</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="{{route('rss.store')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="url" placeholder="Rss URL" value="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="homepage" placeholder="Home Page" value="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="logo" placeholder="Logo URL" value="">
                        </div>
                        <div class="form-group">

                            <select name="categories[]" id="cateogries_list" title="categories" class="form-control" multiple="multiple">
                                @foreach($all as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <button type="submit" class="btn btn-success text-center">Save</button>
                        <a class="btn btn-info" href="{{ url()->previous() }}">Back</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @include('category.all_category')
        </div>

        <br><br><br>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <br><br><br>

        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit : {{$rss->name}}</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="{{route('rss.update',[$rss->id])}}">
                        {{csrf_field()}}
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$rss->name}}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="url" placeholder="Rss URL" value="{{$rss->url}}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="homepage" placeholder="Home Page" value="{{$rss->homepage}}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="logo" placeholder="Logo URL" value="{{$rss->logo}}">
                        </div>
                        <div class="form-group">

                            <select name="categories[]" id="cateogries_list" title="categories" class="form-control" multiple="multiple">
                                @foreach($all as $category)
                                    <option
                                            @foreach($hercat as $scat)
                                                  @if($scat->id == $category->id)
                                                    selected
                                                    @endif
                                            @endforeach

                                            value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <input type="hidden" name="category_id" value="">
                        <button type="submit" class="btn btn-success text-center">Save</button>
                        <a class="btn btn-info" href="{{ url()->previous() }}">Back</a>
                        <a class="btn btn-danger" href="" onclick="deleterss()">Delete
                            <script>
                                function deleterss() {
                                    var $response = confirm('Do you want to Delete {{$rss->name}} ?');
                                    if($response){
                                        document.getElementById('deleterss').submit();
                                    }
                                }
                            </script>

                        </a>
                    </form>
                    <form id="deleterss" action="{{route('rss.destroy',[$rss->id])}}" method="post" style="display: none;">
                        {{csrf_field()}}
                        {!! method_field('delete') !!}
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
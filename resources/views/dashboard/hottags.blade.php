@extends('dashboard.layout')

@section('pagetitle')
    تگ های داغ
@endsection

@section('breadcumb')
    تگ های داغ
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-info">

            <div class="panel-body">
                <form method="post" action="{{route('adminpanel.savehottags')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <select name="hottags[]" id="cateogries_list" title="hottags" class="form-control" multiple="multiple">
                            @foreach($alltags as $tag)
                                <option
                                        @foreach($hottags as $hot)
                                            @if($hot->id == $tag->id)
                                            selected
                                            @endif
                                        @endforeach
                                        value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success text-center">ذخیره</button>
                    <a class="btn btn-info" href="{{ url()->previous() }}">بازگشت</a>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('dashboard.layout')

@section('pagetitle')
    داشبورد
@endsection

@section('breadcumb')
    داشبورد
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>New Orders</h4>
                    <div class="easypiechart" id="easypiechart-blue" data-percent="92">
                        <span class="percent">92%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>تگ ها</h4>
                    <div class="easypiechart" id="easypiechart-orange" data-percent="{{$alltags}}">
                        <span class="percent">{{$alltags}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>فید ها</h4>
                    <div class="easypiechart" id="easypiechart-teal" data-percent="{{$allrss}}" >
                        <span class="percent">{{$allrss}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>پست ها</h4>
                    <div class="easypiechart" id="easypiechart-red" data-percent="{{$allposts}}">
                        <span class="percent">{{$allposts}}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="col-md-4 pull-right">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">بیشتر بازدید ها در 24 ساعت گذشته</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive table-striped">
                        <tbody>
                            <tr>
                                <td>عنوان</td>
                                <td>بازدید</td>
                            </tr>
                            @foreach($mostview as $view)
                                <tr>
                                    <td><a href="{{route('posts.show',[$view->post_id])}}">{{$view->title}}</a></td>
                                    <td>{{$view->meta_value}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="clearfix"></div>
    </div>
@endsection
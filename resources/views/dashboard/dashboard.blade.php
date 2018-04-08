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
                    <h4>نظر ها</h4>
                    <div class="easypiechart" id="easypiechart-orange" data-percent="65">
                        <span class="percent">65%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>فید ها</h4>
                    <div class="easypiechart" id="easypiechart-teal" >
                        <span class="percent">{{$allrss}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>پست ها</h4>
                    <div class="easypiechart" id="easypiechart-red" >
                        <span class="percent">{{$allposts}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
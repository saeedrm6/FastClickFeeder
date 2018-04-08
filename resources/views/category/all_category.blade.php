<div class="panel panel-primary rtl">
    <div class="panel-heading">
        <h3 class="panel-title pull-right">دسته بندی ها</h3>
        <a href="{{route('category.create')}}" class="glyphicon glyphicon-plus pull-left white"></a>
        <div class="clearfix"></div>
    </div>

    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked rtl">
            @foreach ($all as $cat)
                <li role="presentation"><a href="{{route('category.edit',[$cat->id])}}">{{$cat->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
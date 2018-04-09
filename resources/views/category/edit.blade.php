@extends('dashboard.layout')

@section('pagetitle')
    تغییر دسته بندی
@endsection

@section('breadcumb')
    تغییر دسته بندی
@endsection





@section('content')
    @include('partiuals.errors')
    @include('partiuals.success')
    <div class="container">
        <div class="col-md-12">
            <form class="form-horizontal" method="post" action="{{route('category.update',[$category->id])}}">
                {{csrf_field()}}
                @method('PUT')
                <div class="form-group rtl text-right">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$category->name}}">
                    </div>
                    <label for="inputEmail3" class="col-sm-2 control-label">نام</label>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{$category->slug}}">
                    </div>
                    <label for="inputPassword3" class="col-sm-2 control-label">Slug</label>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">ثبت تغییرات</button>
                        <a onclick="deletecategory();" class="btn btn-danger">حذف
                            <script>
                                function deletecategory() {
                                    var $response = confirm('آیا میخواهید دسته بندی {{$category->name}} را حذف کنید ? \nاخطار: تمامی فید های این دسته بندی پاک خواهد شد!');
                                    if ($response){
                                        document.getElementById('deletecategory').submit();
                                    }
                                }
                            </script>
                        </a>

                    </div>
                </div>
            </form>

            <form id="deletecategory" action="{{route('category.destroy',[$category->id])}}" method="post" style="display: none;">
                {{csrf_field()}}
                {!! method_field('delete') !!}
            </form>
            <div class="clearfix"></div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> فید های دسته بندی : {{$category->name}}</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="{{route('category.add_rss',$category->id)}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="نام" dir="rtl">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="url" placeholder="Rss URL" dir="ltr">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="homepage" placeholder="وب سایت">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="logo" placeholder="Logo URL" dir="ltr">
                        </div>
                        <input type="hidden" name="category_id" value="{{$category->id}}">
                        <button type="submit" class="btn btn-success text-center">ذخیره</button>
                    </form>
                    <br><br>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">نام</th>
                                <th>RSS URL</th>
                                <th>وب سایت</th>
                                <th class="text-center">نماد</th>
                                <th class="text-danger text-center">تغییرات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 1 ?>
                            @foreach($rsses as $rss)
                                <tr>
                                    <th scope="row">{{$counter++}}</th>
                                    <td  class="text-center" dir="rtl">{{$rss->name}}</td>
                                    <td dir="ltr">{{$rss->url}}</td>
                                    <td dir="ltr">{{$rss->homepage}}</td>
                                    <td style="text-align: center;"><img style="width: 40%; display: block; margin: 0 auto;" src="{{$rss->logo}}" alt="" class="img-responsive img-circle"></td>
                                    <td class="text-center"><a href="{{route('rss.edit',[$rss->id])}}" class="btn btn-danger">تغییر</a></td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
    @endsection
<section id="mostview">
    @foreach($mostviews as $mostview)
        <?php
        $rss = \App\Rss::find($mostview->rss_id);
        $tags = \App\Post::find($mostview->id)->tags;
        ?>
        <div class="col-md-3">
            <div class="grid-item" style="/*! position: absolute; */ /*! left: 25.4962%; */ /*! top: 0px; */">
                <div class="post-card link-card style2 custom-bg animate fadeIn animated" data-animate="fadeIn" data-duration="1.5s" data-delay="0.2s" style="background-image: url(&quot;http://waulah.uipro.net/wp-content/uploads/2017/09/pexels-photo-25998-580x620.jpg&quot;); animation-duration: 1.5s; animation-delay: 0.2s; visibility: visible; min-height: 350px;">
                    <div class="overlay" style="background-color:#000;"></div>
                    <header class="card-header">
                        <ul class="list-inline post-stats">
                            {{--<li><i class="fa fa-eye"></i> {{$mostview->meta_value}}</li>--}}
                        </ul>
                    </header>
                    <div class="card-body">
                        <ul class="cat-list clearfix">
                            @foreach($rss->categories as $category)
                                <li><a class="cat-label" href="http://waulah.uipro.net/category/internet/" style="background-color:#8519b7;" title="{{$category->name}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                        <h3 class="link-url"><a target="_blank" href="{{route('posts.show',[$mostview->id])}}" title="{{$mostview->title}}" class="text-justify">{{$mostview->title}}</a></h3>

                    </div>
                    <footer class="card-footer">
                        <p class="no-margin">{{\Morilog\Jalali\jDateTime::strftime('Y-m-d', strtotime(date('Y-m-d', strtotime($mostview->created_at))))}} ساعت : {{date('G:i',strtotime($mostview->created_at))}}</p>
                    </footer>
                </div>
            </div>
        </div>
    @endforeach

</section>
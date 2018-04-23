<section id="mostview">
    <?php
        $colors = array('#ff5252','#227093','#485460','#ef5777');
    $counter = 0;
    ?>
    @foreach($mostviews as $mostview)
        <?php
        $rss = \App\Rss::find($mostview->rss_id);
        $tags = \App\Post::find($mostview->id)->tags;
        ?>
        <div class="col-md-3">
            <div class="grid-item" style="/*! position: absolute; */ /*! left: 25.4962%; */ /*! top: 0px; */">
                <div class="post-card link-card style2 custom-bg animate fadeIn animated" data-animate="fadeIn" data-duration="1.5s" data-delay="0.2s" style="background-image: url(&quot;http://waulah.uipro.net/wp-content/uploads/2017/09/pexels-photo-25998-580x620.jpg&quot;); animation-duration: 1.5s; animation-delay: 0.2s; visibility: visible; min-height: 350px;">
                    <div class="overlay" style="background-color:<?php echo $colors[$counter];?>;"></div>
                    <header class="card-header">
                        <ul class="list-inline post-stats">
                            {{--<li><i class="fa fa-eye"></i> {{$mostview->meta_value}}</li>--}}
                        </ul>
                    </header>
                    <div class="card-body">
                        <ul class="cat-list clearfix">
                            @foreach($rss->categories as $category)
                                <li><a class="cat-label" href="http://waulah.uipro.net/category/internet/" style="background-color:#808e9b; padding: 2px;" title="{{$category->name}}">{{$category->name}}</a></li>
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
        <?php
                $counter++;
        ?>
    @endforeach

</section>
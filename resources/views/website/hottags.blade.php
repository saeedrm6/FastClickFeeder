<section class="tagsdiv">
    <ul class="nav ">
        @foreach($hottags as $hot)
            <li><a href="{{env('APP_URL')}}/tags/{{str_replace(' ','-',$hot->name)}}" target="_blank" title="">#{{$hot->name}}</a></li>
        @endforeach
    </ul>
</section>
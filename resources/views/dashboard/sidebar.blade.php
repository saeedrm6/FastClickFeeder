<div id="sidebar-collapse" class="col-sm-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="{{asset('dashboard/images/profile.png')}}"  class="img-responsive text-center" alt="">
        </div>
        <div class="profile-usertitle rtl text-right">
            <div class="profile-usertitle-name">{{ Auth::user()->name }}</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>آنلاین</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li {{{ (Request::is('adminpanel') ? 'class=active' : '') }}}><a href="{{route('adminpanel.index')}}"><em class="fa fa-dashboard">&nbsp;</em> داشبورد</a></li>
        <li {{{ (Request::is('adminpanel/posts') ? 'class=active parent' : 'parent') }}}>
            <a data-toggle="collapse" href="#sub-item-1" class="collapsed" aria-expanded="false">
                <em class="fa fa-navicon">&nbsp;</em> پست ها <span data-toggle="collapse" href="#sub-item-1" class="icon pull-left collapsed" aria-expanded="false"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1" aria-expanded="false" style="height: 0px;">
                <li>
                    <a class="" href="{{route('adminpanel.posts')}}">
                        <span class="fa fa-arrow-left">&nbsp;</span> همه ی پست ها
                    </a>
                </li>
                <li>
                    <a class="" href="">
                        <span class="fa fa-arrow-left">&nbsp;</span> افزودن پست
                    </a>
                </li>
            </ul>
        </li>
        <li {{{ (Request::is('adminpanel/category') ? 'class=active parent' : 'parent') }}}>
            <a data-toggle="collapse" href="#sub-item-2" class="collapsed" aria-expanded="false">
                <em class="fa fa-table">&nbsp;</em> دسته بندی ها <span data-toggle="collapse" href="#sub-item-2" class="icon pull-left collapsed" aria-expanded="false"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-2" aria-expanded="false" style="height: 0px;">
                <li>
                    <a class="" href="{{route('adminpanel.categories')}}">
                        <span class="fa fa-arrow-left">&nbsp;</span> همه ی دسته بندی ها
                    </a>
                </li>
                <li>
                    <a class="" href="{{route('category.create')}}">
                        <span class="fa fa-arrow-left">&nbsp;</span> افزودن دسته بندی
                    </a>
                </li>
            </ul>
        </li>


        <li {{{ (Request::is('adminpanel/rss') ? 'class=active parent' : 'parent') }}}>
            <a data-toggle="collapse" href="#sub-item-3" class="collapsed" aria-expanded="false">
                <em class="fa fa-bar-chart-o">&nbsp;</em> فید ها <span data-toggle="collapse" href="#sub-item-3" class="icon pull-left collapsed" aria-expanded="false"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-3" aria-expanded="false" style="height: 0px;">
                <li>
                    <a class="" href="{{route('adminpanel.rss')}}">
                        <span class="fa fa-arrow-left">&nbsp;</span> همه ی فید ها
                    </a>
                </li>
                <li>
                    <a class="" href="{{route('rss.create')}}">
                        <span class="fa fa-arrow-left">&nbsp;</span> افزودن فید
                    </a>
                </li>
            </ul>
        </li>

        <li {{{ (Request::is('adminpanel/tags') ? 'class=active parent' : 'parent') }}}>
            <a data-toggle="collapse" href="#sub-item-4" class="collapsed" aria-expanded="false">
                <em class="fa fa-tags">&nbsp;</em> تگ ها <span data-toggle="collapse" href="#sub-item-4" class="icon pull-left collapsed" aria-expanded="false"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-4" aria-expanded="false" style="height: 0px;">
                <li>
                    <a class="" href="{{route('adminpanel.tags')}}">
                        <span class="fa fa-arrow-left">&nbsp;</span> همه ی تگ ها
                    </a>
                </li>
                <li>
                    <a class="" href="{{route('rss.create')}}">
                        <span class="fa fa-arrow-left">&nbsp;</span> افزودن تگ
                    </a>
                </li>
                <li>
                    <a class="" href="{{route('adminpanel.hottags')}}">
                        <span class="fa fa-arrow-left">&nbsp;</span>مدیریت تگ های صفحه ای
                    </a>
                </li>
            </ul>
        </li>

        <li {{{ (Request::is('adminpanel/homepage/homebox') ? 'class=active parent' : 'parent') }}}>
            <a data-toggle="collapse" href="#sub-item-5" class="collapsed" aria-expanded="false">
                <em class="fa fa-street-view">&nbsp;</em> مدیریت نمایش <span data-toggle="collapse" href="#sub-item-5" class="icon pull-left collapsed" aria-expanded="false"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-5" aria-expanded="false" style="height: 0px;">
                <li>
                    <a class="" href="{{route('adminpanel.managehomebox')}}">
                        <span class="fa fa-arrow-left">&nbsp;</span>باکس اخبار صفحه اصلی
                    </a>
                </li>
            </ul>
        </li>

        <li {{{ (Request::is('adminpanel/pages/') ? 'class=active parent' : 'parent') }}}>
            <a data-toggle="collapse" href="#sub-item-6" class="collapsed" aria-expanded="false">
                <em class="fa fa-file">&nbsp;</em> برگه ها <span data-toggle="collapse" href="#sub-item-6" class="icon pull-left collapsed" aria-expanded="false"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-6" aria-expanded="false" style="height: 0px;">
                <li>
                    <a class="" href="{{route('adminpanel.allpages')}}">
                        <span class="fa fa-arrow-left">&nbsp;</span>همه ی برگه ها
                    </a>
                </li>
                <li>
                    <a class="" href="{{route('adminpanel.newpage')}}">
                        <span class="fa fa-arrow-left">&nbsp;</span>افزودن برگه
                    </a>
                </li>
            </ul>
        </li>

        <li><a href=""><em class="fa fa-money">&nbsp;</em> امور مالی</a></li>
        <li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><em class="fa fa-sign-out">&nbsp;</em> خروج</a></li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</div>
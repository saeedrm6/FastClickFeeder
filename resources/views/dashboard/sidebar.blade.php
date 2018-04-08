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
                    <a class="" href="#">
                        <span class="fa fa-arrow-left">&nbsp;</span> افزودن پست
                    </a>
                </li>
            </ul>
        </li>
        <li {{{ (Request::is('adminpanel/category') ? 'class=active parent' : 'parent') }}}>
            <a data-toggle="collapse" href="#sub-item-2" class="collapsed" aria-expanded="false">
                <em class="fa fa-navicon">&nbsp;</em> دسته بندی ها <span data-toggle="collapse" href="#sub-item-2" class="icon pull-left collapsed" aria-expanded="false"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-2" aria-expanded="false" style="height: 0px;">
                <li>
                    <a class="" href="{{route('adminpanel.categories')}}">
                        <span class="fa fa-arrow-left">&nbsp;</span> همه ی دسته بندی ها
                    </a>
                </li>
                <li>
                    <a class="" href="#">
                        <span class="fa fa-arrow-left">&nbsp;</span> افزودن دسته بندی
                    </a>
                </li>
            </ul>
        </li>

        <li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> فید ها</a></li>

        <li><a href="buttons.html"><em class="fa fa-hand-pointer-o">&nbsp;</em> Buttons</a></li>
        <li><a href="forms.html"><em class="fa fa-pencil-square-o">&nbsp;</em> Forms</a></li>
        <li><a href="tables.html"><em class="fa fa-table">&nbsp;</em> Tables</a></li>
        <li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
        <li><a href="icons.html"><em class="fa fa-star-o">&nbsp;</em> Icons</a></li>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-file-o">&nbsp;</em> Pages <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><i class="fa fa-plus"></i></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a class="" href="gallery.html">
                        Gallery
                    </a></li>
                <li><a class="" href="search.html">
                        Search
                    </a></li>
                <li><a class="" href="login.html">
                        Login
                    </a></li>
                <li><a class="" href="error.html">
                        Error 404
                    </a></li>
            </ul>
        </li>
    </ul>
</div>
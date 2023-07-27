<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                @if(Session::get('admin_page') == 'dashboard')
                    @php $active = "active" @endphp
                        @else
                    @php $active = "" @endphp
                @endif
                <li class="{{ $active }}">
                    <a href="{{ route('adminDashboard') }}"><i class="la la-dashboard"></i> <span> Dashboard</span></a>
                </li>
                @if(Session::get('admin_page') == 'category')
                    @php $active = "active" @endphp
                        @else
                    @php $active = "" @endphp
                @endif
                <li class="{{ $active }}">
                    <a href="{{ route('category.index') }}"><i class="la la-cube"></i> <span> Categories</span></a>
                </li>
                @if(Session::get('admin_page') == 'thesis')
                    @php $active = "active" @endphp
                        @else
                    @php $active = "" @endphp
                @endif
                <li class="{{$active}}">
                    <a href="{{route('thesis.index')}}"><i class="la la-file-pdf-o"></i> <span>Thesis</span></a>
                </li>
                @if(Session::get('admin_page') == 'blogs')
                    @php $active = "active" @endphp
                        @else
                    @php $active = "" @endphp
                @endif
                <li class="{{$active}}">
                    <a href="{{route('blog.index')}}"><i class="la la-edit"></i> <span>Blogs</span></a>
                </li>
                @if(Session::get('admin_page') == 'notices')
                    @php $active = "active" @endphp
                        @else
                    @php $active = "" @endphp
                @endif
                <li class="{{$active}}">
                    <a href="{{route('notice.index')}}"><i class="la la-bullhorn"></i> <span>Notices</span></a>
                </li>
                @if(Session::get('admin_page') == 'news')
                    @php $active = "active" @endphp
                        @else
                    @php $active = "" @endphp
                @endif
                <li class="{{$active}}">
                    <a href="{{route('news.index')}}"><i class="la la-briefcase"></i> <span>News</span></a>
                </li>
                @if(Session::get('admin_page') == 'about')
                    @php $active = "active" @endphp
                        @else
                    @php $active = "" @endphp
                @endif
                <li class="{{$active}}">
                    <a href="{{route('about.index')}}"><i class="la la-question"></i> <span>About</span></a>
                </li>
                @if(Session::get('admin_page') == 'policy')
                    @php $active = "active" @endphp
                        @else
                    @php $active = "" @endphp
                @endif
                <li class="{{$active}}">
                    <a href="{{route('policy.index')}}"><i class="la la-file-text"></i> <span>Privacy Policy</span></a>
                </li>
                <li class="menu-title">
                    <span>Settings</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-gears"></i> <span>Site Setting</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        @if(Session::get('admin_page') == 'info')
                            @php $active = "active" @endphp
                                @else
                            @php $active = "" @endphp
                        @endif
                        <li class="{{$active}}"><a href="{{route('info.index')}}">Info</a></li>
                        @if(Session::get('admin_page') == 'contact')
                            @php $active = "active" @endphp
                                @else
                            @php $active = "" @endphp
                        @endif
                        <li class="{{$active}}"><a href="{{route('contact.index')}}">Contact</a></li>
                        @if(Session::get('admin_page') == 'socialmedia')
                            @php $active = "active" @endphp
                                @else
                            @php $active = "" @endphp
                        @endif
                        <li class="{{$active}}"><a href="{{route('socialmedia.index')}}">Social Media</a></li>
                        @if(Session::get('admin_page') == 'theme')
                            @php $active = "active" @endphp
                                @else
                            @php $active = "" @endphp
                        @endif
                        <li class="{{$active}}"><a href="{{route('theme.index')}}">Theme Settings</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->

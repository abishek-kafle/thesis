  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        @php
            $theme = \App\Models\Theme::orderBy('id', 'desc')->first();
        @endphp
        <div class="logo mr-auto">
            <a href="{{route('front.index')}}"><img src="{{asset('uploads/themes/'.$theme->logo)}}" class="img-responsive"></a>
        </div>
        <div class="d-none d-sm-block">
            <h2 class="logo"><a href="{{route('front.index')}}">ProjectInsights</a></h2>
        </div>



      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="{{ (strcmp(Route::currentRouteName() , 'front.index') == 0 ) ? 'active' : '' }}"><a href="{{route('front.index')}}">Home</a></li>
          <li class="{{ (strcmp(Route::currentRouteName() , 'front.about') == 0 ) ? 'active' : '' }}"><a href="{{route('front.about')}}">About</a></li>
          <li class="{{ (strcmp(Route::currentRouteName() , 'front.blog') == 0 ) ? 'active' : '' }}"><a href="{{route('front.blog')}}">Blogs</a></li>
          <li class="{{ (strcmp(Route::currentRouteName() , 'front.news') == 0 ) ? 'active' : '' }}"><a href="{{route('front.news')}}">News</a></li>
          <li class="{{ (strcmp(Route::currentRouteName() , 'front.notice') == 0 ) ? 'active' : '' }}"><a href="{{route('front.notice')}}">Notices</a></li>
          <li class="drop-down"><a href="">Categories</a>
            @php
                $categories = \App\Models\Category::all();
            @endphp
            <ul>
                @foreach ($categories as $category)
                    <li><a href="{{route('front.thesis',$category->slug)}}">{{$category->title}}</a></li>
                @endforeach
            </ul>
          </li>
          <li class="{{ (strcmp(Route::currentRouteName() , 'front.policy') == 0 ) ? 'active' : '' }}"><a href="{{route('front.policy')}}">Privacy Policy</a></li>
          <li class="{{ (strcmp(Route::currentRouteName() , 'front.contact') == 0 ) ? 'active' : '' }}"><a href="{{route('front.contact')}}">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->

<nav class="navbar navbar-expand-md navbar-light navbar-laravel tab-content">
    
    <!-- 左側選單按鈕 -->    
    <button class="btn btn-menu text-primary" type="button">
        <i class="fas fa-bars"></i>
    </button>

    <!-- LOGO --> 
    <a class="navbar-brand font-weight-bold text-primary ml-3" href="{{ route('user.okr', auth()->user()->id) }}">
        <img src="{{ asset('/img/logo/g.svg') }}" alt="">
        Goal Care
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto"> 
            <form class="form-inline mr-5" action="{{route('search.index', auth()->user()->id) }}">
                @csrf
                <input class="form-control mr-sm-1 search" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-search my-2 my-sm-0" type="submit" ><i class="fas fa-search"></i></button>
            </form>
            <li class="nav-item active">
                <a class="nav-link text-muted" href="#"><i class="fas fa-bell"></i><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active pl-3">
                <a href="{{ route('user.okr', auth()->user()->id) }}"><img src="{{ auth()->user()->getAvatar() }}" class="avatar"></a>
            </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>     
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user.settings', auth()->user()->id) }}">帳號設定</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        登出
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('dashboard')}}">
                    <img class="brand-logo" alt="{{$setting['site_name']}}" src="{{ URL::asset('uploads/setting_images/'.$setting['site_logo']) }}">
                        <h3 class="brand-text">{{$setting['site_name']}}</h3>
                    </a></li>
                <li class="nav-item d-none d-lg-block nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
                <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="material-icons mt-50">more_vert</i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1 user-name text-bold-700">{{ auth()->user()->name }}</span>
                            <span class="avatar avatar-online">
                                <img src="{{ auth()->user()->image_path }}" alt="{{ auth()->user()->name }}">
                                <i></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="user-profile.html">
                                <i class="material-icons">person_outline</i> الصفحة الشخصية
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('log-out').submit();">
                            <i class="material-icons">power_settings_new</i>
                                تسجيل الخروج
                            </a>
                        </div>
                    </li>
                    <form id="log-out" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->
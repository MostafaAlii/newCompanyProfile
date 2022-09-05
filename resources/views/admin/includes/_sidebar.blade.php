<div class="main-menu material-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="user-profile">
        <div class="user-info text-center pb-2">
            <img class="user-img img-fluid rounded-circle w-25 mt-2" src="{{ asset('app-assets/images/portrait/small/avatar-s-1.png') }}" alt="" />
            <div class="name-wrapper d-block dropdown mt-1">
                <a class="white dropdown-toggle" id="user-account" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="user-name">{{ auth()->user()->name }}</span>
                </a>
                <div class="text-light">UX Designer</div>
                <div class="dropdown-menu arrow" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item">
                        <i class="material-icons align-middle mr-1">person</i>
                        <span class="align-middle">الصفحة الشخصية</span>
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('log-out').submit();">
                        <i class="material-icons align-middle mr-1">power_settings_new</i>
                        <span class="align-middle">تسجيل الخروج</span>
                    </a>
                    <form id="log-out" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <!-- Start Dashboard -->
            <li class=" nav-item">
                <a href="{{ route('dashboard') }}">
                    <i class="material-icons">settings_input_svideo</i>
                    <span class="menu-title" data-i18n="Dashboard">الرئيسية</span>
                </a>
            </li>
            <!-- End Dashboard -->

            <!-- Start Category -->
            <li class=" nav-item">
                <a href="{{ route('categories.index') }}">
                    <i class="icon-drawer"></i>
                    <span class="menu-title" data-i18n="Dashboard">الاقسام</span>
                </a>
            </li>
            <!-- End Category -->

            <!-- Start Project -->
            <li class=" nav-item">
                <a href="{{ route('projects.index') }}">
                    <i class="icon-puzzle"></i>
                    <span class="menu-title" data-i18n="Dashboard">المشاريع</span>
                </a>
            </li>
            <!-- End Project -->
        </ul>
    </div>
</div>
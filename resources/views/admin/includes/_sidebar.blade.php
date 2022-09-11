<div class="main-menu material-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="user-profile">
        <div class="user-info text-center pb-2">
            <img class="user-img img-fluid rounded-circle w-25 mt-2" src="{{ auth()->user()->image_path  }}" alt="{{ auth()->user()->name }}" />
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

            <!-- Start Users -->
            @if(auth()->user()->hasPermission('users_read'))
                <li class=" nav-item">
                    <a href="{{ route('users.index') }}">
                        <i class="icon-user-following"></i>
                        <span class="menu-title" data-i18n="Category">المستخدمين</span>
                        <span class="badge badge-success round"> {{ User::count() }} </span>
                    </a>
                </li>
            @endif
            <!-- End Users -->

            <!-- Start Category -->
            @if(auth()->user()->hasPermission('categories_read'))
                <li class=" nav-item">
                    <a href="{{ route('categories.index') }}">
                        <i class="icon-drawer"></i>
                        <span class="menu-title" data-i18n="Dashboard">الاقسام</span>
                    </a>
                </li>
            @endif
            <!-- End Category -->

            <!-- Start Project -->
            @if(auth()->user()->hasPermission('projects_read'))
                <li class=" nav-item">
                    <a href="{{ route('projects.index') }}">
                        <i class="icon-puzzle"></i>
                        <span class="menu-title" data-i18n="Dashboard">المشاريع</span>
                    </a>
                </li>
            @endif
            <!-- End Project -->
        </ul>
    </div>
</div>
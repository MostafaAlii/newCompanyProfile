<!-- Start Navbar Section -->
<header id="full_nav">
    <!-- Start header top -->
    <div class="header fixed-top">
        <!-- Start container -->
        <div class="container">
            <!-- Start Nav -->
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{route('home') }}">
                    @if(getSetting('site_logo') != null)
                        <img src="{{ URL::asset('uploads/setting_images/'.getSetting('site_logo')) }}" class="img-fluid" alt="{{ getSetting('site_name') . ' logo-img' }}">
                    @else
                        <img src="{{ URL::asset('uploads/setting_images/no_logo_found.png') }}" class="img-fluid" alt="banner">
                    @endif
                    {{getSetting('site_name')}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-stream navbar-toggler-icon"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    {{--<ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('home') }}">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">من نحن</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              خدماتنا
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                              <li><a class="dropdown-item" href="#">Another action</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">اتصل بنا</a>
                        </li>
                    </ul>--}}
                    <ul class="navbar-nav ms-auto">
                        {{-- use getMenu Helper function in forelse to get menu --}}
                        @forelse(getMenus() as $menu)
                            <li class="nav-item">
                                <a class="nav-link {{ $menu->id }}" href="{{ $menu->link }}">{{ $menu->name }}</a>
                            </li>
                        @empty
                            <li class="nav-item">
                                <a class="nav-link text-center text-danger">عفوا لا يوجد قوائم قم باضافة بعض القوائم من لوحة التحكم</a>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </nav>
            <!-- End Nav -->
        </div>
        <!-- End container -->
    </div>
    <!-- End header top -->
</header>
<!-- End Navbar Section -->
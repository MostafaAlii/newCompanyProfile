<section class="banner-wrapper wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 md-6 order-lg-1 order-2">
                <div>
                    <h2>{{ $primary->primary_title ?? '' }}<span><br class="d-none d-xl-block">{{ $primary->secondry_title ?? '' }}</span></h2>
                    <p>
                        {{ $primary->description ?? '' }}
                    </p>
                    <a href="#" class="btn main-btn mt-5">اقرأ المزيد</a>
                </div>
            </div>
            <div class="col-lg-6 md-5 order-lg-1 order-1">
                {{--@if($setting['site_home_banner'] != null)
                    <img src="{{ URL::asset('uploads/setting_images/'.$setting['site_home_banner']) }}" class="img-fluid" alt="{{ $setting['site_name'] . ' banner-img' }}">
                @else
                    <img src="{{ URL::asset('uploads/setting_images/no_banner_found.png') }}" class="img-fluid" alt="banner">
                @endif--}}
            </div>
        </div>
    </div>
</section>
<?php
namespace App\Providers;
use App\Models\{Setting,Page};
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Paginator::useBootstrapFive();
        /*view()->composer('*', function ($view) {
            $collection = Setting::all();
            $setting['setting'] = $collection->flatMap(function ($collection) {
                return [$collection->key => $collection->value];
            });
            $view->with($setting);
        });*/
    }
}

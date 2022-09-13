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
        view()->composer('*', function ($view) {
            $collection = Setting::all();
            $setting['setting'] = $collection->flatMap(function ($collection) {
                return [$collection->key => $collection->value];
            });
            $view->with($setting);
        });
        // share pages content from backent to frontend
        /*view()->composer('*', function ($view) {
            $pages = Page::whereStatus(1)->get();
            $view->with('pages', $pages);
        });
        // share primary page content from backent to frontend
        view()->composer('*', function ($view) {
            $primary = Page::primary()->first();
            $view->with('primary', $primary);
        });*/
        $pages = Page::whereStatus(1)->get();
        $primary = Page::primary()->first();
        view()->share('pages', $pages);
        view()->share('primary', $primary);
        

    }
}

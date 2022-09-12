<?php
namespace App\Http\Controllers\Frontend;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class WebsiteController extends Controller {
    public function __invoke() {
        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        return view('site.home', $setting);
    }
}

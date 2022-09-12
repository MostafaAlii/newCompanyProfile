<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
class DashboardController extends Controller {
    public function __invoke() {
        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        return view('admin.index', $setting);
    }
}

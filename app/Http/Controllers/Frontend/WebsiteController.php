<?php
namespace App\Http\Controllers\Frontend;
use App\Models\Menu;
use App\Http\Controllers\Controller;

class WebsiteController extends Controller {
    public function __invoke() {
        $menus = Menu::with('menu_info');
        return view('site.home' , compact('menus'));
    }
}
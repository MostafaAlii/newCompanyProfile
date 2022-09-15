<?php
use App\Models\{Menu,Setting};

if (!function_exists('getSetting')) {
    function getSetting($key) {
        $setting = Setting::where('key', $key)->first();
        return $setting->value;
    }
}

/*if (!function_exists('getMenus')) {
    function getMenus() {
        $menus = Menu::activeMenu()->orderBy('sorting')->get();
        return $menus;
    }
}*/


<?php
namespace App\Http\Controllers\Frontend;
use App\Models\Page;
use App\Http\Controllers\Controller;

class WebsiteController extends Controller {
    public function __invoke() {
        $pages = Page::whereStatus(1)->get();
        return view('site.home', compact('pages'));
    }
}

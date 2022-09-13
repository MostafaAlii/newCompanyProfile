<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
class WebsiteController extends Controller {
    public function __invoke() {
        return view('site.home');
    }
}

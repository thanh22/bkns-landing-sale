<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Information;
use App\Models\Promotion;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::where('active', ENABLE)->get()->first();
        $categories = Category::where('active', ENABLE)->get();
        $information = Information::find(ONE);
        $address = $information ? json_decode($information->address) : [];
        $socialNetworks = $information ? json_decode($information->social_networks) : [];
        $promotions = Promotion::where('active', ENABLE)->orderBy('position', 'ASC')->get();

        return view('app', compact(
            'banner',
            'categories',
            'information',
            'address',
            'socialNetworks',
            'promotions'
        ));
    }
}

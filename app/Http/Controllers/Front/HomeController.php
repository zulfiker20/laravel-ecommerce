<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Slider;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        $banners = Banner::latest()->get();
        $sliders = Slider::latest()->get();
       $products = Product::latest()->get(); 
        $banners = Banner::latest()->get();
        return view('front.index', compact('categories', 'banners', 'sliders', 'banners', 'products',));
    }
}

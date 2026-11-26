<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class FrontShopController extends Controller
{
    public function index(Request $request)
    {
        $totalProducts = Product::where('status', 'active')->count();

        $categories = Category::withCount('products')->get();

        // Fixed: blogs changed to brands
        $brands = Brand::withCount('products')->get();

        $query = Product::where('status', 'active');

        // Category Filter
        if ($request->filled('category')) {

            $catSlugs = explode(',', $request->category);

            $catIds = Category::whereIn('slug', $catSlugs)
                ->pluck('id');

            $query->whereIn('category_id', $catIds);
        }

        // Brand Filter
        if ($request->filled('brand')) {

            $brandSlugs = explode(',', $request->brand);

            $brandIds = Brand::whereIn('slug', $brandSlugs)
                ->pluck('id');

            $query->whereIn('brand_id', $brandIds);
        }

        $products = $query->latest()
            ->paginate(12)
            ->withQueryString();

        return view('front.shop.index', compact(
            'products',
            'totalProducts',
            'categories',
            'brands'
        ));
    }

public function filter(Request $request)
{
    $categories = $request->input('category', []);
    $brands = $request->input('brand', []);

    $url = '/shop?';

    if (!empty($categories)) {
        $url .= 'category=' . implode(',', $categories);
    }

    if (!empty($categories) && !empty($brands)) {
        $url .= '&';
    }

    if (!empty($brands)) {
        $url .= 'brand=' . implode(',', $brands);
    }

    return redirect($url);
}
}

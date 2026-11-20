<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MultiImg;


class ProductDetailController extends Controller
{
    public function ProductDetails($slug)
    {
        $product = Product::with(['brand', 'category', 'subcategory'])
            ->where('product_slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        // Related Products
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 'active')
            ->latest()
            ->take(8)
            ->get();

        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        $multiImage = MultiImg::where('product_id', $product->id)->get();
        return view('front.product.product_detail', compact(
            'product',
            'relatedProducts',
            'product_color',
            'product_size',
            'multiImage'
        ));
    }

    public function CategoryDetails($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $categories = Category::latest()->get();
        $newProduct = Product::orderBy('id', 'DESC')->limit(3)->get();

        $products = Product::where('category_id', $category->id)
            ->where('status', 'active')
            ->latest()
            ->paginate(12);

        return view('front.product.category_view', compact(
            'category',
            'products',
            'categories',
            'newProduct',
        ));
    }
    public function SubcategoryDetails($slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->firstOrFail();

        $categories = Category::latest()->get();

        $newProduct = Product::orderBy('id', 'DESC')
            ->limit(3)
            ->get();

        $products = Product::where('subcategory_id', $subcategory->id)
            ->where('status', 'active')
            ->latest()
            ->paginate(12);

        return view('front.product.subcategory_view', compact(
            'subcategory',
            'products',
            'categories',
            'newProduct'
        ));
    }
    public function ProductViewAjax($id)
    {

        $product = Product::with('category', 'brand')->findOrFail($id);
        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        return response()->json(array(

            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,

        ));
    } // End Method 
}

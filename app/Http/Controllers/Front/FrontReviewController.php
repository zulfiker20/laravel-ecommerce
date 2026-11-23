<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;

class FrontReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        Review::create([
            'product_id' => $product->id,
            'user_id'    => auth()->id(),
            'vendor_id'  => $product->vendor_id,
            'comment'    => $request->comment,
            'rating'     => 5,
            'status'     => 0,
        ]);

        return back()->with('success', 'Review submitted successfully!');
    }
}

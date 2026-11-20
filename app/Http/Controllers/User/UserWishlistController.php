<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use Carbon\Carbon;

class UserWishlistController extends Controller
{
    public function AddToWishList(Request $request, $product_id)
    {
        if (Auth::check()) {

            $exists = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $product_id)
                ->first();

            if (!$exists) {

                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                return response()->json([
                    'success' => 'Successfully Added To Your Wishlist'
                ]);
            } else {

                return response()->json([
                    'error' => 'This Product Is Already In Your Wishlist'
                ]);
            }
        } else {

            return response()->json([
                'error' => 'Please Login To Your Account First'
            ]);
        }
    }
    public function WishList()
    {

        return view('front.wishlist.index');
    } // En
}

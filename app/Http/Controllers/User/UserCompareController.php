<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compare;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserCompareController extends Controller
{
    public function AddToCompareList(Request $request, $product_id)
    {
        if (Auth::check()) {

            $exists = Compare::where('user_id', Auth::id())
                ->where('product_id', $product_id)
                ->first();

            if (!$exists) {

                Compare::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                return response()->json([
                    'success' => 'Successfully Added To Your Compare list'
                ]);
            } else {

                return response()->json([
                    'error' => 'This Product Is Already In Your Compare list'
                ]);
            }
        } else {

            return response()->json([
                'error' => 'Please Login To Your Account First'
            ]);
        }
    }
    public function compare()
    {

        return view('front.compare.index');
    }
}

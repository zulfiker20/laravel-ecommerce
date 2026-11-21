<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compare;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserCompareController extends Controller
{
    //     public function AddToCompareList(Request $request, $product_id)
    // {
    //     if (Auth::check()) {

    //         // Check duplicate product
    //         $exists = Compare::where('user_id', Auth::id())
    //             ->where('product_id', $product_id)
    //             ->first();

    //         if ($exists) {

    //             return response()->json([
    //                 'error' => 'This Product Is Already In Your Compare List'
    //             ]);
    //         }

    //         // Check maximum 3 products
    //         $compareCount = Compare::where('user_id', Auth::id())->count();

    //         if ($compareCount >= 3) {

    //             return response()->json([
    //                 'error' => 'You Can Compare Maximum 3 Products Only!'
    //             ]);
    //         }

    //         // Insert product
    //         Compare::insert([
    //             'user_id' => Auth::id(),
    //             'product_id' => $product_id,
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ]);

    //         return response()->json([
    //             'success' => 'Successfully Added To Your Compare List'
    //         ]);

    //     } else {

    //         return response()->json([
    //             'error' => 'Please Login To Your Account First'
    //         ]);
    //     }
    // }
    public function AddToCompareList(Request $request, $product_id)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Please Login To Your Account First']);
        }

        $userId = Auth::id();

        if (Compare::where('user_id', $userId)->where('product_id', $product_id)->exists()) {
            return response()->json(['error' => 'This Product Is Already In Your Compare List']);
        }

        if (Compare::where('user_id', $userId)->count() >= 3) {
            return response()->json(['error' => 'You Can Compare Maximum 3 Products Only!']);
        }

        Compare::create([
            'user_id' => $userId,
            'product_id' => $product_id,
        ]);

        return response()->json(['success' => 'Successfully Added To Your Compare List']);
    }
    public function compare()
    {
        return view('front.compare.index');
    }
    public function GetComparelistProduct()
    {

        $comparehlist = Compare::with('product')->where('user_id', Auth::id())->latest()->get();

        $compareQty = Compare::count();

        return response()->json(['comparehlist' => $comparehlist, 'compareQty' => $compareQty]);
    } // End Method

    public function comparelistRemove($id)
    {

        Compare::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Successfully Product Remove']);
    } // End Method
}

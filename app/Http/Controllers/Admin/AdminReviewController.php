<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class AdminReviewController extends Controller
{
    public function index()
    {
        $review = Review::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('admin.review.pending_review', compact('review'));
    } // End Method 

    public function ReviewApprove($id)
    {

        Review::where('id', $id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Review Approved Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 


    public function PublishReview()
    {

        $review = Review::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('admin.review.publish_review', compact('review'));
    } // End Method 

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        $review->delete();

        return redirect()
            ->route('review.publish')
            ->with('success', 'Review deleted successfully!');
    }
}

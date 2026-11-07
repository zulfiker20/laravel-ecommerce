<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class AdminCouponController extends Controller
{
    // Coupon List
    public function index()
    {
        $coupons = Coupon::latest()->get();

        return view('admin.coupon.index', compact('coupons'));
    }

    // Create Form
    public function create()
    {
        return view('admin.coupon.create');
    }

    // Store Coupon
    public function store(Request $request)
    {
        $validated = $request->validate([
            'coupon_name' => 'required|string|max:255',
            'coupon_discount' => 'required|integer|min:1|max:100',
            'coupon_validity' => 'required|string|max:255',
            'status' => 'required|integer|in:0,1',
        ]);

        $coupon = new Coupon();
        $coupon->fill($validated);
        $coupon->save();

        return redirect()
            ->route('admin.coupon.index')
            ->with('success', 'Coupon created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $coupon = Coupon::findOrFail($id);

        return view('admin.coupon.edit', compact('coupon'));
    }

    // Update Coupon
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'coupon_name' => 'required|string|max:255',
            'coupon_discount' => 'required|integer|min:1|max:100',
            'coupon_validity' => 'required|string|max:255',
            'status' => 'required|integer|in:0,1',
        ]);

        $coupon = Coupon::findOrFail($id);

        $coupon->fill($validated);
        $coupon->save();

        return redirect()
            ->route('admin.coupon.index')
            ->with('success', 'Coupon updated successfully.');
    }

    // Delete Coupon
    public function destroy(string $id)
    {
        $coupon = Coupon::findOrFail($id);

        $coupon->delete();

        return redirect()
            ->route('admin.coupon.index')
            ->with('success', 'Coupon deleted successfully.');
    }
}


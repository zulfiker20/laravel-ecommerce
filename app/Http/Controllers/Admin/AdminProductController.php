<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\MultiImg;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    // Product List
    public function index()
    {
        $products = Product::with([
            'brand',
            'category',
            'subcategory'
        ])->latest()->get();

        return view('admin.product.index', compact('products'));
    }

    // Create Form
    public function create()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();

        return view('admin.product.create', compact(
            'brands',
            'categories',
            'subcategories'
        ));
    }

    // Store Product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_id'          => 'nullable|exists:brands,id',
            'category_id'       => 'nullable|exists:categories,id',
            'subcategory_id'    => 'nullable|exists:sub_categories,id',
            'product_name'      => 'required|string|max:255',
            'product_code'      => 'nullable|string|max:255',
            'product_qty'       => 'nullable|integer',
            'product_tags'      => 'nullable|string|max:255',
            'product_size'      => 'nullable|string|max:255',
            'product_color'     => 'nullable|string|max:255',
            'selling_price'     => 'required|numeric',
            'discount_price'    => 'nullable|numeric',
            'short_descp'       => 'nullable|string',
            'long_descp'        => 'nullable|string',
            'product_thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'hot_deals'         => 'nullable',
            'featured'          => 'nullable',
            'special_offer'     => 'nullable',
            'special_deals'     => 'nullable',
        ]);

        if ($request->hasFile('product_thumbnail')) {
            $validated['product_thumbnail'] = $request->file('product_thumbnail')
                ->store('products/thumbnail', 'public');
        }

        $validated['product_slug'] = Str::slug($request->product_name);
        //    status active
        $validated['status'] = 'active';

        $product = new Product();
        $product->fill($validated);
        $product->save();

        // Multiple Image Upload (যদি মাল্টিপল ইমেজ থাকে)
        if ($request->hasFile('multi_img')) {
            foreach ($request->file('multi_img') as $img) {
                $uploadPath = $img->store('products/multi-image', 'public');

                MultiImg::create([
                    'product_id' => $product->id,
                    'photo_name' => $uploadPath,
                ]);
            }
        }

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Product created successfully.');
    }


    // Edit Form
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();

        return view('admin.product.edit', compact(
            'product',
            'brands',
            'categories',
            'subcategories'
        ));
    }

    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $validated = $request->validate([
        'brand_id'          => 'nullable|exists:brands,id',
        'category_id'       => 'nullable|exists:categories,id',
        'subcategory_id'    => 'nullable|exists:sub_categories,id',
        'product_name'      => 'required|string|max:255',
        'product_code'      => 'nullable|string|max:255',
        'product_qty'       => 'nullable|integer',
        'product_tags'      => 'nullable|string|max:255',
        'product_size'      => 'nullable|string|max:255',
        'product_color'     => 'nullable|string|max:255',
        'selling_price'     => 'required|numeric',
        'discount_price'    => 'nullable|numeric',
        'short_descp'       => 'nullable|string',
        'long_descp'        => 'nullable|string',
        'product_thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'hot_deals'         => 'nullable',
        'featured'          => 'nullable',
        'special_offer'     => 'nullable',
        'special_deals'     => 'nullable',
    ]);

    // নতুন থাম্বনেইল আপলোড করলে পুরনো ইমেজ ডিলিট করে নতুনটা সেভ হবে
    if ($request->hasFile('product_thumbnail')) {
        if ($product->product_thumbnail && Storage::disk('public')->exists($product->product_thumbnail)) {
            Storage::disk('public')->delete($product->product_thumbnail);
        }

        $validated['product_thumbnail'] = $request->file('product_thumbnail')
            ->store('products/thumbnail', 'public');
    }

    $validated['product_slug'] = Str::slug($request->product_name);

    // চেকবক্স আনচেক করা হলে ডাটাবেজে null বা 0 আপডেট করার জন্য
    $validated['hot_deals']     = $request->has('hot_deals') ? $request->hot_deals : null;
    $validated['featured']      = $request->has('featured') ? $request->featured : null;
    $validated['special_offer'] = $request->has('special_offer') ? $request->special_offer : null;
    $validated['special_deals'] = $request->has('special_deals') ? $request->special_deals : null;

    $product->fill($validated);
    $product->save();

    // নতুন Multiple Image আপলোড করা হলে তা যোগ হবে
    if ($request->hasFile('multi_img')) {
        foreach ($request->file('multi_img') as $img) {
            $uploadPath = $img->store('products/multi-image', 'public');

            MultiImg::create([
                'product_id' => $product->id,
                'photo_name' => $uploadPath,
            ]);
        }
    }

    return redirect()
        ->route('admin.product.index')
        ->with('success', 'Product updated successfully.');
}

    // Delete Product
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->product_thumbnail) {
            Storage::disk('public')->delete(
                $product->product_thumbnail
            );
        }

        $product->delete();

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Product deleted successfully.');
    }
}

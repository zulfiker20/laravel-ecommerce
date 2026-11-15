<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }

    public function multiImages()
    {
        return $this->hasMany(MultiImg::class, 'product_id', 'id');
    }
     public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }
}

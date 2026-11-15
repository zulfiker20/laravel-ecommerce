<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
     protected $guarded = [];
     public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
     use HasFactory;

    // Các trường được phép gán hàng loạt
    protected $fillable = [
        'name',
        'slug',
        'price',
        'short_description',
        'description',
        'category_id',
        'brand_id',
        'status',
        'image',
        'quantity'
    ];

    /**
     * Quan hệ product thuộc về category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getImageUrlAttribute()
    {
        if (strpos($this->image, 'https://') === 0 || strpos($this->image, 'http://') === 0) {
            return $this->image;
        }
        return asset(Storage::url($this->image));
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

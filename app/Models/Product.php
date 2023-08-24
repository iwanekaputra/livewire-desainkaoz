<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $with = ['category', 'productvariants'];


    // public function scopeFilter($query, array $filters) {
    //     $query->when($filters['category'] ?? false, function ($query, $category) {
    //         return $query->whereHas('category', function ($query) use ($category) {
    //             $query->where('slug', $category);
    //         });
    //     });
    // }

    public function category () {
        return $this->belongsTo(Category::class);
    }

    public function productvariants() {
        return $this->hasMany(ProductVariant::class);
    }


}

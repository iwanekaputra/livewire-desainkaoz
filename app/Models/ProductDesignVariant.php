<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDesignVariant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $with = ['user', 'imageDesign', 'product', 'productvariant'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function imageDesign() {
        return $this->belongsTo(ImageDesign::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function productVariant() {
        return $this->belongsTo(ProductVariant::class);
    }
}

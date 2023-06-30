<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadProductDesign extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $with = ['user', 'designCategory', 'productDesign'];
    public function user () {
        return $this->belongsTo(User::class);
    }

    public function designCategory() {
        return $this->belongsTo(DesignCategory::class);
    }

    public function uploadProductDesignVariants() {
        return $this->hasMany(UploadProductDesignVariant::class);
    }

    public function productDesign() {
        return $this->belongsTo(ProductDesign::class);
    }
}

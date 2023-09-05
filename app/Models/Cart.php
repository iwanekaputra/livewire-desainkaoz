<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $with = ['productDesign'];

    public function productDesign() {
        return $this->belongsTo(ProductDesign::class);
    }

    
    public function imageDesign() {
        return $this->belongsTo(ImageDesign::class);
    }
}

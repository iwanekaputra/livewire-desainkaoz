<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $with = ['uploadProductDesign'];

    public function uploadProductDesign() {
        return $this->belongsTo(UploadProductDesign::class);
    }
}

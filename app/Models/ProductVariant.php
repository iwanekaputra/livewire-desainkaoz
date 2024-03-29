<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $with = ['style'];

    public function Style () {
        return $this->belongsTo(Style::class);
    }

}


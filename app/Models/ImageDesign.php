<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageDesign extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $with = ['designCategory'];


    public function designCategory() {
        return $this->belongsTo(DesignCategory::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}

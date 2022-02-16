<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BrandCategory;

class ItemCategory extends Model
{
    use HasFactory;

    public function brand()
    {
        return $this->belongsTo(BrandCategory::class);
    }
}

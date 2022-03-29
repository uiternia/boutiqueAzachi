<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemCategory;

class BrandCategory extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->hasMany(ItemCategory::class);
    }

}

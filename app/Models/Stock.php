<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'type',
        'quantity1',
        'quantity2',
        'quantity3',
        'quantity4',
    ];

    public function item()
     {
      return $this->belongsTo(Item::class);
     }
}

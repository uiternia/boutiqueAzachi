<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
use App\Models\ItemCategory;
use App\Models\BrandCategory;
use App\Models\Image;
use App\Models\Stock;
use App\Models\User;


class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
        'information',
        'sort_order',
        'price',
        'is_selling',
        'sort_order',
        'item_category_id',
        'image1',
        'image2',
        'image3',
        'image4',
    ];

    public function shop()
     {
      return $this->belongsTo(Shop::class);
     }

     public function category()
     {
         return $this->belongsTo(ItemCategory::class,'item_category_id');
     }

     public function imageFirst()
     {
         return $this->belongsTo(Image::class,'image1','id');
     }  

     public function imageSecond()
     {
         return $this->belongsTo(Image::class,'image2','id');
     }  

     public function imageThird()
     {
         return $this->belongsTo(Image::class,'image3','id');
     }  

     public function imageFourth()
     {
         return $this->belongsTo(Image::class,'image4','id');
     }  
     public function stock()
     {
         return $this->hasMany(Stock::class);
     }  

     public function users()
      {
          return $this->belongsToMany(User::class,'carts')
          ->withPivot(['id', 'quantity']);
      }    

}

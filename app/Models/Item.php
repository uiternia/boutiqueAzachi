<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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

      public function user_favorites()
      {
          return $this->belongsToMany(User::class,'favorites','item_id','user_id')->withTimestamps();
      }

      public function scopeAvailableProducts($query)
      {
        $stocks = DB::table('stocks')->select('item_id',
        DB::raw('sum(quantity) as quantity'))
        ->groupBy('item_id')
        ->having('quantity', '>', 1);
        
        return $query
        ->joinSub($stocks,'stock',function($join){
        $join->on('items.id', '=', 'stock.item_id');
    })
        ->join('shops', 'items.shop_id', '=', 'shops.id')
        ->join('item_categories', 'items.item_category_id', '=','item_categories.id')
        ->join('images as image1', 'items.image1', '=', 'image1.id')
        ->where('shops.is_selling', true)
        ->where('items.is_selling', true)
        ->select('items.id as id', 'items.name as name', 'items.price'
        ,'items.sort_order as sort_order'
        ,'items.information','item_categories.name as category'
        ,'image1.filename as filename');
      }
      
      public function scopeSortOrder($query, $sortOrder)
      {
          if($sortOrder === null || $sortOrder === \Constant::SORT_ORDER['recommend']){
              return $query->orderBy('sort_order','asc');
          }
          if($sortOrder === \Constant::SORT_ORDER['higher']){
            return $query->orderBy('price','desc');
        }
        if($sortOrder === \Constant::SORT_ORDER['lower']){
            return $query->orderBy('price','asc');
        }
        if($sortOrder === \Constant::SORT_ORDER['new']){
            return $query->orderBy('items.created_at','desc');
        }
        if($sortOrder === \Constant::SORT_ORDER['older']){
            return $query->orderBy('items.created_at','asc');
        }
      }

      public function scopeSelectCategory($query, $categoryId)
      {
          if($categoryId !== '0')
          {
              return $query->where('brand_category_id',$categoryId);
          }else{
              return ;
          }
      }

      public function scopeClothesType($query, $clothesId)
      {
          if($clothesId !== '0')
          {
              return $query->where('item_category_id',$clothesId);
          }else{
              return ;
          }
      }


}

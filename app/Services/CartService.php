<?php

namespace App\Services;
use App\Models\Item;
use App\models\Cart;

class CartService
{
  public static function getItemsInCart($items)
  {
    $products = [];

    foreach($items as $item)
    {
      $p = Item::findOrFail($item->item_id);
      $owner = $p->shop->owner->select('name','email')->first()->toArray();
      $values = array_values($owner);
      $keys = ['ownerName', 'email'];
      $ownerInfo = array_combine($keys,$values);

      $product = Item::where('id',$item->item_id)
      ->select('id','name','price')->get()->toArray();

      $quantity = Cart::where('item_id',$item->item_id)
      ->select('quantity')->get()->toArray();

      $result = array_merge($product[0],$ownerInfo,$quantity[0]);


      array_push($products, $result);
    }
    return $products;
  }
}
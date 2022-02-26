<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Stock;
use App\Models\Shop;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');
    }

    public function index()
    {
        $stocks = DB::table('stocks')->select('item_id',
        DB::raw('sum(quantity) as quantity'))
        ->groupBy('item_id')
        ->having('quantity', '>', 1);
        
                 
    $products = DB::table('items')
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
        ,'image1.filename as filename')
        ->get();

        return view('user.index',compact('products'));
    }

    public function show($id){
        $product = Item::findOrFail($id);

        $quantity = Stock::where('item_id',$product->id)
        ->sum('quantity');

        if($quantity > 9){
            $quantity = 9;
        } 
        return view('user.show',compact('product','quantity'));
    }

    public function shop($id){

        $product = Item::findOrFail($id);

        return view('user.shop',compact('product'));
        
    }
}

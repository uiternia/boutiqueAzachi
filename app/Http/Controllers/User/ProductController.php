<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');
    }

    public function index()
    {
        $stocks1 = DB::table('stocks')->select('item_id',
        DB::raw('sum(quantity1) as quantity1'))
        ->groupBy('item_id')
        ->having('quantity1', '>', 1);
        
        $stocks2 = DB::table('stocks')->select('item_id',
        DB::raw('sum(quantity2) as quantity2'))
        ->groupBy('item_id')
        ->having('quantity2', '>', 1); 

        $stocks3 = DB::table('stocks')->select('item_id',
        DB::raw('sum(quantity3) as quantity3'))
        ->groupBy('item_id')
        ->having('quantity3', '>', 1); 

        $stocks = DB::table('stocks')->select('item_id',
        DB::raw('sum(quantity4) as quantity4'))
        ->groupBy('item_id')
        ->having('quantity4', '>', 1)
        ->union($stocks1)->union($stocks2)->union($stocks3);
        
       
        
                 
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
}

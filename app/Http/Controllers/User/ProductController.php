<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Stock;
use App\Models\BrandCategory;
use App\Models\ItemCategory;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Favorite;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');

        $this->middleware(function ($request, $next) {

            $id = $request->route()->parameter('product'); 
            if(!is_null($id)){ 
            $itemId = Item::availableProducts()->where('items.id', $id)->exists();
                if(!$itemId){ 
                    abort(404);
                }
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $categories = BrandCategory::with('item')
        ->get();

        $products = Item::availableProducts()
        ->selectCategory($request->category ?? '0')
        ->clothesType($request->clothes ?? '0')
        ->sortOrder($request->sort)
        ->paginate(16);

        return view('user.index',compact('products','categories'));
    }

    public function show($id){
        $product = Item::findOrFail($id);
        $user = User::findOrFail(Auth::id());
        $favorite = $user->item_favorites()->where('item_id',$id)->first();
        $quantity = Stock::where('item_id',$product->id)
        ->sum('quantity');

        if($quantity > 9){
            $quantity = 9;
        } 
        return view('user.show',compact('product','quantity','favorite'));
    }

    public function shop($id){

        $product = Item::findOrFail($id);

        return view('user.shop',compact('product'));
        
    }
    public function information(){

        return view('user.information');
        
    }
}

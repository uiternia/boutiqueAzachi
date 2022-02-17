<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\BrandCategory;
use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Shop;
use App\Models\Image;
use App\Models\Owner;
use App\Models\Stock;
use Throwable;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function ($request, $next)
        {
            $id = $request->route()->parameter('item');
            if(!is_null($id)){ 
                $itemOwnerId = Item::findOrFail($id)->shop->owner->id;
                $itemId = (int)$itemOwnerId;
                if($itemId !== Auth::id()){ 
                abort(404); 
                }
                }
                return $next($request);
        }
    );
    }
    
    public function index()
    {
        $ownerItem = Owner::with('shop.item.imageFirst')
        ->where('id',Auth::id())->get();

        return view('owner.items.index',
        compact('ownerItem'));
    }

    
    public function create()
    {
        $shops = Shop::where('owner_id',Auth::id())
        ->select('id','name')
        ->get();

        $images = Image::where('owner_id',Auth::id())
        ->select('id','filename')
        ->orderBy('updated_at','desc')
        ->get();

        $categories = BrandCategory::with('item')
        ->get();

        return view('owner.items.create',
        compact('shops','images','categories'));
    }

    
    public function store(ItemRequest $request)
    {

        try{
            DB::transaction(function () use($request){
                $item = Item::create([
                    'name' => $request->name,
                    'information' => $request->information,
                    'price' => $request->price,
                    'shop_id' => $request->shop_id,
                    'item_category_id' => $request->category,
                    'image1' => $request->image1,
                    'image2' => $request->image2,
                    'image3' => $request->image3,
                    'image4' => $request->image4,
                    'is_selling' => $request->is_selling,
                ]);
                Stock::create([
                    'item_id' => $item->id,
                    'type' => 1,
                    'quantity1' => $request->quantity1,
                    'quantity2' => $request->quantity2,
                    'quantity3' => $request->quantity3,
                    'quantity4' => $request->quantity4,
                ]);
                
            },2);
        }catch(Throwable $e){
            Log::error($e);
            throw $e;
        }

            return redirect()
            ->route('owner.items.index')
            ->with(['message' => 'アイテムを追加しました。',
            'status' => 'success']);
    }

    
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $quantity1 = Stock::where('item_id',$item->id)->sum('quantity1');
        $quantity2 = Stock::where('item_id',$item->id)->sum('quantity2');
        $quantity3 = Stock::where('item_id',$item->id)->sum('quantity3');
        $quantity4 = Stock::where('item_id',$item->id)->sum('quantity4');

        $shops = Shop::where('owner_id',Auth::id())
        ->select('id','name')
        ->get();

        $images = Image::where('owner_id',Auth::id())
        ->select('id','filename')
        ->orderBy('updated_at','desc')
        ->get();

        $categories = BrandCategory::with('item')
        ->get();

        return view('owner.items.edit',compact('item','quantity1','quantity2','quantity3','quantity4','shops','images','categories'));
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}

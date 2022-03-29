<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\BrandCategory;
use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Image;
use App\Models\Owner;
use App\Models\Stock;
use App\Models\Item;
use Throwable;
use Illuminate\Support\Facades\Log;
use App\Constants\Common;

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
        });
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
                    'sort_order' => $request->sort_order,
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
                    'quantity' => $request->quantity,
                    
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
        
        $quantity = Stock::where('item_id',$item->id)->sum('quantity');
        

        $shops = Shop::where('owner_id',Auth::id())
        ->select('id','name')
        ->get();

        $images = Image::where('owner_id',Auth::id())
        ->select('id','filename')
        ->orderBy('updated_at','desc')
        ->get();

        $categories = BrandCategory::with('item')
        ->get();


        return view('owner.items.edit',compact('item','quantity','shops','images','categories'));
    }

    
    public function update(ItemRequest $request, $id)
    {
        
        $request->validate([
            'current_quantity' => ['required', 'integer'],
            
        ]);

        $item = Item::findOrFail($id);
        $quantity = Stock::where('item_id',$item->id)->sum('quantity');
       
       if($request->current_quantity !== $quantity )
        {
            $id = $request->route()->parameter('item');
            return redirect()->route('owner.items.edit', ['item' => $id])
            ->with(['message' => '在庫数が変更されています。再度確認してください。', 'status' => 'alert']);
        }else{
            try {
            DB::transaction(function () use ($request, $item) {
                $item->name = $request->name;
                $item->information = $request->information;
                $item->price = $request->price;
                $item->sort_order = $request->sort_order;
                $item->shop_id = $request->shop_id;
                $item->item_category_id = $request->category;
                $item->image1 = $request->image1;
                $item->image2 = $request->image2;
                $item->image3 = $request->image3;
                $item->image4 = $request->image4;
                $item->is_selling = $request->is_selling;
                $item->save();

                //マジックナンバー回避

                if($request->type === \Constant::ITEM_LIST['add']){
                    $newQuantity = $request->quantity;
                }
                if($request->type === \Constant::ITEM_LIST['reduce']){
                    $newQuantity = $request->quantity * -1;
                }
                
                Stock::create([
                    'item_id' => $item->id,
                    'type' => $request->type,
                    'quantity' => $newQuantity,
                    
                ]);
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        return redirect()
        ->route('owner.items.index')
        ->with(['message' => 'アイテムを更新しました。', 'status' => 'success']);
        }
        

    }

    
    public function destroy($id)
    {
        
       $item = Item::findOrFail($id);
       $item->delete();
        
        return redirect()
        ->route('owner.items.index');
    }
}

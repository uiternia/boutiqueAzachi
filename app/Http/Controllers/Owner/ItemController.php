<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\BrandCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Shop;
use App\Models\Image;
use App\Models\Owner;
use App\Models\ItemCategory;

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

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
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

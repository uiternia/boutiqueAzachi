<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $products = $user->items;

       
        return view('user.favorite',
        compact('products'));
    }

    public function add(Request $request)
    {
        
            Favorite::create([
                'user_id' => Auth::id(),
                'item_id' => $request->product_id,
            ]);
        

        return redirect()->route('user.favorite.index');
    }

    public function delete($id)
        {
            Cart::where('item_id',$id)
            ->where('user_id',Auth::id())
            ->delete();
            return redirect()->route('user.favorite.index');
        }
}

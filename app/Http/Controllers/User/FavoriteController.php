<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Item;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FavoriteRequest;

class FavoriteController extends Controller
{
    public function view()
    {
        $user = User::findOrFail(Auth::id());
        $items = $user->items;

        return view('user.favorite',
        compact('items'));
    }

    public function add(FavoriteRequest $request)
    {
            Favorite::create([
                'item_id' => $request->item_id,
                'user_id' => Auth::id(),
            ]);
        

        return redirect()->route('user.favorite.view');
    }

    public function delete($id)
        {
            Favorite::where('item_id',$id)
            ->where('user_id',Auth::id())
            ->delete();
            return redirect()->route('user.favorite.view');
        }
}

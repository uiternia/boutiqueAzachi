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
        // $user = User::findOrFail(Auth::id());
        // $favorites = $user->item_favorites();
        // dd($favorites);
        return view('user.favorite');
    }

    public function store(Request $request)
    {
        Favorite::create([
            'item_id' => $request->product_id,
            'user_id' => Auth::id(),
        ]);


        return back();
    }

    public function delete($itemId)
    {
        $user = User::findOrFail(Auth::id());
        if ($user->is_favorite($itemId)) {
            $user->favorite_items()->detach($itemId);
        }
        return back();
    }
}

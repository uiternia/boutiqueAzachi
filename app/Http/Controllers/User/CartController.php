<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendThanksMail;
use App\Jobs\SendOrderMail;
use App\Services\CartService;


class CartController extends Controller
{
    public function index()
    {

        $user = User::findOrFail(Auth::id());
        $products = $user->items;
        $totalPrice = 0;

        foreach($products as $product)
        {
            $totalPrice += $product->price * $product->pivot->quantity;
        }
        return view('user.cart',
        compact('products','totalPrice'));
    }

    public function add(Request $request)
    {
        $itemInCart = Cart::where('user_id',Auth::id())
        ->where('item_id',$request->product_id)->first();

        if($itemInCart){
            $itemInCart->quantity += $request->quantity;
            $itemInCart->save();
        }else{
            Cart::create([
                'user_id' => Auth::id(),
                'item_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        return redirect()->route('user.cart.index');
    }

        public function delete($id)
        {
            Cart::where('item_id',$id)
            ->where('user_id',Auth::id())
            ->delete();
            return redirect()->route('user.cart.index');
        }

        public function checkout()
        {
       
            $user = User::findOrFail(Auth::id());
            $products = $user->items;

            $lineItems = [];
            foreach($products as $product){
                $quantity = '';
                $quantity = Stock::where('item_id',$product->id)->sum('quantity');
                if($product->pivot->quantity > $quantity){
                    return redirect()->route('user.cart.index');
                }else{
                $lineItem = [
                    'name' => $product->name,
                    'description' => $product->information,
                    'amount' => $product->price,
                    'currency' => 'jpy',
                    'quantity' => $product->pivot->quantity,  
                ];
                array_push($lineItems,$lineItem);
            }
        }
        foreach($products as $product){
            Stock::create([
                'item_id' => $product->id,
                'type' => \Constant::ITEM_LIST['reduce'],
                'quantity' => $product->pivot->quantity * -1
            ]);
        }
        
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [$lineItems],
                'mode' => 'payment',
                'success_url' => route('user.cart.success'),
                'cancel_url' => route('user.cart.cancel'),
            ]);

            $publicKey = env('STRIPE_PUBLIC_KEY');

                 return view('user.checkout', 
                   compact('session', 'publicKey'));
            
        }

        public function success(){
            $items = Cart::where('user_id', Auth::id())->get();
            $products = CartService::getItemsInCart($items);
            $user = User::findOrFail(Auth::id());
    
            SendThanksMail::dispatch($products, $user);
    
            foreach($products as $product)
            {
                SendOrderMail::dispatch($product, $user);
            }
    
            Cart::where('user_id',Auth::id())->delete();
            return redirect()->route('user.products.index');
        }

        public function cancel(){
            $user = User::findOrFail(Auth::id());
            $products = $user->items;

            foreach($products as $product){
                Stock::create([
                    'item_id' => $product->id,
                    'type' => \Constant::ITEM_LIST['add'],
                    'quantity' => $product->pivot->quantity
                ]);
            }
            return redirect()->route('user.cart.index');
        }
    
}
<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addItem($productId){
//        $cart = Cart::where('user_id',Auth::user()->id)->first();
//
//        if(!$cart){
//            $cart =  new Cart();
//            $cart->save();
//        }
//
//        $cartItem  = new Cartitem();
//        $cartItem->product_id=$productId;
//        $cartItem->cart_id= $cart->id;
//        $cartItem->save();
//
//        return redirect('/cart');
       return view('add');

    }
    public function showCart(){
        $cart = Cart::where('user_id',Auth::user()->id)->first();

        if(!$cart){
            $cart =  new Cart();
            $cart->user_id=Auth::user()->id;
            $cart->save();
        }

        $items = $cart->cartItems;
        $total=0;
        foreach($items as $item){
            $total+=$item->product->price;
        }

        return view('cart.view',['items'=>$items,'total'=>$total]);
    }


    public function removeItem(){

    }
}

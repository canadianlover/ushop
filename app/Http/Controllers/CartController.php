<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CartController extends Controller
{

    public function __construct() {
        $this->middleware("auth");

    }
    public function addItem($ItemID) {
        $cart = Cart::Where('user_id', Auth::user()->id)->first();
        if(!$cart) {
          $cart = new Cart();
          $cart->user_id=Auth::user()->id;
          $cart->save();
        }
        $cartItem = new CartItem();
        $cartItem->product_id = $ItemID;
        $cartItem->cart_id = $cart->id;
        $cartItem->save();
        return redirect ('/cart');

    }
    public function showCart()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();

        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();
            $items = $cart->cartItems;
            $total = 0;

            foreach ($items as $item) {
            }
                  $total += $item->product->price;

        }
        return view('cart.view', ['items' => $items, 'total' => $total]);
    }
    public function removeItem($id) {
        CartItem:destroy($id);
        return redirect('/cart');


    }
}

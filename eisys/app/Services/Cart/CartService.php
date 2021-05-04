<?php

namespace App\Services\Cart;

use App\Services\BaseService;
use App\Models\Cart;
use App\Models\Product;

class CartService extends BaseService
{
    public function index($user_id)
    {
        $this->cart = Cart::getCartByUserId($user_id);
        return $this;
    }

    public function findProduct()
    {
        $cart = $this->cart;
        foreach($cart as $val){
            $product = Product::getProductById($val->product_id);
            $val->product = $product;
        }
        $this->cart = $cart;

        return $this;
    }

    public function findSameProductsAddedCart($req, $user_id)
    {
        $product_id = $req->product_id;
        $cart = Cart::findCartByIds($product_id, $user_id);

        if($cart){
            $this->old_quantity = $cart->quantity;
            $this->old_car_id = $cart->cart_id;
            Cart::deleteCartById($cart->cart_id);
            return $this;
        }else{
            $this->old_quantity = 0;
            return $this;
        }
    }

    public function addCart($req, $user_id)
    {
        $product_id = $req->product_id;
        $quantity = $req->quantity + $this->old_quantity;

        Cart::createCart($product_id, $quantity, $user_id);
    }

    public function changeQuantity($req, $user_id)
    {
        $cart_id = $req->cart_id;
        $cart = Cart::findCartByIds($cart_id, $user_id);

        if ($req->quantity == 0) {
            Cart::deleteCartById($cart->cart_id);
        } else {
            Cart::updateQuantity($cart->cart_id, $req->quantity);
        }

        return $this;
    }

    public function removeCart($cart_id)
    {
        return Cart::deleteCartById($cart_id);
    }


}

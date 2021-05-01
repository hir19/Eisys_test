<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\IndexRequest;
use App\Http\Requests\Cart\AddRequest;
use App\Http\Requests\Cart\RemoveRequest;
use App\Services\Cart\CartService;

class CartController extends Controller
{

    protected $cart_service;

    public function __construct(CartService $cart_service)
    {
        $this->cart_service = $cart_service;
    }

    public function Index(IndexRequest $request)
    {
        //
    }

}

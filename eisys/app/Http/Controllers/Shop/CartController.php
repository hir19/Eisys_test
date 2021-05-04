<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\IndexRequest;
use App\Http\Requests\Cart\AddRequest;
use App\Http\Requests\Cart\ChangeRequest;
use App\Http\Requests\Cart\RemoveRequest;
use App\Services\Cart\CartService;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{

    protected $cart_service;

    public function __construct(CartService $cart_service)
    {
        $this->cart_service = $cart_service;
    }

    public function index(IndexRequest $request)
    {
        $login_user_id = Auth::id();
        $data = $this->cart_service
                ->index($login_user_id)
                ->findProduct();

        return view(('shop.cart.index'), compact('data'));
    }

    public function add(AddRequest $request)
    {
        $login_user_id = Auth::id();
        $this->cart_service
                ->findSameProductsAddedCart($request, $login_user_id)
                ->addCart($request, $login_user_id);

        return back()->with('result', 'カートに商品を追加しました！');
    }

    public function change(ChangeRequest $request)
    {
        $login_user_id = Auth::id();
        $this->cart_service
                ->changeQuantity($request, $login_user_id);

        return back()->with('result'.$request->cart_id, '商品の個数を変更しました！');
    }

    public function remove(RemoveRequest $request)
    {
        $this->cart_service->removeCart($request->cart_id);

        return redirect()->route('shop.cart.index');
    }

}

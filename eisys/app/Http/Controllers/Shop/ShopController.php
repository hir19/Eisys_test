<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
// use App\Http\Requests\Shop\IndexRequest;
use App\Services\Shop\ShopService;
use Illuminate\Pagination\Paginator;

class ShopController extends Controller
{

    protected $shop_service;

    public function __construct(ShopService $shop_service)
    {
        $this->shop_service = $shop_service;
    }

    public function Index()
    // public function Index(IndexRequest $request)
    {
        $products = $this->shop_service
            ->test();

        return view(('shop.index'), compact('products'));
    }

}

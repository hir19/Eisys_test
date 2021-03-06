<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\DetailRequest;
use App\Http\Requests\Shop\IndexRequest;
use App\Services\Shop\ShopService;

class ShopController extends Controller
{

    protected $shop_service;

    public function __construct(ShopService $shop_service)
    {
        $this->shop_service = $shop_service;
    }

    public function Index(IndexRequest $request)
    {

        $data = $this->shop_service
            ->selectData()
            ->existSearchQuery($request->query());

        return view(('shop.index'), compact('data'));
    }

    public function Detail(DetailRequest $request)
    {
        $product = $this->shop_service
            ->detail($request->product_id);

        return view(('shop.detail'), compact('product'));
    }
}

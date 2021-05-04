<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\IndexRequest;
use App\Services\Admin\Order\OrderService;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    protected $order_service;

    public function __construct(OrderService $order_service)
    {
        $this->order_service = $order_service;
    }

    public function Index(IndexRequest $request)
    {

        $shop_id = Auth::user()->shop_id;
        $data = $this->order_service
            ->index($shop_id, $request->keywords);

        return view(('admin.contents.order.index'), compact('data'));
    }

}

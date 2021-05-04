<?php

namespace App\Services\Admin\Order;

use App\Models\Order;
use App\Services\BaseService;

class OrderService extends BaseService
{
    public function index($shop_id, $keywords)
    {
        $orders = Order::getOrdersByShopId($shop_id, $keywords);
        $this->orders = $orders->paginate(15);

        return $this;
    }
}

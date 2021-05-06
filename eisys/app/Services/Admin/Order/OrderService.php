<?php

namespace App\Services\Admin\Order;

use App\Models\Order;
use App\Services\BaseService;

class OrderService extends BaseService
{
    public function index($shop_id, $keywords)
    {
        if($shop_id != 0){
            $orders = Order::getOrdersByShopId($shop_id, $keywords);
        }else{
            $orders = Order::getAllOrdersBySearch($keywords);
        }
        $this->orders = $orders->paginate(15);

        return $this;
    }
}

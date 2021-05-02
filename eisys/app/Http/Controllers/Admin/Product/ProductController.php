<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\EditRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Services\Admin\Product\ProductService;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    protected $product_service;

    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }

    public function Index()
    {
        $shop_id = Auth::user()->shop_id;
        $products = $this->product_service->index($shop_id);

        return view(('admin.contents.product.index'), compact('products'));
    }

    public function Create()
    {
        //
    }

    public function Edit(EditRequest $request)
    {
        $data = $this->product_service
            ->edit($request->product_id)
            ->selectData();

        return view(('admin.contents.product.edit'), compact('data'));
    }

    public function Update(UpdateRequest $request)
    {
        dd($request);
    }

    public function Delete()
    {
        //
    }

}

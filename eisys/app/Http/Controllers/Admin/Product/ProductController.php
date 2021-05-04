<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\EditRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Http\Requests\Admin\Product\IndexRequest;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\EditImgRequest;
use App\Http\Requests\Admin\Product\UpdateImgRequest;
use App\Http\Requests\Admin\Product\DeleteImgRequest;
use App\Services\Admin\Product\ProductService;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    protected $product_service;

    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }

    public function Index(IndexRequest $request)
    {
        $shop_id = Auth::user()->shop_id;
        $data = $this->product_service->index($shop_id, $request->keywords);

        return view(('admin.contents.product.index'), compact('data'));
    }

    public function Create()
    {
        $select_data = $this->product_service
            ->selectData();

        return view(('admin.contents.product.create'), compact('select_data'));
    }

    public function Store(StoreRequest $request)
    {

        $this->product_service
            ->store($request)
            ->uploadImgs($request)
            ->storeTags($request->tag_ids);

        return redirect()->route('admin.product.index');
    }

    public function Edit(EditRequest $request)
    {
        $data = $this->product_service
            ->edit($request->product_id)
            ->selectData()
            ->oldTags($request->product_id);

        return view(('admin.contents.product.edit'), compact('data'));
    }

    public function Update(UpdateRequest $request)
    {

        $this->product_service
            ->update($request)
            ->updateTags($request->tag_ids, $request->product_id);

        return redirect()->route('admin.product.index');
    }

    public function Delete()
    {
        //
    }

    public function EditImg(EditImgRequest $request)
    {
        $data = $this->product_service
            ->edit($request->product_id);

        return view(('admin.contents.product.editImg'), compact('data'));
    }

    public function UpdateImg(UpdateImgRequest $request)
    {
        $data = $this->product_service
            ->targetProduct($request->product_id)
            ->updateImg($request)
            ->edit($request->product_id);

        return view(('admin.contents.product.editImg'), compact('data'));
    }

    public function DeleteImg(DeleteImgRequest $request)
    {

        dd('delete');
        $this->product_service
            ->targetProduct($request->product_id)
            ->deleteImg($request);

        return back()->with('result'.$request->delete_num, '画像を削除しました');
    }

}

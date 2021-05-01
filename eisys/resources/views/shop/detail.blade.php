@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品詳細</h1>
                <div class="">
                    <div class="d-flex flex-row flex-wrap">
                        <div>
                            商品名：{{ $product->name }}<br>
                            価格：{{ $product->price }}円<br>
                            ブランド名：{{ $product->brand_name }}<br>
                            種類：{{ $product->category_name }}<br>
                            在庫数：{{ $product->quantity }}<br>
                            <img src="/image/{{ $product->image_path1 }}" name="{{ $product->image_title1 }}" alt=""
                                class="incart"><br>
                            商品説明：{{ $product->description }}
                        </div>
                        @guest
                            <div>購入するにはログイン画面</div>
                        @else
                            {{ Form::open(['route' => 'cart.add', 'method' => 'POST']) }}
                                <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                {{ Form::button('カートに入れる', ['class' => 'imghover', 'type' => 'submit']) }}
                            {{ Form::close() }}
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

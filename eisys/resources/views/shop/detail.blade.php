@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品詳細</h1>
                <div class="">
                    <div class="d-flex flex-row flex-wrap">
                        <div style="margin:50px;">
                            <img src="/storage/{{$product->image_path1}}" width="400", height="400"><br>
                        </div>
                        <div style="margin-top:50px;">
                            <h2>{{ $product->name }}</h2><br>
                            <h5>価格：{{ $product->price }}円</h5><br>
                            <h5>ブランド名：{{ $product->brand_name }}</h5><br>
                            <h5>種類：{{ $product->category_name }}</h5><br>
                            <h5>在庫数：{{ $product->quantity }}</h5><br>
                            <h5>商品説明：{{ $product->description }}</h5><br>
                            @guest
                                {{ Form::open(['method' => 'GET', 'route' => 'login']) }}
                                    {{ Form::button('<i class="fas fa-sign-in-alt"></i>>&ensp;購入される方はログイン', ['class' => 'btn btn-success imghover', 'type' => 'submit']) }}
                                {{ Form::close() }}
                            @else
                                {{ session('result') }}
                                {{ Form::open(['method' => 'POST', 'route' => 'shop.cart.add']) }}
                                    {{ Form::hidden('product_id', $product->product_id) }}
                                    {{ Form::number('quantity', 1, ['class' => '', 'id' => 'quantity', 'max'=>$product->quantity, 'min'=>1]) }}
                                    {{ Form::button('<i class="fas fa-cart-plus"></i>&ensp;カートに入れる', ['class' => 'btn btn-success imghover', 'type' => 'submit']) }}
                                {{ Form::close() }}
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

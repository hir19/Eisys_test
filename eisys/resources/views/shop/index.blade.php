@extends('layouts.app')
<script src="{{ asset('js/addApp.js') }}" defer></script>

@section('content')
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <div class="search-container">
                    <div class="row">
                        <div class="col-md-3">
                            <form class="form-inline">
                                <div class="form-group">
                                    {{ Form::open(['route' => 'shop.index', 'method' => 'GET']) }}
                                    @csrf
                                    {{ Form::text('keywords', $data->oldQuery['keywords'], ['class' => '', 'id' => 'keywords', 'placeholder' => 'キーワード']) }}
                                    {{ Form::select('category_id', [1 => 'DVD', 2 => '本', 3 => 'ゲーム'], $data->oldQuery['category_id'], ['class' => "form-control select2", 'style' => "width: 10%;", 'id' => 'category_id', 'data-placeholder' => 'カテゴリー']) }}
                                    {{ Form::select('tag_ids[]', [1 => 'タグ1', 2 => 'タグ2', 3 => 'タグ3'], '', ['class' => 'select2', 'multiple' => 'multiple', 'style' => "width: 10%;", 'id' => 'tag_ids', 'data-placeholder' => '検索タグ']) }}
                                    {{ Form::select('price', [1000 => '1000以下', 2000 => '2000以下', 3000 => '3000以下'], $data->oldQuery['price'], ['class' => '', 'id' => 'price', 'placeholder' => '金額']) }}
                                    {{ Form::button('検索', ['class' => 'imghover', 'type' => 'submit']) }}
                                    {{ Form::close() }}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
                <p>検索ヒット数：{{ $data->total }}</p>
                <div class="">
                    <div class="d-flex flex-row flex-wrap">
                        @foreach ($data->products as $product)
                            <div>
                                <a href="{{ route('shop.detail', ['product_id' => $product->product_id]) }}"
                                    target="_blank" rel="noopener">
                                    商品名：{{ $product->name }}<br>
                                </a>
                                価格：{{ $product->price }}円<br>
                                ブランド名：{{ $product->brand_name }}<br>
                                種類：{{ $product->category_name }}<br>
                                在庫数：{{ $product->quantity }}<br>
                                <img src="/image/{{ $product->image_path1 }}" name="{{ $product->image_title1 }}"
                                    alt=""><br>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        {{ $data->products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

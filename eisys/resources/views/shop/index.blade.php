@extends('layouts.app')
<script src="{{ asset('js/app.js') }}" defer></script>

@section('content')
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <div class="search-container">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-inline">
                                {{ Form::open(['route' => 'shop.index', 'method' => 'GET']) }}
                                @csrf
                                {{ Form::text('keywords', $data->oldQuery['keywords'], ['class' => '', 'id' => 'keywords', 'style' => "width: 30%;", 'placeholder' => 'キーワード']) }}
                                {{ Form::select('category_id', $data->category_arr, $data->oldQuery['category_id'], ['class' => "form-control select2", 'style' => "width: 20%;", 'id' => 'category_id', 'placeholder' => 'カテゴリー']) }}
                                {{ Form::select('tag_ids[]', $data->tag_arr, '', ['class' => 'select2', 'multiple' => 'multiple', 'style' => "width: 30%;", 'id' => 'tag_ids', 'data-placeholder' => '検索タグ']) }}
                                {{ Form::select('price', $data->price_arr, $data->oldQuery['price'], ['class' => '', 'id' => 'price', 'placeholder' => '金額']) }}
                                {{ Form::button('検索', ['class' => 'imghover', 'type' => 'submit']) }}
                                {{ Form::close() }}
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

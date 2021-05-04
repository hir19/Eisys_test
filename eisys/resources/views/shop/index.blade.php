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
                                {{ Form::select('tag_ids[]', $data->tag_arr, $data->oldQuery['tag_ids'], ['class' => 'select2', 'multiple' => 'multiple', 'style' => "width: 30%;", 'id' => 'tag_ids', 'data-placeholder' => '検索タグ']) }}
                                <div class="input-group-prepend">
                                    {{ Form::select('category_id', $data->category_arr, $data->oldQuery['category_id'], ['class' => "btn btn-primary dropdown-toggle", 'id' => 'category_id', 'placeholder' => 'カテゴリー']) }}
                                </div>
                                <div class="input-group-prepend">
                                    {{ Form::select('price', $data->price_arr, $data->oldQuery['price'], ['class' => 'btn btn-primary dropdown-toggle', 'id' => 'price', 'placeholder' => '金額']) }}
                                </div>
                                <div class="input-group">
                                    {{ Form::text('keywords', $data->oldQuery['keywords'], ['class' => 'form-control', 'id' => 'keywords', 'style' => "width: 30%;", 'placeholder' => 'キーワード']) }}
                                    <div class="input-group-append">
                                        {{ Form::button('検索', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </form>
                        </div>
                    </div>
                </div>
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
                <p>検索ヒット数：{{ $data->total }}</p>
                <div>
                    <div class="d-flex flex-row flex-wrap">
                        @foreach ($data->products as $product)
                            <div class="col-xs-4 col-sm-2 col-md-3" style="margin-bottom: 50px;">
                                <a href="{{ route('shop.detail', ['product_id' => $product->product_id]) }}">
                                    商品名：{{ $product->name }}<br>
                                <img src="/storage/{{$product->image_path1}}" width="200", height="200"><br>
                                </a>
                                価格：{{ $product->price }}円<br>
                                ブランド名：{{ $product->brand_name }}<br>
                                種類：{{ $product->category_name }}<br>
                                在庫数：{{ $product->quantity }}<br>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div style="width: 200px; margin: 20px auto; text-align:center;">
                    {{ $data->products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">商品情報編集</h1>
                </div>
                <!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">商品情報一覧</a></li>
                        <li class="breadcrumb-item">商品情報編集</li>
                    </ol>
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        {{ Form::open(['route' => ['admin.product.update', $data->product->product_id], 'method' => 'put']) }}
        @csrf
        <a href={{ route('admin.product.index') }} class="btn btn-secondary"><i
                class="fas fa-chevron-left"></i>&ensp;戻る</a>
        {{ Form::button('<i class="fas fa-save"></i>&ensp;変更を保存する', ['class' => 'btn btn-success float-right', 'type' => 'submit']) }}

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $data->product->name }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="form-group">
                <div class="form-group">
                    <label class="font-weight-normal">商品名</label>
                    {{ Form::text('name', $data->product->name, ['class' => 'form-control', 'placeholder' => '商品名']) }}
                    <span style="color:red">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group">
                    <label class="font-weight-normal">在庫数</label>
                    {{ Form::text('quantity', $data->product->quantity, ['class' => 'form-control', 'placeholder' => '商品在庫数']) }}
                    <span style="color:red">{{ $errors->first('quantity') }}</span>
                </div>
                <div class="form-group">
                    <label class="font-weight-normal">価格</label>
                    {{ Form::text('price', $data->product->price, ['class' => 'form-control', 'placeholder' => '価格']) }}
                    <span style="color:red">{{ $errors->first('price') }}</span>
                </div>
                <div class="form-group">
                    <label class="font-weight-normal">検索タグ</label>
                    {{ Form::select('tag_ids[]', $data->tag_arr, null, ['class' => 'select2', 'multiple' => 'multiple', 'style' => "width: 100%;", 'id' => 'tag_ids', 'data-placeholder' => '検索タグ']) }}
                    <span style="color:red">{{ $errors->first('tag_ids') }}</span>
                </div>
                <div class="form-group">
                    <label class="font-weight-normal">ブランド</label>
                    {{ Form::select('brand_id', $data->brand_arr, [$data->product->brand_id => $data->product->brand_name], ['class' => "form-control select2", 'style' => "width: 100%;", 'id' => 'brand_id', 'data-placeholder' => 'カテゴリー']) }}
                    <span style="color:red">{{ $errors->first('brand_id') }}</span>
                </div>
                <div class="form-group">
                    <label class="font-weight-normal">カテゴリー</label>
                    {{ Form::select('category_id', $data->category_arr, null, ['class' => "form-control select2", 'style' => "width: 100%;", 'id' => 'category_id', 'data-placeholder' => 'カテゴリー']) }}
                    <span style="color:red">{{ $errors->first('category_id') }}</span>
                </div>
                <div class="form-group">
                    <label class="font-weight-normal">説明文</label>
                    {{ Form::textarea('description', $data->product->description, ['class' => 'form-control', 'placeholder' => '説明文...']) }}
                    <span style="color:red">{{ $errors->first('description') }}</span>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="row">
        <div class="col-12">
            <a href={{ route('admin.product.index') }} class="btn btn-secondary"><i
                    class="fas fa-chevron-left"></i>&ensp;戻る</a>
            {{ Form::button('<i class="fas fa-save"></i>&ensp;変更を保存する', ['class' => 'btn btn-success float-right', 'type' => 'submit']) }}
        </div>
    </div>
    {{ Form::close() }}
    </div>
    <!-- Default box -->
    </div>
    <!-- /.content -->

@endsection

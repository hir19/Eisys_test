@extends('admin.layout')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 mb-3">
                <h1>商品情報</h1>
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
    <!-- Main card -->
    <div class="card">
        <!-- card header-->
        <div class="card-header">
            <!-- SEARCH AREA -->
            <nav class="navbar navbar-expand navbar-white navbar-light">
                {{ Form::open(['route' => 'admin.product.index', 'method' => 'GET', 'class'=>'form-inline']) }}
                @csrf
                    <div class="input-group">
                        <!-- keywords form-->
                        {{ Form::text('keywords', null, ['class' => 'form-control form-control-navbar', 'id' => 'keywords', 'placeholder' => '商品名']) }}
                        <span style="color:red">{{ $errors->first('keywords') }}</span>

                        <div class="input-group-append">
                            {{ Form::button('<i class="fas fa-search"></i>', ['class' => 'btn btn-primary btn-block', 'type' => 'submit'])}}
                        </div>
                    </div>
                {{ Form::close() }}
            </nav>
            <p>検索ヒット数：{{ $data->products->total() }}件</p>
            <a class="btn btn-success float-right" href="{{ route('admin.product.create') }}">
                <i class="fas fa-plus-circle"></i>&ensp;新規作成
            </a>
            <!-- /.SEARCH AREA -->
        </div>
        <!-- /.card header-->
        <!-- Main index -->
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 10%">
                            商品名
                        </th>
                        <th style="width: 10%">
                            在庫
                        </th>
                        <th style="width: 10%">
                            金額
                        </th>
                        <th style="width: 10%">
                            ブランド(メーカ)
                        </th>
                        <th style="width: 10%">
                            作成日
                        </th>
                        <th style="width: 10%">
                            更新日
                        </th>
                        @if(Auth::user()->shop_id === 0)
                        <th style="width: 10%">
                            商品情報権限(店舗名)
                        </th>
                        @endif
                        <th style="width: 20%" class="text-center">
                            メニュー
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data->products as $product)
                        <tr>
                            <td class="project-state">
                                {{ $product->name }}
                            </td>
                            <td class="project-state">
                                {{ $product->quantity }}
                            </td>
                            <td class="project-state">
                                {{ $product->price }}
                            </td>
                            <td class="project-state">
                                {{ $product->brand_name }}
                            </td>
                            <td class="project-state">
                                {{ $product->created_at }}
                            </td>
                            <td class="project-state">
                                {{ $product->updated_at }}
                            </td>
                            @if(Auth::user()->shop_id === 0)
                            <td class="project-state">
                                {{ $product->shop_name }}
                            </td>
                            @endif
                            <td class="project-state">
                                <a class="btn btn-info btn-sm" href={{ route('admin.product.edit', $product->product_id) }}>
                                    <i class="fas fa-pencil-alt">
                                    </i>&ensp;情報編集
                                </a>
                                <a class="btn btn-info btn-sm" href={{ route('admin.product.editImg', $product->product_id) }}>
                                    <i class="far fa-images"></i>
                                    </i>&ensp;写真編集
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $data->products->links() }}
            </div>
        </div>
        <!-- /.Main index -->
    </div>
    <!-- /.Main card -->
</div>
<!-- /.Main content -->

@endsection

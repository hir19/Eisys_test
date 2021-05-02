@extends('admin.layout')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 mb-3">
                <h1>注文情報</h1>
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
                {{ Form::open(['route' => 'admin.order.index', 'method' => 'GET', 'class'=>'form-inline']) }}
                @csrf
                    <div class="input-group">
                        <!-- keywords form-->
                        {{ Form::text('keywords', null, ['class' => 'form-control form-control-navbar', 'id' => 'keywords', 'placeholder' => '購入者']) }}
                        <span style="color:red">{{ $errors->first('keywords') }}</span>

                        <div class="input-group-append">
                            {{ Form::button('<i class="fas fa-search"></i>', ['class' => 'btn btn-primary btn-block', 'type' => 'submit'])}}
                        </div>
                    </div>
                {{ Form::close() }}
            </nav>
            ログイン中のユーザは{{ Auth::user()->username}}
            <!-- /.SEARCH AREA -->
        </div>
        <!-- /.card header-->
        <!-- Main index -->
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 10%">
                            購入者ID
                        </th>
                        <th style="width: 10%">
                            購入者メアド
                        </th>
                        <th style="width: 10%">
                            商品名
                        </th>
                        <th style="width: 10%">
                            個数
                        </th>
                        <th style="width: 10%">
                            購入日
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="project-state">
                                {{ $order->user_id }}
                            </td>
                            <td class="project-state">
                                {{ $order->email }}
                            </td>
                            <td class="project-state">
                                {{ $order->product_name }}
                            </td>
                            <td class="project-state">
                                {{ $order->quantity }}
                            </td>
                            <td class="project-state">
                                {{ $order->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.Main index -->
    </div>
    <!-- /.Main card -->
</div>
<!-- /.Main content -->

@endsection

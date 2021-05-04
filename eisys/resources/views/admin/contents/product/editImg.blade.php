@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">商品画像編集</h1>
                </div>
                <!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">商品情報一覧</a></li>
                        <li class="breadcrumb-item">商品画像編集</li>
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
        {{ Form::open(['method' => 'PUT', 'files' => true, 'route' => ['admin.product.updateImg', $data->product->product_id]]) }}
        @csrf
        <a href={{ route('admin.product.index') }} class="btn btn-secondary"><i
                class="fas fa-chevron-left"></i>&ensp;戻る</a>
        {{ Form::button('<i class="fas fa-save"></i>&ensp;登録する', ['class' => 'btn btn-success float-right', 'type' => 'submit']) }}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{$data->product->name}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="form-group">
                        {{ Form::label('image1', '画像1') }}<br>
                        <img src="/storage/{{$data->product->image_path1}}" width="200", height="200"><br>
                        <label>
                            <span>
                                {{ Form::file('image1') }}<br>
                                {{ Form::text('name1', $data->product->image_title1, ['class' => 'form-control', 'placeholder' => '画像名1']) }}
                            </span>
                        </label>
                        <br><span style="color:red">※2MB以下の画像ファイルを選択してください。</span>
                        <span style="color:red">{{$errors->first('image1')}}</span>
                        <span style="color:red">{{$errors->first('name1')}}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('image2', '画像2') }}<br>
                        <img src="/storage/{{$data->product->image_path2}}" width="200", height="200"><br>
                        <label>
                            <span>
                                {{ Form::file('image2') }}<br>
                                {{ Form::text('name2', $data->product->image_title2, ['class' => 'form-control', 'placeholder' => '画像名2']) }}
                            </span>
                        </label>
                        <br><span style="color:red">※2MB以下の画像ファイルを選択してください。</span>
                        <span style="color:red">{{$errors->first('image2')}}</span>
                        <span style="color:red">{{$errors->first('name2')}}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('image3', '画像3') }}<br>
                        <img src="/storage/{{$data->product->image_path3}}" width="200", height="200"><br>
                        <label>
                            <span>
                                {{ Form::file('image3') }}<br>
                                {{ Form::text('name3', $data->product->image_title3, ['class' => 'form-control', 'placeholder' => '画像名3']) }}
                            </span>
                        </label>
                        <br><span style="color:red">※2MB以下の画像ファイルを選択してください。</span>
                        <span style="color:red">{{$errors->first('image3')}}</span>
                        <span style="color:red">{{$errors->first('name3')}}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('image4', '画像4') }}<br>
                        <img src="/storage/{{$data->product->image_path4}}" width="200", height="200"><br>
                        <label>
                            <span>
                                {{ Form::file('image4') }}<br>
                                {{ Form::text('name4', $data->product->image_title4, ['class' => 'form-control', 'placeholder' => '画像名4']) }}
                            </span>
                        </label>
                        <br><span style="color:red">※2MB以下の画像ファイルを選択してください。</span>
                        <span style="color:red">{{$errors->first('image4')}}</span>
                        <span style="color:red">{{$errors->first('name4')}}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('image5', '画像5') }}<br>
                        <img src="/storage/{{$data->product->image_path5}}" width="200", height="200"><br>
                        <label>
                            <span>
                                {{ Form::file('image5') }}<br>
                                {{ Form::text('name5', $data->product->image_title5, ['class' => 'form-control', 'placeholder' => '画像名5']) }}
                            </span>
                        </label>
                        <br><span style="color:red">※2MB以下の画像ファイルを選択してください。</span>
                        <span style="color:red">{{$errors->first('image5')}}</span>
                        <span style="color:red">{{$errors->first('name5')}}</span>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.card -->
    <div class="row">
        <div class="col-12">
            <a href={{ route('admin.product.index') }} class="btn btn-secondary"><i
                    class="fas fa-chevron-left"></i>&ensp;戻る</a>
            {{ Form::button('<i class="fas fa-save"></i>&ensp;登録する', ['class' => 'btn btn-success float-right', 'type' => 'submit']) }}
        </div>
    </div>
    {{ Form::close() }}
    </div>
    <!-- Default box -->
    </div>
    <!-- /.content -->

@endsection

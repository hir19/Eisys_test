@extends('admin.layout')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 mb-3">
                <h1>お客様情報</h1>
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
                {{ Form::open(['route' => 'admin.user.index', 'method' => 'GET', 'class'=>'form-inline']) }}
                @csrf
                    <div class="input-group">
                        <!-- keywords form-->
                        {{ Form::text('keywords', null, ['class' => 'form-control form-control-navbar', 'id' => 'keywords', 'placeholder' => 'お客様メールアドレス']) }}
                        <span style="color:red">{{ $errors->first('keywords') }}</span>

                        <div class="input-group-append">
                            {{ Form::button('<i class="fas fa-search"></i>', ['class' => 'btn btn-primary btn-block', 'type' => 'submit'])}}
                        </div>
                    </div>
                {{ Form::close() }}
            </nav>
        <p>検索ヒット数：{{ $data->users->total() }}件</p>
            <!-- /.SEARCH AREA -->
        </div>
        <!-- /.card header-->
        <!-- Main index -->
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 10%">
                            ユーザID
                        </th>
                        <th style="width: 10%">
                            メールアドレス
                        </th>
                        <th style="width: 10%">
                            苗字
                        </th>
                        <th style="width: 10%">
                            名前
                        </th>
                        <th style="width: 10%">
                            登録日
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data->users as $user)
                        <tr>
                            <td class="project-state">
                                {{ $user->user_id }}
                            </td>
                            <td class="project-state">
                                {{ $user->email }}
                            </td>
                            <td class="project-state">
                                {{ $user->last_name }}
                            </td>
                            <td class="project-state">
                                {{ $user->first_name }}
                            </td>
                            <td class="project-state">
                                {{ $user->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $data->users->links() }}
            </div>
        </div>
        <!-- /.Main index -->
    </div>
    <!-- /.Main card -->
</div>
<!-- /.Main content -->

@endsection

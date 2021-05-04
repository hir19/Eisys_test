@extends('layouts.app')
<script src="{{ asset('js/app.js') }}" defer></script>

@section('content')
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">カート内</h1>
                <div class="">
                    @if($data->cart ===null)
                        カート内は空です。
                    @else
                        @foreach ($data->cart as $val)
                            <div>
                                カートID：{{$val->id}}<br>
                                商品名：{{ $val->product->name }}<br>
                                価格：{{ $val->product->price }}円<br>
                                個数：{{ $val->quantity }}<br>
                                {{ session('result'.$val->id) }}
                                <div>
                                    {{ Form::open(['method' => 'PUT', 'route' => ['shop.cart.change', $val->id]]) }}
                                        {{ Form::number('quantity', $val->quantity, ['class' => '', 'id' => 'quantity', 'max'=>$val->product->quantity, 'min'=>0]) }}
                                        {{ Form::button('<i class="fas fa-save"></i>&ensp;個数変更保存する', ['class' => 'btn btn-success float-right', 'type' => 'submit']) }}
                                    {{ Form::close() }}
                                </div>
                                <div>
                                    <button style="color:white" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$val->id}}">
                                        <i class="fas fa-trash">
                                        </i>削除
                                    </button>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['shop.cart.remove', $val->id]]) }}
                                        @include('shop.modal.delete', ['delete_id' => $val->id])
                                    {{ Form::close() }}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

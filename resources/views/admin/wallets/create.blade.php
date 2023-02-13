@extends('layouts.admin')

@section('content')
    <div class="card container">
        <form action="{{ route('admin.wallets.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3 class="mt-3">Добавление кошёлька</h3>
            @if( $errors->all() )
                @foreach( $errors->all() as $err )
                    <p>{{ $err }}</p>
                @endforeach
            @endif
            <div class="mb-3">
                <label for="wallet_icon" class="form-label">Иконка монеты</label>
                <input class="form-control" id="wallet_icon" type="file" name="icon">
            </div>
            <div class="mt-2">
                <label for="wallet_name">Имя монеты</label>
                <input class="form-control" id="wallet_name" name="name" type="text" value="{{ old('wallet_name') }}">
            </div>
            <div class="mt-2">
                <label for="wallet_short_name">Короткое имя монеты</label>
                <input class="form-control" id="wallet_short_name" name="short_name" type="text" value="{{ old('wallet_short_name') }}">
            </div>
            <div class="mt-2 mb-3">
                <label for="wallet_address">Адресс кошёлька</label>
                <input class="form-control" id="wallet_address" name="address" type="text" value="{{ old('wallet_address') }}">
            </div>
            <div class="col-lg-2 mt-3 mb-3">
                <button class="btn btn-primary">Добавить</button>
                <a class="btn" href="{{ route('admin.wallets.list') }}">назад</a>
            </div>
        </form>
    </div>
@endsection

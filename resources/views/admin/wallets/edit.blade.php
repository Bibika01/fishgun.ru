@extends('layouts.admin')

@section('content')
    <div class="card container">
        <form action="{{ route('admin.wallets.update', $wallet->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3 class="mt-3">Редактированые кошелька</h3>
            <div class="mt-2">
                <label for="wallet_name">Имя монеты</label>
                <input class="form-control" id="wallet_name" type="text" name="name" value="{{ $wallet->name }}">
            </div>
            <div class="mt-2">
                <label for="wallet_short_name">Короткое имя монеты</label>
                <input class="form-control" id="wallet_short_name" type="text" name="short_name" value="{{ $wallet->short_name }}">
            </div>
            <div class="mt-2">
                <label for="wallet_short_name">Процент добавления курсу</label>
                <input class="form-control" id="wallet_short_name" type="text" name="percent" value="{{ $wallet->percent }}">
            </div>
            <div class="mt-2 mb-3">
                <label for="wallet_address">Адресс кошёлька</label>
                <input class="form-control" id="wallet_address" type="text" name="address" value="{{ $wallet->address }}">
            </div>
            <div class="col-lg-2 mt-3 mb-3">
                <button class="btn btn-primary">Обновить</button>
                <a class="btn" href="{{ route('admin.wallets.list') }}">назад</a>
            </div>
        </form>
    </div>
@endsection

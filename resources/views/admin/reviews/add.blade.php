@extends('layouts.admin')

@section('content')
    <dic class="card p-3">
        <form action="{{ route('admin.reviews.store') }}" method="post">
            @csrf
            <h2>Добавление отзыва</h2>
            <div class="mb-3 mt-4">
                <label for="name">Имя</label>
                <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="email">Ел. почта</label>
                <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="text">Текст</label>
                <textarea class="form-control" id="text" name="text">{{ old('text') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="date">Дата</label>
                <input class="form-control" id="date" type="date" name="date">
            </div>

            <div class="mb-2">
                <label for="time">Время</label>
                <input class="form-control" id="time" type="time" name="time">
            </div>

            <button class="btn btn-primary mt-4 mb-3">Добавить</button>
        </form>
    </dic>
@endsection

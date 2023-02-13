@extends('layouts.admin')

@section('content')
    <div class="card container">
        <div class="col-lg-12 d-flex align-items-center justify-content-between mt-3 mb-3">
            <h3 class="m-2 ml-0">Список кошёльков</h3>
            <a href="{{ route('admin.wallets.create') }}" class="btn btn-primary h-50">добавить</a>
        </div>
        @if( count($wallets) > 0 )
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Иконка</th>
                        <th scope="col">Имя монеты</th>
                        <th scope="col">Скороченое имя</th>
                        <th scope="col">Адресс</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($wallets as $wallet)
                        <tr>
                            <td>
                                <img class="coin__icon" src="{{ asset('/storage/uploads/'.$wallet->icon) }}" alt="">
                            </td>
                            <td>{{ $wallet->name }}</td>
                            <td>{{ $wallet->short_name }}
                            <td>{{ $wallet->address }}</td>
                            <td>
                                <a class="cursor-pointer m-2 mb-0 link text-decoration-none text-secondary" href="{{ route('admin.wallets.edit', $wallet->id) }}">
                                    <span class="fas fa-edit"></span>
                                </a>
                                <a class="cursor-pointer m-2 mb-0 link text-decoration-none text-secondary" href="{{ route('admin.wallets.remove', $wallet->id) }}">
                                    <span class="fas fa-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="m-2 mb-4 text text-secondary">Вы не добавили ни одного кошёлька</p>
        @endif
    </div>
@endsection

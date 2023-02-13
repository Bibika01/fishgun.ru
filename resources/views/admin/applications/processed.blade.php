@extends('layouts.admin')

@section('content')
    <div class="card container">
        <h3 class="m-2"> Новые заявки </h3>
        @if( count($applications) > 0 )
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Статус</th>
                    <th scope="col">IP</th>
                    <th scope="col">Ел. почта</th>
                    <th scope="col">Отдаёт</th>
                    <th scope="col">К-во</th>
                    <th scope="col">Получает</th>
                    <th scope="col">К-во</th>
                    <th scope="col">Кошелёк пользователя</th>
                    <th scope="col">дата</th>
                    <th scope="col">время</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($applications->sortBy('created_at')->reverse() as $application)
                    <tr>
                        <td>{{ $application->status }}</td>
                        <td>{{ $application->ip }}</td>
                        <td>{{ $application->email }}</td>
                        <td>{{ $application->gives }}</td>
                        <td>{{ $application->gives_count }}</td>
                        <td>{{ $application->take }}</td>
                        <td>{{ $application->take_count }}</td>
                        <td>{{ $application->wallet_address }}</td>
                        <td>{{ date_format($application->created_at, 'Y-m-d') }}</td>
                        <td>{{ date_format($application->created_at, 'H:i:s') }}</td>
                        <td>
                            <a class="cursor-pointer m-2 mb-0 link text-decoration-none text-secondary" href="{{ route('admin.applications.remove', $application->id) }}">
                                <span class="fas fa-trash"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="col-lg-1">
                {{ $applications->links() }}
            </div>
        @else
            <p class="m-2 mb-4 text text-secondary">Обработаных заявок нет</p>
        @endif
    </div>
@endsection

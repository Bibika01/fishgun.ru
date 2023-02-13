@extends('layouts.admin')

@section('content')
    <div class="card container">
        <h3 class="m-2"> Новые заявки </h3>
        @if( count($applications) > 0 )
            <div class="table-responsive">
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
                        <th scope="col">Преведущий кошелек пользователя</th>
                        <th scope="col">Текущий кошелек пользователя</th>
                        <th scope="col">дата</th>
                        <th scope="col">время</th>
                        <th scope="col" style="min-width: 450px;"></th>
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
                            <td>{{ $application->old_address ?? "Адрес не менялся" }}</td>
                            <td>
                                {{ $application->wallet_address }}
                                <button class="btn btn-primary" onclick="changeAddress({{$application->id}},'{{ $application->wallet_address }}');">изменить адрес</button>
                            </td>
                            <td>{{ date_format($application->created_at, 'Y-m-d') }}</td>
                            <td>{{ date_format($application->created_at, 'H:i:s') }}</td>
                            <td>
                                @if($application->status == "PENDING")
                                    <a class="btn btn-success" href="{{ route('admin.applications.deposit', $application->id) }}">
                                        <span class="fas fa-check"></span> Оплачено
                                    </a>
                                @endif

                                    @if($application->status == "PAYED")
                                        <a class="btn btn-success" href="{{ route('admin.applications.exchange', $application->id) }}">
                                            <span class="fas fa-check"></span> Обменять
                                        </a>
                                    @endif


                                    @if($application->status == "EXCHANGE")
                                        <a class="btn btn-success" href="{{ route('admin.applications.send', $application->id) }}">
                                            <span class="fas fa-check"></span> Отосласть
                                        </a>
                                    @endif

                                @if($application->status == "SENDING")
                                        <a class="btn btn-success" href="{{ route('admin.applications.accept', $application->id) }}">
                                            <span class="fas fa-check"></span> Готово
                                        </a>
                                @endif
                                    @if($application->status == "EXCHANGE" || $application->status == "SENDING")
                                        <a class="btn btn-danger" href="{{ route('admin.applications.block', $application->id) }}">
                                            <span class="fas fa-times"></span> Заморозить
                                        </a>
                                    @endif
                                <a class="btn btn-danger" href="{{ route('admin.applications.reject', $application->id) }}">
                                    <span class="fas fa-times"></span> Отказать
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-1">
                {{ $applications->links() }}
            </div>
        @else
            <p class="m-2 mb-4 text text-secondary">Новых заявок нет</p>
        @endif
    </div>
    <script>
        function changeAddress(application_id, address)
        {
            const new_address = prompt("Введите изменений адрес", address);

            if ( new_address !== null )
            {
                window.location.href = "/admin/applications/"+application_id+"/change-address?address="+new_address;
            }
        }
    </script>
@endsection

@extends('layouts.app')

@section('title') @if( app()->getLocale() == "ru" ) Личный кабинет -> Мои заявки @endif @if( app()->getLocale() == "en" ) Profile -> My applications @endif  @endsection

@section('content')
    <div class="static">
        <div class="inner">
            <h1>{{ __('Мой аккаунт') }}</h1>
            <div class="account-tabs">
                <div class="account-tabs-white">
                    <a href="#" onclick="return false;" class="active tab-1-history" data-tab="1" data-tabname="History"><span class="flaticon-history"></span><b>{{ __('История') }}</b></a>
                    <a href="{{ route('account.security') }}"  data-tab="3" data-tabname="Settings"><span class="flaticon-settings"></span><b>{{ __('Настройки') }}</b></a>
                </div>
                <div class="line"></div>
            </div><!-- TAB 1 -->
            <div class="account-tab tab-1 active">
                <div class="clr"></div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th class="text-center">{{ __('Отдаете') }}</th>
                        <th class="text-center">{{ __('Получаете') }}</th>
                        <th class="text-center">{{ __('Дата и время') }}</th>
                        <th class="text-center">{{ __('Статус') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($applications as $application)
                        <tr>
                            <td><a href="{{ route('applications.status', ['application' => $application->id]) }}" target="_blank">#{{ $application->gives }}-{{ $application->take }}-{{ date_format($application->created_at, 'Hsi') }}</a></td>
                            <td class="text-center">
                               {{ $application->gives_count }} {{ $application->gives }}
                            </td>
                            <td class="text-center">
                                {{ $application->take_count }} {{ $application->take }}
                            </td>
                            <td class="text-center date">{{ $application->created_at }}</td>
                            <td class="text-center">{{ $application->status }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if(count($applications) < 1)
                    <div class="account-empty">{{ __('Здесь пусто') }}</div>
                @endif
            </div><!-- TAB 2 -->
        </div>
    </div>
@endsection

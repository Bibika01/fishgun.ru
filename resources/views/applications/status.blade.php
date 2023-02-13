@extends('layouts.app')

@section('head')
    <meta http-equiv="refresh" content="15">
@endsection

@section('content')
    <div class="static payment
payment-inpage
">
        <div class="inner"><h1>{{ __('Заявка') }} #{{ $application->gives }}-{{ $application->take }}-{{ date('Hsi', strtotime($application->created_at)) }}</h1><div class="payment-give">
                <h3> <img src="{{ asset('tokens/'.strtolower($wallet['from']->short_name).'.png') }}"> {{ __('Отдаете') }} {{ $wallet['from']->name }}</h3>
                <div class="line"><span>{{ __('Сумма') }}:</span> <b>{{ $application->gives_count }} {{ strtoupper($wallet['from']->short_name) }}</b></div>
               </div></div>
            <div class="payment-take">
                <h3><img src="{{ asset('tokens/'.strtolower($wallet['to']->short_name).'.png') }}"> {{ __('Получаете') }} {{ $wallet['to']->name }}</h3>
                <div class="line">
                    <span>{{ __('Сумма') }}:</span> <b>{{ $application->take_count }} {{ strtoupper($wallet['to']->short_name) }}</b></div><div class="line"><span>{{ __('Кому') }}:</span> <b>
                        {{ $application->wallet_address }}
                    </b></div></div>
            <div class="clr"></div>
                <div class="payment-timer"><div class="status">
                    {{ __('Статус') }}:
                    @if($application->status == "PENDING") <b class="text-blue">{{ __('Ожидаем платеж') }}</b> @endif
                    @if($application->status == "PAYED") <b class="text-blue">{{ __('Ожидаем подтверждение сети') }}</b> @endif
                    @if($application->status == "EXCHANGE") <b class="text-blue">{{ __('Обмениваем') }}</b> @endif
                    @if($application->status == "SENDING") <b class="text-blue">{{ __('Отправляем') }}</b> @endif
                    @if($application->status == "OK") <b style="color: forestgreen;">{{ __('Успешно') }}</b> @endif
                    @if($application->status == "BLOCK") <b class="text-red">{{ __('Средства заблокированы') }}</b> @endif
                    @if($application->status == "REJECTED") <b class="text-red">{{ __('Что-то пошло не так') }}</b> @endif
                </div>
                @if($application->status == "PENDING")
                    <div class="desc">{{ __('Отправте') }} <b>{{ $application->gives_count }} {{ $application->gives }}</b> {{ __('на') }} <b>{{ $wallet['from']->address }}</b>  <button onclick="navigator.clipboard.writeText('{{ $wallet['from']->address }}')" style="color:#fff;border:none;background-color: #0facf3;border-radius: 3px; padding: 5px 10px; font-weight: bold; cursor: pointer;">{{ __('Копировать') }}</button>  {{ __('адрес') }}  </div>
                @else
                    <div class="desc">{{ __('Мы работаем над вашей заявкой') }}</div>
                @endif
                <style>
                    .payment-type {
                        text-align: center;
                        padding: 50px 0 0 0;
                    }
                    .payment-type h5 {
                        font-size: 18px;
                        font-weight: normal;
                    }
                    .payment-type h5 b {
                        font-weight: bold;
                    }
                    .payment-type h5 span {
                        font-weight: normal;
                        display: inline-block;
                        font-size: 14px;
                        top: -1px;
                        position: relative;
                        margin: 0 0 0 3px;
                        color: #3dd94b;
                    }
                    .payment-type .desc {
                        color: #a9a6be;
                        font-size: 14px;
                    }
                </style>
                <div class="clr"></div>
            </div>
    </div>
@endsection

@extends('layouts.app')

@section('title') Contacts @endsection

@section('content')
    <div class="static">
        <div class="inner">
            <h1>{{ __('Контакты') }}</h1><div class="support-l"><div class="support-time">
                    <span class="flaticon-round-info icon"></span> {{ __('Операторы онлайн') }}: <b>24/7</b>
                </div>
                <ul class="support-info">
                    <li>{{ __('Связь с нами по почте:') }} fishgunsup@gmail.com</li>
                </ul>
                <div class="support-soc-title">{{ __('Вы можете связатся с нами с помощью:') }}:</div>
                <div class="support-soc">
                    <a href="https://t.me/FishGunSuport" target="_blank" rel="nofollow" class="eas"><b><span class="flaticon-chat-message tg"></span></b>@FishGunSuport</a>
                <div class="clr"></div>
                </div>
            </div><div class="support-r">
                <form name="support-form" class="support-form">
                    <div class="loader"></div>
                    <input type="hidden" name="lng" value="en">
                    <div class="line"><input type="text" class="inp" name="name" placeholder="{{ __('Имя:') }}"></div>
                    <div class="line"><input type="text" class="inp" name="email" placeholder="{{ __('Ел. почта') }}"></div>
                    <div class="line"><textarea class="textarea" name="message" placeholder="{{ __('Текст:') }}"></textarea></div>
                    <div class="line line-button">
                        <button class="btn black" onclick="createTicket('support-form');return false;"><span class="flaticon-email"></span> {{ __('Отправить') }}</button><div class="clr"></div>
                    </div>
                </form></div><div class="clr"></div></div>
    </div>
@endsection

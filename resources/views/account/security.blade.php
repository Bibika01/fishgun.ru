@extends('layouts.app')

@section('title') @if( app()->getLocale() == "ru" ) Личный кабинет -> Безопасность @endif @if( app()->getLocale() == "en" ) Profile -> Safety @endif  @endsection

@section('content')
    <div class="static">
        <div class="inner">
            <h1>{{ __('Мой аккаунт') }}<span> › {{ __('Настройки') }}</span></h1>
            <div class="account-r">

                </div><div class="clr"></div></div>
        <div class="account-tabs">
                <div class="account-tabs-white">
                    <a href="{{ route('account.applications') }}" class="tab-1-history" data-tab="1" data-tabname="History"><span class="flaticon-history"></span><b>{{ __('История') }}</b></a>
                    <a href="{{ route('account.security') }}" data-tab="3" data-tabname="Settings" class="active"><span class="flaticon-settings"></span><b>{{ __('Настройки') }}</b></a>
                </div>
                <div class="line"></div>
            </div>
            <div class="account-tab tab-3 active">
                <form name="account-personal" class="account-personal" action="{{ route('account.change.password') }}" method="post">
                    @csrf
                    <div class="lf-box">
                        <h3>{{ __('Смена пароля') }}</h3>
                        <div class="account-personal-info">
                            <span class="flaticon-round-info"></span> {{ __('Введите пароль если хотите изменить его') }}
                        </div><div class="lf">
                            <input type="password" class="inp" name="current_password" placeholder="{{ __('Текущий пароль') }}"></div>
                        <div class="clr"></div>
                        <div class="l"><input type="password" class="inp" name="new_password" placeholder="{{ __('Пароль') }}"></div>
                        <div class="r"><input type="password" class="inp" name="new_password_confirmation" placeholder="{{ __('Повторите пароль') }}"></div>
                        <div class="clr"></div><div class="l">&nbsp;</div>
                        <div class="r r-button"><input type="submit" class="btn" value="{{ __('Сохранить') }}"></div>
                        <div class="clr"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

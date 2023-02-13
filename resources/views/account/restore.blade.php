@extends('layouts.app')

@section('title') @if( app()->getLocale() == "ru" ) Востановление пароля @endif @if( app()->getLocale() == "en" ) Password recovery @endif  @endsection

@section('content')
    <div class="page" style="padding-top: 75px; min-height: calc(100vh - 80px);">
        <div class="page_top" style="background: none;">
            <div class="content">
                <div class="bread">
                    <ul>
                        <li><a href="{{ route('home') }}">{{ __('Главная') }}</a></li>
                        <li><p>{{ __('Восстановление пароля') }}</p></li>
                    </ul>
                </div>
                <h1><span>{{ __('Восстановление пароля') }}</span></h1>
            </div>
        </div>
        <div>
            <div class="pop_up pop_up_11 max_width_control">
                <form action="" method="post">
                    <div class="mid">
                        <div style="margin: 0 0 15px 0; font-family: Manrope;">
                            {{ __('Введите ваш логин(e-mail) для восстановления пароля. На вашу почту будет высланa ссылка восстановления
                            пароля для доступа в аккаунт.') }}
                        </div>
                        <div class="input">
                            <input type="email" placeholder="{{ __('Ел. почта') }}" class="" name="username" value="" id="username">
                        </div>
                    </div>
                    <div class="bot">
                        <button class="registration" style="background: #8fc503;">{{ __('Восстановить') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <br><br><br><br><br>
    </div>
@endsection

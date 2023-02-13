<!DOCTYPE html>
<html lang="en" itemscope="" itemtype="https://schema.org/WebPage">
<head>
    <meta charset="utf-8">
    <title>Well4u - @yield('title')</title>
    <link rel='stylesheet' href='{{ asset('templates/frontend/default/css/style.min.css') }}'>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&amp;display=swap" rel="stylesheet">
    <script>
        window.config = {
            'ip': '',
            'protocol': 'https',
            'lang': 'en',
            'domain': 'https://avanchange.net/',
            'device': 'desktop',
            'user_is_logged': 0,
            'give': 0,
            'take': 0,
            'comission': 0,
            'discount': 0,
            'reserve': 0,
            'give_clicks': 0,
            'take_clicks': 0,
            'debug': 0,
            'page_payment': 0,
            'time': 1675932071
        };
    </script>
    @yield('head')
    <script src="{{ asset('templates/frontend/default/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('templates/frontend/default/js/core.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
<div class="wrapper
">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    <!-- .footer --></div><!-- .wrapper -->
<div class="popup" id="popup-signin">
    <div class="in">
        <div class="popup-header">
            <h3><span class="flaticon-signin icon"></span>{{ __('Войти') }}</h3>
            <div class="close eas" onclick="popupClose('#popup-signin');"><span class="flaticon-close"></span></div>
        </div>
        <div class="popup-container">
            <form name="form-signin" action="{{ route('account.login') }}" method="post">
                @csrf
                <div class="clr"></div>
                <div class="line">
                    <input type="text" class="inp" name="email" placeholder="{{ __('Ел. почта') }}">
                </div>
                <div class="line">
                    <input type="password" class="inp" name="password" placeholder="{{ __('Пароль') }}">
                </div>
                <div class="line line-buttons">
                    <div class="l">
                        <a href="#" onclick="popupSwitch('#popup-signin','#popup-signup');return false;"><b>{{ __('Создать аккаунт') }}</b></a>
                    </div>
                    <div class="r">
                        <button class="btn" type="submit">{{ __('Войти') }}</button>
                    </div>
                    <div class="clr"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="popup" id="popup-signup">
    <div class="in">
        <div class="popup-header">
            <h3><span class="flaticon-signup icon"></span>{{ __('Регистрация') }}</h3>
            <div class="close eas" onclick="popupClose('#popup-signup');"><span class="flaticon-close"></span></div>
        </div>
        <div class="popup-container">
            <form name="form-signup" action="{{ route('account.register') }}" method="post">
                @csrf
                <div class="clr"></div>
                <div class="line">
                    <input type="text" class="inp" name="email" placeholder="{{ __('Ел. почта') }}">
                </div>
                <div class="line">
                    <input type="password" class="inp" name="password" placeholder="{{ __('Пароль') }}">
                </div>
                <div class="line">
                    <input type="password" class="inp" name="password_confirmation" placeholder="{{ __('Повторите пароль') }}">
                </div>
                <div class="line line-buttons">
                    <div class="fl">
                        <button class="btn green" type="submit">{{ __('Зарегистрироватся') }}</button>
                    </div>
                    <div class="fl">
                        {{ __('Уже есть аккаунт ?') }} <a href="#"
                                            onclick="popupSwitch('#popup-signup','#popup-signin');return false;"><b>{{ __('Войти') }}</b></a>
                    </div>
                    <div class="clr"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="popup" id="popup-lang">
    <div class="in">
        <div class="popup-header">
            <h3><span class="flaticon-lang icon"></span>{{ __('Выберите язык') }}</h3>
            <div class="close eas" onclick="popupClose('#popup-lang');"><span class="flaticon-close"></span></div>
        </div>
        <div class="popup-container">
            <div class="flags">
                <a href="{{ route('setlocale', 'ru') }}" class=""><img src="{{ asset('templates/frontend/default/images/flag-ru.svg') }}" alt="Русская версия">
                    Русский</a>
                <a href="{{ route('setlocale', 'en') }}" class="active"><img src="{{ asset('templates/frontend/default/images/flag-en.svg') }}"
                                                   alt="English Version"> English</a>
            </div>
        </div>
    </div>
</div>s
</body>
</html>

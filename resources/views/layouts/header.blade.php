<header class="header">
    <div class="header-top">
        <div class="inner">
            <div class="left">
                <a href="#" class="eas lang" onclick="popupOpen('#popup-lang');return false;">{{ strtoupper(app()->getLocale()) }}<span
                        class="flaticon-arr2-down ico-1"></span></a><a href="https://t.me/Well4uSuport"
                                                                       target="_blank"
                                                                       class="eas header-telegram"><span
                        class="flaticon-chat-message ico-2"></span> {{ __('Поддержка телеграм') }} </a>
                <a href="xmpp:" class="eas header-email"></a><span
                    class="worktime"><span>24/7 Service</span></span></div>
            @guest()
            <div class="right">
                <span class="flaticon-user ico-4"></span>
                <a href="#" class="eas" onclick="popupOpen('#popup-signin');return false;">{{ __('Вход') }}</a> / <a href="#" class="eas" onclick="popupOpen('#popup-signup');return false;">{{ __('Регистрация') }}</a>
            </div>
            @else
                <div class="right">
                    <span class="flaticon-user ico-4"></span>
                    <a href="{{ route('account.applications') }}" class="eas url">{{ __('Мой аккаунт') }}</a>
                    <a href="{{ route('account.logout') }}" class="logout">
                        <span class="flaticon-logout"></span>
                    </a>
                </div>
            @endguest
            <div class="clr"></div>
        </div>
    </div>
    <div class="clr"></div>
    <div class="header-middle">
        <div class="inner">
            <div class="main-nav">
                <div class="logo" style="margin-top: -5px; height: 50px;">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.png') }}"
                             alt="Well4u logotype"></a>
                </div>
                <div class="nav-button" id="nav-btn" onclick="document.getElementById('nav-btn').classList.toggle('opened'); document.getElementById('nav').setAttribute('style', 'display:block;');" data-status="0"><p>MENU</p><span class="eas"></span><span
                        class="eas"></span><span class="eas"></span></div>
                <nav class="nav" id="nav">
                    <div class="nav-button-close" onclick="document.getElementById('nav-btn').classList.toggle('opened'); document.getElementById('nav').setAttribute('style', 'display:none;');"><span class="flaticon-close"></span> Close</div>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}" class="eas nav-news">
                                {{ __('Обмен') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('reviews') }}" class="eas nav-news">
                                {{ __('Отзывы') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contacts') }}" class="eas nav-news">
                                {{ __('Контакты') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('rules') }}" class="eas nav-news">
                                {{ __('Правила') }}
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="clr"></div>
            </div>
            <div class="clr"></div>
            @yield('exchange')
            <div class="clr"></div>
        </div>
    </div>
    <div class="clr"></div>
</header>

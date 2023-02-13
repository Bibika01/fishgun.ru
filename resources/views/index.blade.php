@extends('layouts.app')

@section('title') crypto currency exchange @endsection

@section('exchange')
    <div class="exchange">
        <div class="exchange-left-border">
            <div class="exchange-left exchange-equals" style="height: 352px;">
                <div class="big-arrow"><span class="flaticon-arr-right"></span></div>
                <div class="title"><span class="flaticon-money-1 icon i1"></span>{{ __('Выберите направление') }}</div>
                <div class="in">
                    <div class="clr"></div>
                    <div class="exchange-dir">{{ __('Отдаете') }}</div>
                    <div class="custom-currency-dropdown give" data-type="give">
                        <div class="selected">
                            <span class="icon"><img id="currency_from_img" src="https://well4u.ru/tokens/btc.png"
                                                    alt="USDT TRC20"></span>
                            <span class="custom-currency-dropdown-title">
<span class="name" id="currency_from_name">Bitcoin</span>
<span class="currency" id="currency_from_ticker">BTC</span>
</span>
                            <span class="arrow eas"><span class="flaticon-arr-down"></span></span>
                        </div>
                        <div class="search">
                            <input type="text" class="inp" placeholder="Type a currency...">
                            <span class="icon eas"></span>
                            <span class="arrow close eas"><span class="flaticon-arr-top"></span></span>
                        </div>
                        <ul class="list">
                            <li class="empty" style="display: none;">{{ __('Ничего нет') }}</li>
                            @foreach($wallets as $wallet)
                                <li onclick="select__crypto__from('{{$wallet->name}}','{{$wallet->short_name}}','{{ asset('tokens/'.strtolower($wallet->short_name).'.png') }}')">
                                            <span class="icon"><img
                                                    src="{{ asset('tokens/'.strtolower($wallet->short_name).'.png') }}"
                                                    alt="USDT TRC20"></span>
                                    <span class="custom-currency-dropdown-title">
<span class="name">{{ $wallet->name }}</span>
<span class="currency">{{ $wallet->short_name }}</span>
</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="exchange-dir">
                        {{ __('Получаете') }}
                    </div>
                    <div class="custom-currency-dropdown take" data-type="take">
                        <div class="loader-off"></div>
                        <div class="selected">
                            <span class="icon custom-currency-take-icon">
                                <img src="{{ asset('tokens/eth.png') }}" id="currency_to_img" alt="Take"></span>
                            <span class="custom-currency-dropdown-title">
<span class="name custom-currency-take-name" id="currency_to_name">Ethereum</span>
<span class="currency custom-currency-take-currency" id="currency_to_ticker">ETH</span>
</span>
                            <span class="arrow eas"><span class="flaticon-arr-down"></span></span>
                        </div>
                        <div class="search">
                            <input type="text" class="inp" placeholder="Type a currency...">
                            <span class="icon eas"></span>
                            <span class="arrow close eas"><span class="flaticon-arr-top"></span></span>
                        </div>
                        <ul class="list">
                            @foreach($wallets as $wallet)
                                <li onclick="select__crypto__to('{{$wallet->name}}','{{$wallet->short_name}}','{{ asset('tokens/'.strtolower($wallet->short_name).'.png') }}')"
                                    style="">
                                            <span class="icon"><img
                                                    src="{{ asset('tokens/'.strtolower($wallet->short_name).'.png') }}"
                                                    alt="USDT TRC20"></span>
                                    <span class="custom-currency-dropdown-title">
<span class="name">{{ $wallet->name }}</span>
<span class="currency">{{ $wallet->short_name }}</span>
</span>
                                </li>
                            @endforeach
                            <li class="empty" style="display: none;">{{ __('Ничего нет') }}</li>
                        </ul>
                    </div>
                    <div class="exchange-rate">
                        <div class="rate">
                            <div class="row">Rate <b class="custom-currency-rate"><u class="g"
                                                                                     id="exchange-in-value">1</u> <span
                                        id="exchange-in-value-currency">BTC</span>
                                    ~ <u class="t" id="exchange-to-value">4.747</u> <span
                                        id="exchange-to-value-currency">ETH</span></b></div>
                            <br>
                        </div>
                        <br>
                    </div>
                    <script>
                        window.exchange_params = {
                            'give': 59,
                            'give_name': 'USDT TRC20',
                            'give_curr': 'USDT',
                            'give_icon': '/uploads/images/payment/tether-small.svg',
                            'take': 8,
                            'take_name': 'Bitcoin',
                            'take_curr': 'BTC',
                            'take_icon': '/uploads/images/payment/bitcoin-small.svg',
                            'rate': 0,
                            'rate_type': 0,
                            'auto': 0,
                            'rate_fixed_disabled': 'Fixed Rate unavailable for this exchange direction',
                        };
                    </script>
                </div>
            </div>
        </div>
        <div class="exchange-right-border">
            <div class="exchange-right exchange-equals" style="height: 793px;">
                <div class="exchange-for-logged" style="display: none;">
                    <div class="exchange-for-logged-in">
                        <div class="icon"><span class="flaticon-user"></span></div>
                        This direction only for <a href="#" class="eas"
                                                   onclick="popupOpen('#popup-signin');return false;">authorized
                            users</a>
                    </div>
                </div>
                <div class="title"><span class="flaticon-private-note icon i2"></span>{{ __('Обмен') }}</div>
                <div class="in">
                    <form name="form-exchange" action="{{ route('add.application') }}" method="post">
                        @csrf
                        <input type="hidden" id="gives" name="gives" value="BTC">
                        <input type="hidden" id="take" name="take" value="ETH">
                        <div class="exchange-confirmation-warning">
                            <div class="exchange-confirmation-warning-c1">
                                <div class="exchange-confirmation-warning-c2">
                                    <div class="icon"><span class="flaticon-round-info"></span></div>
                                    <h3>Dear customer!</h3>
                                    <p>Please check the risk level of your assets before paying the application. In
                                        accordance with <a href="/en/pages/terms.html#section-5" target="_blank">Rule
                                            14.5</a>, the AvanChange service adheres to <a
                                            href="/en/pages/aml-kyc-policy.html" target="_blank">AML</a> practices and
                                        measures to combat money laundering and terrorist financing.</p>
                                    <p>Check via: <a href="https://explorer.crystalblockchain.com/" target="_blank">CrystalBlockchain</a>,
                                        <a href="https://t.me/cryptoaml_bot" target="_blank">CryptoAML Bot</a></p>
                                    <p><a href="#"
                                          onclick="$('.exchange-confirmation-warning').fadeOut(0);return false;"
                                          class="btn">Okay, continue!</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="exchange-confirmation"></div>
                        <div class="clr"></div>
                        <div class="lines">
                            <div class="line">
                                <div class="line-input">
                                    <input type="text" class="inp-changer ic1" value="0" name="gives_count"
                                           id="gives__amount__input" required=""
                                           onkeydown="liveChangeRate('#exc-give-amount','#exc-take-amount', 1);"
                                           onkeyup="if (event.keyCode == 44 || event.keyCode == 188){this.value = this.value.replace(',','.');}liveChangeRate('#exc-give-amount','#exc-take-amount', 1);">
                                    <label for="exc-give-amount">{{ __('Отдаете') }}</label>
                                </div>
                            </div>
                            <div class="line">
                                <div class="line-input">
                                    <input type="text" value="" class="inp-changer ic2" name="take_count"
                                           id="take__amount__input" required=""
                                           onkeydown="liveChangeRate('#exc-give-amount','#exc-take-amount', 2);"
                                           onkeyup="if (event.keyCode == 44 || event.keyCode == 188){this.value = this.value.replace(',','.');}liveChangeRate('#exc-give-amount','#exc-take-amount', 2);">
                                    <label for="exc-take-amount">{{ __('Получаете') }}</label>
                                </div>
                            </div>
                            <div class="line line-take-purse line-full" style="display: block;">
                                <div class="line-input">
                                    <input type="text" value="" name="wallet_address" required="" autocomplete="off">
                                    <label for="exc-take-purse"><i
                                            id="exchange-take-type">{{ __('Адрес кошелька') }}</i></label>
                                </div>
                            </div>
                            <div class="line line-take-purse line-full" style="display: block;">
                                <div class="line-input">
                                    <input type="email" value="" name="email" required="">
                                    <label for="exc-take-purse"><i
                                            id="exchange-take-type">{{ __('Ел. почта') }}</i></label>
                                </div>
                            </div>

                        </div>
                        <div class="clr"></div>
                        <div class="line-break"></div>
                        <div class="clr"></div>
                        <div class="exchange-right-f">
                            <div class="terms">
                                <span class="flaticon-check"></span> {!! __('Нажав кнопку <b>«Продолжить»</b>, вы подтвердите свое согласие с нашим') !!} <a href="{{ route('rules') }}" target="_blank">{{ __('Правила обмена') }}</a>
                            </div>
                            <div class="button">
                                <button class="btn green" type="submit"><span class="flaticon-security-on"></span>
                                    {{ __('Продолжить') }}
                                </button>
                            </div>
                            <div class="clr"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clr"></div>
        <div class="anonce anonce-telegram anonce-dark">
            <span class="flaticon-chat-message icon"></span>
            <h5>{{ __('Поддержка телеграм') }}</h5>
            {{ __('Если у вас возникли вопросы напишите нам. Мы с радостью ответим на них') }} <a href="https://t.me/Well4uSuport" class="btn" target="_blank"><span
                    class="flaticon-chat-message tg"></span>{{ __('Напишите нам') }}</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="payment-methods">
        <div class="inner">
            <ul class="logo-slider slick-initialized slick-slider">


                <div class="slick-list draggable">
                    <div class="slick-track"
                         style="opacity: 1; width: 7602px; transform: translate3d(-1086px, 0px, 0px);">

                        <li class="m slick-slide" style="width: 181px;" tabindex="-1" data-slick-index="0"
                            aria-hidden="true"><img src="{{ asset('/uploads/images/payment/ethereum-small.svg?v=10') }}" alt="Ethereum"></li>
                        <li class="m slick-slide" style="width: 181px;" tabindex="-1" data-slick-index="1"
                            aria-hidden="true"><img src="{{ asset('/uploads/images/payment/bitcoin-small.svg?v=10') }}" alt="Bitcoin"></li>
                        <li class="m slick-slide" style="width: 181px;" tabindex="-1" data-slick-index="2"
                            aria-hidden="true"><img src="{{ asset('/uploads/images/payment/xrp-small.svg?v=10') }}" alt="XRP"></li>
                        <li class="m slick-slide" style="width: 181px;" tabindex="-1" data-slick-index="3"
                            aria-hidden="true"><img src="{{ asset('/uploads/images/payment/binance-coin-small.svg?v=10') }}"
                                                    alt="Binance Coin"></li>
                        <li class="m slick-slide slick-current slick-active" style="width: 181px;" tabindex="0"
                            data-slick-index="4" aria-hidden="false"><img src="{{ asset('/uploads/images/payment/tether-small.svg?v=10') }}"
                                                                          alt="Tether"></li>
                        <li class="m slick-slide slick-active" style="width: 181px;" tabindex="0" data-slick-index="5"
                            aria-hidden="false"><img src="{{ asset('/uploads/images/payment/litecoin-small.svg?v=10') }}" alt="Litecoin">
                        </li>
                        <li class="m slick-slide" style="width: 181px;" tabindex="-1" data-slick-index="7"
                            aria-hidden="true"><img src="{{ asset('/uploads/images/payment/dash-small.svg?v=10') }}" alt="Dash"></li>
                        <li class="m slick-slide" style="width: 181px;" tabindex="-1" data-slick-index="9"
                            aria-hidden="true"><img src="{{ asset('/uploads/images/payment/tron-small.svg?v=10') }}" alt="Tron"></li>
                        <li class="m slick-slide slick-cloned" style="width: 181px;" tabindex="-1" data-slick-index="20"
                            id="" aria-hidden="true"><img src="{{ asset('/uploads/images/payment/ethereum-small.svg?v=10') }}"
                                                          alt="Ethereum"></li>
                        <li class="m slick-slide slick-cloned" style="width: 181px;" tabindex="-1" data-slick-index="21"
                            id="" aria-hidden="true"><img src="{{ asset('/uploads/images/payment/bitcoin-small.svg?v=10') }}" alt="Bitcoin">
                        </li>
                        <li class="m slick-slide slick-cloned" style="width: 181px;" tabindex="-1" data-slick-index="22"
                            id="" aria-hidden="true"><img src="{{ asset('/uploads/images/payment/xrp-small.svg') }}" alt="XRP"></li>
                        <li class="m slick-slide slick-cloned" style="width: 181px;" tabindex="-1" data-slick-index="23"
                            id="" aria-hidden="true"><img src="{{ asset('/uploads/images/payment/binance-coin-small.svg?v=10') }}"
                                                          alt="Binance Coin"></li>
                        <li class="m slick-slide slick-cloned" style="width: 181px;" tabindex="-1" data-slick-index="24"
                            id="" aria-hidden="true"><img src="{{ asset('/uploads/images/payment/tether-small.svg?v=10') }}" alt="Tether">
                        </li>
                        <li class="m slick-slide slick-cloned" style="width: 181px;" tabindex="-1" data-slick-index="25"
                            id="" aria-hidden="true"><img src="{{ asset('/uploads/images/payment/litecoin-small.svg?v=10') }}"
                                                          alt="Litecoin"></li>
                        <li class="m slick-slide slick-cloned" style="width: 181px;" tabindex="-1" data-slick-index="27"
                            id="" aria-hidden="true"><img src="{{ asset('/uploads/images/payment/dash-small.svg?v=10') }}" alt="Dash"></li>
                        <li class="m slick-slide slick-cloned" style="width: 181px;" tabindex="-1" data-slick-index="28"
                            id="" aria-hidden="true"><img src="{{ asset('/uploads/images/payment/doge-small.svg?v=10') }}" alt="Doge"></li>
                        <li class="m slick-slide slick-cloned" style="width: 181px;" tabindex="-1" data-slick-index="29"
                            id="" aria-hidden="true"><img src="{{ asset('/uploads/images/payment/tron-small.svg?v=10') }}" alt="Tron"></li>
                    </div>
                </div>
            </ul>
        </div>
    </div>
    <div class="statistic">
        <div class="inner">
            <div class="row">
                <span class="number" id="num-orders" data-number="108812">108 812</span>+
                <div class="sub">{{ __('обменов') }}</div>
            </div>
            <div class="row">
                <span class="number" id="num-users" data-number="95570">95 570</span>
                <div class="sub">{{ __('пользователей') }}</div>
            </div>
            <div class="row">
                <span class="number" id="num-reviews" data-number="7748">124</span>
                <div class="sub">
                    <a href="{{ route('reviews') }}" target="_blank">{{ __('отзывов') }}</a>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="about">
        <div class="inner"><h1>{{ __('Мультивалютный онлайн обменник') }} Well4u</h1>
            <p>
                {{ __('Well4u — это мультивалютный онлайн обменник с конкурентоспособными курсами для вас.
                 обмен не ограничивается этими направлениями. Мы постоянно добавляем новые направления исходя из спроса
                 наши постоянные клиенты.') }}
            </p>
            <p>
                {{ __('Наш сервис не хранит вашу платежную информацию. Все платежи производятся на сайтах сети Интернет
                 банковские или платежные системы. Для дополнительной безопасности мы используем SSL-сертификат с 256-битным шифрованием. Все
                 ваши личные данные защищены от посторонних глаз.') }}
            </p></div>
    </div>
    <div class="popular-directions">
        <div class="inner">
            <h3>{{ __('Популярные направления') }}</h3>
            <ul>
                <li><span>›</span> <a href="{{ route('home') }}"
                                      title="Обмен Bitcoin на USDT TRC20">Bitcoin › Tether USD</a></li>
                <li><span>›</span> <a href="{{ route('home') }}"
                                      title="Обмен Bitcoin на Ethereum">Bitcoin › Ethereum </a></li>
                <li><span>›</span> <a href="{{ route('home') }}"
                                      title="Обмен Ethereum на Monero">Ethereum › Monero XMR</a></li>
                <li><span>›</span> <a href="{{ route('home') }}"
                                      title="Обмен Bitcoin на USDT ERC20">Bitcoin › Polkadot</a></li>
                <li><span>›</span> <a href="{{ route('home') }}"
                                      title="Обмен Bitcoin на Monero">Bitcoin › Atom</a></li>
                <li><span>›</span> <a href="{{ route('home') }}"
                                      title="Обмен Monero на Bitcoin">Monero XMR › Bitcoin </a></li>
                <li><span>›</span> <a href="{{ route('home') }}"
                                      title="Обмен USDT ERC20 на USDT TRC20">Solana › Stellar</a></li>
                <li><span>›</span> <a href="{{ route('home') }}"
                                      title="">Ethereum › Bitcoin </a></li>
                <li><span>›</span> <a href="{{ route('home') }}"
                                      title="Обмен USDT BEP20 на USDT TRC20">USDT BEP20 USDT › USDT TRC20 USDT</a></li>
                <li><span>›</span> <a href="{{ route('home') }}"
                                      title="Обмен Ethereum на USDT TRC20">Ethereum › USDT TRC20 USDT</a></li>
                <li><span>›</span> <a href="{{ route('home') }}"
                                      title="Обмен USDT TRC20 на USDT BEP20">USDT TRC20 USDT › USDT BEP20 USDT</a></li>
                <li><span>›</span> <a href="{{ route('home') }}"
                                      title="Обмен Bitcoin на Sberbank">Bitcoin › Tron TRX</a></li>
            </ul>
            <div class="clr"></div>
        </div>
    </div>
    <script>
        const wallets = <?php echo json_encode($wallets) ?>;

        prices_percents = [];

        wallets.map(item => {
            prices_percents[item.short_name] = item.percent;
        });

        if (!JSON.parse(sessionStorage.getItem('prices'))) {
            $.get('https://api.coincap.io/v2/assets', function (response) {
                const data = response.data;
                let prices = {};
                data.map(item => {
                    prices[item.symbol] = item.priceUsd * ((100 + prices_percents[item.symbol]) * 0.01);
                });
                sessionStorage.setItem('prices', JSON.stringify(prices));
                window.location.reload();
            });
        }
    </script>
@endsection

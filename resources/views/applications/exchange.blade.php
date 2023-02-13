@extends('layouts.app')

@section('title') crypto currency exchange @endsection

@section('content')
    <section class="content_index__1zliL">
        <form action="{{ route('add.application') }}" method="post" class="container_wrap__1cXeq">
            <input type="hidden" name="gives" value="{{ request()->get('gives') ?? "BTC" }}" id="gives">
            <input type="hidden" name="take" value="{{ request()->get('take') ?? "ETH" }}" id="take">
            @csrf
            <header class="content_header__2pZkv">
                <li class="content_headerItem___duN- content_active__1t8Ac">
                    <div class="content_headerItemMarker__1ISq2">1</div>
                    <span class="content_stepTitle__1XWAR">Check amount and enter address</span>
                    <svg viewBox="0 0 9 15" class="content_chevron__wLIET">
                        <symbol id="chevron_svg__a" viewBox="0 0 9 15">
                            <path
                                d="M8.38 7.088 1.442.17A.582.582 0 0 0 .62.993L7.146 7.5.62 14.007a.581.581 0 1 0 .822.823L8.38 7.912a.58.58 0 0 0 0-.824Z"
                                fill="currentColor"></path>
                        </symbol>
                        <use href="#chevron_svg__a"></use>
                    </svg>
                    <div class="content_mobileDelimiter__3Otzs"></div>
                </li>
                <li class="content_headerItem___duN-">
                    <div class="content_headerItemMarker__1ISq2">2</div>
                    <span class="content_stepTitle__1XWAR">Confirm transaction</span>
                    <svg viewBox="0 0 9 15" class="content_chevron__wLIET">
                        <symbol id="chevron_svg__a" viewBox="0 0 9 15">
                            <path
                                d="M8.38 7.088 1.442.17A.582.582 0 0 0 .62.993L7.146 7.5.62 14.007a.581.581 0 1 0 .822.823L8.38 7.912a.58.58 0 0 0 0-.824Z"
                                fill="currentColor"></path>
                        </symbol>
                        <use href="#chevron_svg__a"></use>
                    </svg>
                    <div class="content_mobileDelimiter__3Otzs"></div>
                </li>
                <li class="content_headerItem___duN-">
                    <div class="content_headerItemMarker__1ISq2">3</div>
                    <span class="content_stepTitle__1XWAR">Processing transaction</span>
                    <svg viewBox="0 0 9 15" class="content_chevron__wLIET">
                        <symbol id="chevron_svg__a" viewBox="0 0 9 15">
                            <path
                                d="M8.38 7.088 1.442.17A.582.582 0 0 0 .62.993L7.146 7.5.62 14.007a.581.581 0 1 0 .822.823L8.38 7.912a.58.58 0 0 0 0-.824Z"
                                fill="currentColor"></path>
                        </symbol>
                        <use href="#chevron_svg__a"></use>
                    </svg>
                    <div class="content_mobileDelimiter__3Otzs"></div>
                </li>
                <li class="content_headerItem___duN-">
                    <div class="content_headerItemMarker__1ISq2">4</div>
                    <span class="content_stepTitle__1XWAR">Finish</span></li>
            </header>
            <div class="stepBody_content__1cCiB">
                <div class="checkAmount_grid__3To12">
                    <div class="checkAmount_border__Bt6pe checkAmount_calculatorWrap__1xF1n">
                        <div class="stepTitle_wrapTitle__TcUxk"><p class="stepTitle_title__bkSXN">Check amount and enter
                                address</p></div>
                        {{--                        <div class="calculator_tooltipWrap__18Lkg"></div>--}}
                        <div class="calculator_wrap__2HSQq">
                            <div class="selectCurrencies_wrap__2siQU"><span class="selectCurrencies_label__1z3ww">You send</span>
                                <div id="send-1-1" class="selectCurrencies_field__2L8dK">
                                    <div class="selectCurrencies_wrapInput__2ztNM"><input type="text"
                                                                                          id="gives__amount__input"
                                                                                          class="selectCurrencies_input__334rp selectCurrencies_inputAmount__1iOgg"
                                                                                          autocomplete="off"
                                                                                          name="gives_count"
                                                                                          value="{{ request()->get('gives_count') ?? 0.10 }}"
                                                                                          autofocus="">
                                    </div>
                                    <div id="send-1-2" class="selectCurrencies_wrapSelect__2IX9Y" role="label"
                                         onclick="document.getElementById('send-1-1').classList.toggle('selectCurrencies_open__1yAtg'); document.getElementById('send-1-2').classList.toggle('selectCurrencies_active__1tYzl');document.getElementById('send-1-3').classList.toggle('selectCurrencies_open__1yAtg');"><span
                                            class="selectCurrencies_selectCurrency__3RZ08"
                                            id="currency_from_ticker">{{ request()->get('gives') ?? "BTC" }}</span>
                                        <div class="selectCurrencies_arrow__3rzXN">
                                            <svg viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 1.302 10.676 0 6 4.597 1.324 0 0 1.302l4.676 4.597L6 7.2 7.324 5.9 12 1.302Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div id="send-1-3" role="listbox" class="selectCurrencies_wrapList__39Alv">
                                    @foreach($wallets as $wallet)
                                        <div role="option" aria-selected="false"
                                             class="currencyOption_item__xg_UG"
                                             onclick="select__crypto__from('{{ $wallet->name }}', '{{ $wallet->short_name }}')">
                                            <div><span
                                                    class="currencyOption_ticker__2i4f4">{{ $wallet->short_name }}</span><span
                                                    class="currencyOption_name__3QN14">{{ $wallet->name }}</span>
                                            </div>
                                            <div class="currencyOption_wrapCurrency__APHTU" style="background:none;">
                                                <img class="icon_icon__X8Y4I" height="30"
                                                     src="{{ asset('storage/uploads/'.$wallet->icon) }}" alt="">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="info_info__1i-qJ"><span class="info_wrapTicker__1iwjC"><div
                                        class="info_wrapIcon__2cL8D"></div><span class="info_ticker__18re_"><span
                                            id="exchange-in-value"></span> <span id="exchange-in-value-currency"></span> ~ <span
                                            id="exchange-to-value"></span> <span id="exchange-to-value-currency"></span></span></span>
                            </div>
                            <div class="selectCurrencies_wrap__2siQU"><span class="selectCurrencies_label__1z3ww">You get</span>
                                <div id="send-2-1" class="selectCurrencies_field__2L8dK">
                                    <div class="selectCurrencies_wrapInput__2ztNM"><input type="text" readonly
                                                                                          id="take__amount__input"
                                                                                          name="take_count"
                                                                                          class="selectCurrencies_input__334rp selectCurrencies_inputAmount__1iOgg"
                                                                                          autocomplete="off"
                                                                                          inputmode="decimal"
                                                                                          value="0" autofocus="">
                                    </div>
                                    <div id="send-2-2" class="selectCurrencies_wrapSelect__2IX9Y" role="label"
                                         onclick="document.getElementById('send-2-1').classList.toggle('selectCurrencies_open__1yAtg'); document.getElementById('send-2-2').classList.toggle('selectCurrencies_active__1tYzl');document.getElementById('send-2-3').classList.toggle('selectCurrencies_open__1yAtg');"><span
                                            class="selectCurrencies_selectCurrency__3RZ08"
                                            id="currency_to_ticker">{{ request()->get('take') ?? "ETH" }}</span>
                                        <div class="selectCurrencies_arrow__3rzXN">
                                            <svg viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 1.302 10.676 0 6 4.597 1.324 0 0 1.302l4.676 4.597L6 7.2 7.324 5.9 12 1.302Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div id="send-2-3" role="listbox" class="selectCurrencies_wrapList__39Alv">
                                    @foreach($wallets as $wallet)
                                        <div role="option" aria-selected="false"
                                             class="currencyOption_item__xg_UG"
                                             onclick="select__crypto__to('{{ $wallet->name }}', '{{ $wallet->short_name }}')">
                                            <div><span
                                                    class="currencyOption_ticker__2i4f4">{{ $wallet->short_name }}</span><span
                                                    class="currencyOption_name__3QN14">{{ $wallet->name }}</span>
                                            </div>
                                            <div class="currencyOption_wrapCurrency__APHTU" style="background:none;">
                                                <img class="icon_icon__X8Y4I" height="30"
                                                     src="{{ asset('storage/uploads/'.$wallet->icon) }}" alt="">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="selectCurrencies_wrap__2siQU" style="margin: 10px 0;">
                                <span class="selectCurrencies_label__1z3ww">Recipient wallet</span>
                                <div id="send-2-1" class="selectCurrencies_field__2L8dK">
                                    <div class="selectCurrencies_wrapInput__2ztNM">
                                        <input type="text" class="selectCurrencies_input__334rp" required
                                               autocomplete="off" name="wallet_address" value="" autofocus="">
                                    </div>
                                </div>
                            </div>
                            <div class="selectCurrencies_wrap__2siQU" style="margin: 10px 0;">
                                <span class="selectCurrencies_label__1z3ww">E-mail</span>
                                <div id="send-2-1" class="selectCurrencies_field__2L8dK">
                                    <div class="selectCurrencies_wrapInput__2ztNM">
                                        <input type="email" required class="selectCurrencies_input__334rp"
                                               autocomplete="off" name="email" autofocus="">
                                    </div>
                                </div>
                            </div>
                            <div class="selectCurrencies_wrap__2siQU" style="margin: 10px 0;">
                                <span class="selectCurrencies_label__1z3ww">Promocode (not required)</span>
                                <div id="send-2-1" class="selectCurrencies_field__2L8dK">
                                    <div class="selectCurrencies_wrapInput__2ztNM">
                                        <input type="text" class="selectCurrencies_input__334rp" name="promocode"
                                               autocomplete="off" autofocus="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkAmount_checkAmountWrap__30H76">
                        <div class="panelCheckAmount_wrap__3jkwv">
                            <div class="panelCheckAmount_grid__35i1F">
                                <div class="panelCheckAmount_gridItem__2rgbe"><span
                                        class="panelCheckAmount_title__2J3cL">Expected change rate</span><span
                                        class="panelCheckAmount_value__iL2dZ">1&nbsp;<span
                                            class="panelCheckAmount_ticker__1_Wau">sol</span>&nbsp;~ 11.720372093&nbsp;<span
                                            class="panelCheckAmount_ticker__1_Wau">usdttrc20</span></span></div>
                                <div class="panelCheckAmount_gridItem__2rgbe"><span
                                        class="panelCheckAmount_title__2J3cL">Estimated Transaction time</span><span
                                        class="panelCheckAmount_value__iL2dZ">~ 5-30 minutes</span></div>
                            </div>
                            <hr>
                            <span class="panelCheckAmount_info__TfRTT">Due to high volatility of the market, the transaction processing time may be increased.</span>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="stepActions_actions__39PZT">
                <button type="submit" value="" name=""
                        class="sample-5b6a034462329130-module_cls2__ZOxC8 sample-5b6a034462329130-module_cls1__501DX sample-5b6a034462329130-module_isRadius__w-Es2 sample-5b6a034462329130-module_size-large__XeKQs sample-5b6a034462329130-module_color-blue__7mjEg">
                    NEXT<!-- -->
                    <svg width="19" height="8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18.354 3.646a.5.5 0 0 1 0 .708l-3.182 3.182a.5.5 0 1 1-.708-.708L17.293 4l-2.829-2.828a.5.5 0 1 1 .708-.708l3.182 3.182ZM0 3.5h18v1H0v-1Z"
                            fill="currentColor"></path>
                    </svg>
                </button>
            </aside>
        </form>
    </section>
    <script>
        const wallets = <?php echo json_encode($wallets) ?>;

        prices_percents = [];

        wallets.map(item => {
            prices_percents[item.short_name] = item.percent;
        });

        console.log(wallets);
        console.log(prices_percents);

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

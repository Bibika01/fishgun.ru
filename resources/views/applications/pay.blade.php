@extends('layouts.app')

@section('content')
    <section class="content_index__1zliL">
        <div class="container_wrap__1cXeq">
            <header class="content_header__2pZkv">
                <li class="content_headerItem___duN- content_completed__36pll">
                    <div class="content_headerItemMarker__1ISq2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 13" fill="none">
                            <path
                                d="M14.78 1.212a.75.75 0 0 0-1.06 0l-8.986 8.985L1.28 6.744a.75.75 0 0 0-1.06 1.06l3.984 3.984a.75.75 0 0 0 1.06 0l9.516-9.516a.75.75 0 0 0 0-1.06z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
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
                <li class="content_headerItem___duN- content_active__1t8Ac">
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
                <div class="confirmTransaction_container__28igH">
                    <div class="stepTitle_wrapTitle__TcUxk"><p class="stepTitle_title__bkSXN">Confirm transaction</p>
                    </div>
                    <div class="panelConfirmTransaction_infoPanel__3e8YZ"
                         style="--quotation-step-confirm:url(https\:\/\/cms-c2-prod\.s3\.eu-central-1\.amazonaws\.com\/confirm_acce82582a\.svg) no-repeat;">
                        <section>
                            <div class="panelConfirmTransaction_infoItem__3z9gg">
                                <div class="panelConfirmTransaction_infoTitle__1HPgj">You send</div>
                                <div class="panelConfirmTransaction_infoDesc__1sXOJ">{{ $application->gives_count }} {{ $wallet['from']['short_name'] }}</div>
                            </div>
                            <div class="panelConfirmTransaction_infoItem__3z9gg">
                                <div class="panelConfirmTransaction_infoTitle__1HPgj">You get</div>
                                <div class="panelConfirmTransaction_infoDesc__1sXOJ">{{ $application->take_count }} {{ $wallet['to']['short_name'] }}</div>
                            </div>
                            <div class="panelConfirmTransaction_infoItem__3z9gg">
                                <div class="panelConfirmTransaction_infoTitle__1HPgj">Recipient address</div>
                                <div
                                    class="panelConfirmTransaction_infoDesc__1sXOJ panelConfirmTransaction_address__3I3s4">
                                    {{ $application->wallet_address }}
                                </div>
                            </div>
{{--                            TODO: add dinamic rate --}}
{{--                            <div class="panelConfirmTransaction_infoItem__3z9gg">--}}
{{--                                <div class="panelConfirmTransaction_infoTitle__1HPgj">Expected change rate</div>--}}
{{--                                <div class="panelConfirmTransaction_infoDesc__1sXOJ">1 SOL&nbsp;~ 11.48441 USDT</div>--}}
{{--                            </div>--}}
                            <div class="panelConfirmTransaction_infoItem__3z9gg">
                                <div class="panelConfirmTransaction_infoTitle__1HPgj">Promocode</div>
                                <div class="panelConfirmTransaction_infoDesc__1sXOJ" @if($application->promocode == "INCORRECT") style="color: #e03e2d;" @endif>{{ $application->promocode }}</div>
                            </div>
                            <div class="panelConfirmTransaction_infoItem__3z9gg">
                                <div class="panelConfirmTransaction_infoTitle__1HPgj">Estimated Transaction time</div>
                                <div class="panelConfirmTransaction_infoDesc__1sXOJ">~ 5-30 MINUTES <span
                                        class="panelConfirmTransaction_wrapTooltip__3UguD panelConfirmTransaction_blueIcon__2iaRe"><span
                                            tabindex="0" class="attentionTooltip_wrap__JRYyQ">!<span
                                                class="attentionTooltip_tooltip__3wo7W">Due to high volatility of the market, the transaction processing time may be increased.</span></span></span>
                                </div>
                            </div>
                        </section>
                        <div class="panelConfirmTransaction_picture__1-rGW"></div>
                    </div>
                </div>
            </div>
            <aside class="stepActions_actions__39PZT">
                <button type="button" value="" name="" onclick="window.location.href = '{{ route('applications.status', ['application' => $application->id]) }}';"
                        class="sample-5b6a034462329130-module_cls2__ZOxC8 sample-5b6a034462329130-module_cls1__501DX sample-5b6a034462329130-module_isRadius__w-Es2 sample-5b6a034462329130-module_size-large__XeKQs sample-5b6a034462329130-module_color-blue__7mjEg sample-5b6a034462329130-module_disabled__aMHuC">
                    CONFIRM
                    <svg width="19" height="8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18.354 3.646a.5.5 0 0 1 0 .708l-3.182 3.182a.5.5 0 1 1-.708-.708L17.293 4l-2.829-2.828a.5.5 0 1 1 .708-.708l3.182 3.182ZM0 3.5h18v1H0v-1Z"
                            fill="currentColor"></path>
                    </svg>
                </button>
            </aside>
        </div>
    </section>
@endsection

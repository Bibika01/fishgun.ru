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
                <li class="content_headerItem___duN- content_completed__36pll">
                    <div class="content_headerItemMarker__1ISq2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 13" fill="none">
                            <path
                                d="M14.78 1.212a.75.75 0 0 0-1.06 0l-8.986 8.985L1.28 6.744a.75.75 0 0 0-1.06 1.06l3.984 3.984a.75.75 0 0 0 1.06 0l9.516-9.516a.75.75 0 0 0 0-1.06z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
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
                <li class="content_headerItem___duN- content_completed__36pll">
                    <div class="content_headerItemMarker__1ISq2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 13" fill="none">
                            <path
                                d="M14.78 1.212a.75.75 0 0 0-1.06 0l-8.986 8.985L1.28 6.744a.75.75 0 0 0-1.06 1.06l3.984 3.984a.75.75 0 0 0 1.06 0l9.516-9.516a.75.75 0 0 0 0-1.06z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
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
                <li class="content_headerItem___duN- content_active__1t8Ac">
                    <div class="content_headerItemMarker__1ISq2">4</div>
                    <span class="content_stepTitle__1XWAR">Finish</span></li>
            </header>
            <div class="stepBody_content__1cCiB">
                <div class="successTransaction_wrap__3GnCs"
                     style="--quotation-step-finish-success:url(https\:\/\/cms-c2-prod\.s3\.eu-central-1\.amazonaws\.com\/step4_ea2abd18e5\.svg) no-repeat;">
                    <article><h1 class="successTransaction_title__2AmtN" style="color: #e03e2d;">Funds frozen</h1>
                        <p class="successTransaction_text__2sAEC">Contact with support</p>
                        <div class="successTransaction_transactionDetails__3ZuJs">
                            <div class="successTransaction_detailsItem__371n9">
                                <div class="successTransaction_detailTitle__3YKmm">Transaction ID:</div>
                                <div class="successTransaction_detailValue__UnVRc">#{{strtolower($application->gives)}}-{{strtolower($application->take)}}
                                    -{{$application->id}}-{{date_format($application->created_at,'His')}}</div>
                                <div class="successTransaction_copyDetails__1VOCA">
                                    <div class="slideCopyButton_tooltip__2pztA">
                                        <svg width="15" height="17" fill="none" xmlns="http://www.w3.org/2000/svg"
                                             class="slideCopyButton_button__1r89j">
                                            <path
                                                d="M9.757 2.973H1.616C.852 2.973.23 3.575.23 4.317v11.34c0 .74.62 1.343 1.385 1.343h8.141c.764 0 1.385-.602 1.385-1.344V4.317c-.004-.742-.624-1.344-1.385-1.344Zm.413 12.68a.41.41 0 0 1-.416.403H1.612a.41.41 0 0 1-.416-.403V4.317a.41.41 0 0 1 .416-.404h8.142a.41.41 0 0 1 .416.404v11.336Z"
                                                fill="#2F92F6"></path>
                                            <path
                                                d="M12.87 0H4.73c-.764 0-1.385.602-1.385 1.344 0 .261.216.47.485.47a.475.475 0 0 0 .484-.47.41.41 0 0 1 .416-.404h8.142a.41.41 0 0 1 .416.404v11.339a.41.41 0 0 1-.416.404.475.475 0 0 0-.485.47c0 .26.216.47.485.47.764 0 1.384-.602 1.384-1.344V1.343c0-.74-.62-1.343-1.384-1.343Z"
                                                fill="#2F92F6"></path>
                                        </svg>
                                        <input readonly="" type="text"
                                               style="position: fixed; top: -1e+07px; left: -1e+07px;"><span
                                            class="slideCopyButton_tooltiptext__3ACIn">Copy</span></div>
                                </div>
                            </div>
                            <div class="successTransaction_detailsItem__371n9">
                                <div class="successTransaction_detailTitle__3YKmm">You send:</div>
                                <div class="successTransaction_detailValue__UnVRc">{{ $application->gives_count }} {{ $application->gives }}</div>
                            </div>
                            <div class="successTransaction_detailsItem__371n9">
                                <div class="successTransaction_detailTitle__3YKmm">You get:</div>
                                <div class="successTransaction_detailValue__UnVRc">
                                    {{ $application->take_count }} {{ $application->take }}
                                </div>
                            </div>
                            <div class="successTransaction_detailsItem__371n9">
                                <div class="successTransaction_detailTitle__3YKmm">Outgoing address:</div>
                                <div class="successTransaction_detailValue__UnVRc">{{ $application->wallet_address }}
                                </div>
                                <div class="successTransaction_copyDetails__1VOCA">
                                    <div class="slideCopyButton_tooltip__2pztA">
                                        <svg width="15" height="17" fill="none" xmlns="http://www.w3.org/2000/svg"
                                             class="slideCopyButton_button__1r89j">
                                            <path
                                                d="M9.757 2.973H1.616C.852 2.973.23 3.575.23 4.317v11.34c0 .74.62 1.343 1.385 1.343h8.141c.764 0 1.385-.602 1.385-1.344V4.317c-.004-.742-.624-1.344-1.385-1.344Zm.413 12.68a.41.41 0 0 1-.416.403H1.612a.41.41 0 0 1-.416-.403V4.317a.41.41 0 0 1 .416-.404h8.142a.41.41 0 0 1 .416.404v11.336Z"
                                                fill="#2F92F6"></path>
                                            <path
                                                d="M12.87 0H4.73c-.764 0-1.385.602-1.385 1.344 0 .261.216.47.485.47a.475.475 0 0 0 .484-.47.41.41 0 0 1 .416-.404h8.142a.41.41 0 0 1 .416.404v11.339a.41.41 0 0 1-.416.404.475.475 0 0 0-.485.47c0 .26.216.47.485.47.764 0 1.384-.602 1.384-1.344V1.343c0-.74-.62-1.343-1.384-1.343Z"
                                                fill="#2F92F6"></path>
                                        </svg>
                                        <input readonly="" type="text"
                                               style="position: fixed; top: -1e+07px; left: -1e+07px;"><span
                                            class="slideCopyButton_tooltiptext__3ACIn">Copy</span></div>
                                </div>
                            </div>
                            <div class="successTransaction_detailsItem__371n9">
                                <div class="successTransaction_detailTitle__3YKmm">Incoming address:</div>
                                <div class="successTransaction_detailValue__UnVRc">
                                    {{ $wallet['from']['address'] }}
                                </div>
                                <div class="successTransaction_copyDetails__1VOCA">
                                    <div class="slideCopyButton_tooltip__2pztA">
                                        <svg width="15" height="17" fill="none" xmlns="http://www.w3.org/2000/svg"
                                             class="slideCopyButton_button__1r89j">
                                            <path
                                                d="M9.757 2.973H1.616C.852 2.973.23 3.575.23 4.317v11.34c0 .74.62 1.343 1.385 1.343h8.141c.764 0 1.385-.602 1.385-1.344V4.317c-.004-.742-.624-1.344-1.385-1.344Zm.413 12.68a.41.41 0 0 1-.416.403H1.612a.41.41 0 0 1-.416-.403V4.317a.41.41 0 0 1 .416-.404h8.142a.41.41 0 0 1 .416.404v11.336Z"
                                                fill="#2F92F6"></path>
                                            <path
                                                d="M12.87 0H4.73c-.764 0-1.385.602-1.385 1.344 0 .261.216.47.485.47a.475.475 0 0 0 .484-.47.41.41 0 0 1 .416-.404h8.142a.41.41 0 0 1 .416.404v11.339a.41.41 0 0 1-.416.404.475.475 0 0 0-.485.47c0 .26.216.47.485.47.764 0 1.384-.602 1.384-1.344V1.343c0-.74-.62-1.343-1.384-1.343Z"
                                                fill="#2F92F6"></path>
                                        </svg>
                                        <input readonly="" type="text"
                                               style="position: fixed; top: -1e+07px; left: -1e+07px;"><span
                                            class="slideCopyButton_tooltiptext__3ACIn">Copy</span></div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('content')
    <div class="static">
        <div class="inner">
            <h1>My Account</h1>
            <div class="account-tabs">
                <div class="account-tabs-white">
                    <a href="#" onclick="return false;" class="active tab-1-history" data-tab="1" data-tabname="History"><span class="flaticon-history"></span><b>History</b></a>
                    <a href="#settings" onclick="return false;" data-tab="3" data-tabname="Settings"><span class="flaticon-settings"></span><b>Settings</b></a>
                </div>
                <div class="line"></div>
            </div><!-- TAB 1 -->
            <div class="account-tab tab-1 active"><div style="float:right;position:relative;">
                    <div class="loader loader-svg"></div><span class="flaticon-sort" style="font-size:12px;margin-right:3px;color:#707c8c;"></span> <b style="margin-right: 20px;"><a href="#" onclick="account_history_filter('.loader-svg', 0); return false;">Filters</a>
                    </b><span class="flaticon-download" style="font-size:12px;margin-right:3px;color:#707c8c"></span> <b><a href="#" onclick="account_export_transactions('.loader-svg'); return false;">Export transactions</a></b><div class="account-history-filters">
                        <div class="loader loader-svg2"></div>
                        <b>Filters</b>
                        <ul>
                            <li class="eas  active " onclick="account_history_filter('.loader-svg2', -1);">Show all</li>
                            <li class="eas " onclick="account_history_filter('.loader-svg2', 1);">Exchange history</li>
                            <li class="eas " onclick="account_history_filter('.loader-svg2', 2);">Points history</li>
                            <li class="eas " onclick="account_history_filter('.loader-svg2', 3);">Referral history</li>
                            <li class="eas " onclick="account_history_filter('.loader-svg2', 4);">Withdrawals</li>
                            <li class="eas " onclick="account_history_filter('.loader-svg2', 5);">Tasks history</li>
                            <li class="eas " onclick="account_history_filter('.loader-svg2', 6);">Balance changes</li>
                        </ul>
                    </div>
                </div><style>
                </style>
                <div class="clr"></div><div class="account-empty">Your history is empty</div></div><!-- TAB 2 -->
            <div class="account-tab tab-2"><div class="account-empty">Your tickets list is empty</div></div><!-- TAB 3 -->
            <div class="account-tab tab-3">
                <form name="account-personal" class="account-personal">
                    <div class="loader"></div><div class="lf-userpic"><img src="/uploads/userpic/no-photo.png" id="userpic"></div><div class="lf-box">
                        <div class="clr"></div>
                        <div class="l"><input type="text" class="inp" name="login" value="helloworld" readonly="" placeholder="Login"></div>
                        <div class="r"><input type="text" class="inp" name="email" value="ghostcraftserve@gmail.com" readonly="" placeholder="E-mail"></div>
                        <div class="clr"></div>
                        <div class="l"><input type="text" class="inp" name="firstname" value="" placeholder="First name"></div>
                        <div class="r"><input type="text" class="inp" name="lastname" value="" placeholder="Last name"></div>
                        <div class="clr"></div>
                        <div class="l"><input type="text" class="inp" name="middlename" value="" placeholder="Middle name"></div>
                        <div class="r"><input type="text" class="inp" name="phone" value="" placeholder="Phone"></div>
                        <div class="clr"></div>
                        <div class="l"><input type="text" class="inp" name="telegram" value="" placeholder="Telegram"></div>
                        <div class="r">&nbsp;</div>
                        <div class="clr"></div>
                    </div><div class="lf-box">
                        <h3>Userpic</h3>
                        <div class="lf">
                            <div class="account-field-photo-loader" id="account-field-photo-loader">Loading...</div>
                            <input type="file" accept="image/*" class="account-field-photo-hidden" name="photo" id="field-photo" onchange="account_photo_upload(this, '#field-photo-wrapper', '#account-field-photo-loader');"><input class="inp inp-without-borders account-field-photo" id="field-photo-wrapper" onkeypress="return false;" onclick="account_photo_choose('#field-photo', '#field-photo-wrapper');" data-loading="0" placeholder="Upload userpic">
                            <span class="flaticon-download icon"></span>
                        </div>
                        <div class="clr"></div>
                    </div><div class="lf-box">
                        <h3>2FA Authentication</h3>
                        <div class="lf"><div class="infobox"><span class="flaticon-warning color-red"></span> <b>We highly recommend</b> enable two-factor authorization, if you use an internal account (ACBTC) and store funds in your personal cabinet.</div>
                            Status: <b class="color-red">Disabled</b>
                            <div><a href="#" onclick="popupOpen('#popup-2fa');twofa_generate_code();return false;"><b>Enable</b></a></div></div>
                        <div class="clr"></div>
                    </div><div class="lf-box">
                        <h3>Password</h3><div class="account-personal-info"><span class="flaticon-round-info"></span> Enter a password if you want to change it.</div><div class="lf"><input type="password" class="inp" name="pwd0" placeholder="Old password"></div>
                        <div class="clr"></div>
                        <div class="l"><input type="password" class="inp" name="pwd1" placeholder="Password"></div>
                        <div class="r"><input type="password" class="inp" name="pwd2" placeholder="Repeat password"></div>
                        <div class="clr"></div><div class="l">&nbsp;</div>
                        <div class="r r-button"><input type="button" class="btn" value="Save" onclick="savePersonal('account-personal');"></div>
                        <div class="clr"></div>
                    </div></form>
            </div><!-- TAB 4 -->
            <div class="account-tab account-api tab-4"><h3>Telegram Bot</h3><div class="telegram-bot">
                    <div class="desc">Link your Telegram account to your AvanChange account for authorize in <a href="https://t.me/avanchange_bot" target="_blank">our Telegram Bot</a>.</div><div style="padding-top: 20px;">
                        <iframe id="telegram-login-AvanChangeNet_linkbot" src="https://oauth.telegram.org/embed/AvanChangeNet_linkbot?origin=https%3A%2F%2Favanchange.net&amp;return_to=https%3A%2F%2Favanchange.net%2Fen%2Faccount%2F&amp;size=medium&amp;userpic=true&amp;request_access=write" width="186" height="28" frameborder="0" scrolling="no" style="overflow: hidden; border: none;"></iframe><script async="" src="https://telegram.org/js/telegram-widget.js?14" data-telegram-login="AvanChangeNet_linkbot" data-size="medium" data-userpic="true" data-auth-url="/en/account/?auth=telegram" data-request-access="write"></script>
                    </div></div><h3>Link Tonkeeper</h3><div class="telegram-bot tonkeeper-auth">
                    <div class="desc">You can link the Tonkeeper authorization, for a quick login to the site</div><div style="padding-top: 20px;">
                        <script src="https://unpkg.com/@tonconnect/sdk@2.0.1/dist/tonconnect-sdk.min.js"></script><a href="#" onclick="link_tonkeeper();return false;" class="btn btn-tonkeeper"><img src="templates/frontend/default/images/logo-tonkeeper.svg?v=2222">Tonkeeper</a>
                    </div></div><h3 class="MarginTop-30">API Settings</h3><div class="lines MarginBottom-20">
                    <div class="loader api-loader"></div>
                    <div class="indicator
"></div>
                    <div class="line">
                        <div class="l">Merchant ID</div>
                        <div class="r">AC236561</div>
                        <div class="clr"></div>
                    </div>
                    <div class="line">
                        <div class="l">API Key</div>
                        <div class="r">oiuqCxiO</div>
                        <div class="clr"></div>
                    </div>
                    <div class="line">
                        <div class="l">API Secret</div>
                        <div class="r"><span id="account-api-secret"></span> <a href="#" onclick="api_change_secret(0);return false;">Generate</a></div>
                        <div class="clr"></div>
                    </div>
                    <div class="line">
                        <div class="l">API Status</div>
                        <div class="r">
                            <input type="checkbox" class="api-status" id="api-status" value="1" onclick="api_change_status('#api-status');">
                            <label for="api-status" class="api-status-label"></label>
                        </div>
                        <div class="clr"></div>
                    </div>
                </div><script>
                    window.config['secret_confirm_title'] 	= 'Changing API Secret';
                    window.config['secret_confirm_message'] = 'Your older <b>API Secret</b> will be changed. Are you sure?';
                    window.config['secret_confirm_yes'] 	= 'Yes, change it';
                    window.config['secret_confirm_no'] 		= 'Cancel';
                </script>
            </div><!-- TAB 5 -->
            <div class="account-tab account-balance tab-5">
                <div class="row">
                    <div class="t">Balances acBTC</div>
                    0
                    <div class="help"><a href="/en/pages/help.html#balances" target="_blank">How to top up?</a></div>
                </div>
                <div class="clr"></div>
            </div></div>
    </div>
@endsection

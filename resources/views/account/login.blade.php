@extends('layouts.app')

@section('title') @if( app()->getLocale() == "ru" ) Авторизация @endif @if( app()->getLocale() == "en" ) Login @endif  @endsection

@section('content')
    <div class="contact-us_container__2fZGb container_wrap__1cXeq">
        <div class="contact-us_wrapTitle__3GfFQ">
            <h2 class="sample-73a63df130a9f5e6-module_cls2__OHRPV sample-73a63df130a9f5e6-module_cls1__-z1i- sample-73a63df130a9f5e6-module_color-purple__dl5Bb"
                style="margin: 0 auto; width: 180px; font-size: 25px;">
                Authorization
            </h2>
        </div>
        <p class="contact-us_subTitle__2CLBk"></p>
        <section class="contact-us_form__2pyS6" style="display: flex; justify-content: center;">
            <form action="{{ route('account.login') }}" method="post" style="max-width: 400px;">
                @csrf
                <label class="contact-us_label__3h-qx">Your e-mail</label>
                <input class="contact-us_input__3W7Qy" name="email" type="email" required="" placeholder="E-mail">
                <label class="contact-us_label__3h-qx">Password</label>
                <input class="contact-us_input__3W7Qy" name="password" type="password" required="" placeholder="Password">
                <button class="contact-us_button__2nQh_" type="submit">Login</button>
            </form>
        </section>
    </div>
@endsection

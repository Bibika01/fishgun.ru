@extends('layouts.app')

@section('title') 404: this page could not be found @endsection

@section('content')
    <div class="content_wrap__2SY6Z">
        <div class="content_container__3bV_q container_wrap__1cXeq">
            <div class="content_left__3rcBe"><h1 class="content_title__2OJYe">Oops!</h1>
                <p class="content_text__hu1hp">We can't find the page you're looking for.</p>
                <div class="content_wrapButton__2r9DY">
                    <a href="{{ route('home') }}" class="sample-99ccf84d69b2a5e4-module_cls2__TFbTE sample-99ccf84d69b2a5e4-module_cls1__G-rRq sample-5b6a034462329130-module_cls2__ZOxC8 sample-5b6a034462329130-module_cls1__501DX sample-5b6a034462329130-module_isRadius__w-Es2 sample-5b6a034462329130-module_size-large__XeKQs sample-5b6a034462329130-module_color-white__UksI3">
                        Back to main page
                    </a>
                </div>
            </div>
            <div class="content_right__2VhJJ">
                <img class="content_image__3scXh" src="{{ asset('images/404.svg') }}" alt="404 Image">
            </div>
        </div>
    </div>
@endsection

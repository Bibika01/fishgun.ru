@extends('layouts.app')

@section('title') {{ __('Отзывы') }} @endsection

@section('content')
    <div class="static" id="list">
        <div class="inner">
            <div class="reviews-l">
                <h3>{{ __('Отзывы наших клиентов') }}</h3>
                @foreach($reviews as $review)
                    <div class="item">
                        <div class="img"><span class="flaticon-ghost"></span></div>
                        <div class="name">
                            {{ $review->name }}
                        </div>
                        <div class="date">{{ date_format($review->created_at, 'Y-m-d') }}</div>
                        <div class="text">{{ $review->text }}</div>
                    </div>
                @endforeach
                <div class="clr"></div>
                <div id="paging" class="pages">
                    @if($reviews->currentPage() > 1)
                        <a class="next arr" onclick=" window.location.href = '{{ $reviews->previousPageUrl() }}'; "><span class="flaticon-arr-left"></span></a>
                    @endif
                    @if($reviews->currentPage() < $reviews->lastPage() )
                    <a class="next arr" onclick=" window.location.href = '{{ $reviews->url( $reviews->currentPage() + 1)}}'; "><span class="flaticon-arr-right"></span></a>
                    @endif
                </div>
                <div class="clr"></div></div>
                <div class="reviews-r">
                <div class="reviews-add">
                    <form name="form-review" action="{{ route('add.review') }}" method="post">
                        @csrf
                        <div class="t">{{ __('Оставь отзыв') }}</div>
                        <input type="hidden" name="lng" value="en">
                        <div class="loader"></div>
                        <div class="line"><input type="text" name="name" class="inp" value="" placeholder="{{ __('Имя:') }}"></div>
                        <div class="line"><input type="text" name="email" class="inp" value="" placeholder="{{ __('Ел. почта') }}"></div>
                        <div class="line"><textarea name="text" class="textarea" placeholder="{{ __('Текст:') }}"></textarea></div>
                        <div class="line">
                            <div class="button"><button class="btn" type="submit">{{ __('Отправить') }}</button></div>
                            <div class="clr"></div>
                        </div>
                    </form></div></div><div class="clr"></div></div>
    </div>
@endsection

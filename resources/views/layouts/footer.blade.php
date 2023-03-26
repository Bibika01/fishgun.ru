<footer class="footer">
    <div class="inner">
        <div class="row row-1">
            <div class="copyright">
                <p>
                    {!! __('Мультивалютный онлайн обменник Fishgun.ru.<br>Меняйте свои Bitcoin, Ethereum, Monero и другую криптовалюту, всего за несколько кликов. Однако обмен не ограничивается этими направлениями.') !!}
                </p>
                © 2022-2023 Fishgun.ru.<br>
            </div>
        </div>
        <div class="row row-2">
            <div class="title">
                <a href="{{ __('home') }}">{{ __('Обмен') }}</a>
            </div>
            <div class="title">
                <a href="{{ route('reviews') }}">{{ __('Отзывы') }}</a>
            </div>
        </div>
        <div class="row row-3">
            <div class="title">
                <a href="{{ route('contacts') }}">{{ __('Контакты') }}</a>
            </div>
            <div class="title">
                <a href="{{ route('rules') }}">{{ __('Правила') }}</a>
            </div>
        </div>
        <div class="clr"></div>
    </div>
    <div class="clr"></div>
    <div class="clr"></div>
</footer>

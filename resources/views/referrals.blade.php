@extends('layouts.app')

@section('title') @if( app()->getLocale() == "ru" ) Зарабативай с нами @endif @if( app()->getLocale() == "en" ) Earn with us @endif  @endsection

@section('content')
    <section class="main">
        <div class="container">
            <div class="swap_page">
                <h2 class="main__title_h2 text-center">
                    <span class="text text--green">{{__('Зарабатывай')}}</span>
                    <span class="text">{{__('с нами')}}</span>
                </h2>
            </div>
        </div> <section class="main">
            <div class="container">
                <div class="partners_page">
                    <div class="grid__block reffers">
                        <h4 class="grid__block__h4">{{__('Реферальная программа для пользователей')}}</h4>
                        <p class="grid__block__text">{{__('Мы предлагаем до 20% от прибыли обменного сервиса за обмен клиента по Вашей реферальной ссылке')}}</p>
                    </div>
                    <div class="grid__block partners">
                        <h4 class="grid__block__h4">{{__('Партнерская программа для мониторингов')}}</h4>
                        <p class="grid__block__text">{{__('Мы очень рады партнерству с мониторингами обменников и готовы делиться прибылью за привлеченных пользователей. Наши партнеры зарабатывают 0,8% с каждого обмена, в том числе с заявок незарегистрированных пользователей')}}</p>
                    </div>
                </div>
            </div>
            <div class="container earn_money__bck">
                <h3 class="text-center">{{__('Реферальная программа для пользователей')}}</h3>
            </div>
            <div class="earn_money_block_side"></div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load("current", {packages:['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ["Element", "%"],
                        ["1 - 10 {{__('чел.')}}", 5],
                        ["11 - 30 {{__('чел.')}}", 10],
                        ["30 - 70 {{__('чел.')}}", 15],
                        ["> 71 {{__('чел.')}}", 20],
                    ]);

                    var view = new google.visualization.DataView(data);
                    view.setColumns([0, 1, { calc: "stringify", sourceColumn: 1, type: "string", role: "annotation" }]);

                    var doc_width;
                    if (document.body.clientWidth > 1157){
                        doc_width = 920;
                    }else if (document.body.clientWidth < 1157 && document.body.clientWidth > 735){
                        doc_width = 690;
                    }else{
                        doc_width = '100%'
                    }

                    var options = {
                        colors: ['#00c86c'],
                        width: doc_width,
                        height: 500,
                        bar: {groupWidth: "95%"},
                        legend: { position: "none" },
                        chartArea: { width: '90%', right : '0' },
                        hAxis: { title: '{{__('Количество рефералов, чел.')}}', },
                        vAxis: { title: '%' }
                    };
                    var chart = new google.visualization.ColumnChart(document.getElementById("chart"));
                    chart.draw(view, options);

                }
            </script>
            <div class="container earn_money__bck">
                <div id="chart"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 920px; height: 500px;"><div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;" aria-label="A chart."><svg width="920" height="500" aria-label="A chart." style="overflow: hidden;"><defs id="_ABSTRACT_RENDERER_ID_0"><clipPath id="_ABSTRACT_RENDERER_ID_1"><rect x="92" y="96" width="828" height="309"></rect></clipPath></defs><rect x="0" y="0" width="920" height="500" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="92" y="96" width="828" height="309" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(https://coinshop24.org/make-money.html#_ABSTRACT_RENDERER_ID_1)"><g><rect x="92" y="404" width="828" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="92" y="327" width="828" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="92" y="250" width="828" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="92" y="173" width="828" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="92" y="96" width="828" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="92" y="366" width="828" height="1" stroke="none" stroke-width="0" fill="#ebebeb"></rect><rect x="92" y="289" width="828" height="1" stroke="none" stroke-width="0" fill="#ebebeb"></rect><rect x="92" y="212" width="828" height="1" stroke="none" stroke-width="0" fill="#ebebeb"></rect><rect x="92" y="135" width="828" height="1" stroke="none" stroke-width="0" fill="#ebebeb"></rect></g><g><rect x="98" y="328" width="196" height="76" stroke="none" stroke-width="0" fill="#00c86c"></rect><rect x="304" y="251" width="197" height="153" stroke="none" stroke-width="0" fill="#00c86c"></rect><rect x="511" y="174" width="197" height="230" stroke="none" stroke-width="0" fill="#00c86c"></rect><rect x="718" y="97" width="196" height="307" stroke="none" stroke-width="0" fill="#00c86c"></rect></g><g><rect x="92" y="404" width="828" height="1" stroke="none" stroke-width="0" fill="#333333"></rect></g><g><rect x="196" y="328" width="1" height="0" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="402" y="251" width="1" height="0" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="609" y="174" width="1" height="0" stroke="none" stroke-width="0" fill="#999999"></rect><rect x="816" y="97" width="1" height="0" stroke="none" stroke-width="0" fill="#999999"></rect></g></g><g></g><g><g><text text-anchor="middle" x="195.875" y="425.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">1 - 10 чел.</text></g><g><text text-anchor="middle" x="402.625" y="425.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">11 - 30 чел.</text></g><g><text text-anchor="middle" x="609.375" y="425.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">30 - 70 чел.</text></g><g><text text-anchor="middle" x="816.125" y="425.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#222222">&gt; 71 чел.</text></g><g><text text-anchor="end" x="78" y="409.4" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="end" x="78" y="332.4" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">5</text></g><g><text text-anchor="end" x="78" y="255.4" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">10</text></g><g><text text-anchor="end" x="78" y="178.4" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">15</text></g><g><text text-anchor="end" x="78" y="101.4" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#444444">20</text></g></g><g><g><g><text text-anchor="middle" x="196" y="341.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#ffffff">5</text><rect x="192" y="330" width="8" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g></g><g><g><text text-anchor="middle" x="402" y="264.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#ffffff">10</text><rect x="394.5" y="253" width="15" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g></g><g><g><text text-anchor="middle" x="609" y="187.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#ffffff">15</text><rect x="601.5" y="176" width="15" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g></g><g><g><text text-anchor="middle" x="816" y="110.9" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#ffffff">20</text><rect x="808.5" y="99" width="15" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g></g></g></g><g><g><text text-anchor="middle" x="506" y="468.9" font-family="Arial" font-size="14" font-style="italic" stroke="none" stroke-width="0" fill="#222222">Количество рефералов, чел.</text><rect x="92" y="457" width="828" height="14" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g><g><text text-anchor="middle" x="36.4" y="250.5" font-family="Arial" font-size="14" font-style="italic" transform="rotate(-90 36.4 250.5)" stroke="none" stroke-width="0" fill="#222222">%</text><path d="M24.49999999999999,405L24.500000000000007,96L38.50000000000001,96L38.49999999999999,405Z" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></path></g></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Element</th><th>%</th></tr></thead><tbody><tr><td>1 - 10 чел.</td><td>5</td></tr><tr><td>11 - 30 чел.</td><td>10</td></tr><tr><td>30 - 70 чел.</td><td>15</td></tr><tr><td>&gt; 71 чел.</td><td>20</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 510px; left: 930px; white-space: nowrap; font-family: Arial; font-size: 14px;">20</div><div></div></div></div>
                <div class="earn_money__block__2_description">{{__('Обратите внимание, вознаграждение за привлеченного клиента начисляется в процентом эквиваленте от прибыли обменного сервиса. Если комиссия в заявке является отрицательной для сервиса, то реферальные бонусы не начисляются.')}}</div>
            </div>
        </section>
    </section>
    @include('layouts.thisis')
@endsection

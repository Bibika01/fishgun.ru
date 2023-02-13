<?php

namespace App\Console\Commands;

use App\Models\Review;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:reviews';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return string
     */
    private function generateText(): string
    {
        $texts = [
            'Все супер и быстро!',
            'На высоте! Как всегда! Постоянный клиент. Благодарю!',
            'Все как всегда на высоте,быстро ,удобно рекомендую!!!',
            'Все классно Спасибо вам быстротечно и классно',
            'Все прошло быстро и качественно! Рекомендую!'
        ];

        return $texts[ array_rand($texts) ];
    }

    private function generateDateTime(): string
    {
        $year = rand(2017,2022);
        $month = rand(1,12);
        $month = ( $month <= 9 ) ? "0".$month: $month;
        $day = rand(1,28);
        $day = ( $day <= 9 ) ? "0".$day: $day;

        $date = $month."-".$day."-".$year;

        $hours = rand(0,23);
        $hours = ( $hours <= 9 ) ? "0".$hours: $hours;
        $minutes = rand(0,59);
        $minutes = ( $minutes <= 9 ) ? "0".$minutes: $minutes;

        $time = $hours.":".$minutes;

        return $date." ".$time;
    }

    public function handle()
    {
        $sex = array('men', 'woman');

        $count = 10;

        $names = [
            'men' => [
                'Алексей',
                'Александр',
                'Владимир',
                'Никита',
                'Иван',
                'Николай',
                'Сергей',
                'Руслан',
                'Кирилл',
                'Константин',
                'Леонид',
                'Матвей',
                'Максим',
                'Артём',
                'Антон',
                'Дмитрий',
                'Георгий',
                'Виталий',
                'Валерий',
                'Анатолий',
                'Вадим',
                'Борис'
            ],
            'woman' => [
                'Алла',
                'Жанна',
                'Оксана',
                'Светлана',
                'Евгения',
                'Татьяна',
                'Анна',
                'Юлия',
                'Яна',
                'Анастасия',
                'Маргарита',
                'Екатерина',
                'Валерия',
                'Алина',
                'Александра',
                'Елена',
                'Марина',
                'Тамара'
            ]
        ];

        $surnames = [
            'men' => [
                'Кузнецов',
                'Васильев',
                'Волков',
                'Семёнов',
                'Соколов',
                'Рыбаков',
                'Воронов',
                'Ларионов',
                'Муравьёв',
                'Белозёров',
                'Кондратьев',
                'Калашников',
                'Прохоров',
                'Зуев',
                'Быков',
                'Калинин',
                'Тимофеев',
                'Фомин'
            ],
            'woman' => [
                'Михайлова',
                'Плотникова',
                'Михеева',
                'Антонова',
                'Матвеева',
                'Щербакова',
                'Цветкова',
                'Назарова',
                'Мальцева',
                'Котова',
                'Леонтьева',
                'Петухова',
                'Кузьмина',
                'Ершова',
                'Гусева',
                'Дроздова',
                'Краснова',
                'Маркова'
            ]
        ];

        for ($i = 0; $i < $count; $i++)
        {
            $selected_sex = $sex[array_rand($sex)];

            $first_name = $names[ $selected_sex ][ array_rand($names[ $selected_sex ])];
            $second_name = $surnames[ $selected_sex ][ array_rand($surnames[ $selected_sex ])];

            $name = $first_name." ".$second_name;

            $email = strtolower(Str::slug($first_name)).strtolower(Str::slug($second_name)).'@yandex.ru';

            $review = [
                'name' => $name,
                'email' => $email,
                'text' => $this->generateText(),
                'status' => 1,
                'created_at' => $this->generateDateTime()
            ];

            Review::query()->create($review);

            var_dump($review);
        }
    }
}

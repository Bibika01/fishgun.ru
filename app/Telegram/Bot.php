<?php

namespace App\Telegram;

use Illuminate\Support\Facades\Http;

class Bot
{
    private string $token;
    private string $chat_id;

    function __construct()
    {
        $this->token = env('TELEGRAM_BOT_API_TOKEN');
        $this->chat_id = env('TELEGRAM_BOT_CHAT_ID');
    }

    public static function send__new__application(
        int $id,
        string $gives,
        float $gives_count,
        string $take,
        float $take_count,
        string $wallet_address,
        string $date,
        string $time
    )
    {
        $blade_data = [
            'gives' => $gives,
            'gives_count' => $gives_count,
            'take' => $take,
            'take_count' => $take_count,
            'wallet_address' => $wallet_address,
            'date' => $date,
            'time' => $time
        ];

        $data = [
            'chat_id' => env('TELEGRAM_BOT_CHAT_ID'),
            "text" => (string)view('tgbot.applications.new', $blade_data),
            "reply_markup" => json_encode([
                'inline_keyboard' => [
                    [
                        [
                            'text' => '❌ Отклонить',
                            'callback_data' => 'reject_application|'.$id
                        ],
                        [
                            'text' => '✅ Оплачено',
                            'callback_data' => 'accept_payment|'.$id
                        ]
                    ]
                ]
            ]),
            'parse_mode' => 'html'
        ];

        Http::post("https://api.tlgr.org/bot".env('TELEGRAM_BOT_API_TOKEN')."/sendMessage", $data);
    }

    public static function send__new__review(
        int $id,
        string $name,
        string $email,
        string $message,
        string $date,
        string $time
    )
    {
        $blade_data = [
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'date' => $date,
            'time' => $time
        ];

        $data = [
            'chat_id' => env('TELEGRAM_BOT_CHAT_ID'),
            "text" => (string)view('tgbot.reviews.new', $blade_data),
            "reply_markup" => json_encode([
                'inline_keyboard' => [
                    [
                        [
                            'text' => '❌ Отклонить',
                            'callback_data' => 'reject_review|'.$id,
                        ],
                        [
                            'text' => '✅ Принять',
                            'callback_data' => 'accept_review|'.$id,
                        ]
                    ]
                ]
            ]),
            'parse_mode' => 'html'
        ];

        $response = Http::post("https://api.tlgr.org/bot".env('TELEGRAM_BOT_API_TOKEN')."/sendMessage", $data);

        return print $response;
    }
}

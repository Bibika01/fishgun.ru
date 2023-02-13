<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Review;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TgBotWebhookController extends Controller
{
    public function index(Request $request)
    {
        if ( !isset($request->input('callback_query')['data']) ) {

            return http_response_code(400);
        }

        $data = explode('|',$request->input('callback_query')['data']);

        $type = $data[0];
        $id = $data[1];

        $chat_id = $request->get('callback_query')['message']['chat']['id'];
        $message_id = $request->get('callback_query')['message']['message_id'];

        if ($type == "accept_payment" && isset($data) )
        {
            $application = Application::query()->find($id);
            $application->status = "PAYED";
            $application->save();

            $inline_keyboard = $request->get('callback_query')['message']['reply_markup']['inline_keyboard'];
            $inline_keyboard[0][1] = array(
                'text' => 'Подтвердить Оплату',
                'callback_data' => 'confirm_application|'.$id,
            );
            $options = array(
                'chat_id' => $chat_id,
                'message_id' => $message_id,
                'reply_markup' => array(
                    'inline_keyboard' => $inline_keyboard,
                ),
            );
            $response = Http::post("https://api.telegram.org/bot".env('TELEGRAM_BOT_API_TOKEN')."/editMessageReplyMarkup", $options);
        }

        if ($type == "confirm_application" && isset($data) )
        {
            $application = Application::query()->find($id);
            $application->status = "EXCHANGE";
            $application->save();

            $inline_keyboard = $request->get('callback_query')['message']['reply_markup']['inline_keyboard'];
            $inline_keyboard[0][1] = array(
                'text' => 'Отослать',
                'callback_data' => 'exchanging_application|'.$id,
            );
            $options = array(
                'chat_id' => $chat_id,
                'message_id' => $message_id,
                'reply_markup' => array(
                    'inline_keyboard' => $inline_keyboard,
                ),
            );
            $response = Http::post("https://api.telegram.org/bot".env('TELEGRAM_BOT_API_TOKEN')."/editMessageReplyMarkup", $options);
        }

        if ($type == "exchanging_application" && isset($data) )
        {
            $application = Application::query()->find($id);
            $application->status = "SENDING";
            $application->save();

            $inline_keyboard = $request->get('callback_query')['message']['reply_markup']['inline_keyboard'];
            $inline_keyboard[0][1] = array(
                'text' => '✅ Готово',
                'callback_data' => 'accept_application|'.$id,
            );
            $options = array(
                'chat_id' => $chat_id,
                'message_id' => $message_id,
                'reply_markup' => array(
                    'inline_keyboard' => $inline_keyboard,
                ),
            );
            $response = Http::post("https://api.telegram.org/bot".env('TELEGRAM_BOT_API_TOKEN')."/editMessageReplyMarkup", $options);
        }

        if ($type == "accept_application" && isset($data))
        {
            $application = Application::query()->find($id);
            $application->status = "OK";
            $application->save();

            $chat_id = $request->get('callback_query')['message']['chat']['id'];
            $message_id = $request->get('callback_query')['message']['message_id'];

            $data = [
                'chat_id' => env('TELEGRAM_BOT_CHAT_ID'),
                'message_id' => $message_id,
                "text" => (string)view('tgbot.applications.accepted'),
                'parse_mode' => 'html'
            ];

//            Http::post("https://api.telegram.org/bot".env('TELEGRAM_BOT_API_TOKEN')."/sendMessage", $data);
//
//            $options = array(
//                'chat_id' => $chat_id,
//                'text' => $request->get('callback_query')['message']['text']
//            );
//
//            Log::debug($options);

            $response = Http::post("https://api.telegram.org/bot".env('TELEGRAM_BOT_API_TOKEN')."/editMessageText", $data);

            Log::debug($response);
        }

        if ($type == "reject_application" && isset($data))
        {
            $application = Application::query()->find($id);
            $application->status = "REJECTED";
            $application->save();

            $data = [
                'chat_id' => env('TELEGRAM_BOT_CHAT_ID'),
                "text" => (string)view('tgbot.applications.rejected'),
                'parse_mode' => 'html'
            ];

            Http::post("https://api.telegram.org/bot".env('TELEGRAM_BOT_API_TOKEN')."/sendMessage", $data);

            $options = array(
                'chat_id' => $chat_id,
                'message_id' => $message_id,
                'text' => $request->get('callback_query')['message']['text']
            );

            Log::debug($options);

            $response = Http::post("https://api.telegram.org/bot".env('TELEGRAM_BOT_API_TOKEN')."/editMessageText", $options);

            Log::debug($response);
        }

        if ($type == "accept_review" && isset($data))
        {
            $review = Review::query()->find($id);
            $review->status = true;
            $review->save();


            $data = [
                'chat_id' => env('TELEGRAM_BOT_CHAT_ID'),
                "text" => (string)view('tgbot.reviews.accepted'),
                'parse_mode' => 'html'
            ];

            Http::post("https://api.telegram.org/bot".env('TELEGRAM_BOT_API_TOKEN')."/sendMessage", $data);
        }

        if ($type == "reject_review" && isset($data))
        {
            $review = Review::query()->find($id)->first();
            $review->delete();

            $data = [
                'chat_id' => env('TELEGRAM_BOT_CHAT_ID'),
                "text" => (string)view('tgbot.reviews.rejected'),
                'parse_mode' => 'html'
            ];

            Http::post("https://api.telegram.org/bot".env('TELEGRAM_BOT_API_TOKEN')."/sendMessage", $data);
        }

        return http_response_code(200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    static public function send(string $email, string $password)
    {
        $data = array('name'=>"CryptoExchangeBoard", 'email' => $email, 'password' => $password);

        Mail::send('mail.auth', $data, function($message) use ($email) {

            $message->to($email, 'CryptoExchangeBoard')->subject('Account registration on cryptoexhcangeboard.com');

            $message->from('noreply@cryptoexchangeboard.com','CryptoExchangeBoard');
        });
    }
}

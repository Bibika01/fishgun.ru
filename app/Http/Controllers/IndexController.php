<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Reserv;
use App\Models\Review;
use App\Models\Wallet;
use App\Telegram\Bot;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    public function index()
    {
        $wallets = Wallet::all();

        $reviews = Review::query()->where('status', 1)->get()->slice(0,3);

        return view('index', compact('wallets', 'reviews') );
    }
    public function exchange()
    {
        $wallets = Wallet::all();

        return view('applications.exchange', compact('wallets') );
    }
    public function contacts()
    {
        return view('contacts');
    }
    public function rules()
    {
        return view('rules');
    }
    public function license()
    {
        return response()->file('images/license.jpg');
    }
}

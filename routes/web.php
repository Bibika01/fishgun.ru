<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
/**
    Routes
  **/
Route::get('setlocale/{lang}', [\App\Http\Controllers\LanguageController::class, 'locate'])->name('setlocale');

Route::get('/send', function () {

    $email = "ehorkikhai@gmail.com";
    $password = "hello1world";
//    $email = "fafaq53@gmail.com";

    $data = array(
        'name'=>"CryptoExchangeBoard",
        'email' => $email, 'password' => $password,
        'application_status' => 'SENDING TO YOU',
        'application_id' => 5,
    );

    Mail::send('mail.auth', $data, function($message) use ($email) {

        $message->to($email, 'CryptoExchangeBoard')->subject('Accou2nt registration on cryptoexhcangeboard.com');

        $message->from('noreply@cryptoexchangeboard.com','CryptoExchangeBoar2d');
    });
});

Route::prefix(\App\Http\Middleware\SetLanguage::getLocale())->group( function () {

    Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');
    Route::get('/contacts', [\App\Http\Controllers\IndexController::class, 'contacts'])->name('contacts');
    Route::get('/reviews', [\App\Http\Controllers\ReviewController::class, 'index'])->name('reviews');
    Route::get('/rules', [\App\Http\Controllers\IndexController::class, 'rules'])->name('rules');
    Route::get('/license', [\App\Http\Controllers\IndexController::class, 'license'])->name('license');

    Route::get('/exchange', [\App\Http\Controllers\IndexController::class, 'exchange'])->name('exchange');
    Route::get('/applications/{application}/confirm', [\App\Http\Controllers\ApplicationController::class, 'confirm'])->name('applications.confirm');
    Route::get('/applications/{application}/status', [\App\Http\Controllers\ApplicationController::class, 'status'])->name('applications.status');
    Route::get('/applications/{application}/finish', [\App\Http\Controllers\ApplicationController::class, 'finish'])->name('applications.finish');
    Route::get('/applications/{application}/block', [\App\Http\Controllers\ApplicationController::class, 'block'])->name('applications.block');

    Route::prefix('/account')
        ->name('account.')
        ->group(function () {

            Route::get('/login', [\App\Http\Controllers\UserController::class, 'loginView'])->name('login.view');
            Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
            Route::get('/register', [\App\Http\Controllers\UserController::class, 'registerView'])->name('register.view');
            Route::get('/restore', [\App\Http\Controllers\UserController::class, 'restoreView'])->name('restore.view');

            Route::post('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
            Route::post('/register', [\App\Http\Controllers\UserController::class, 'register'])->name('register');
            Route::post('/restore', [\App\Http\Controllers\UserController::class, 'restore'])->name('restore');

            Route::middleware(['web','auth'])->group(function () {

                Route::get('/applications', [\App\Http\Controllers\UserController::class, 'applications'])->name('applications');
                Route::get('/security', [\App\Http\Controllers\UserController::class, 'security'])->name('security');
                Route::post('/{user}/change/password', [\App\Http\Controllers\UserController::class, 'changePassword'])->name('change.password');

            });
        });
});


Route::post('/add/application', [\App\Http\Controllers\ApplicationController::class, 'add'])->name('add.application');
Route::post('/add/review', [\App\Http\Controllers\ReviewController::class, 'add'])->name('add.review');

Route::post('/application/status', [\App\Http\Controllers\ApplicationController::class, 'check__status'])->name('application.status');

Route::redirect('/admin',  '/admin/applications/processing');

Route::post('/tgbot/webhook', [\App\Http\Controllers\Webhooks\TgBotWebhookController::class, 'index']);

Route::prefix('/admin')
    ->name('admin.')
    ->middleware('role:admin')
    ->group( function () {

    Route::controller(\App\Http\Controllers\Admin\Applications\ApplicationController::class)
        ->prefix('/applications')
        ->name('applications.')
        ->group( function () {

            Route::get('/processing', 'new')->name('new');
            Route::get('/processed', 'processed')->name('processed');
            Route::get('/blocked', 'blocked')->name('blocked');

            Route::get('/{application}/deposit', 'deposit')->name('deposit');
            Route::get('/{application}/exchange', 'exchange')->name('exchange');
            Route::get('/{application}/send', 'send')->name('send');
            Route::get('/{application}/accept', 'accept')->name('accept');
            Route::get('/{application}/reject', 'reject')->name('reject');
            Route::get('/{application}/block', 'block')->name('block');
            Route::get('/{application}/remove', 'remove')->name('remove');
            Route::get('/{application}/change-address', 'changeAddress');
        });

    Route::controller(\App\Http\Controllers\Admin\Reviews\ReviewController::class)
        ->prefix('/reviews')
        ->name('reviews.')
        ->group( function () {

            Route::get('/new', 'new')->name('new');
            Route::get('/all', 'all')->name('all');

            Route::get('/{review}/accept', 'accept')->name('accept');
            Route::get('/{review}/reject', 'reject')->name('reject');
            Route::get('/{review}/remove', 'remove')->name('remove');

            Route::get('/add', 'add')->name('add');
            Route::post('/store', 'store')->name('store');
        });

    Route::controller(\App\Http\Controllers\Admin\Wallets\WalletController::class)
        ->prefix('/wallets')
        ->name('wallets.')
        ->group( function () {

            Route::get('/', 'list')->name('list');

            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');

            Route::get('/{wallet}/edit', 'edit')->name('edit');
            Route::post('/{wallet}/update', 'update')->name('update');

            Route::get('/{wallet}/remove', 'remove')->name('remove');
        });

});

Route::get('/set/webhook', function () {

   $response =  Http::post("https://api.telegram.org/bot".env('TELEGRAM_BOT_API_TOKEN')."/setWebhook?url=https://magnitiks.ru/tgbot/webhook");

   return dd($response);
});


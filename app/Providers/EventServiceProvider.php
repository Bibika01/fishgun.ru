<?php

namespace App\Providers;

use App\Events\AcceptSendMailEvent;
use App\Events\BlockSendMailEvent;
use App\Events\DepositSendMailEvent;
use App\Events\ExchangeSendMailEvent;
use App\Events\RejectSendMailEvent;
use App\Events\SendSendMailEvent;
use App\Listeners\AcceptSendMailListener;
use App\Listeners\BlockSendMailListener;
use App\Listeners\DepositSendMailListener;
use App\Listeners\ExchangeSendMailListener;
use App\Listeners\RejectSendMailListener;
use App\Listeners\SendSendMailListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        AcceptSendMailEvent::class => [
            AcceptSendMailListener::class,
        ],
        BlockSendMailEvent::class => [
            BlockSendMailListener::class
        ],
        DepositSendMailEvent::class => [
            DepositSendMailListener::class
        ],
        ExchangeSendMailEvent::class => [
            ExchangeSendMailListener::class
        ],
        RejectSendMailEvent::class => [
            RejectSendMailListener::class
        ],
        SendSendMailEvent::class => [
            SendSendMailListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}

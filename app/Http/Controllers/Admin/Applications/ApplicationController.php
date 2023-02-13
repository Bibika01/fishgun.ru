<?php

namespace App\Http\Controllers\Admin\Applications;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function new()
    {
        $applications = Application::query()->whereIn('status', ["PENDING","PAYED","EXCHANGE","SENDING"])->paginate(10);

        return view('admin.applications.new', compact('applications') );
    }

    public function processed()
    {
        $applications = Application::query()->where('status', "OK")->paginate(10);

        return view('admin.applications.processed', compact('applications') );
    }

    public function blocked()
    {
        $applications = Application::query()->where('status', "BLOCK")->paginate(10);

        return view('admin.applications.blocked', compact('applications') );
    }

    public function changeAddress(Application $application, Request $request)
    {
        $application->old_address = $application->wallet_address;
        $application->wallet_address = $request->address;
        $application->save();

        return redirect()->back()->with('success', 'Адресс в заявке успешно изменен');
    }
    public function deposit(Application $application)
    {
//        $email = $application->email;
//
//        $data = array(
//            'application_status' => 'SENDING TO YOU',
//            'application_id' => 5,
//        );
//
//        Mail::send('mail.created', $data, function($message) use ($email) {
//
//            $message->to($email, 'CryptoExchangeBoard')->subject('Accou2nt registration on cryptoexhcangeboard.com');
//
//            $message->from('noreply@cryptoexchangeboard.com','CryptoExchangeBoar2d');
//        });

        $application->status = "PAYED";

        $application->save();

        session()->flash('success', 'Заявка исполнена');

        return redirect()->back();
    }

    public function exchange(Application $application)
    {
//        $email = $application->email;
//
//        $data = array(
//            'application_status' => 'SENDING TO YOU',
//            'application_id' => 5,
//        );
//
//        Mail::send('mail.deposit-received', $data, function($message) use ($email) {
//
//            $message->to($email, 'CryptoExchangeBoard')->subject('Accou2nt registration on cryptoexhcangeboard.com');
//
//            $message->from('noreply@cryptoexchangeboard.com','CryptoExchangeBoar2d');
//        });

        $application->status = "EXCHANGE";

        $application->save();

        session()->flash('success', 'Заявка исполнена');

        return redirect()->back();
    }

    public function send(Application $application)
    {
//        $email = $application->email;
//
//        $data = array(
//            'application_status' => 'SENDING TO YOU',
//            'application_id' => 5,
//        );
//
//        Mail::send('mail.sending', $data, function($message) use ($email) {
//
//            $message->to($email, 'CryptoExchangeBoard')->subject('Accou2nt registration on cryptoexhcangeboard.com');
//
//            $message->from('noreply@cryptoexchangeboard.com','CryptoExchangeBoar2d');
//        });

        $application->status = "SENDING";

        $application->save();

        session()->flash('success', 'Заявка исполнена');

        return redirect()->back();
    }

    public function accept(Application $application)
    {
//        $email = $application->email;
//
//        $data = array(
//            'application_status' => 'SENDING TO YOU',
//            'application_id' => 5,
//        );
//
//        Mail::send('mail.finish', $data, function($message) use ($email) {
//
//            $message->to($email, 'CryptoExchangeBoard')->subject('Accou2nt registration on cryptoexhcangeboard.com');
//
//            $message->from('noreply@cryptoexchangeboard.com','CryptoExchangeBoar2d');
//        });

        $application->status = "OK";

        $application->save();

        session()->flash('success', 'Заявка исполнена');

        return redirect()->back();
    }

    public function reject(Application $application)
    {
        $application->status = "REJECTED";
        $application->save();

        session()->flash('success', 'Заявка отклонена');

        return redirect()->back();
    }

    public function block(Application $application)
    {
//        $email = $application->email;
//
//        $data = array(
//            'application_status' => 'SENDING TO YOU',
//            'application_id' => 5,
//        );
//
//        Mail::send('mail.block', $data, function($message) use ($email) {
//
//            $message->to($email, 'CryptoExchangeBoard')->subject('Accou2nt registration on cryptoexhcangeboard.com');
//
//            $message->from('noreply@cryptoexchangeboard.com','CryptoExchangeBoar2d');
//        });

        $application->status = "BLOCK";
        $application->save();

        session()->flash('success', 'Средства заморожены');

        return redirect()->back()->with('success', 'Средства пользователя заморожены');
    }

    public function remove(Application $application)
    {
        $application->delete();

        session()->flash('success', 'Заявка удалена');

        return redirect()->back();
    }
}

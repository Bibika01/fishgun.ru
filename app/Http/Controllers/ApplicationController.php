<?php

namespace App\Http\Controllers;

use App\Events\SendSendMailEvent;
use App\Models\Application;
use App\Models\Promocode;
use App\Models\Wallet;
use App\Telegram\Bot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    public function add(Request $request)
    {
//        return dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'gives' => 'required',
                'gives_count' => 'required',
                'take' => 'required',
                'take_count' => 'required',
                'wallet_address' => 'required',
                'email' => 'required'
            ]
        );

        if ($validator->fails())
        {
            return redirect()->back()->with('failed','Что то пошло не так, заполните все поля');
        }

        try
        {
            $application = new Application();

            $application->promocode = "NONE";

            if ( $request->has('promocode') )
            {
                $promocode = $request->get('promocode');

                $has_promocode = Promocode::all()->where('name', $promocode)->count() > 0;

                if ($has_promocode)
                {
                    $application->promocode = $promocode;
                }
                else
                {
                    $application->promocode = "INCORRECT";
                }
            }

            $application->ip = $request->ip();
            $application->gives = $request->gives;
            $application->gives_count = floatval($request->gives_count);
            $application->take = $request->take;
            $application->take_count = floatval($request->take_count);
            $application->wallet_address = $request->wallet_address;
            $application->email = $request->email;
            $application->status = "PENDING";
            $application->save();

            $commission = 101.5;

            $wallet_gives = Wallet::query()->where('short_name', $application->gives)->first();
            $wallet_take = Wallet::query()->where('short_name', $application->take)->first();

            try
            {
                Bot::send__new__application(
                    $application->id,
                    $application->gives,
                    $application->gives_count,
                    $application->take,
                    $application->take_count,
                    $application->wallet_address,
                    date_format($application->created_at, 'Y-m-d'),
                    date_format($application->created_at, 'H:i:s')
                );
            }
            catch(\Exception $e)
            {
                return redirect()->back()->with('failed', 'Что то пошло не так, бот не смог отправить сообщение');
            }

//            $email = $application->email;
//
//            $data = array(
//                'application_status' => 'SENDING TO YOU',
//                'application_id' => 5,
//            );
//
//            Mail::send('mail.created', $data, function($message) use ($email) {
//
//                $message->to($email, 'IsIsCrypto')->subject('Exchange application on isiscrypto.com created');
//
//                $message->from('noreply@isiscrypto.com','CryptoExchangeBoar2d');
//            });

            return redirect()->route('applications.status', $application->id);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('failed','Что то пошло не так');
        }
    }

    public function confirm(Application $application)
    {
        $wallet = [
            'from' => Wallet::all()->where('short_name', $application->gives)->first(),
            'to' => Wallet::all()->where('short_name', $application->take)->first()
        ];

        return view('applications.pay', compact('application', 'wallet') );
    }



    public function status(Application $application)
    {
        $wallet = [
            'from' => Wallet::all()->where('short_name', $application->gives)->first(),
            'to' => Wallet::all()->where('short_name', $application->take)->first()
        ];

        return view('applications.status', compact('application', 'wallet'));
    }

    public function finish(Application $application)
    {
        $wallet = [
            'from' => Wallet::all()->where('short_name', $application->gives)->first(),
            'to' => Wallet::all()->where('short_name', $application->take)->first()
        ];

        return view('applications.finish', compact('application', 'wallet'));
    }

    public function block(Application $application)
    {
        $wallet = [
            'from' => Wallet::all()->where('short_name', $application->gives)->first(),
            'to' => Wallet::all()->where('short_name', $application->take)->first()
        ];

        return view('applications.block', compact('application', 'wallet'));
    }
}

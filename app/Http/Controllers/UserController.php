<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
    public function loginView()
    {
        return view('account.login');
    }

    public function registerView()
    {
        return view('account.register');
    }

    public function restoreView()
    {
        return view('account.restore');
    }

    public function login(LoginRequest $request)
    {
        $user = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if ( Auth::attempt($user) )
        {
            return redirect()->route('account.applications');
        }

        return redirect()->back()->with('failed', 'Неверная(ый) ел. почта или пароль');
    }

    public function logout()
    {
        if ( Auth::check() )
        {
            Auth::logout();
        }

        return redirect()->route('home');
    }

    public function register(Request $request)
    {
        $data = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        if ( $data->fails() )
        {
            return redirect()->back()->withErrors( $data )->withInput( $request->all() );
        }

        $user = new User();

        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password') );

        $user->save();

        Auth::login( $user );

        try
        {
            MailController::send($user->email,$request->get('password'));
        }
        catch (\Exception $e)
        {

        }

        return redirect()->route('account.applications');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (! Hash::check( $request->get('current_password'), Auth::user()->password ) )
        {
            return redirect()->back()->with('failed', 'Неправильный пароль');
        }

        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();

        return redirect()->back()->with('success', 'Пароль изменен');
    }

    public function applications(Request $request)
    {
        $applications = Application::all()->where('email', Auth::user()->email);

        if ( $request->has('filter') )
        {
            $applications = $applications->where('status', strtoupper($request->get('filter')) );
        }

        return view('account.applications', compact('applications') );
    }

    public function security()
    {
        return view('account.security');
    }
}

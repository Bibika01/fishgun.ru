<?php

namespace App\Http\Controllers\Admin\Wallets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Wallets\CreateWalletRequest;
use App\Http\Requests\Admin\Wallets\UpdateWalletRequest;
use App\Models\Reserv;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class WalletController extends Controller
{
    public function list()
    {
        $wallets = Wallet::all();

        return view('admin.wallets.list', compact('wallets') );
    }

    public function create()
    {
        return view('admin.wallets.create');
    }

    public function store(CreateWalletRequest $request)
    {

        $wallet = new Wallet();

        $wallet->icon = "";
        $wallet->name = $request->get('name');
        $wallet->short_name = $request->get('short_name');
        $wallet->address = $request->get('address');

        $wallet->save();

        return redirect()->route('admin.wallets.list')->with('success', 'Кошелёк добавлен');
    }

    public function edit(Wallet $wallet)
    {
        return view('admin.wallets.edit', compact('wallet') );
    }

    public function update(Request $request, Wallet $wallet)
    {
//        if ( $request->has('icon') )
//        {
//            Storage::disk('public')->put('/uploads/'.strtolower($request->get('short_name')).'.png', $request->file('icon')->getContent() );
//            $wallet->icon = strtolower($request->get('short_name')).'.png';
//        }

        $upload_directory = "public/uploads";

        if ( $request->has('icon') )
        {
            $path = $request->file('icon')->store($upload_directory);
            $path = str_replace("public/uploads", "", $path);
            $wallet->icon = $path;
        }

        $wallet->percent = $request->get('percent');
        $wallet->name = $request->get('name');
        $wallet->short_name = $request->get('short_name');
        $wallet->address = $request->get('address');

        $wallet->save();

        return redirect()->route('admin.wallets.list')->with('success', 'Кошелёк: '.$wallet->address.' обновлен');
    }

    public function remove(Wallet $wallet)
    {
        $wallet->delete();

        return redirect()->route('admin.wallets.list')->with('success', 'Кошелёк: '.$wallet->address.' был удален');
    }
}

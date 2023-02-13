<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function edit__rules()
    {
        $rules = Page::all()->where('name', 'rules')->first();
        return view('admin.static.rules', compact('rules'));
    }

    public function update__rules(Request $request)
    {
        $request->validate([
            'text' => 'required'
        ]);

        $page = Page::all()->where('name', 'rules')->first();

        $page->text = $request->text;

        $page->save();

        return redirect()->back()->with('success', 'Правила успешно обновлены');
    }

    public function edit__agreement()
    {
        return view('admin.static.agreement');
    }

    public function update__agreement()
    {

    }
}

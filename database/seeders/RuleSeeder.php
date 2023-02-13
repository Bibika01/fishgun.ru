<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! Page::all()->where('name', 'rules')->count() > 0 )
        {
            $rule = new Page();

            $rule->name = 'rules';
        }
        else {
            $rule = Page::all()->where('name', 'rules')->first();
        }

        $rule->text = (string)view('admin.static.default-rules');

        $rule->save();

    }
}

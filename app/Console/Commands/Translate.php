<?php

namespace App\Console\Commands;

use Carbon\Language;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\Finder\Finder;

class Translate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    private function translate(string $locale, array $keys): array
    {
        $json = [];

        foreach ($keys as $key)
        {

        }

        return [];
    }

    public function handle()
    {
        $source_lang = "ru";

        $target_langs = ['en'];

        $source_json = file_get_contents(resource_path('lang/'.$source_lang.'.json'));

        $source_json = json_decode($source_json);

        $keys = [];

        foreach ($source_json as $key => $value)
        {
            $keys[] = $key;
        }


        var_dump( $keys );
    }
}

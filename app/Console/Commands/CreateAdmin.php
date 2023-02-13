<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:add {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command create admin';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        $passwd = $this->argument('password');

        $data = [
            'email' => $email,
            'password' => Hash::make($passwd)
        ];

        $user = User::query()->create($data);

        $user->assignRole('admin');

        $this->info("User has been successfully created");

        return 1;
    }
}

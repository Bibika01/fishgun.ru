<?php

namespace App\Console\Commands;

use App\Models\Reserv;
use App\Models\Wallet;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class SetWallets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:wallets';

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
    public function handle()
    {
        $wallets = [
            [
                'name' => 'Bitcoin',
                'ticker' => 'BTC'
            ],
            [
                'name' => 'Ethereum',
                'ticker' => 'ETH'
            ],
            [
                'name' => 'Tron',
                'ticker' => 'TRX',
            ],
            [
                'name' => 'Dash',
                'ticker' => 'DASH'
            ],
            [
                'name' => 'Polkadot',
                'ticker' => 'DOT'
            ],
            [
                'name' => 'Cardano',
                'ticker' => 'ADA'
            ],
            [
                'name' => 'Monero',
                'ticker' => 'XMR'
            ],
            [
                'name' => 'ZCash',
                'ticker' => 'ZEC'
            ],
            [
                'name' => 'Tether',
                'ticker' => 'USDT'
            ],
            [
                'name' => 'Polygon',
                'ticker' => 'MATIC'
            ],
            [
                'name' => 'Doge coin',
                'ticker' => 'DOGE'
            ]
        ];

        foreach ($wallets as $wallet)
        {
            if (! Wallet::all()->where('short_name', $wallet['ticker'])->count() > 0 )
            {
                $content = asset('/tokens/'.strtolower($wallet['ticker']).'.png' );

                Storage::disk('public')->put('/uploads/'.strtolower($wallet['ticker']).'.png', $content);

                $data = [
                    'name' => $wallet['name'],
                    'short_name' => $wallet['ticker'],
                    'address' => '0x00000',
                    'icon' => strtolower($wallet['ticker']).'.png'
                ];

                $wallet = Wallet::query()->create($data);
            }

        }

        return 0;
    }
}

<?php

namespace App\Console\Commands;

//use App\Models\BinanceAssets;
//use App\Models\BinanceAssetsNetworks;
use Illuminate\Console\Command;
use App\Http\Controllers\API\Arbitrage\StockExchanges\StandartController;

class HitBtcAssetsNetworksCli extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hitbtc:update:assets:networks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Binance update assets networks ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

    }
}

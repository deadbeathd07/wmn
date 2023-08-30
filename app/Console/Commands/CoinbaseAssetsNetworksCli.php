<?php

namespace App\Console\Commands;

use App\Http\Controllers\API\PushController;
use App\Models\CoinbaseAssets;
use App\Models\CoinbaseAssetsNetworks;
use Illuminate\Console\Command;
use App\Http\Controllers\API\Arbitrage\StockExchanges\StandartController;
use Illuminate\Http\Request;

class CoinbaseAssetsNetworksCli extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coinbase:update:assets:networks';

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
        //Coinbase Update Assets
        $coinbase = new StandartController('Coinbase');
        $coinbaseAssetsList = $coinbase->getListOfAssetsAction();

        if(!empty($coinbaseAssetsList)) {
            foreach ($coinbaseAssetsList as $asset) {
                $coinbaseAssets = new CoinbaseAssets();

                $key = $asset['currency']['code'];
                if (!empty($key)) {
                    $getAsset = $coinbaseAssets::select()->where(['code' => $key])->first();
                    if(empty($getAsset)) {

                        $coinbaseAssets->code = $key;
                        $response = $coinbaseAssets->save();
                        if($response) {
                            $this->sendPushToUser(1, "Coinbase added ". $key ." asset !", "!!! Please add network", 1);
                        }
                    }
                }
            }
        }

        $getAll = $coinbase->getAssetsNetworksAction();
        if(is_array($getAll)) {
            //Update assetsNetworks
            foreach ($getAll as $key => $row) {

                //Asset name
                $asset = $row['coin'];

                //get Asset Row
                $getAssetRow = CoinbaseAssets::select()->where("code", $asset)->first();
                if (!empty($getAssetRow)) {
                    $assetID = $getAssetRow->id;

                        $coinbaseAssetsNetworks = new CoinbaseAssetsNetworks();
                        $coinbaseAssetsNetworkRow = CoinbaseAssetsNetworks::select()->where([
                            ["network", $row['network']],
                            ["asset_id", $assetID]
                        ])->first();

                        $asset_id = $assetID;
                        $network = (!empty($row['network'])) ? $row['network'] : '';

                        if (empty($coinbaseAssetsNetworkRow)) {
                            // Insert
                            $coinbaseAssetsNetworks->create(
                                array(
                                    'asset_id' => $asset_id,
                                    'network' => $network
                                )
                            );
                        } else {

                            // Update
                            $coinbaseAssetsNetworks
                                ->where("asset_id", $asset_id)
                                ->where("network", $network)
                                ->update(
                                    [
                                        'asset_id' => $asset_id,
                                        'network' => $network
                                    ]
                                );
                        }

                };
            }
        } else {
            echo "empty array";
        }
    }
    public function sendPushToUser($userId, $title, $text, $status) {

        //Define user data
        $data = array(
            'users_id' => $userId,
            'title' => $title,
            'text' => $text,
            'status' => $status
        );

        $request = new Request($data);
        $pushController = new PushController($request);
        $pushController->index($request);
    }
}

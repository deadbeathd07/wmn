<?php

namespace App\Console\Commands;

use App\Http\Controllers\API\PushController;
use App\Models\BinanceAssets;
use App\Models\BinanceAssetsNetworks;
use Illuminate\Console\Command;
use App\Http\Controllers\API\Arbitrage\StockExchanges\StandartController;
use Illuminate\Http\Request;

class BinanceAssetsNetworksCli extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'binance:update:assets:networks';

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
        //Binance Update Assets list
        $binance = new StandartController('Binance');
        $binanceAssetsList = $binance->getListOfAssetsAction();

        if(!empty($binanceAssetsList)) {
            foreach ($binanceAssetsList as $key => $val) {
                $binanceAssets = new BinanceAssets();
                if (!empty($key)) {
                    $getAsset = $binanceAssets::select()->where(['code' => $key])->first();
                    if(empty($getAsset)) {

                        $binanceAssets->code = $key;
                        $response = $binanceAssets->save();
                        if($response) {

                            $this->sendPushToUser(1, "Binance added ". $key ." asset !", "!!! Please add network", 1);
                        }
                    }
                }
            }
        }

        //Update assetsNetworks
        $getAll = $binance->getAssetsNetworksAction();
        $counter = 1;
        foreach ($getAll as $key => $row) {

            //Asset name
            $asset = $row['coin'];

            //get Asset Row
            $getAssetRow = BinanceAssets::select()->where("code", $asset)->first();
            if (!empty($getAssetRow)) {
                $assetID = $getAssetRow->id;

                foreach ($row['networkList'] as $key => $val) {
                    $binanceAssetsNetworks = new BinanceAssetsNetworks();

                    $binanceAssetsNetworkRow = BinanceAssetsNetworks::select()->where([
                        ["network", $val['network']],
                        ["asset_id", $assetID]
                    ])->first();

                    $asset_id = $assetID;
                    $network = (!empty($val['network'])) ? $val['network'] : '';
                    $withdrawIntegerMultiple = (!empty($val['withdrawIntegerMultiple'])) ? $val['withdrawIntegerMultiple'] : '';
                    $isDefault = (!empty($val['isDefault'])) ? $val['isDefault'] : '';
                    $depositEnable = (!empty($val['depositEnable'])) ? $val['depositEnable'] : '';
                    $withdrawEnable = (!empty($val['withdrawEnable'])) ? $val['withdrawEnable'] : '';
                    $depositDesc = (!empty($val['depositDesc'])) ? $val['depositDesc'] : '';
                    $withdrawDesc = (!empty($val['withdrawDesc'])) ? $val['withdrawDesc'] : '';
                    $specialTips = (!empty($val['specialTips'])) ? $val['specialTips'] : '';
                    $specialWithdrawTips = (!empty($val['specialWithdrawTips'])) ? $val['specialWithdrawTips'] : '';
                    $name = (!empty($val['name'])) ? $val['name'] : '';
                    $resetAddressStatus = (!empty($val['resetAddressStatus'])) ? $val['resetAddressStatus'] : '';
                    $addressRegex = (!empty($val['addressRegex'])) ? $val['addressRegex'] : '';
                    $addressRule = (!empty($val['addressRule'])) ? $val['addressRule'] : '';
                    $memoRegex = (!empty($val['memoRegex'])) ? $val['memoRegex'] : '';
                    $withdrawFee = (!empty($val['withdrawFee'])) ? $val['withdrawFee'] : '';
                    $withdrawMin = (!empty($val['withdrawMin'])) ? $val['withdrawMin'] : '';
                    $withdrawMax = (!empty($val['withdrawMax'])) ? $val['withdrawMax'] : '';
                    $minConfirm = (!empty($val['minConfirm'])) ? $val['minConfirm'] : '';
                    $unLockConfirm = (!empty($val['unLockConfirm'])) ? $val['unLockConfirm'] : '';
                    $sameAddress = (!empty($val['sameAddress'])) ? $val['sameAddress'] : '';
                    $estimatedArrivalTime = (!empty($val['estimatedArrivalTime'])) ? $val['estimatedArrivalTime'] : '';
                    $busy = (!empty($val['busy'])) ? $val['busy'] : '';
                    $country = (!empty($val['country'])) ? $val['country'] : '';

                    if(empty($binanceAssetsNetworkRow)) {
                        // Insert
                        $binanceAssetsNetworks->create(
                            array(
                                'asset_id' => $asset_id,
                                'network' => $network,
                                'withdrawIntegerMultiple' => $withdrawIntegerMultiple,
                                'isDefault' => $isDefault,
                                'depositEnable' => $depositEnable,
                                'withdrawEnable' => $withdrawEnable,
                                'depositDesc' => $depositDesc,
                                'withdrawDesc' => $withdrawDesc,
                                'specialTips' => $specialTips,
                                'specialWithdrawTips' => $specialWithdrawTips,
                                'name' => $name,
                                'resetAddressStatus' => $resetAddressStatus,
                                'addressRegex' => $addressRegex,
                                'addressRule' => $addressRule,
                                'memoRegex' => $memoRegex,
                                'withdrawFee' => $withdrawFee,
                                'withdrawMin' => $withdrawMin,
                                'withdrawMax' => $withdrawMax,
                                'minConfirm' => $minConfirm,
                                'unLockConfirm' => $unLockConfirm,
                                'sameAddress' => $sameAddress,
                                'estimatedArrivalTime' => $estimatedArrivalTime,
                                'busy' => $busy,
                                'country' => $country
                            )
                        );
                    } else {

                        // Update
                        $binanceAssetsNetworks
                            ->where("asset_id", $asset_id)
                            ->where("network", $network)
                            ->update(
                            [
                                'asset_id' => $asset_id,
                                'network' => $network,
                                'withdrawIntegerMultiple' => $withdrawIntegerMultiple,
                                'isDefault' => $isDefault,
                                'depositEnable' => $depositEnable,
                                'withdrawEnable' => $withdrawEnable,
                                'depositDesc' => $depositDesc,
                                'withdrawDesc' => $withdrawDesc,
                                'specialTips' => $specialTips,
                                'specialWithdrawTips' => $specialWithdrawTips,
                                'name' => $name,
                                'resetAddressStatus' => $resetAddressStatus,
                                'addressRegex' => $addressRegex,
                                'addressRule' => $addressRule,
                                'memoRegex' => $memoRegex,
                                'withdrawFee' => $withdrawFee,
                                'withdrawMin' => $withdrawMin,
                                'withdrawMax' => $withdrawMax,
                                'minConfirm' => $minConfirm,
                                'unLockConfirm' => $unLockConfirm,
                                'sameAddress' => $sameAddress,
                                'estimatedArrivalTime' => $estimatedArrivalTime,
                                'busy' => $busy,
                                'country' => $country
                            ]
                        );
                    }
                }
                $counter++;
            };
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

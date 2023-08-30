<?php

namespace App\Jobs;

use App\Http\Controllers\API\Arbitrage\ArbitrageController;
use App\Http\Controllers\API\PushController;
use App\Http\Controllers\API\Arbitrage\StockExchanges\StandartController;
use App\Models\Event;
//use App\Services\EventProcessor;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Stock1BuyProfitAssetForUsdtFinish implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $walletStockModel;
    protected $stock1Model;
    protected $stock2Model;
    protected $data;
    protected $input;
    protected $responseData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $walletStockModel, $stock1Model, $stock2Model, $data, $input = array(), $responseData)
    {
        $this->user = $user;
        $this->walletStockModel = $walletStockModel;
        $this->stock1Model = $stock1Model;
        $this->stock2Model = $stock2Model;
        $this->data = $data;
        $this->input = $input;
        $this->responseData = $responseData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $input = $this->input;
        $walletStockModel = $this->walletStockModel;
        $stock1Model = $this->stock1Model;
        $stock2Model = $this->stock2Model;

        $responseData = $this->responseData;

        $shortProfitAsset = str_replace($input['asset'],'', $input['profit_asset']);
        $availableAssetArr = $stock1Model->availableAsset($shortProfitAsset, $responseData->amount);

        $this->status = $availableAssetArr['status'];
        $availableAsset = $availableAssetArr['asset_available'];
        $amount = $responseData->amount;

        if(!$this->status) {
            $this->data['title'] = "Wait Stock1BuyProfitAssetForUsdt";
            $this->data['text'] = "Wait: " . $amount . " to " . $availableAsset;
        } else {

            //Get data from Stock wallet
            $responseData->amount = $availableAsset;

            $ArbitrageController = new ArbitrageController();
            $ArbitrageController->doAction(
                $this->user,
                $walletStockModel,
                $stock1Model,
                $stock2Model,
                $input,
                'stock1_buy_profit_asset_for_usdt_finish',
                $responseData
            );

            $this->data['title'] = "Stock1BuyProfitAssetForUsdt";
            $this->data['text'] = "Good: " . $amount . " to " . $availableAsset;

        }

        //if Profit Asset not available then wait until status 1
        if($this->attempts() <= 10 && $this->status == 0) {
            $this->sendPush();
            $this->release();
            sleep(30);
        } else {
            $this->sendPush();
        }
    }

    public function sendPush() {
        $request = new Request($this->data);
        $pushController = new PushController($request);
        $pushController->index($request);
    }
}

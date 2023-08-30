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

class Stock1WithdrawProfitAssetToStock2Finish implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $data;
    protected $input;
    protected $status;

    protected $walletStockModel;
    protected $stock1Model;
    protected $stock2Model;
    protected $responseData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $walletStockModel, $stock1Model, $stock2Model, $data, $input = array(), $responseData)
    {
        $this->user = $user;
        $this->input = $input;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->sendPush();
    }

    public function sendPush() {
        $request = new Request($this->data);
        $pushController = new PushController($request);
        $pushController->index($request);
    }
}

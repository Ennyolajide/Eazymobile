<?php

namespace App\Http\Controllers\Bitcoin;

use App\Coins;
use Carbon\Carbon;
use App\CurrencyConverter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    /**
     * get exchange rate using online free currency conveter api
     */
    protected function rate($fromCurrency = 'USD', $toCurrency = 'NGN')
    {
        $params = $fromCurrency . '_' . $toCurrency;
        $apiKey = config('constants.currencyconveter.token');
        $client = new \GuzzleHttp\Client(['http_errors' => false]);
        $query =  'convert?q=' . $params . '&compact=ultra&apiKey=' . $apiKey;
        $request = $client->get(config('constants.currencyconveter.url') . $query);
        $status = $request->getStatusCode() == '200' ? true : false;
        $result = $status ? json_decode($request->getBody()->getContents(), true) : false;

        return $result ? ceil($result[$params]) : false;
    }

    /**
     * Create a new row to store currency (USD to Naira)
     */
    protected function insertRate()
    {
        CurrencyConverter::create([
            'currency' => 'USD', 'rate' => $this->rate(),
            'expires' => Carbon::parse(date('Y-m-d H:i:s'))->addHour()
        ]);
    }

    /**
     * update the currency rate ( to be updated every hour)
     */
    protected function updateRate()
    {
        $rate = $this->rate();
        CurrencyConverter::whereCurrency('USD')->first()->update([
            'currency' => 'USD', 'rate' => $rate,
            'expires' => Carbon::parse(date('Y-m-d H:i:s'))->addHour()
        ]);

        return $rate;
    }

    /**
     * Store the Rate (insert/update)
     */
    protected function storeExchangeRate($action = null)
    {
        return is_null($action) ? $this->insertRate() : $this->updateRate();
    }

    /**
     * Get the Exchange rate .. (fetch new rate every hour )
     */
    protected function getExchangeRate()
    {
        $storage = new CurrencyConverter();
        $storage->whereCurrency('USD')->get()->count() ? '' : $this->storeExchangeRate();
        $rateObject = $storage->whereCurrency('USD')->first();

        return $rateObject->expires > date('Y-m-d H:i:s', time()) ? $rateObject->rate : $this->storeExchangeRate('update');
    }

    public function rates()
    {
        $coin = Coins::first();
        //$exchangeRate = $this->getExchangeRate();
        $exchangeRate = $this->rate();
        return [
            'buy_rate' =>  $exchangeRate ? $exchangeRate + $coin->buy_rate : 0,
            'sell_rate' => $exchangeRate ? $exchangeRate + $coin->sell_rate : 0
        ];
    }



}

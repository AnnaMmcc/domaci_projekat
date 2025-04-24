<?php

namespace App\Console\Commands;

use App\Models\ExchangeRates;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class getTodaysExchange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-todays-exchange';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
      $ApiKey = trim(env("EXCHANGE_API_KEY"));

      $baseCurrency = "RSD";

      $url = "https://v6.exchangerate-api.com/v6/{$ApiKey}/latest/$baseCurrency";

      $response = Http::get($url);

      foreach(ExchangeRates::AVAILABLE_CURRENCIES as $currency)
      {
              $toDayCurrency = ExchangeRates::getCurrencyForToday($currency);

              if($toDayCurrency !== null)
              {
                  continue;
              }

             ExchangeRates::create([
              'currency' => $currency,
              'value' => $response->json()["conversion_rates"][$currency]
              ]);
      }




    }
}

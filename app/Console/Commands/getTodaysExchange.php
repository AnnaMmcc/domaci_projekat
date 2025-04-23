<?php

namespace App\Console\Commands;

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

      $url = "https://v6.exchangerate-api.com/v6/{$ApiKey}/latest/USD";

      $response = Http::get($url);

      $usd = $response["conversion_rates"]["USD"];
      $eur = $response["conversion_rates"]["EUR"];
      dd($usd, $eur);


    }
}

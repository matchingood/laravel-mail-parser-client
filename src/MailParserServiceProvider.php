<?php

namespace MatchinGood\MailParserClient;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class MailParserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('mailparser', function ($app) {
            $client = new Client([
                'base_uri' => config('mailparser.endpoint')
            ]);
            $apiKey = config('mailparser.api_key');
            return new MailParserClient($client, $apiKey);
        });
    }
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/mailparser.php' => config_path('mailparser.php')
        ]);
    }
}

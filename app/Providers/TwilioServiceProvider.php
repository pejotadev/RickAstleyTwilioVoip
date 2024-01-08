// Exemplo de código para registrar TwilioService no contêiner de injeção de dependências
$this->app->singleton(TwilioService::class, function ($app) {
    $client = new Client(config('services.twilio.sid'), config('services.twilio.token'));
    $fromNumber = config('services.twilio.from_number');

    return new TwilioService($client, $fromNumber);
});

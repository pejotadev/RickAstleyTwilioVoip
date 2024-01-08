<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;
    protected $from;

    public function __construct()
    {
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $this->from = config('services.twilio.from_number');

        $this->client = new Client($sid, $token);
    }

    public function sendSMS($to, $message)
    {
        return $this->client->messages->create($to, [
            'from' => $this->from,
            'body' => $message
        ]);
    }

    /**
     * Inicia uma chamada de voz para um número específico.
     *
     * @param string $to Número de destino da chamada.
     * @param string $url URL contendo TwiML instruções para a chamada.
     * @return mixed
     */
    public function makeCall(string $to, string $url)
    {
        try {
            return $this->client->calls->create(
                $to,
                $this->from, // Número registrado no Twilio que fará a chamada
                ['url' => $url]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro ao iniciar chamada: " . $e->getMessage());
        }
    }



    // Adicione aqui outros métodos para interagir com a VOIP API da Twilio
}

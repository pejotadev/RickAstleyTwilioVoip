<?php

namespace App\Http\Controllers;
use App\Services\TwilioService;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function makeCall()
    {
        $twilioService = new TwilioService();
        // use ngrok to expose xml file the file is in public/NeverGonnaGiveYouUp.xml
        $url = 'https://de2f-187-32-120-41.ngrok-free.app/NeverGonnaGiveYouUp.xml';
        $cellphone = '+5531971347237';
        $twilioService->makeCall($cellphone, $url);
    }
}

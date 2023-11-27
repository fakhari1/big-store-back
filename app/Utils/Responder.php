<?php

namespace App\Utils;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Response;

class Responder
{
    public static function response($data = [], $responseCode = 200, $message = '')
    {
        return self::responseWrapper($responseCode, $message, $data);
    }

    protected static function responseWrapper($responseCode, $message, $data)
    {
        return Response::json(
            [
                'data' => $data,
                'message' => $message,
                'success' => !($responseCode > 299 || $responseCode < 200),
            ],
            $responseCode
        );

    }
}

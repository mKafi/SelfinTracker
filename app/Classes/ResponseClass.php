<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class ResponseClass
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function rollback($e, $message = "Something went wrong! Process not completed")
    {
        DB::rollBack();
        self::throw($e, $message);
    }

    public static function throw($e, $message = "Something went wrong! Process not completed")
    {
        Log::info($e);
        throw new HttpResponseException(response()->json(['message' => $message], 500));
    }

    public static function sendResponse($status, $data, $message, $statusCode, $httStatusCode)
    {
        $response = [
            'status' => $status
        ];
        if (!empty($data)) {
            $response['data'] = $data;
        }
        if (!empty($message)) {
            $response['message'] = $message;
        }
        if (!empty($statusCode)) {
            $response['statusCode'] = $statusCode;
        }

        return response()->json($response, $httStatusCode);
    }
}

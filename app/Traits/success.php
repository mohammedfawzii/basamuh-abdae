<?php

namespace App\Traits;



use Illuminate\Http\JsonResponse;

trait success
{
    public function successResponse($data, $message = '', $statusCode = 200): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $response = ['data' => $data];
        if (!empty($message)) {
            $response['message'] = $message;
        }
        return response($response, $statusCode);
    }
}

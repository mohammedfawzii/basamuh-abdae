<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait erorr
{
    public function errorResponse($message, $statusCode = 400): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return response(['error' => $message], $statusCode);
    }
}

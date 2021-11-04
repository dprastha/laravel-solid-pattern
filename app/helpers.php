<?php

function success($message, $data = null, $statusCode = 200)
{
    return response()->json([
        'message' => $message,
        'code' => $statusCode,
        'results' => $data
    ], $statusCode);
}

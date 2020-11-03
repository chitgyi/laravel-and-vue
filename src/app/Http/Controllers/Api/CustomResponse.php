<?php

namespace App\Http\Controllers\Api;

class CustomResponse
{
    public static function collection($collection)
    {
        return response()->json($collection, 200);
    }
    public static function success($message, $data)
    {
        return response()->json([
            'code' => 200,
            'message' => $message,
            'data' => $data
        ], 200);
    }

    public static function created($message, $data)
    {
        return response()->json([
            'code' => 201,
            'message' => $message,
            'data' => $data
        ], 201);
    }


    public static function accepted($message, $data = null)
    {
        return response()->json([
            'code' => 202,
            'message' => $message,
            'data' => $data
        ], 202);
    }

    public static function notfound($message = 'Not Found')
    {
        return response()->json([
            'code' => 404,
            'message' => $message,
        ], 404);
    }

    public static function accssDenied($message = 'You have no permission')
    {
        return response()->json([
            'code' => 403,
            'message' => $message,
        ], 403);
    }

    public static function unableToProcess($message = 'Unable to process')
    {
        return response()->json([
            'code' => 402,
            'message' => $message,
        ], 402);
    }


    public static function unAuthorized($message = 'Unauthorized')
    {
        return response()->json([
            'code' => 401,
            'message' => $message,
        ], 401);
    }

    public static function invalid($message = 'Invalid Credentials')
    {
        return response()->json([
            'code' => 400,
            'message' => $message,
        ], 400);
    }

    public static function internalError($message = 'An Error Occurred')
    {
        return response()->json([
            'code' => 500,
            'message' => $message,
        ], 500);
    }
}

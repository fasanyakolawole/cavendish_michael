<?php

namespace App\CustomResponse;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;


class HttpResponse
{
    public static function authAccountCreated(string $data): JsonResponse
    {
        return response()->json([
            'token' => $data,
            'message' => 'Operation was successful',
        ], Response::HTTP_OK);
    }

    public static function success($data, $message = null): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message ?? 'Operation was successful',
            'status' => Response::HTTP_OK,
        ], Response::HTTP_OK);
    }

    /**
     * @return JsonResponse
     */
    public static function UnknownError(): JsonResponse
    {
        return response()->json([
            'message' => 'Sorry something went wrong',
            'status' => Response::HTTP_NOT_FOUND,
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

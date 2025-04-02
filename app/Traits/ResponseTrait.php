<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use function PHPUnit\Framework\directoryExists;

trait ResponseTrait
{
    private $codes = [
        'success' => 200,
        'created' => 201,
        'no_content' => 204,
        'bad_request' => 400,
        'unauthorized' => 401,
        'forbidden' => 403,
        'not_found' => 404,
        'conflict' => 409,
        'internal_server_error' => 500,
    ];
    public function successResponse($data)
    {
        return response()->json([
            'key' => __('admin.success'),
            'message' => __('admin.success'),
            'data' => $data,
        ], $this->codes['success']);
    }
    public function failResponse($message)
    {
        return response()->json([
            'key' => __('admin.failed'),
            'message' => $message,
        ], $this->codes['internal_server_error']);
    }
    public function unauthorizedResponse($message)
    {
        return response()->json([
            'key' => __('admin.unauthorized'),
            'message' => $message,
        ], $this->codes['unauthorized']);
    }
    public function notFoundResponse($message)
    {
        return response()->json([
            'key' => __('admin.failed'),
            'message' => $message,
        ], $this->codes['not_found']);
    }

}

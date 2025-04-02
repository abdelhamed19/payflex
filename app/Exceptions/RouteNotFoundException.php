<?php

namespace App\Exceptions;

use App\Traits\ResponseTrait;
use Exception;

class RouteNotFoundException extends Exception
{
    use ResponseTrait;
    public function __construct($message = "Route not found", $code = 404, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
    public function render($request)
    {
        return $this->notFoundResponse(__('api.route_not_found'));
    }
}

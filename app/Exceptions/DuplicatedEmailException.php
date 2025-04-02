<?php

namespace App\Exceptions;

use App\Traits\ResponseTrait;
use Exception;

class DuplicatedEmailException extends Exception
{
    use ResponseTrait;
    public function __construct($message = "Email already exists", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render($request)
    {
        if ($request->expectsJson()) {
            return $this->failResponse($this->getMessage(),);
        }
        return redirect()->back()->withErrors(['email' => $this->getMessage()]);
    }
}

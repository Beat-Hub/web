<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    protected $message = "The property 'id' is null.";
}

<?php

namespace App\Exceptions;

use Exception;

class UserNotVerifiedException extends Exception
{
    /**
     * The exception description.
     *
     * @var string
     */
    protected $message = 'Please verify you email address!';
    protected $code = '403';
}

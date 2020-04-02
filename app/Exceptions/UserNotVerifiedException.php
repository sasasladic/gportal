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
    protected $message = 'This user is not verified.';
    protected $code = '403';
}

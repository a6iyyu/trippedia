<?php

declare(strict_types=1);

namespace Vendor;

use Exception as Errorable;
use Throwable;

abstract class Exception extends Errorable
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
<?php

namespace Src\General\User\Domain\Exceptions;

final class PasswordDoNotMatchException extends \DomainException
{
    public function __construct()
    {
        parent::__construct('Passwords do not match');
    }
}
<?php

namespace Src\General\Club\Application\Exceptions;

final class ClubDontExistsException extends \DomainException
{
    public function __construct()
    {
        return parent::__construct("El club no existe.");
    }
}
<?php

namespace Src\General\Club\Application\Exceptions;

final class NameAlreadyUsedException extends \DomainException
{
    public function __construct()
    {
        return parent::__construct("El nombre del Club ya esta en uso");
    }
}
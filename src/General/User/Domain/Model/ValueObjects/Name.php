<?php

namespace Src\General\User\Domain\Model\ValueObjects;

use Src\Common\Domain\Exceptions\RequiredException;
use Src\Common\Domain\ValueObject;

final class Name extends ValueObject
{
    private string $name;

    public function __construct(?string $name)
    {
        if (!$name) throw new RequiredException("name");

        $this->name = $name;
    }

    public function __toString() 
    {
        return $this->name;
    }

    public function jsonSerialize(): string
    {
        return $this->name;
    }
}
<?php

namespace Src\General\Club\Domain\Model\ValueObjects;

use Src\Common\Domain\ValueObject;
use Src\Common\Domain\Exceptions\RequiredException;

final class Stadium extends ValueObject {

    private string $stadium;

    public function __construct(?string $stadium)
    {
        if (!$stadium) throw new RequiredException("stadium");

        $this->stadium = $stadium;
    }

    public function __toString() 
    {
        return $this->stadium;
    }

    public function jsonSerialize(): string
    {
        return $this->stadium;
    }
}
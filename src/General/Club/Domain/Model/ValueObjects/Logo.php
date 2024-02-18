<?php

namespace Src\General\Club\Domain\Model\ValueObjects;

use Src\Common\Domain\ValueObject;
use Src\Common\Domain\Exceptions\RequiredException;

final class Logo extends ValueObject {

    private string $logo;

    public function __construct(?string $logo)
    {
        if (!$logo) throw new RequiredException("logo");

        $this->logo = $logo;
    }

    public function __toString() 
    {
        return $this->logo;
    }

    public function jsonSerialize(): string
    {
        return $this->logo;
    }
}
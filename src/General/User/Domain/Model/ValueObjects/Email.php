<?php

namespace Src\General\User\Domain\Model\ValueObjects;

use Src\Common\Domain\Exceptions\RequiredException;
use Src\Common\Domain\ValueObject;

final class Email extends ValueObject
{
    private string $email;

    public function __construct(?string $email)
    {
        if (!$email) throw new RequiredException("email");

        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }

    public function jsonSerialize(): string
    {
        return $this->email;
    }
}
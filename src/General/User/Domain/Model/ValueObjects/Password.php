<?php

namespace Src\General\User\Domain\Model\ValueObjects;

use Src\Common\Domain\Exceptions\RequiredException;
use Src\Common\Domain\ValueObject;
use Src\General\User\Domain\Exceptions\PasswordDoNotMatchException;

final class Password extends ValueObject
{
    public readonly ?string $value;

    public function __construct(?string $password, ?string $confirmation)
    {
        if (!$password || !$confirmation) throw new RequiredException("password");

        if ($password !== $confirmation) throw new PasswordDoNotMatchException();

        $this->value = $password;
    }

    public function isNotEmpty(): bool
    {
        return $this->value !== null;
    }

    public function jsonSerialize(): string
    {
        return '';
    }
}
<?php

declare(strict_types = 1);

namespace Src\General\User\Domain\Model;

use Src\Common\Domain\AggregateRoot;
use Src\General\User\Domain\Model\ValueObjects\Email;
use Src\General\User\Domain\Model\ValueObjects\Name;

class User extends AggregateRoot
{

    public function __construct(
        public readonly ?int $id,
        public readonly Name $name,
        public readonly Email $email
    ) {}


    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email
        ];
    }

}
<?php 

declare(strict_types = 1);

namespace Src\General\Club\Domain\Model;

use Src\Common\Domain\AggregateRoot;

class Club extends AggregateRoot
{

    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly ?int $coins,
        public readonly string $logo,
        public readonly ?int $level,
        public readonly ?int $grl,
        public readonly ?bool $verified,
        
        public readonly string $stadium,

        public readonly ?int $role_id,
        public readonly ?int $user_id,
        public readonly ?int $league_id
    )
    {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'coins' => $this->coins,
            'logo' => $this->logo,
            'level' => $this->level,
            'grl' => $this->grl,
            'verified' => $this->verified,

            'stadium' => $this->stadium,

            'role_id' => $this->role_id,
            'user_id' => $this->user_id,
            'league_id' => $this->league_id
        ];
    }

}
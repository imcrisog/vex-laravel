<?php


namespace Src\General\Club\Domain\Model;

use Src\Common\Domain\AggregateRoot;

class Player implements AggregateRoot {

    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly ?int $coins,
        public readonly string $logo,
        public readonly ?int $level,
        public readonly ?int $grl,
        public readonly ?bool $verified,

        public readonly string $postion,
        public readonly string $properties,

        public readonly int $goals,
        public readonly int $matchs,
        public readonly int $assists

    ) {}

}
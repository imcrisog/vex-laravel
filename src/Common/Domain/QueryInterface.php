<?php

namespace Src\Common\Domain;

interface QueryInterface
{
    public function handle(): mixed;
}
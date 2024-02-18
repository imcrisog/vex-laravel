<?php

namespace Src\Common\Domain;

interface CommandInterface 
{
    public function execute();
}
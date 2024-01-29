<?php

namespace Src\Common\Domain\Exceptions;

final class RequiredException extends \DomainException
{
    public function __construct($field)
    {
        parent::__construct(trans('validation.required', ['attribute' => $field]));
    }
}
<?php

namespace Robchett\Aoc2023;

/** @template T of scalar */
readonly class TaskOutput
{
    public function __construct(protected mixed $value)
    {

    }

    /** @return T */
    public function unwrap(): mixed
    {
        return $this->value;
    }

}
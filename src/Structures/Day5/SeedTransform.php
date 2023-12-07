<?php

namespace Robchett\Aoc2023\Structures\Day5;

readonly class SeedTransform
{
    /** @param list<SeedRange> $untouched */
    public function __construct(
        public ?SeedRange $transformed,
        public array $untouched
    )
    {

    }

}
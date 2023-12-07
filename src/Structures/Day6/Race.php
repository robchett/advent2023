<?php

namespace Robchett\Aoc2023\Structures\Day6;

readonly class Race
{

    public function __construct(
        public int $timeLimit,
        public int $targetDistance,
    )
    {

    }

}
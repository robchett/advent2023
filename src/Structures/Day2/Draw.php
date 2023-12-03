<?php

namespace Robchett\Aoc2023\Structures\Day2;

readonly class Draw
{

    public function __construct(
        public int $red,
        public int $blue,
        public int $green,
    )
    {

    }
}
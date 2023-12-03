<?php

namespace Robchett\Aoc2023\Structures\Day2;

readonly class Game
{
    /** @param list<Draw> $draws */
    public function __construct(
        public int $id,
        public array $draws
    )
    {

    }

}
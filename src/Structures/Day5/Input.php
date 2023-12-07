<?php

namespace Robchett\Aoc2023\Structures\Day5;

readonly class Input
{

    /**
     * @param list<int> $seeds
     */
    public function __construct(
        public array $seeds,
        public Map $map
    )
    {

    }

}
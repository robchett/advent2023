<?php

namespace Robchett\Aoc2023\Structures\Day4;

readonly class ScratchCard
{
    /** @param list<int> $leftList */
    /** @param list<int> $rightList */
    public function __construct(
        public int $id,
        public array $leftList,
        public array $rightList,
    )
    {

    }

}
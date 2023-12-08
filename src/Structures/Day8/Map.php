<?php

namespace Robchett\Aoc2023\Structures\Day8;

readonly class Map
{
    /**
     * @param list<string> $instructions
     * @param array<string, node> $nodes
     */
    public function __construct(
        public array $instructions,
        public array $nodes,
    )
    {

    }

}
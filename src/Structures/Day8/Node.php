<?php

namespace Robchett\Aoc2023\Structures\Day8;

readonly class Node
{

    public function __construct(
        public string $name,
        public string $left,
        public string $right,
    )
    {

    }

}
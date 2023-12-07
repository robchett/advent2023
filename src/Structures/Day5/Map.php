<?php

namespace Robchett\Aoc2023\Structures\Day5;

readonly class Map
{

    public function __construct(
        public array $ranges,
        public ?Map  $nextMap
    )
    {

    }

    /**
     * @return list<SeedRange>
     * @var list<SeedRange> $inputs
     */
    public function map(array $inputs): array
    {
        $output = [];
        foreach ($this->ranges as $range) {
            $newInputs = [];
            foreach ($inputs as $input) {
                $transformed = $range->transform($input);
                if ($transformed->transformed) {
                    $output[] = $transformed->transformed;
                }
                $newInputs = [...$newInputs, ...$transformed->untouched];
            }
            $inputs = $newInputs;
        }
        $output = [...$output, ...$inputs];

        return $this->nextMap ? $this->nextMap->map($output) : $output;
    }

}
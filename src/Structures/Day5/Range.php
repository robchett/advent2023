<?php

namespace Robchett\Aoc2023\Structures\Day5;

final class Range
{

    public function __construct(
        public int $outputStart,
        public int $inputStart,
        public int $length,
    )
    {

    }

    /** @return SeedTransform */
    public function transform(SeedRange $check): SeedTransform
    {
        if ($check->start >= $this->inputStart + $this->length) {
            // Check greater than this range;
            return new SeedTransform(null, [$check]);
        }
        if ($check->start + $check->length <= $this->inputStart) {
            // Check lower than this range;
            return new SeedTransform(null, [$check]);
        }
        $before = max(0, $this->inputStart - $check->start);
        $after = max(0, $check->start + $check->length - $this->inputStart - $this->length);

//        var_dump("
//        Splitting range ($check->start)[$check->length] via range ($this->inputStart)[$this->length] => [$this->outputStart]
//        Transformed(" . $check->start - $this->inputStart + $this->outputStart + $before . ")[" . $check->length - $before - $after ."]
//        Before(".$check->start + $before.")[".$before."]
//        After(".$check->start + $check->length - $after.")[".$after."]
//        ");

        return new SeedTransform(
            new SeedRange($check->start - $this->inputStart + $this->outputStart + $before, $check->length - $before - $after),
            array_filter([
                $before ? new SeedRange($check->start, $before) : null,
                $after ? new SeedRange($check->start + $check->length - $after, $after) : null,
            ])
        );
    }

}
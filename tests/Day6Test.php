<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Robchett\Aoc2023\Task;

final class Day6Test extends TestCase
{
    public function testPart1(): void
    {
        /** @var Task $runner */
        $runner = require __DIR__ . '/../src/day6.php';

        $input = <<<input
Time:      7  15   30
Distance:  9  40  200
input;

        $res = $runner->task1($runner->parseInput($input));
        $this->assertSame(288, $res->unwrap());
    }

    public function testPart2(): void
    {
        /** @var Task $runner */
        $runner = require __DIR__ . '/../src/day6.php';

        $input = <<<input
Time:      7  15   30
Distance:  9  40  200
input;

        $res = $runner->task2($runner->parseInput($input));
        $this->assertSame(71503, $res->unwrap());
    }
}
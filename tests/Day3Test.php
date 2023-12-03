<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Robchett\Aoc2023\Task;

final class Day3Test extends TestCase
{
    public function testPart1(): void
    {
        /** @var Task $runner */
        $runner = require __DIR__ . '/../src/day3.php';

        $input = <<<input
467..114..
...*......
..35..633.
......#...
617*......
.....+.58.
..592.....
......755.
...$.*....
.664.598..
input;

        $res = $runner->task1($runner->parseInput($input));
        $this->assertSame(4361, $res->unwrap());
    }

    public function testPart2(): void
    {
        /** @var Task $runner */
        $runner = require __DIR__ . '/../src/day3.php';

        $input = <<<input
467..114..
...*......
..35..633.
......#...
617*......
.....+.58.
..592.....
......755.
...$.*....
.664.598..
input;

        $res = $runner->task2($runner->parseInput($input));
        $this->assertSame(467835, $res->unwrap());
    }
}
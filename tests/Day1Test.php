<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Robchett\Aoc2023\Task;

final class Day1Test extends TestCase
{
    public function testPart1(): void
    {
        /** @var Task $runner */
        $runner = require __DIR__ . '/../src/day1.php';

        $input = <<<input
1abc2
pqr3stu8vwx
a1b2c3d4e5f
treb7uchet
input;

        $res = $runner->task1($runner->parseInput($input));
        $this->assertSame(142, $res->unwrap());
    }

    public function testPart2(): void
    {
        /** @var Task $runner */
        $runner = require __DIR__ . '/../src/day1.php';

        $input = <<<input
two1nine
eightwothree
abcone2threexyz
xtwone3four
4nineeightseven2
zoneight234
7pqrstsixteen
input;

        $res = $runner->task2($runner->parseInput($input));
        $this->assertSame(281, $res->unwrap());
    }
}
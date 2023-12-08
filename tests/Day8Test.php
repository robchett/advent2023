<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Robchett\Aoc2023\Task;

final class Day8Test extends TestCase
{
    public function testPart1(): void
    {
        /** @var Task $runner */
        $runner = require __DIR__ . '/../src/day8.php';

        $input = <<<input
LLR

AAA = (BBB, BBB)
BBB = (AAA, ZZZ)
ZZZ = (ZZZ, ZZZ)
input;

        $res = $runner->task1($runner->parseInput($input));
        $this->assertSame(6, $res->unwrap());
    }

    public function testPart2(): void
    {
        /** @var Task $runner */
        $runner = require __DIR__ . '/../src/day8.php';

        $input = <<<input
LR

11A = (11B, XXX)
11B = (XXX, 11Z)
11Z = (11B, XXX)
22A = (22B, XXX)
22B = (22C, 22C)
22C = (22Z, 22Z)
22Z = (22B, 22B)
XXX = (XXX, XXX)
input;

        $res = $runner->task2($runner->parseInput($input));
        $this->assertSame(6, $res->unwrap());
    }
}
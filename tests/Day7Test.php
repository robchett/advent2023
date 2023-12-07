<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Robchett\Aoc2023\Task;

final class Day7Test extends TestCase
{
    public function testPart1(): void
    {
        /** @var Task $runner */
        $runner = require __DIR__ . '/../src/day7.php';

        $input = <<<input
32T3K 765
T55J5 684
KK677 28
KTJJT 220
QQQJA 483
input;

        $res = $runner->task1($runner->parseInput($input));
        $this->assertSame(6440, $res->unwrap());
    }

    public function testPart2(): void
    {
        /** @var Task $runner */
        $runner = require __DIR__ . '/../src/day7.php';

        $input = <<<input
2345A 1
Q2KJJ 13
Q2Q2Q 19
T3T3J 17
T3Q33 11
2345J 3
J345A 2
32T3K 5
T55J5 29
KK677 7
KTJJT 34
QQQJA 31
JJJJJ 37
JAAAA 43
AAAAJ 59
AAAAA 61
2AAAA 23
2JJJJ 53
JJJJ2 41
input;

        $res = $runner->task2($runner->parseInput($input));
        $this->assertSame(6839, $res->unwrap());
    }
}
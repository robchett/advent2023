<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Robchett\Aoc2023\Task;

final class Day2Test extends TestCase
{
    public function testPart1(): void
    {
        /** @var Task $runner */
        $runner = require __DIR__ . '/../src/day2.php';

        $input = <<<input
Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green
Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue
Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red
Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red
Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green
input;

        $res = $runner->task1($runner->parseInput($input));
        $this->assertSame(8, $res->unwrap());
    }

    public function testPart2(): void
    {
        /** @var Task $runner */
        $runner = require __DIR__ . '/../src/day2.php';

        $input = <<<input
Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green
Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue
Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red
Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red
Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green
input;

        $res = $runner->task2($runner->parseInput($input));
        $this->assertSame(2286, $res->unwrap());
    }
}
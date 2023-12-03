<?php

namespace Robchett\Aoc2023;

use Robchett\Aoc2023\Structures\Day2\Draw;
use Robchett\Aoc2023\Structures\Day2\Game;

/**
 * --- Day 3: Gear Ratios ---
 * You and the Elf eventually reach a gondola lift station; he says the gondola lift will take you up to the water source, but this is as
 * far as he can bring you. You go inside.
 *
 * It doesn't take long to find the gondolas, but there seems to be a problem: they're not moving.
 *
 * "Aaah!"
 *
 * You turn around to see a slightly-greasy Elf with a wrench and a look of surprise. "Sorry, I wasn't expecting anyone! The gondola lift
 * isn't working right now; it'll still be a while before I can fix it." You offer to help.
 *
 * The engineer explains that an engine part seems to be missing from the engine, but nobody can figure out which one. If you can add up
 * all the part numbers in the engine schematic, it should be easy to work out which part is missing.
 *
 * The engine schematic (your puzzle input) consists of a visual representation of the engine. There are lots of numbers and symbols you
 * don't really understand, but apparently any number adjacent to a symbol, even diagonally, is a "part number" and should be included in
 * your sum. (Periods (.) do not count as a symbol.)
 *
 * Here is an example engine schematic:
 *
 * 467..114..
 * ...*......
 * ..35..633.
 * ......#...
 * 617*......
 * .....+.58.
 * ..592.....
 * ......755.
 * ...$.*....
 * .664.598..
 * In this schematic, two numbers are not part numbers because they are not adjacent to a symbol: 114 (top right) and 58 (middle right).
 * Every other number is adjacent to a symbol and so is a part number; their sum is 4361.
 *
 * Of course, the actual engine schematic is much larger. What is the sum of all of the part numbers in the engine schematic?
 *
 *
 * --- Part Two ---
 * The engineer finds the missing part and installs it in the engine! As the engine springs to life, you jump in the closest gondola,
 * finally ready to ascend to the water source.
 *
 * You don't seem to be going very fast, though. Maybe something is still wrong? Fortunately, the gondola has a phone labeled "help", so
 * you pick it up and the engineer answers.
 *
 * Before you can explain the situation, she suggests that you look out the window. There stands the engineer, holding a phone in one hand
 * and waving with the other. You're going so slowly that you haven't even left the station. You exit the gondola.
 *
 * The missing part wasn't the only issue - one of the gears in the engine is wrong. A gear is any * symbol that is adjacent to exactly two
 * part numbers. Its gear ratio is the result of multiplying those two numbers together.
 *
 * This time, you need to find the gear ratio of every gear and add them all up so that the engineer can figure out which gear needs to be
 * replaced.
 *
 * Consider the same engine schematic again:
 *
 * 467..114..
 * ...*......
 * ..35..633.
 * ......#...
 * 617*......
 * .....+.58.
 * ..592.....
 * ......755.
 * ...$.*....
 * .664.598..
 * In this schematic, there are two gears. The first is in the top left; it has part numbers 467 and 35, so its gear ratio is 16345. The
 * second gear is in the lower right; its gear ratio is 451490. (The * adjacent to 617 is not a gear because it is only adjacent to one
 * part number.) Adding up all of the gear ratios produces 467835.
 *
 * What is the sum of all of the gear ratios in your engine schematic?
 *
 *
 * @template-implements Task<int, list<string>>
 */
return new class implements Task {

    #[\Override] function parseInput(string $input): mixed
    {
        return array_map('trim', explode("\n", $input));
    }

    #[\Override] public function task1(mixed $input): TaskOutput
    {
        $numbers = [];
        for ($rowIndex = 0; $rowIndex < count($input); $rowIndex++) {
            for ($columnIndex = 0; $columnIndex < strlen($input[$rowIndex]); $columnIndex++) {
                if (is_numeric($input[$rowIndex][$columnIndex])) {
                    $start = $columnIndex;
                    while ($columnIndex < strlen($input[$rowIndex]) && is_numeric($input[$rowIndex][$columnIndex])) {
                        $columnIndex++;
                    }
                    $value = (int)substr($input[$rowIndex], $start, $columnIndex - $start + 1);

                    for ($scanRowIndex = $rowIndex - 1; $scanRowIndex <= $rowIndex + 1; $scanRowIndex++) {
                        for ($scanColumnIndex = $start - 1; $scanColumnIndex < $columnIndex + 1; $scanColumnIndex++) {
                            if (isset($input[$scanRowIndex][$scanColumnIndex]) && !is_numeric($input[$scanRowIndex][$scanColumnIndex]) && $input[$scanRowIndex][$scanColumnIndex] !== '.') {
                                $numbers[] = $value;
                                continue 3;
                            }
                        }
                    }

                }
            }
        }
        return new TaskOutput(array_sum($numbers));
    }

    #[\Override] public function task2(mixed $input): TaskOutput
    {
        $numbers = [];
        for ($rowIndex = 0; $rowIndex < count($input); $rowIndex++) {
            for ($columnIndex = 0; $columnIndex < strlen($input[$rowIndex]); $columnIndex++) {
                if (is_numeric($input[$rowIndex][$columnIndex])) {
                    $start = $columnIndex;
                    while ($columnIndex < strlen($input[$rowIndex]) && is_numeric($input[$rowIndex][$columnIndex])) {
                        $columnIndex++;
                    }
                    $value = (int)substr($input[$rowIndex], $start, $columnIndex - $start + 1);

                    for ($starRowIndex = $rowIndex - 1; $starRowIndex <= $rowIndex + 1; $starRowIndex++) {
                        for ($starColumnIndex = $start - 1; $starColumnIndex < $columnIndex + 1; $starColumnIndex++) {
                            if (!isset($input[$starRowIndex][$starColumnIndex]) || $input[$starRowIndex][$starColumnIndex] != '*') {
                                continue;
                            }

                            for ($newNumberRow = $starRowIndex - 1; $newNumberRow <= $starRowIndex + 1; $newNumberRow++) {
                                for ($newNumberColumnIndex = $starColumnIndex - 1; $newNumberColumnIndex <= $starColumnIndex + 1; $newNumberColumnIndex++) {
                                    if (!is_numeric($input[$newNumberRow][$newNumberColumnIndex]) || $newNumberRow == $rowIndex && $newNumberColumnIndex >= $start && $newNumberColumnIndex <= $columnIndex) {
                                        continue;
                                    }
                                    $newStart = $newNumberColumnIndex;
                                    $newEnd = $newNumberColumnIndex;
                                    while (is_numeric($input[$newNumberRow][$newStart - 1])) {
                                        $newStart--;
                                    }
                                    while (is_numeric($input[$newNumberRow][$newEnd + 1])) {
                                        $newEnd++;
                                    }
                                    $newValue = (int)substr($input[$newNumberRow], $newStart, $newEnd - $newStart + 1);
                                    $numbers[] = $value * $newValue;
                                    continue 5;
                                }
                            }
                        }
                    }

                }
            }
        }
        return new TaskOutput(array_sum($numbers) / 2);
    }
};
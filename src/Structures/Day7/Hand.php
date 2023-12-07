<?php

namespace Robchett\Aoc2023\Structures\Day7;

readonly class Hand
{
    public HandRank $rank;
    public string $cards;
    public function __construct(
        string $cards,
        public int $value,
        bool $withJokers = false
    )
    {
        if ($withJokers) {
            $cards = str_replace('B', '1', $cards);
        }

        $uniqueCards = [];
        foreach (str_split($cards) as $card) {
            $uniqueCards[$card] ??= 0;
            $uniqueCards[$card]++;
        }

        if ($withJokers && isset($uniqueCards['1'])) {
            $jokerCount = $uniqueCards['1'];
            unset($uniqueCards['1']);
            $max = 0;
            $bestKey = '1';
            foreach ($uniqueCards as $key => $count) {
                if ($count > $max) {
                    $max = $count;
                    $bestKey = $key;
                }
            }
            $uniqueCards[$bestKey] ??= 0;
            $uniqueCards[$bestKey] += $jokerCount;
        }

        $this->cards = $cards;
        $this->rank = match(true) {
            count($uniqueCards) == 5 => HandRank::HighCard,
            count($uniqueCards) == 4 => HandRank::Pair,
            count($uniqueCards) == 3 && max($uniqueCards) == 2 => HandRank::TwoPair,
            count($uniqueCards) == 3 && max($uniqueCards) == 3 => HandRank::ThreeOfAKind,
            count($uniqueCards) == 2 && max($uniqueCards) == 4 => HandRank::FourOfAKind,
            count($uniqueCards) == 2 && max($uniqueCards) == 3 => HandRank::FullHouse,
            count($uniqueCards) == 1 => HandRank::FiveOfAKind,
        };
    }
}
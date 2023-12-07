<?php

namespace Robchett\Aoc2023\Structures\Day7;

enum HandRank: int
{
    case FiveOfAKind = 0;
    case FourOfAKind = 1;
    case FullHouse = 2;
    case ThreeOfAKind = 3;
    case TwoPair = 4;
    case Pair = 5;
    case HighCard = 6;
}
<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Snap\Entity\Card;
use Snap\Entity\Monitor;
use Snap\Entity\Suit;
use Snap\Type\RankTypes;
use Snap\Type\SuitTypes;

class MonitorTest extends TestCase
{
    public function testThatCardsMatchRank()
    {
        $suit = new Suit(SuitTypes::SPADE, SuitTypes::BLACK);
        $cardA = new Card($suit, RankTypes::ACE);
        $cardB = new Card($suit, RankTypes::ACE);

        $monitor = new Monitor();
        $this->assertTrue($monitor->isMatchingRank($cardA, $cardB));
    }

    public function testThatCardsMatchSuit()
    {
        $suit = new Suit(SuitTypes::SPADE, SuitTypes::BLACK);
        $cardA = new Card($suit, RankTypes::ACE);
        $cardB = new Card($suit, RankTypes::ACE);

        $monitor = new Monitor();
        $this->assertTrue($monitor->isMatchingSuit($cardA, $cardB));
    }

    public function testThatCardsMatchSuitAndRank()
    {
        $suit = new Suit(SuitTypes::SPADE, SuitTypes::BLACK);
        $cardA = new Card($suit, RankTypes::ACE);
        $cardB = new Card($suit, RankTypes::ACE);

        $monitor = new Monitor();
        $this->assertTrue($monitor->isMatchingSuitAndRank($cardA, $cardB));
    }
}

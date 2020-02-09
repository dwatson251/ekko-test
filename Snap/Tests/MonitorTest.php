<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Snap\Entity\Card;
use Snap\Entity\Monitor;
use Snap\Entity\Player;
use Snap\Entity\Rank;
use Snap\Entity\Suit;
use Snap\Type\RuleTypes;

class MonitorTest extends TestCase
{
    public function testThatCardsMatchRank()
    {
        $suit = new Suit(1, 'Heart', 0xFF0000);
        $rank = new Rank(1,'One', '1');
        $cardA = new Card($suit, $rank);
        $cardB = new Card($suit, $rank);

        $monitor = new Monitor();
        $this->assertTrue($monitor->isMatchingRank($cardA, $cardB));
    }

    public function testThatCardsMatchSuit()
    {
        $suit = new Suit(1, 'Heart', 0xFF0000);
        $rank = new Rank(1,'One', '1');
        $cardA = new Card($suit, $rank);
        $cardB = new Card($suit, $rank);

        $monitor = new Monitor();
        $this->assertTrue($monitor->isMatchingSuit($cardA, $cardB));
    }

    public function testThatCardsMatchSuitAndRank()
    {
        $suit = new Suit(1, 'Heart', 0xFF0000);
        $rank = new Rank(1,'One', '1');
        $cardA = new Card($suit, $rank);
        $cardB = new Card($suit, $rank);

        $monitor = new Monitor();
        $this->assertTrue($monitor->isMatchingSuitAndRank($cardA, $cardB));
    }

    /**
     * Tests that the correct number of decks are in play
     */
    public function testThatEqualNumberOfCardsDealt()
    {
        $decksToUse = 6;
        $playersToUse = 2;

        $monitor = new Monitor(RuleTypes::MATCHING_SUIT, $decksToUse, $playersToUse);
        $expectedCardsInPlay = $decksToUse * 52;
        $expectedPlayerCardCount = ceil($expectedCardsInPlay / $playersToUse);

        /**
         * @var Player $player
         */
        foreach ($monitor->getPlayers() as $player) {
            $this->assertEquals($expectedPlayerCardCount, $player->getCardCount());
        }
    }

    public function testThatTopTwoCardsCanBeExamined()
    {
        $monitor = new Monitor();

        $aceOfSpades = new Card(
            new Suit(1, 'Spade', 0x00),
            new Rank(1, 'Ace', 'A')
        );

        $twoOfSpades = new Card(
            new Suit(1, 'Spade', 0x00),
            new Rank(2, 'Two', '2')
        );

        $threeOfSpades = new Card(
            new Suit(1, 'Spade', 0x00),
            new Rank(3, 'Three', '3')
        );

        $fourOfSpades = new Card(
            new Suit(1, 'Spade', 0x00),
            new Rank(4, 'Four', '4')
        );

        $cards = [
            $aceOfSpades,
            $twoOfSpades,
            $threeOfSpades,
            $fourOfSpades,
        ];

        $player = new Player();

        foreach ($cards as $card) {
            $player->addCard($card);
            $monitor->addCardToPlay($player->getTopCard());
        }

        $examinedCards = $monitor->examineCardsInPlay(2);

        // The examined cards should only be a result set of 2, and contain the latest two cards played
        $this->assertEquals(2, count($examinedCards));
        $this->assertContains($threeOfSpades, $examinedCards);
        $this->assertContains($fourOfSpades, $examinedCards);
    }
}

<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Snap\Entity\Card;
use Snap\Entity\Deck;
use Snap\Entity\Player;
use Snap\Entity\Rank;
use Snap\Entity\Suit;
use Snap\Exception\PlayerHasNoCardsException;

class PlayerTest extends TestCase
{
    public function testThatACardIsRemovedFromPlayerDeckWhenPlayed()
    {
        $suit = new Suit(1, 'Heart', 0xFF0000);
        $rank = new Rank(1,'One', '1');
        $card = new Card($suit, $rank);
        $player = new Player();

        $player->addCard($card);

        // A players card count should increase
        $this->assertEquals(1, $player->getCardCount());

        $player->getTopCard();

        // After player the card, the card count should decrease
        $this->assertEquals(0, $player->getCardCount());
    }

    public function testExceptionIsThrownWhenPlayerHasNoCards()
    {
        $this->expectExceptionObject(new PlayerHasNoCardsException());

        $player = new Player();

        $player->getTopCard();
    }
}

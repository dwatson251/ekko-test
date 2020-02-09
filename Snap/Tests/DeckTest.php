<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Snap\Entity\Deck;

class DeckTest extends TestCase
{
    public function testThatADeckContains52Cards()
    {
        $deck = new Deck();

        $this->assertEquals(52, count($deck->getCards()));
    }
}

<?php

namespace Snap\Entity;

use Snap\Type\RankTypes;
use Snap\Type\SuitTypes;

class Deck
{
    /**
     * @var array<Card>
     */
    private $cards = [];

    private $ranks = [
        RankTypes::ACE,
        RankTypes::TWO,
        RankTypes::THREE,
        RankTypes::FOUR,
        RankTypes::FIVE,
        RankTypes::SIX,
        RankTypes::SEVEN,
        RankTypes::EIGHT,
        RankTypes::NINE,
        RankTypes::TEN,
        RankTypes::JACK,
        RankTypes::QUEEN,
        RankTypes::KING,
    ];

    private $suits;

    public function __construct()
    {
        $this->suits = SuitTypes::getSuits();

        $this->buildDeck();
        $this->shuffleDeck();
    }

    /**
     * Using the specified ranks and suits, builds a deck to contain the number of cards required to make exactly one
     * card for each card and deck
     */
    private function buildDeck()
    {
        foreach ($this->suits as $suit) {
            foreach ($this->ranks as $rank) {
                $this->cards[] = new Card($suit, $rank);
            }
        }
    }

    /**
     * @ TODO: Implement
     */
    public function shuffleDeck()
    {

    }

    /**
     * @return array<Card>
     */
    public function getCards(): array
    {
        return $this->cards;
    }
}

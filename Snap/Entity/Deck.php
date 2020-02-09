<?php

namespace Snap\Entity;

use Snap\Repository\RankRepository;
use Snap\Repository\SuitRepository;

class Deck
{
    /**
     * @var array<Card>
     */
    private $cards = [];

    public function __construct()
    {
        $this->buildDeck();
    }

    /**
     * Using the specified ranks and suits, builds a deck to contain the number of cards required to make exactly one
     * card for each card and deck
     */
    private function buildDeck()
    {
        $suitRepository = new SuitRepository();
        $rankRepository = new RankRepository();

        foreach ($suitRepository->get() as $suit) {
            foreach ($rankRepository->get() as $rank) {
                $this->cards[] = new Card($suit, $rank);
            }
        }
    }

    /**
     * Shuffles the cards
     */
    public function shuffle(): array
    {
        shuffle($this->cards);
        return $this->cards;
    }

    /**
     * @return array<Card>
     */
    public function getCards(): array
    {
        return $this->cards;
    }
}

<?php

namespace Snap\Entity;

use PHPUnit\Util\Exception;
use Snap\Exception\CardAlreadyDealtException;
use Snap\Exception\PlayerHasNoCardsException;

class Player
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Card[]
     */
    private $cards = [];

    private $score = 0;

    /**
     * @return Card|null
     * @throws PlayerHasNoCardsException
     */
    public function getTopCard(): ?Card
    {
        if (!count($this->cards)) {
            throw new PlayerHasNoCardsException();
        }

        // Obtain top card and remove it from their deck
        return array_shift($this->cards);
    }

    public function getCardCount(): int
    {
        return count($this->cards);
    }

    /**
     * Gives a card to the player, and moves it to the bottom of their deck
     *
     * @param Card $card
     * @throws CardAlreadyDealtException
     */
    public function addCard(Card $card)
    {
        if ($card->isDealt()) {
            throw new CardAlreadyDealtException();
        }

        $card->setDealt(true);

        $this->cards[] = $card;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     * @return Player
     */
    public function setScore(int $score): Player
    {
        $this->score = $score;
        return $this;
    }

    /**
     * @param int $cardCount
     */
    public function doSnap(int $cardCount)
    {
        $this->setScore($this->getScore() + $cardCount);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}

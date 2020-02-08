<?php

namespace Snap\Entity;

class Card
{
    /**
     * @var Suit
     */
    private $suit;

    /**
     * @var int
     */
    private $rank;

    /**
     * @var bool
     */
    private $inPlay = false;

    /**
     * @var bool
     */
    private $dealt = false;

    public function __construct(Suit $suit, int $rank)
    {
        $this->suit = $suit;
        $this->rank = $rank;
    }

    /**
     * @return Suit
     */
    public function getSuit(): Suit
    {
        return $this->suit;
    }

    /**
     * @return int
     */
    public function getRank(): int
    {
        return $this->rank;
    }

    /**
     * @return bool
     */
    public function isDealt(): bool
    {
        return $this->dealt;
    }

    /**
     * @param bool $dealt
     * @return Card
     */
    public function setDealt(bool $dealt): Card
    {
        $this->dealt = $dealt;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInPlay(): bool
    {
        return $this->inPlay;
    }

    /**
     * @param bool $inPlay
     * @return Card
     */
    public function setInPlay(bool $inPlay): Card
    {
        $this->inPlay = $inPlay;
        return $this;
    }
}

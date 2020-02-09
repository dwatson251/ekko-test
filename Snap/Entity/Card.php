<?php

namespace Snap\Entity;

class Card
{
    /**
     * @var Suit
     */
    private $suit;

    /**
     * @var Rank
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

    public function __construct(Suit $suit, Rank $rank)
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
     * @return Rank
     */
    public function getRank(): Rank
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

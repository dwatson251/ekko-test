<?php

namespace Snap\Entity;

class Suit
{
    /**
     * @var int The type of the suit
     */
    private $type;

    /**
     * @var string The colour of this suit
     */
    private $colour;

    public function __construct(int $type, string $colour)
    {
        $this->type = $type;
        $this->colour = $colour;
    }

    /**
     * @return string
     */
    public function getColour(): string
    {
        return $this->colour;
    }

    /**
     * @return string
     */
    public function getType(): int
    {
        return $this->type;
    }
}

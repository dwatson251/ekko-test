<?php

namespace Snap\Entity;

use Snap\Type\SuitTypes;

class Suit
{
    /**
     * @var int The code
     */
    private $code;

    private $name;

    /**
     * @var string The colour of this suit
     */
    private $colour;

    public function __construct(int $code, string $name, string $colour)
    {
        $this->code = $code;
        $this->name = $name;
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
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Suit
     */
    public function setName($name): Suit
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     * @return Suit
     */
    public function setCode(int $code): Suit
    {
        $this->code = $code;
        return $this;
    }
}

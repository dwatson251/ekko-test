<?php

namespace Snap\Entity;

class Rank
{
    private $value;

    private $shortName;

    private $name;

    public function __construct(
        $value,
        $name,
        $shortName
    ) {
        $this->value = $value;
        $this->name = $name;
        $this->shortName = $shortName;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return Rank
     */
    public function setValue($value): Rank
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @param mixed $shortName
     * @return Rank
     */
    public function setShortName($shortName): Rank
    {
        $this->shortName = $shortName;
        return $this;
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
     * @return Rank
     */
    public function setName($name): Rank
    {
        $this->name = $name;
        return $this;
    }

}

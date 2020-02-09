<?php

namespace Snap\Repository;

use Snap\Entity\Suit;

class SuitRepository extends AbstractRepository
{
    public function get()
    {
        return [
            new Suit(1, 'Heart', 0xFF0000),
            new Suit(2, 'Diamond', 0xFF0000),
            new Suit(3, 'Club', 0x000000),
            new Suit(4, 'Spade', 0x000000),
        ];
    }
}

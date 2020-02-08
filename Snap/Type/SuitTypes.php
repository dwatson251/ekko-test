<?php

namespace Snap\Type;

use Snap\Entity\Suit;

class SuitTypes
{
    public const HEART = 1;
    public const DIAMOND = 2;
    public const SPADE = 3;
    public const CLUB = 4;

    public const BLACK = 'black';
    public const RED = 'red';

    public static function getSuits()
    {
        return [
            (new Suit(SuitTypes::HEART, SuitTypes::RED)),
            (new Suit(SuitTypes::DIAMOND, SuitTypes::RED)),
            (new Suit(SuitTypes::SPADE, SuitTypes::BLACK)),
            (new Suit(SuitTypes::CLUB, SuitTypes::BLACK)),
        ];
    }
}

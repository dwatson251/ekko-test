<?php

namespace Snap\Repository;

use Snap\Entity\Rank;

class RankRepository extends AbstractRepository
{
    public function get()
    {
        return [
            new Rank(1, 'Ace', 'A'),
            new Rank(2, 'Two', '2'),
            new Rank(3, 'Three', '3'),
            new Rank(4, 'Four', '4'),
            new Rank(5, 'Five', '5'),
            new Rank(6, 'Six', '6'),
            new Rank(7, 'Seven', '7'),
            new Rank(8, 'Eight', '8'),
            new Rank(9, 'Nine', '9'),
            new Rank(10, 'Ten', '10'),
            new Rank(11, 'Jack', 'J'),
            new Rank(12, 'Queen', 'Q'),
            new Rank(13, 'King', 'K'),
        ];
    }
}

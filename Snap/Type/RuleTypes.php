<?php

namespace Snap\Type;

/**
 * Class containing the modes of play
 *
 * Class RuleTypes
 * @package Snap\Type
 */
class RuleTypes
{
    /*
     * "Snap" can be called when only the suit matches
     */
    public const MATCHING_SUIT = 1;

    /*
     * "Snap" can be called when only the rank matches
     */
    public const MATCHING_RANK = 2;

    /*
     * "Snap" can be called when both the rank and suit match
     */
    public const MATCHING_RANK_AND_SUIT = 3;
}

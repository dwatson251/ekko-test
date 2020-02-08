<?php

namespace Snap\Entity;

use Snap\Exception\CardAlreadyInPlayException;
use Snap\Type\RuleTypes;

class Dealer
{
    /**
     * @param array $cards
     * @param array $players
     * @throws \Snap\Exception\CardAlreadyDealtException
     */
    public function dealCards(array $cards, array $players)
    {
        $playerCount = count($players);
        $chunks = array_chunk($cards, $playerCount, false);

        foreach ($chunks as $chunk) {
            /**
             * @var Player $player
             */
            foreach ($players as $key => $player) {
                /**
                 * @var Card $card
                 */
                $card = $chunk[$key];

                try {
                    $player->addCard($card);
                } catch (CardAlreadyInPlayException $e) {
                    // Log some event, print to console.
                }
            }
        }
    }
}

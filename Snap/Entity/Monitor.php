<?php

namespace Snap\Entity;

use Snap\Exception\CardAlreadyInPlayException;
use Snap\Type\RuleTypes;

class Monitor
{
    /**
     * @var array<Player>
     */
    private $players = [];

    private $dealer;

    /**
     * @var array<Card>
     */
    private $cardsInPlay = [];

    /**
     * The style of play.
     *
     * @var int $ruleStyle
     */
    private $ruleStyle;

    public function __construct($rule = RuleTypes::MATCHING_SUIT, $decksToDeal = 6, $players = 2)
    {
        $this->ruleStyle = $rule;
        $this->dealer = new Dealer();

        for ($playerCount = $players; $playerCount !== 0; $playerCount--) {
            $player = (new Player())->setName('Player ' . $playerCount);
            $this->players[] = $player;
        }

        $cards = [];

        for ($deckCount = $decksToDeal; $deckCount !== 0; $deckCount--) {
            $deck = new Deck();
            $deck->shuffle();
            $cards = array_merge($cards, $deck->getCards());
        }

        $this->dealer->dealCards($cards, $this->players);
    }

    /**
     * The win condition is when one of the players has no cards left.
     */
    public function isGameOverConditionMet(): bool
    {
        /**
         * @var Player $player
         */
        foreach ($this->players as $player) {
            if ($player->getCardCount() > 0) {
                return false;
            }

            continue;
        }

        return true;
    }

    /**
     * Checks the top two most cards in play and determines a match based on the style of play
     *
     * @return bool
     */
    public function hasMatchingCards(): bool
    {
        /*
         * Obtains the top two cards from the played cards
         */
        $cardsToTest = $this->examineCardsInPlay(2);

        if (count($cardsToTest) !== 2) {
            return false;
        }

        switch ($this->ruleStyle) {
            case RuleTypes::MATCHING_SUIT:
                return $this->isMatchingSuit(...$cardsToTest);
            case RuleTypes::MATCHING_RANK:
                return $this->isMatchingRank(...$cardsToTest);
            case RuleTypes::MATCHING_RANK_AND_SUIT:
                return $this->isMatchingSuitAndRank(...$cardsToTest);
            case RuleTypes::MATCHING_COLOUR:
                return $this->isMatchingColour(...$cardsToTest);
        }
    }

    /**
     * "Snap" can be called when only the suit matches
     *
     * @param Card $cardA
     * @param Card $cardB
     * @return bool
     */
    public function isMatchingSuit(Card $cardA, Card $cardB): bool
    {
        return ($cardA->getSuit()->getCode() === $cardB->getSuit()->getCode());
    }

    /**
     * "Snap" can be called when only the rank matches
     *
     * @param Card $cardA
     * @param Card $cardB
     * @return bool
     */
    public function isMatchingRank(Card $cardA, Card $cardB): bool
    {
        return ($cardA->getRank()->getValue() === $cardB->getRank()->getValue());
    }

    /**
     * "Snap" can be called when both the rank and suit match
     *
     * @param Card $cardA
     * @param Card $cardB
     * @return bool
     */
    public function isMatchingSuitAndRank(Card $cardA, Card $cardB)
    {
        return ($this->isMatchingRank($cardA, $cardB) && $this->isMatchingSuit($cardA, $cardB));
    }

    /**
     * "Snap" can be called when the colour of the cards match
     *
     * @param Card $cardA
     * @param Card $cardB
     * @return bool
     */
    public function isMatchingColour(Card $cardA, Card $cardB)
    {
        return ($cardA->getSuit()->getColour() === $cardB->getSuit()->getColour());
    }

    /**
     * Returns an array of Cards
     *
     * @param array<Card> $cards
     * @param int $cardsToExamine
     * @return array<Card>
     */
    public function examineCardsInPlay(int $cardsToExamine = 2)
    {
        return array_slice($this->cardsInPlay, -$cardsToExamine, $cardsToExamine);
    }

    /**
     * @return array<Player>
     */
    public function getPlayers(): array
    {
        return $this->players;
    }

    /**
     * @param Card $card
     * @return Card
     * @throws CardAlreadyInPlayException
     */
    public function addCardToPlay(Card $card)
    {
        if ($card->isInPlay()) {
            throw new CardAlreadyInPlayException();
        }

        $card->setInPlay(true);
        $this->cardsInPlay[] = $card;

        return $card;
    }

    public function clearCardsInPlay()
    {
        /**
         * @var Card $card
         */
//        foreach ($this->cardsInPlay as $card) {
//            $card->setInPlay(false);
//            $card->setDiscarded(true);
//        }

        $this->cardsInPlay = [];
    }

    /**
     * Who snapped first?
     */
    public function determineFastestSnap(): Player
    {
        // The player who snapped is just a luck of the rando-draw!
        $playerCount = count($this->players);
        $randomPlayerKey = rand(0, ($playerCount-1));
        return $this->players[$randomPlayerKey];
    }

    public function getCardsInPlayCount()
    {
        return count($this->cardsInPlay);
    }

    /**
     * The winner is the player with the highest score.
     *
     * @return Player
     */
    public function determineWinner(): Player
    {
        /**
         * @var Player|null $winner
         */
        $winner = null;

        /**
         * @var Player $player
         */
        foreach ($this->players as $player) {
            if (empty($winner) || ($player->getScore() > $winner->getScore())) {
                $winner = $player;
            }
        }

        return $winner;
    }
}

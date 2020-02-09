<?php

namespace Snap;

use Snap\Entity\Monitor;
use Snap\Service\CommandLine;

class Bootstrapper
{
    private $cli;

    private $numberOfDecks;
    private $ruleSet;
    private $playerCount = 2;

    public function __construct()
    {
        $this->cli = new CommandLine();

        $this->setup();
    }

    /**
     * @return Monitor
     */
    public function boot()
    {
        return new Monitor($this->ruleSet, $this->numberOfDecks, $this->playerCount);
    }

    /**
     * Asks the questions for setup.
     */
    private function setup()
    {
        // Ask how many decks we're using:
        $this->numberOfDecks = $this->cli->ask(
            'How many decks should we use?',
            null,
            6
        );

        $this->ruleSet = $this->cli->ask(
            'Which rule would you line to play with?',
            [
                'Matching Suit Only',
                'Matching Rank Only',
                'Matching Suit and Rank',
            ],
            1
        );
    }
}

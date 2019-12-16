<?php

namespace Gamebetr\Cards;

use Gamebetr\Provable\Provable;

class Cards
{
    /**
     * Number of decks
     * @var int $decks
     */
    protected $decks;

    /**
     * Are we using jokers?
     * @var bool $jokers
     */
    protected $jokers;

    /**
     * The cards
     * @var array $cards
     */
    protected $cards;

    /**
     * Class constructor
     * @param int $decks - the number of decks to use
     * @param bool $jokers - whether jokers are included or not
     */
    public function __construct(int $decks = 1, bool $jokers = false)
    {
        $this->decks = $decks;
        $this->jokers = $jokers;
        $cardsPerDeck = 52 + $jokers ? 2 : 0;
        $this->cards = range(1, $cardsPerDeck * $decks);
    }

    /**
     * Shuffle the cards
     * @var string $clientSeed - client seed to use for the shuffle
     * @var string $serverSeed - server seed to use for the shuffle
     * @return void
     */
    public function shuffle($clientSeed = null, $serverSeed = null)
    {
        $provable = Provable::init($clientSeed, $serverSeed, min($this->cards), max($this->cards), 'shuffle');
        $this->cards = $provable->results();
    }

    /**
     * Burn card
     * @return void
     */
    public function burn()
    {
        next($this->cards);
    }

    /**
     * Deal card
     * @return int
     */
    public function deal() {
        $card = current($this->cards);
        next($this->cards);
        return $card;
    }
}

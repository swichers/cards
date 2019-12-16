<?php

namespace Gamebetr\Cards;

class Card
{
    /**
     * Card numeric value
     * @var int $value
     */
    protected $value;

    /**
     * Card suits
     * @var array $suits
     */
    protected $suits = [
        0 => 'clubs',
        1 => 'diamonds',
        2 => 'hearts',
        3 => 'spades',
    ];

    /**
     * Card names
     * @var array $names
     */
    protected $names = [
        -1 => 'joker',
        0 => 'two',
        1 => 'three',
        2 => 'four',
        3 => 'five',
        4 => 'six',
        5 => 'seven',
        6 => 'eight',
        7 => 'nine',
        8 => 'ten',
        9 => 'jack',
        10 => 'queen',
        11 => 'king',
        12 => 'ace',
    ];

    /**
     * Class constructor
     * @param int $value - card numeric value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * Static constructor
     * @param int $value - card numeric value
     * @return Card
     */
    public static function init(int $value) : Card
    {
        return new static($value);
    }

    /**
     * Is this card a joker?
     * @return bool
     */
    public function isJoker() : bool
    {
        return $this->value < 0;
    }

    /**
     * Card suit
     * @return int
     */
    public function suit() : int
    {
        $value = $this->value;
        while ($value < 0) {
            $value += 4;
        }
        return $value % 4;
    }

    /**
     * Suit name
     * @return string
     */
    public function suitName() : string
    {
        return $this->suits[$this->suit()];
    }

    /**
     * Card rank
     * @return int
     */
    public function rank() : int
    {
        if ($this->isJoker()) {
            return -1;
        }
        return $this->value / 4 % 13;
    }

    /**
     * Rank name
     * @return string
     */
    public function rankName() : string
    {
        return $this->names[$this->rank()];
    }

    /**
     * Card value
     * @return int
     */
    public function value() : int
    {
        $value = $this->rank() + 2;
        if ($value == 1) {
            // joker
            return 0;
        }
        if ($value == 14) {
            // ace
            return 11;
        }
        if ($value > 10) {
            // face cards
            return 10;
        }
        return $value;
    }

    /**
     * Card name
     * @return string
     */
    public function name() : string
    {
        return $this->names[$this->rank()];
    }

    /**
     * Full card name
     * @return string
     */
    public function fullName() : string
    {
        return $this->names[$this->rank()] . ' of ' . $this->suits[$this->suit()];
    }

    /**
     * Greater than
     * @param Card $card - card to compare against
     * @param bool $useSuitValue - include suit value in ranking
     * @return bool
     */
    public function greaterThan(Card $card, bool $useSuitValue = false) : bool
    {
        return $this->compare($card, $useSuitValue) == 1;
    }

    /**
     * Less than
     * @param Card $card - card to compare against
     * @param bool $useSuitValue - include suit value in ranking
     * @return bool
     */
    public function lessThan(Card $card, bool $useSuitValue = false) : bool
    {
        return $this->compare($card, $useSuitValue) == -1;
    }

    /**
     * Equal to
     * @param Card $card - card to compare against
     * @param bool $useSuitValue - include suit value in ranking
     * @return bool
     */
    public function equalTo(Card $card, bool $useSuitValue = false) : bool
    {
        return $this->compare($card, $useSuitValue) == 0;
    }

    /**
     * Compare
     * @param Card $card - card to compare against
     * @param bool $useSuitValue - include suit value in ranking
     * @return int -1 = less than, 0 = equals, 1 = greater than
     */
    public function compare(Card $card, bool $useSuitValue = false) : int
    {
        if ($this->rank() == $card->rank()) {
            if ($useSuitValue) {
                if ($this->suit() == $card->suit()) {
                    return 0;
                }
                if ($this->suit() < $card->suit()) {
                    return -1;
                }
                return 1;
            }
            return 0;
        }
        if ($this->rank() < $card->rank()) {
            return -1;
        }
        return 1;
    }

    /**
     * To string
     * @return string
     */
    public function __toString() : string
    {
        return $this->fullName();
    }
}

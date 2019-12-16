# Cards
The cards package extends the gamebetr/provable package to provide a provably fair way to shuffle and utilize decks of cards.

## Installation
```
composer require gamebetr/cards ^1.0
```

## Gamebetr\Cards\Deck Object

### Initialization
```
$deck = new Gamebetr\Cards\Deck();
```
or
```
$deck = Gamebetr\Cards\Deck::init();
```

### Deck Methods

#### __construct(string $clientSeed = null, string $serverSeed = null, int $deckCount = 1, bool $jokers = false)

**$clientSeed** - This is the client seed used to generate the provably fair shuffle. The default value of null will cause the Provable class to auto generate a client seed.

**$serverSeed** - This is the server seed used to generate the provably fair shuffle. The default value of null will cause the Provable class to auto generate a server seed.

**$deckCount** - This is the amount of card decks to use. The default is 1.

**$jokers** - This parameter determines whether jokers will be included in the deck. The default is false.

#### init(string $clientSeed = null, string $serverSeed = null, int $deckCount = 1, bool $jokers = false) : Gamebetr\Cards\Deck

This method is just a static constructor to make it cleaner when instanciating the Deck class. This will return a Deck class.

#### getProvable() : Gamebetr\Provable\Provable

This method will return the Gamebetr\Provable\Provable instance used to shuffle the deck.

#### deal() : Gamebetr\Cards\Card

This method will return the top Gamebetr\Cards\Card in the deck.

#### burn()

This method will burn the top card in the deck.

#### getCards() : array

This method will return the full, original shuffled values of the deck. The values in this array are the numeric values used to create the Gamebetr\Cards\Card objects.

#### getRemainingCards() : array

This method will return an array of all remaining Gamebetr\Cards\Card in the deck.

#### getDealtCards() : array

This method will return an array of all of the dealt Gamebetr\Cards\Card in the deck.

#### getBurntCards() : array

This method will return an array of all of the burnt Gamebetr\Cards\Card in the deck.

### Card Methods

#### __construct(int $value)

**$value** - This is the value of the card.

#### init(int $value) : Card

This method is just a static constructor for the Card object. This will return a Card class.

#### isJoker() : bool

This method will return true of the Card is a joker.

#### suite() : int

This method will return an integer representation of the card suit. 0 = clubs, 1 = diamonds, 2 = hearts, 3 = spades.

#### suiteName() : string

This method will return the name of the card suit.

#### rank() : int

This method will return an integer representation of the card rank. -1 = joker, 0 = 2, 1 = 3, 2 = 4, 3 = 5, 4 = 6, 5 = 7, 6 = 8, 7 = 9, 8 = 10, 9 = jack, 10 = queen, 11 = king, 12 = ace.

#### rankName() : string

This method will return the name of the card rank.

#### value() : int

This method will return the integer value for the card. joker = 0, 2-9 = the face value, 10-king = 10, ace = 11.

#### name() : string

This method is an alias of rankName().

#### fullName() : string

This method returns the full name of the card (e.g. two of diamonds).

#### greaterThan(Gamebetr\Cards\Card $card, bool $useSuitValue = false)

This method will compare the card against a different card and return true if the current card is of greater value. By specifying true for the $useSuitValue, it will rank two matching cards by suit.

#### lessThan(Gamebetr\Cards\Card $card, bool $useSuitValue = false)

This method will compare the card against a different card and return true if the current card is of lesser value. By specifying true for the $useSuitValue, it will rank two matching cards by suit.

#### equalTo(Gamebetr\Cards\Card $card, bool $useSuitValue = false)

This method will compare the card against a different card and return true if the current card is of the same value. By specifying true for the $useSuitValue, it will rank two matching cards by suit.

#### compare(Gamebetr\Cards\Card $card, bool $useSuitValue = false)

This method will compare the card against a different card and return -1 if the card is of lesser value, 0 if the cards have the same value, and 1 if the card is of greater value. By specifying true for the $useSuitValue, it will rank two matching cards by suit.

#### __toString()

This method is an alias of getName().






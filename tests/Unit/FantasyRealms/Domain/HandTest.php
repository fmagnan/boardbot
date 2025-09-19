<?php

use App\FantasyRealms\Domain\Glossary;

it('counts cards in hand', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_DRAGON, Glossary::CARD_BELL_TOWER, Glossary::CARD_MAGIC_WAND]);
    expect($hand->countCards())->toBe(3);
});

it('applies penalty when dragon has not a wizard', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_DRAGON]);
    expect($hand->getTotal())->toBe(-10);
});

it('neutralizes penalty when dragon is with a wizard', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_DRAGON, Glossary::CARD_ELEMENTAL_ENCHANTRESS]);
    expect($hand->getTotal())->toBe(35);
});

it('gets points for princess with elemental enchantress', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_PRINCESS, Glossary::CARD_ELEMENTAL_ENCHANTRESS]);
    expect($hand->getTotal())->toBe(15);
});

it('cancels lightning points from princess', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_PRINCESS, Glossary::CARD_LIGHTNING]);
    expect($hand->getTotal())->toBe(13);
});

it('gets lightning points with rainstorm', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_RAINSTORM, Glossary::CARD_LIGHTNING]);
    expect($hand->getTotal())->toBe(49);
});

it('gets points from princess and loses points from empress when they are together', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_PRINCESS, Glossary::CARD_EMPRESS]);
    expect($hand->getTotal())->toBe(15);
});

it('adds points from each flood for rainstorm', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_RAINSTORM, Glossary::CARD_SWAMP, Glossary::CARD_WATER_ELEMENTAL]);
    expect($hand->getTotal())->toBe(55);
});

it('does nothing when island is with dragon', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_DRAGON, Glossary::CARD_ISLAND]);
    expect($hand->getTotal())->toBe(4);
});

it('clears penalty from swamp with island', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_SWAMP, Glossary::CARD_ISLAND, Glossary::CARD_DWARVISH_INFANTRY]);
    expect($hand->getTotal())->toBe(47);
});

it('adds points to elven archers when there is no weather', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_ELVEN_ARCHERS, Glossary::CARD_ISLAND]);
    expect($hand->getTotal())->toBe(29);
});

it('cancels elven archers bonus with air elemental', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_ELVEN_ARCHERS, Glossary::CARD_AIR_ELEMENTAL]);
    expect($hand->getTotal())->toBe(14);
});

it('blanks fire elemental with rainstorm', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_RAINSTORM, Glossary::CARD_FIRE_ELEMENTAL]);
    expect($hand->getTotal())->toBe(8);
});

it('blanks hydra with wildfire', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_WILDFIRE, Glossary::CARD_HYDRA]);
    expect($hand->getTotal())->toBe(40);
});

it('does not blank dragon with wildfire', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_WILDFIRE, Glossary::CARD_DRAGON]);
    expect($hand->getTotal())->toBe(30);
});

it('blanks smoke when there is no flame', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_SMOKE, Glossary::CARD_AIR_ELEMENTAL]);
    expect($hand->getTotal())->toBe(4);
});

it('counts smoke with fire elemental', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_SMOKE, Glossary::CARD_FIRE_ELEMENTAL]);
    expect($hand->getTotal())->toBe(31);
});

it('does nothing when dragon and bell tower are together', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_DRAGON, Glossary::CARD_BELL_TOWER]);
    expect($hand->getTotal())->toBe(-2);
});

it('does nothing when beast master and celestial knights are together', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_CELESTIAL_KNIGHTS, Glossary::CARD_BEASTMASTER]);
    expect($hand->getTotal())->toBe(21);
});

it('adds points when beast master encounters unicorn', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_BEASTMASTER, Glossary::CARD_UNICORN]);
    expect($hand->getTotal())->toBe(27);
});

it('adds maximum points for unicorn with princess', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_UNICORN, Glossary::CARD_PRINCESS]);
    expect($hand->getTotal())->toBe(41);
});

it('adds less points when unicorn has no princess but empress', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_UNICORN, Glossary::CARD_EMPRESS]);
    expect($hand->getTotal())->toBe(34);
});

it('does nothing when magic wand and shield of keth are together', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_SHIELD_OF_KETH, Glossary::CARD_MAGIC_WAND]);
    expect($hand->getTotal())->toBe(5);
});

it('adds points when shield of keth is handled by a leader', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_SHIELD_OF_KETH, Glossary::CARD_PRINCESS]);
    expect($hand->getTotal())->toBe(21);
});

it('combines when king has shield and sword of keth', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_SHIELD_OF_KETH, Glossary::CARD_KING, Glossary::CARD_SWORD_OF_KETH]);
    expect($hand->getTotal())->toBe(99);
});

it('gets full points when candle has bell tower, book of changes and any wizard', function (): void {
    $hand = init_hand(
        $this->deck,
        [Glossary::CARD_CANDLE, Glossary::CARD_BOOK_OF_CHANGES, Glossary::CARD_BELL_TOWER, Glossary::CARD_BEASTMASTER],
    );
    expect($hand->getTotal())->toBe(137);
});

it('does not get candle bonus without a wizard', function (): void {
    $hand = init_hand($this->deck, [
        Glossary::CARD_CANDLE,
        Glossary::CARD_BOOK_OF_CHANGES,
        Glossary::CARD_BELL_TOWER,
        Glossary::CARD_SWORD_OF_KETH,
    ]);
    expect($hand->getTotal())->toBe(20);
});

it('does not get full points from whirlwind when rainstorm is missing', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_BLIZZARD, Glossary::CARD_GREAT_FLOOD, Glossary::CARD_WHIRLWIND]);
    expect($hand->getTotal())->toBe(43);
});

it('gets whirlwind bonus when rainstorm and blizzard are together', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_BLIZZARD, Glossary::CARD_RAINSTORM, Glossary::CARD_WHIRLWIND]);
    expect($hand->getTotal())->toBe(91);
});

it('cancels swamp penalty with rangers bonus', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_SWAMP, Glossary::CARD_RANGERS]);
    expect($hand->getTotal())->toBe(23);
});

it('gets no points from collector when all cards have different suits', function (): void {
    $hand = init_hand(
        $this->deck,
        [
            Glossary::CARD_COLLECTOR,
            Glossary::CARD_RANGERS,
            Glossary::CARD_SWAMP,
            Glossary::CARD_DRAGON,
            Glossary::CARD_PRINCESS,
            Glossary::CARD_FORGE,
            Glossary::CARD_FOREST,
        ],
    );
    expect($hand->getTotal())->toBe(113);
});

it('gets points from collector when three cards have same suit', function (): void {
    $hand = init_hand(
        $this->deck,
        [
            Glossary::CARD_COLLECTOR,
            Glossary::CARD_BEASTMASTER,
            Glossary::CARD_HYDRA,
            Glossary::CARD_DRAGON,
            Glossary::CARD_UNICORN,
            Glossary::CARD_FORGE,
            Glossary::CARD_FOREST,
        ],
    );
    expect($hand->getTotal())->toBe(156);
});

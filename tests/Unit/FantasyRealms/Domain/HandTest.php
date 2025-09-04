<?php

use App\FantasyRealms\Domain\Glossary;

it('count cards in hand', function (): void {
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

it('princess get points from elemental enchantress', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_PRINCESS, Glossary::CARD_ELEMENTAL_ENCHANTRESS]);
    expect($hand->getTotal())->toBe(15);
});

it('lightning get no points from princess', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_PRINCESS, Glossary::CARD_LIGHTNING]);
    expect($hand->getTotal())->toBe(13);
});

it('lightning get points from rainstorm', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_RAINSTORM, Glossary::CARD_LIGHTNING]);
    expect($hand->getTotal())->toBe(49);
});

it('princess add points from empress when empress lose points from princess', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_PRINCESS, Glossary::CARD_EMPRESS]);
    expect($hand->getTotal())->toBe(15);
});

it('rainstorm get points from each flood', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_RAINSTORM, Glossary::CARD_SWAMP, Glossary::CARD_WATER_ELEMENTAL]);
    expect($hand->getTotal())->toBe(55);
});

it('island has no effect on dragon', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_DRAGON, Glossary::CARD_ISLAND]);
    expect($hand->getTotal())->toBe(4);
});

it('island clears penalty from swamp', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_SWAMP, Glossary::CARD_ISLAND, Glossary::CARD_DWARVISH_INFANTRY]);
    expect($hand->getTotal())->toBe(47);
});

it('elven archers get points if there is no weather', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_ELVEN_ARCHERS, Glossary::CARD_ISLAND]);
    expect($hand->getTotal())->toBe(29);
});

it('air elemental cancel elven archers bonus', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_ELVEN_ARCHERS, Glossary::CARD_AIR_ELEMENTAL]);
    expect($hand->getTotal())->toBe(14);
});

it('rainstorm blanks fire elemental', function (): void {
    $hand = init_hand($this->deck, [Glossary::CARD_RAINSTORM, Glossary::CARD_FIRE_ELEMENTAL]);
    expect($hand->getTotal())->toBe(8);
});

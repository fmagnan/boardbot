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

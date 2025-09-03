<?php

use App\FantasyRealms\Domain\Card;
use App\FantasyRealms\Domain\Hand;

it('count cards in hand', function (): void {
    $hand = init_hand($this->deck, ['dragon', 'bell_tower', 'magic_wand']);
    expect($hand->countCards())->toBe(3);
});

it('applies penalty when dragon has not a wizard', function (): void {
    $hand = init_hand($this->deck, ['dragon']);
    expect($hand->getTotal())->toBe(-10);
});

it('neutralizes penalty when dragon is with a wizard', function (): void {
    $hand = init_hand($this->deck, ['dragon', 'elemental_enchantress']);
    expect($hand->getTotal())->toBe(35);
});

it('princess get points from elemental enchantress', function (): void {
    $hand = init_hand($this->deck, ['princess', 'elemental_enchantress']);
    expect($hand->getTotal())->toBe(15);
});

it('lightning get no points from princess', function (): void {
    $hand = init_hand($this->deck, ['princess', 'lightning']);
    expect($hand->getTotal())->toBe(13);
});

it('lightning points from rainstorm', function (): void {
    $hand = init_hand($this->deck, ['rainstorm', 'lightning']);
    expect($hand->getTotal())->toBe(49);
});

it('princess add points from empress when empress lose points from princess', function (): void {
    $hand = init_hand($this->deck, ['princess', 'empress']);
    expect($hand->getTotal())->toBe(15);
});

it('rainstorm get points from each flood', function (): void {
    $hand = init_hand($this->deck, ['rainstorm', 'swamp', 'water_elemental']);
    expect($hand->getTotal())->toBe(55);
});

<?php

use App\FantasyRealms\Domain\Card;
use App\FantasyRealms\Domain\Hand;

global $deck;

it('card has initial value', function () use ($deck) {
    $dragon = Card::fromConf($deck['dragon']);
    expect($dragon->getBaseStrength())->toBe(30);
    expect($dragon->getValue(new Hand()))->toBe(-10);
});

it('card can have a bonus', function () use ($deck) {
    $card = new Card('magic carpet', Card::SUIT_ARTIFACT, 12, ['withAnyOne', 10, Card::SUIT_ARTIFACT], []);
    $value = $card->getValue(new Hand());
    expect($value)->toBe(22);
});

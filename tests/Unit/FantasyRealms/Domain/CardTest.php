<?php

use App\FantasyRealms\Domain\Bonus;
use App\FantasyRealms\Domain\Card;
use App\FantasyRealms\Domain\Hand;

global $deck;

it('card does not trigger bonus with empty hand', function () use ($deck) {
    $magicCarpet = new Card('magic carpet', Card::SUIT_ARTIFACT, 12, [Bonus::WITH_ANY_ONE, [10, Card::SUIT_ARTIFACT]], []);
    expect($magicCarpet->getBaseStrength())->toBe(12);
    expect($magicCarpet->getValue(new Hand()))->toBe(12);
});

it('card can have a penalty', function () use ($deck) {
    $dragon = Card::fromConf($deck['dragon']);
    expect($dragon->getBaseStrength())->toBe(30);
    expect($dragon->getValue(new Hand()))->toBe(-10);
});

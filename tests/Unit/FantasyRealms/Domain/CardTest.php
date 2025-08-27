<?php

use App\FantasyRealms\Domain\Card;

global $deck;

it('card has initial value', function () use ($deck) {
    $dragon = Card::fromConf($deck['dragon']);
    expect($dragon->getValue())->toBe(30);
});

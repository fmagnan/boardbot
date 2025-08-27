<?php

use App\FantasyRealms\Domain\Card;
use App\FantasyRealms\Domain\Hand;

global $deck;

it('count cards in hand', function () use ($deck) {
    $hand = new Hand();
    foreach (['dragon', 'princess', 'king'] as $cardId) {
        $card = Card::fromConf($deck[$cardId]);
        $hand->addCard($card);
    }
    expect($hand->countCards())->toBe(3);
});

it('calculates hand value', function () use ($deck) {
    $hand = new Hand();
    foreach (['dragon', 'princess', 'king'] as $cardId) {
        $card = Card::fromConf($deck[$cardId]);
        $hand->addCard($card);
    }
    expect($hand->getValue())->toBe(8);
});

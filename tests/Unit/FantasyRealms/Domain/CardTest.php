<?php

use App\FantasyRealms\Domain\Card;
use App\FantasyRealms\Domain\Glossary;
use App\FantasyRealms\Domain\Hand;

it('card does not trigger bonus with empty hand', function (): void {
    $magicCarpet = new Card(
        'magic carpet',
        Glossary::SUIT_ARTIFACT,
        12,
        [Glossary::ACTION_WITH_ANY_ONE_SUIT, [10, Glossary::SUIT_ARTIFACT]],
        [],
    );
    expect($magicCarpet->getBaseStrength())->toBe(12);
    expect($magicCarpet->getValue(new Hand()))->toBe(12);
});

it('card can have a penalty', function (): void {
    $dragon = Card::fromConf($this->deck['dragon']);
    expect($dragon->getBaseStrength())->toBe(30);
    expect($dragon->getValue(new Hand()))->toBe(-10);
});

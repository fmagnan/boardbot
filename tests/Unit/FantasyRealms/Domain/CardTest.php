<?php

use App\FantasyRealms\Domain\Card;
use App\FantasyRealms\Domain\Glossary;

it('card does not trigger bonus with empty hand', function (): void {
    $magicCarpet = new Card(
        'magic carpet',
        Glossary::SUIT_ARTIFACT,
        12,
        [
            'action' => Glossary::ACTION_WITH_ANY_ONE_SUIT,
            'value' => 10,
            'suits' => [Glossary::SUIT_ARTIFACT],
        ],
        [],
    );
    expect($magicCarpet->getBaseStrength())->toBe(12);
    expect($magicCarpet->getValue())->toBe(12);
});

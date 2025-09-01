<?php

use App\FantasyRealms\Domain\Card;
use App\FantasyRealms\Domain\Hand;

it('count cards in hand', function (): void {
    $hand = new Hand();
    foreach (['dragon', 'bell_tower', 'magic_wand'] as $cardId) {
        $card = Card::fromConf($this->deck[$cardId]);
        $hand->addCard($card);
    }
    expect($hand->countCards())->toBe(3);
});

it('applies penalty when dragon has not a wizard', function (): void {
    $hand = new Hand();
    foreach (['dragon'] as $cardId) {
        $card = Card::fromConf($this->deck[$cardId]);
        $hand->addCard($card);
    }
    expect($hand->getValue())->toBe(-10);
});

it('neutralizes penalty when dragon is with a wizard', function (): void {
    $hand = new Hand();
    foreach (['dragon', 'elemental_enchantress'] as $cardId) {
        $card = Card::fromConf($this->deck[$cardId]);
        $hand->addCard($card);
    }
    expect($hand->getValue())->toBe(35);
});

it('princess get points from elemental enchantress', function (): void {
    $hand = new Hand();
    foreach (['princess', 'elemental_enchantress'] as $cardId) {
        $card = Card::fromConf($this->deck[$cardId]);
        $hand->addCard($card);
    }
    expect($hand->getValue())->toBe(15);
});

it('lightning get no points from princess', function (): void {
    $hand = new Hand();
    foreach (['princess', 'lightning'] as $cardId) {
        $card = Card::fromConf($this->deck[$cardId]);
        $hand->addCard($card);
    }
    expect($hand->getValue())->toBe(13);
});

it('lightning points from rainstorm', function (): void {
    $hand = new Hand();
    foreach (['rainstorm', 'lightning'] as $cardId) {
        $card = Card::fromConf($this->deck[$cardId]);
        $hand->addCard($card);
    }
    expect($hand->getValue())->toBe(49);
});

it('princess add points from empress when empress lose points from princess', function (): void {
    $hand = new Hand();
    foreach (['princess', 'empress'] as $cardId) {
        $card = Card::fromConf($this->deck[$cardId]);
        $hand->addCard($card);
    }
    expect($hand->getValue())->toBe(15);
});

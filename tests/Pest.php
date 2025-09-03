<?php

declare(strict_types=1);

use App\FantasyRealms\Domain\Card;
use App\FantasyRealms\Domain\Hand;

$config = require_once __DIR__ . '/../config/fantasy_realms.php';
$deck = $config['deck'];

uses(PHPUnit\Framework\TestCase::class)
    ->in('Unit')
    ->beforeEach(function () use ($deck): void {
        $this->deck = $deck;
    });

function init_hand(array $deck, array $cards): Hand
{
    $hand = new Hand();
    foreach ($cards as $name) {
        $card = Card::fromConf($name, $deck[$name]);
        $hand->addCard($card);
    }

    return $hand;
}

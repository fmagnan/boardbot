<?php

declare(strict_types=1);

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
    $hand = new Hand($deck);
    foreach ($cards as $name) {
        $hand->addCard($name);
    }

    return $hand;
}

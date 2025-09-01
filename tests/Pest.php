<?php

declare(strict_types=1);

$config = require_once __DIR__ . '/../config/fantasy_realms.php';
$deck = $config['deck'];

uses(PHPUnit\Framework\TestCase::class)
    ->in('Unit')
    ->beforeEach(function () use ($deck): void {
        $this->deck = $deck;
    });

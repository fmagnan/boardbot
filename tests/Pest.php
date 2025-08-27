<?php

declare(strict_types=1);

uses(PHPUnit\Framework\TestCase::class)->in('Unit');

$config = require_once __DIR__.'/../config/fantasy_realms.php';

global $deck;
$deck = $config['deck'];

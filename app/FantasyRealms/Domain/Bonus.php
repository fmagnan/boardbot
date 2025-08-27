<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Bonus
{
    public function __construct(private string $formula='')
    {

    }

    public function apply() : int
    {
        return 0;
    }
}

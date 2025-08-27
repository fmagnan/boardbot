<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Penalty
{
    public function __construct(private string $formula='')
    {

    }

    public function unlessSuit(Hand $hand, Card $current, string $suit, int $value) : int
    {
        $found = false;
        foreach($hand->getCards() as $card) {
            if ($card->suit() === $suit) {
                $found = true;
            }
        }

        return $found ? $current->getValue() : $current->getValue() - $value;
    }

    public function apply() : int
    {
        return 0;
    }
}

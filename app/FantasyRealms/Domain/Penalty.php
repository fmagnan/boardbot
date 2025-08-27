<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Penalty
{
    public static function unlessAtLeast(Hand $hand, Card $current, int $value, int $suit) : int
    {
        $found = false;
        foreach($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if ($card->getSuit() === $suit) {
                $found = true;
            }
        }

        return $found ? 0 : $value;
    }

}

<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Penalty
{
    public const string UNLESS_AT_LEAST = 'unlessAtLeast';

    public static function unlessAtLeast(Hand $hand, Card $current, array $params) : int
    {
        $value = $params[0];
        $suit = $params[1];
        $found = false;
        foreach ($hand->getCards() as $card) {
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

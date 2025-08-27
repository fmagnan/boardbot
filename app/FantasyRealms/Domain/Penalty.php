<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Penalty
{
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

    public static function forEach(Hand $hand, Card $current, array $params): int
    {
        return Action::forEach($hand, $current, $params);
    }
}

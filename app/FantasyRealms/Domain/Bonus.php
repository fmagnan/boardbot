<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Bonus
{
    public static function withAnyOneSuit(Hand $hand, Card $current, array $params): int
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

        return $found ? $value : 0;
    }

    public static function forEach(Hand $hand, Card $current, array $params): int
    {
        return Action::forEach($hand, $current, $params);
    }

    public static function withCard(Hand $hand, Card $current, array $params): int
    {
        $value = $params[0];
        $cardName = $params[1];
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $cardName) {
                return $value;
            }
        }

        return 0;
    }

    public static function clearsPenalty(Hand $hand, Card $current, array $params): Hand
    {
    }
}

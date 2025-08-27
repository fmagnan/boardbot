<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Bonus
{
    public const string WITH_ANY_ONE = 'withAnyOne';

    public const string FOR_EACH = 'forEach';

    public static function withAnyOne(Hand $hand, Card $current, array $params): int
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
        $total = 0;
        $value = $params[0];
        $suits = $params[1];
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getSuit(), $suits)) {
                $total += $value;
            }
        }

        return $total;
    }
}

<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Penalty
{
    public static function unlessAtLeast(Hand $hand, Card $current, array $params): void
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
        if (!$found) {
            $current->applyPenalty($value);
        }
    }

    public static function forEach(Hand $hand, Card $current, array $params): void
    {
        $value = $params[0];
        $suits = $params[1];
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getSuit(), $suits, true)) {
                $current->applyPenalty($value);
            }
        }
    }
}

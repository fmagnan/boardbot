<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Action
{
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

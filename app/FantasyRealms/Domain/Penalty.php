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

    public static function withCard(Hand $hand, Card $current, array $params): void
    {
        $value = $params[0];
        $cardName = $params[1];
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $cardName) {
                $current->applyPenalty($value);
            }
        }
    }

    public static function blanks(Hand $hand, Card $current, array $params): void
    {
        $targets = $params[0];
        $excludes = $params[1];
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (empty($targets) || in_array($card->getSuit(), $targets, true)) {
                if (isset($excludes['suits']) && in_array($card->getSuit(), $excludes['suits'], true)) {
                    continue;
                }
                if (isset($excludes['cards']) && in_array($card->getName(), $excludes['cards'], true)) {
                    continue;
                }
                $card->blank();
            }
        }
    }

    public static function blankedUnless(Hand $hand, Card $current, array $params): void
    {
        $suits = $params[0];
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getSuit(), $suits, true)) {
                return;
            }
            $current->blank();
        }
    }
}

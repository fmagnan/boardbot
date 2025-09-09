<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Penalty
{
    public static function unlessAtLeast(Hand $hand, Card $current, array $params): bool
    {
        $value = (int) $params['value'];
        $suits = $params['suits'];
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getSuit(), $suits, true)) {
                $found = true;
            }
        }
        if (!$found) {
            $current->applyPenalty($value);
        }

        return !$found;
    }

    public static function forEach(Hand $hand, Card $current, array $params): bool
    {
        $value = (int) $params['value'];
        $suits = $params['suits'];
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getSuit(), $suits, true)) {
                $current->applyPenalty($value);
                $found = true;
            }
        }

        return $found;
    }

    public static function withCard(Hand $hand, Card $current, array $params): bool
    {
        $value = (int) $params['value'];
        $cards = $params['cards'];
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getName(), $cards, true)) {
                $current->applyPenalty($value);
                $found = true;
            }
        }

        return $found;
    }

    public static function blanks(Hand $hand, Card $current, array $params): bool
    {
        $targetSuits = $params['targets']['suits'] ?? [];
        $excludes = $params['excludes'];
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (empty($targetSuits) || in_array($card->getSuit(), $targetSuits, true)) {
                if (isset($excludes['suits']) && in_array($card->getSuit(), $excludes['suits'], true)) {
                    continue;
                }
                if (isset($excludes['cards']) && in_array($card->getName(), $excludes['cards'], true)) {
                    continue;
                }
                $card->blank();
                $found = true;
            }
        }

        return $found;
    }

    public static function blankedUnless(Hand $hand, Card $current, array $params): bool
    {
        $suits = $params['suits'];
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getSuit(), $suits, true)) {
                return false;
            }
            $current->blank();
            $found = true;
        }

        return $found;
    }
}

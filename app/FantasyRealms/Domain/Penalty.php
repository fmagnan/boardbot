<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Penalty
{
    public static function unlessAtLeast(Hand $hand, Card $current, array $params): void
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
    }

    public static function forEach(Hand $hand, Card $current, array $params): void
    {
        $value = (int) $params['value'];
        $suits = $params['suits'];
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
        $value = (int) $params['value'];
        $cardName = $params['card'];
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $cardName) {
                $current->applyPenalty($value);
            }
        }
    }

    public static function withSuits(Hand $hand, Card $current, array $params): void
    {
        $value = (int) $params['value'];
        $suits = $params['suits'];
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getSuit(), $suits, true)) {
                $current->applyPenalty($value);
            }
        }
    }

    public static function blanks(Hand $hand, Card $current, array $params): void
    {
        $targetSuits = $params['targets']['suits'] ?? [];
        $excludes = $params['excludes'];
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
            }
        }
    }

    public static function blankedUnless(Hand $hand, Card $current, array $params): void
    {
        $suits = $params['suits'];
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

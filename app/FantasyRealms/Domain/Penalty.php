<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Penalty
{
    public static function apply(Hand $hand, Card $current, array $conf): bool
    {
        return self::{self::getAction($conf)}($hand, $current, $conf);
    }

    private static function getAction(array $conf): string
    {
        return $conf['action'];
    }

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
            $current->substractPenalty($value);
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
                $current->substractPenalty($value);
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
                $current->substractPenalty($value);
                $found = true;
            }
        }

        return $found;
    }

    public static function blanks(Hand $hand, Card $current, array $params): bool
    {
        $targetSuits = $params['targets']['suits'] ?? [];
        $excludes = $params['excludes'] ?? [];
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (count($targetSuits) === 0 || in_array($card->getSuit(), $targetSuits, true)) {
                if (isset($excludes['suits']) && in_array($card->getSuit(), $excludes['suits'], true)) {
                    continue;
                }
                if (isset($excludes['cards']) && in_array($card->getName(), $excludes['cards'], true)) {
                    continue;
                }
                echo 'card ' . $card->getName(). ' is blanked by ' . $current->getName() . PHP_EOL;
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

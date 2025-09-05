<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Bonus
{
    public static function withAnyOneSuit(Hand $hand, Card $current, array $params): bool
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
        if ($found) {
            $current->applyBonus($value);
        }

        return $found;
    }

    public static function withAnyOneCard(Hand $hand, Card $current, array $params): bool
    {
        $value = (int) $params['value'];
        $cards = $params['cards'];
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getName(), $cards, true)) {
                $found = true;
            }
        }
        if ($found) {
            $current->applyBonus($value);
        }

        return $found;
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
                $current->applyBonus($value);
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
                $current->applyBonus($value);
                $found = true;
            }
        }

        return $found;
    }

    public static function clearsPenalty(Hand $hand, Card $current, array $params): bool
    {
        $suits = $params['suits'];
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getSuit(), $suits, true)) {
                $card->clearPenalty();
                $found = true;
            }
        }

        return $found;
    }

    public static function withBothCards(Hand $hand, Card $current, array $params): bool
    {
        $value = (int) $params['value'];
        $cards = $params['cards'];
        $suits = $params['suits'];
        foreach($cards as $card) {
            if (!$hand->hasCard($card)) {
                return false;
            }
        }
        foreach($suits as $suit) {
            if (!$hand->hasSuit($suit, $current)) {
                return false;
            }
        }
        $current->applyBonus($value);

        return true;
    }

    public static function addBaseStrengthAmong(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function cardRun(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function ifNo(Hand $hand, Card $current, array $params): bool
    {
        $value = (int) $params['value'];
        $suits = $params['suits'];
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getSuit(), $suits, true)) {
                return false;
            }
        }
        $current->applyBonus($value);

        return true;
    }
}

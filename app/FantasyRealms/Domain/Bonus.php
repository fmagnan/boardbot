<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Bonus
{
    public static function withAnyOneSuit(Hand $hand, Card $current, array $params): void
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
    }

    public static function withAnyOneCard(Hand $hand, Card $current, array $params): void
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
                $current->applyBonus($value);
            }
        }
    }

    public static function withCard(Hand $hand, Card $current, array $params): void
    {
        $value = (int) $params['value'];
        $cards = $params['cards'];
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getName(), $cards, true)) {
                $current->applyBonus($value);
            }
        }
    }

    public static function clearsPenalty(Hand $hand, Card $current, array $params): void
    {
        $suits = $params['suits'];
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getSuit(), $suits, true)) {
                $card->clearPenalty();
            }
        }
    }

    public static function withBothCards(Hand $hand, Card $current, array $params): void
    {
    }

    public static function ifNo(Hand $hand, Card $current, array $params): void
    {
        $value = (int) $params['value'];
        $suits = $params['suits'];
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getSuit(), $suits, true)) {
                return;
            }
        }
        $current->applyBonus($value);
    }
}

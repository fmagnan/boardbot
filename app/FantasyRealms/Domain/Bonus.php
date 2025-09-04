<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Bonus
{
    public static function withAnyOneSuit(Hand $hand, Card $current, array $params): void
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
        if ($found) {
            $current->applyBonus($value);
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
                $current->applyBonus($value);
            }
        }
    }

    public static function withCard(Hand $hand, Card $current, array $params): void
    {
        $value = $params[0];
        $cardName = $params[1];
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $cardName) {
                $current->applyBonus($value);
            }
        }
    }

    public static function clearsPenalty(Hand $hand, Card $current, array $params): void
    {
        $suits = $params[0];
        foreach ($hand->getCards() as $card) {
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
        $value = $params[0];
        $suits = $params[1];
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getSuit(), $suits, true)) {
                return ;
            }
        }
        $current->applyBonus($value);
    }
}

<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Bonus
{
    public static function apply(Hand $hand, Card $current, array $conf): bool
    {
        return self::{self::getAction($conf)}($hand, $current, $conf);
    }

    private static function getAction(array $conf): string
    {
        return $conf['action'];
    }

    public static function withAnyOneSuit(Hand $hand, Card $current, array $params): bool
    {
        $value = (int)$params['value'];
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
            $current->addBonus($value);
        }

        return $found;
    }

    public static function withAnyOneCard(Hand $hand, Card $current, array $params): bool
    {
        $value = (int)$params['value'];
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
            $current->addBonus($value);
        }

        return $found;
    }

    public static function forEach(Hand $hand, Card $current, array $params): bool
    {
        $value = (int)$params['value'];
        $suits = $params['suits'];
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getSuit(), $suits, true)) {
                $current->addBonus($value);
                $found = true;
            }
        }

        return $found;
    }

    public static function withCard(Hand $hand, Card $current, array $params): bool
    {
        $value = (int)$params['value'];
        $cards = $params['cards'];
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getName(), $cards, true)) {
                $current->addBonus($value);
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
        $value = (int)$params['value'];
        foreach ($params['cards'] as $card) {
            if (!$hand->hasCard($card)) {
                return false;
            }
        }
        foreach ($params['suits'] as $suit) {
            if (!$hand->hasSuit($suit, $current)) {
                return false;
            }
        }
        $current->addBonus($value);

        return true;
    }

    public static function withCardAndEither(Hand $hand, Card $current, array $params): bool
    {
        $value = (int)$params['value'];
        foreach ($params['cards'] as $card) {
            if (!$hand->hasCard($card)) {
                return false;
            }
        }
        foreach ($params['either'] as $card) {
            if ($hand->hasCard($card)) {
                $current->addBonus($value);
                return true;
            }
        }

        return false;
    }

    public static function addBaseStrengthAmong(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function cardRun(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function takeOnNameAndSuit(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function differentCardsInSameSuit(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function changeSuit(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }



    public static function clearsWordFromPenalty(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function eachActiveCardIsDifferentSuit(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function duplicate(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function takeOneMoreCardAtEnd(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function ifNo(Hand $hand, Card $current, array $params): bool
    {
        $value = (int)$params['value'];
        $suits = $params['suits'];
        foreach ($hand->getCards() as $card) {
            if ($card->getName() === $current->getName()) {
                continue;
            }
            if (in_array($card->getSuit(), $suits, true)) {
                return false;
            }
        }
        $current->addBonus($value);

        return true;
    }
}

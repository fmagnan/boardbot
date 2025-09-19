<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Bonus
{
    public static function addBaseStrengthAmong(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function apply(Hand $hand, Card $current, array $conf): bool
    {
        return self::{self::getAction($conf)}($hand, $current, $conf);
    }

    public static function cardRun(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function changeSuit(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function clearsPenalty(Hand $hand, Card $current, array $params): bool
    {
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->isSameAs($current)) {
                continue;
            }
            if ($card->hasSameSuitAs($params['suits'])) {
                $card->clearPenalty();
                $found = true;
            }
        }

        return $found;
    }

    public static function clearsWordFromPenalty(Hand $hand, Card $current, array $params): bool
    {
        foreach ($hand->getCards() as $card) {
            if ($card->isSameAs($current)) {
                continue;
            }
            if ($card->hasPenalty()) {
                $card->removeWordFromPenalty($params['word']);
            }
        }

        return false;
    }

    public static function differentCardsInSameSuit(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function duplicate(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function eachActiveCardIsDifferentSuit(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function forEach(Hand $hand, Card $current, array $params): bool
    {
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->isSameAs($current)) {
                continue;
            }
            if ($card->hasSameSuitAs($params['suits'])) {
                $current->addBonus((int) $params['value']);
                $found = true;
            }
        }

        return $found;
    }

    public static function ifNo(Hand $hand, Card $current, array $params): bool
    {
        foreach ($hand->getCards() as $card) {
            if ($card->isSameAs($current)) {
                continue;
            }
            if ($card->hasSameSuitAs($params['suits'])) {
                return false;
            }
        }
        $current->addBonus((int) $params['value']);

        return true;
    }

    public static function takeOneMoreCardAtEnd(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function takeOnNameAndSuit(Hand $hand, Card $current, array $params): bool
    {
        return false;
    }

    public static function withAnyOneCard(Hand $hand, Card $current, array $params): bool
    {
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->isSameAs($current)) {
                continue;
            }
            if ($card->isAmong( $params['cards'])) {
                $found = true;
            }
        }
        if ($found) {
            $current->addBonus((int) $params['value']);
        }

        return $found;
    }

    public static function withAnyOneSuit(Hand $hand, Card $current, array $params): bool
    {
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->isSameAs($current)) {
                continue;
            }
            if ($card->hasSameSuitAs($params['suits'])) {
                $found = true;
            }
        }
        if ($found) {
            $current->addBonus((int) $params['value']);
        }

        return $found;
    }

    public static function withBothCards(Hand $hand, Card $current, array $params): bool
    {
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
        $current->addBonus((int) $params['value']);

        return true;
    }

    public static function withCard(Hand $hand, Card $current, array $params): bool
    {
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->isSameAs($current)) {
                continue;
            }
            if ($card->isAmong($params['cards'])) {
                $current->addBonus((int) $params['value']);
                $found = true;
            }
        }

        return $found;
    }

    public static function withCardAndEither(Hand $hand, Card $current, array $params): bool
    {
        foreach ($params['cards'] as $card) {
            if (!$hand->hasCard($card)) {
                return false;
            }
        }
        foreach ($params['either'] as $card) {
            if ($hand->hasCard($card)) {
                $current->addBonus((int) $params['value']);
                return true;
            }
        }

        return false;
    }

    private static function getAction(array $conf): string
    {
        return $conf['action'];
    }
}

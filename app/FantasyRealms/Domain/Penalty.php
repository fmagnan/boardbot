<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Penalty
{
    public static function apply(Hand $hand, Card $current, array $conf): bool
    {
        return self::{self::getAction($conf)}($hand, $current, $conf);
    }

    public static function blankedUnless(Hand $hand, Card $current, array $params): bool
    {
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->isSameAs($current)) {
                continue;
            }
            if ($card->hasSameSuitAs($params['suits'])) {
                return false;
            }
            $current->blank();
            $found = true;
        }

        return $found;
    }

    public static function blanks(Hand $hand, Card $current, array $params): bool
    {
        $targetSuits = $params['targets']['suits'] ?? [];
        $excludes = $params['excludes'] ?? [];
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->isSameAs($current)) {
                continue;
            }
            if (count($targetSuits) === 0 || $card->hasSameSuitAs($targetSuits)) {
                if (isset($excludes['suits']) && $card->hasSameSuitAs($excludes['suits'])) {
                    continue;
                }
                if (isset($excludes['cards']) && $card->isAmong($excludes['cards'])) {
                    continue;
                }
                $card->blank();
                $found = true;
            }
        }

        return $found;
    }

    public static function forEach(Hand $hand, Card $current, array $params): bool
    {
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->isSameAs($current)) {
                continue;
            }
            if ($card->hasSameSuitAs($params['suits'])) {
                $current->substractPenalty((int)$params['value']);
                $found = true;
            }
        }

        return $found;
    }

    public static function unlessAtLeast(Hand $hand, Card $current, array $params): bool
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
        if (!$found) {
            $current->substractPenalty((int)$params['value']);
        }

        return !$found;
    }

    public static function withCard(Hand $hand, Card $current, array $params): bool
    {
        $found = false;
        foreach ($hand->getCards() as $card) {
            if ($card->isSameAs($current)) {
                continue;
            }
            if ($card->isAmong($params['cards'])) {
                $current->substractPenalty((int)$params['value']);
                $found = true;
            }
        }

        return $found;
    }


    private static function getAction(array $conf): string
    {
        return $conf['action'];
    }
}

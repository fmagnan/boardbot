<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

use PHPUnit\Event\Runtime\PHP;

class Hand
{
    /** @var Card[] */
    private array $cards = [];

    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    public function countCards(): int
    {
        return count($this->cards);
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function getTotal(): int
    {
        $this->sortCardsByPriority();

        foreach ($this->cards as $card) {
            $card->apply($this);
        }

        $total = 0;
        foreach ($this->cards as $card) {
            $total += $card->getValue();
        }

        return $total;
    }

    public function hasCard(string $name): bool
    {
        foreach ($this->cards as $card) {
            if ($name === $card->getName()) {
                return true;
            }
        }

        return false;
    }

    public function hasSuit(int $suit, Card $exclude): bool
    {
        foreach ($this->cards as $item) {
            if ($item->getName() === $exclude->getName()) {
                continue;
            }
            if ($suit === $item->getSuit()) {
                return true;
            }
        }

        return false;
    }

    private function sortCardsByPriority(): void
    {
        foreach ($this->cards as $index => $card) {
            if ($card->isPrior($card->getBonus())) {
                $out = array_splice($this->cards, $index, 1);
                array_splice($this->cards, 0, 0, $out);
            }
        }
    }
}

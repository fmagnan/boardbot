<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Hand
{
    /** @var Card[] */
    private array $cards = [];

    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function countCards(): int
    {
        return count($this->cards);
    }

    public function getTotal(): int
    {
        foreach ($this->cards as $card) {
            $card->apply($this);
        }

        $total = 0;
        foreach ($this->cards as $card) {
            $total += $card->getValue();
        }

        return $total;
    }
}

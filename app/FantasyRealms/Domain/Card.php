<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

use PHPUnit\Event\Runtime\PHPUnit;

class Card
{
    private int $value;

    public function __construct(
        private string $name,
        private int $suit,
        private int $base_strength,
        private array $bonus,
        private array $penalty,
    ) {
        $this->value = $this->base_strength;
    }

    public static function fromConf(string $name, array $conf): self
    {
        return new self(
            $name,
            (int) $conf['suit'],
            (int) $conf['base_strength'],
            $conf['bonus'] ?? [],
            $conf['penalty'] ?? [],
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSuit(): int
    {
        return $this->suit;
    }

    public function isPrior(): bool
    {
        if (isset($this->bonus['action']) && $this->bonus['action'] === Glossary::ACTION_CLEARS_PENALTY) {
            return true;
        }

        return false;
    }

    public function getBaseStrength(): int
    {
        return $this->base_strength;
    }

    public function applyBonus(int $value): self
    {
        $this->value += $value;

        return $this;
    }

    public function applyPenalty(int $value): self
    {
        $this->value -= $value;

        return $this;
    }

    public function apply(Hand $hand): Hand
    {
        if (count($this->bonus) > 0) {
            if (isset($this->bonus['and'])) {
                foreach ($this->bonus['and'] as $bonus) {
                    $bonusFunction = $bonus['action'];
                    Bonus::$bonusFunction($hand, $this, $bonus);
                }
            } elseif (isset($this->bonus['or'])) {
                /* @todo */
            } else {
                $bonusFunction = $this->bonus['action'];
                Bonus::$bonusFunction($hand, $this, $this->bonus);
            }
        }
        if (count($this->penalty) > 0) {
            $penaltyFunction = $this->penalty['action'];
            Penalty::$penaltyFunction($hand, $this, $this->penalty);
        }

        return $hand;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function clearPenalty(): self
    {
        $this->penalty = [];
        return $this;
    }

    public function blank(): self
    {
        $this->base_strength = 0;
        $this->value = 0;
        $this->bonus = [];
        $this->penalty = [];
        $this->name = '';
        $this->suit = Glossary::SUIT_NONE;

        return $this;
    }
}

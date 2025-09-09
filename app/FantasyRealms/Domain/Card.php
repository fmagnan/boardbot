<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

use PHPUnit\Event\Runtime\PHPUnit;

class Card
{
    private int $value;

    public function __construct(
        private string $name,
        private int    $suit,
        private int    $base_strength,
        private array  $bonus,
        private array  $penalty,
    )
    {
        $this->value = $this->base_strength;
    }

    public static function fromConf(string $name, array $conf): self
    {
        return new self(
            $name,
            (int)$conf['suit'],
            (int)$conf['base_strength'],
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

    public function addBonus(int $value): self
    {
        $this->value += $value;

        return $this;
    }

    public function substractPenalty(int $value): self
    {
        $this->value -= $value;

        return $this;
    }

    private function applyPenalty(Hand $hand): void
    {
        if (count($this->penalty) === 0) {
            return;
        }
        Penalty::apply($hand, $this, $this->penalty);
    }

    private function applyBonus(Hand $hand): void
    {
        if (count($this->bonus) === 0) {
            return;
        }
        if (isset($this->bonus['and'])) {
            foreach ($this->bonus['and'] as $bonus) {
                Bonus::apply($hand, $this, $bonus);
            }
        } elseif (isset($this->bonus['or'])) {
            foreach ($this->bonus['or'] as $bonus) {
                $bonusFunction = $bonus['action'];
                if (Bonus::$bonusFunction($hand, $this, $bonus)) {
                    break;
                }
            }
        } else {
            Bonus::apply($hand, $this, $this->bonus);
        }
    }

    public function apply(Hand $hand): Hand
    {
        $this->applyBonus($hand);
        $this->applyPenalty($hand);

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

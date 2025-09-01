<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Card
{
    public function __construct(
        private string $name,
        private int $suit,
        private int $base_strength,
        private array $bonus,
        private array $penalty,
    ) {}

    public static function fromConf(array $conf): self
    {
        return new self(
            $conf['name'],
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

    public function getBaseStrength(): int
    {
        return $this->base_strength;
    }

    public function getValue(Hand $hand): int
    {
        $value = $this->base_strength;
        if (count($this->bonus) > 0) {
            $bonusFunction = $this->bonus[0];
            $value += Bonus::$bonusFunction($hand, $this, $this->bonus[1]);
        }
        if (count($this->penalty) > 0) {
            $penaltyFunction = $this->penalty[0];
            $value -= Penalty::$penaltyFunction($hand, $this, $this->penalty[1]);
        }

        return $value;
    }
}

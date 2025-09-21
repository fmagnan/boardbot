<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

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

    public function addBonus(int $value): self
    {
        $this->value += $value;

        return $this;
    }

    public function apply(Hand $hand): Hand
    {
        $this->applyBonus($hand);
        $this->applyPenalty($hand);

        return $hand;
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

    public function changeSuit(int $suit): self
    {
        $this->suit = $suit;

        return $this;
    }

    public function clearPenalty(): self
    {
        $this->penalty = [];

        return $this;
    }

    public function duplicate(Card $from): self
    {
        $this->name = $from->getName();
        $this->base_strength = $from->getBaseStrength();
        $this->value = $this->base_strength;
        $this->bonus = [];
        $this->penalty = $from->getPenalty();
        $this->suit = $from->getSuit();

        return $this;
    }

    public static function fromConf(string $name, array $conf) : self
    {
        return new self($name, (int) $conf['suit'], (int) $conf['base_strength'], $conf['bonus'] ?? [], $conf['penalty'] ?? []);
    }

    public static function fromDeck(string $name, array $deck) : self
    {
        return self::fromConf($name, $deck[$name]);
    }

    public function getBaseStrength(): int
    {
        return $this->base_strength;
    }

    public function getBonus(): array
    {
        return $this->bonus;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPenalty(): array
    {
        return $this->penalty;
    }

    public function getSuit(): int
    {
        return $this->suit;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function hasPenalty(): bool
    {
        return !empty($this->penalty);
    }

    public function hasSuitAmong(array $suits): bool
    {
        return in_array($this->suit, $suits, true);
    }

    public function isAmong(array $cards): bool
    {
        return in_array($this->name, $cards, true);
    }

    public function isBlanked(): bool
    {
        return $this->suit === Glossary::SUIT_NONE;
    }

    public function isPrior(array $bonus): bool
    {
        if (isset($bonus['and'])) {
            foreach ($bonus['and'] as $subBonus) {
                if ($this->isPrior($subBonus)) {
                    return true;
                }
            }
        }
        if (!isset($bonus['action'])) {
            return false;
        }
        return in_array($bonus['action'], [
            Glossary::ACTION_CLEARS_PENALTY,
            Glossary::ACTION_CLEARS_WORD_FROM_PENALTY,
            Glossary::ACTION_CHANGE_SUIT,
            Glossary::ACTION_DUPLICATE,
            Glossary::ACTION_TAKE_ON_NAME_AND_SUIT,
        ]);
    }

    public function isSameAs(Card|string $card): bool
    {
        if ($card instanceof Card) {
            return $card->getName() === $this->name;
        }

        return $card === $this->name;
    }

    public function removeWordFromPenalty(int|string $word): self
    {
        if (is_int($word)) {
            if (($key = array_search($word, $this->penalty['suits'])) !== false) {
                unset($this->penalty['suits'][$key]);
            }
        } else {
            if (($key = array_search($word, $this->penalty['cards'])) !== false) {
                unset($this->penalty['cards'][$key]);
            }
        }

        return $this;
    }

    public function substractPenalty(int $value): self
    {
        $this->value -= $value;

        return $this;
    }

    public function takeOnNameAndSuit(Card $from) : self
    {
        $this->name = $from->getName();
        $this->suit = $from->getSuit();

        return $this;
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
            return;
        }
        if (isset($this->bonus['or'])) {
            foreach ($this->bonus['or'] as $bonus) {
                if (Bonus::apply($hand, $this, $bonus)) {
                    break;
                }
            }
            return;
        }
        Bonus::apply($hand, $this, $this->bonus);
    }

    private function applyPenalty(Hand $hand): void
    {
        if (count($this->penalty) === 0) {
            return;
        }
        if (isset($this->penalty['and'])) {
            foreach ($this->penalty['and'] as $penalty) {
                Penalty::apply($hand, $this, $penalty);
            }
            return;
        }
        if (isset($this->penalty['or'])) {
            foreach ($this->penalty['or'] as $penalty) {
                if (Penalty::apply($hand, $this, $penalty)) {
                    break;
                }
            }
            return;
        }
        Penalty::apply($hand, $this, $this->penalty);
    }
}

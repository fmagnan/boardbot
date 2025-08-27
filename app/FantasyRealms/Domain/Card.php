<?php

declare(strict_types=1);

namespace App\FantasyRealms\Domain;

class Card
{
    public const int SUIT_ARMY = 1;

    public const int SUIT_ARTIFACT = 2;

    public const int SUIT_BEAST = 3;

    public const int SUIT_FLAME = 4;

    public const int SUIT_FLOOD = 5;

    public const int SUIT_LAND = 6;

    public const int SUIT_LEADER = 7;

    public const int SUIT_WEAPON = 8;

    public const int SUIT_WEATHER = 9;

    public const int SUIT_WILD = 10;

    public const int SUIT_WIZARD = 11;

    public const string NAME_AIR_ELEMENTAL = 'Air Elemental';

    public const string NAME_BASILISK = 'Basilisk';

    public const string NAME_BEASTMASTER = 'Beastmaster';

    public const string NAME_BELL_TOWER = 'Bell Tower';

    public const string NAME_BLIZZARD = 'Blizzard';

    public const string NAME_BOOK_OF_CHANGES = 'Book of Changes';

    public const string NAME_CANDLE = 'Candle';

    public const string NAME_CELESTIAL_KNIGHTS = 'Celestial Knights';

    public const string NAME_COLLECTOR = 'Collector';

    public const string NAME_DOPPELGANGER = 'Doppelganger';

    public const string NAME_DRAGON = 'Dragon';

    public const string NAME_DWARVISH_INFANTRY = 'Dwarvish Infantry';

    public const string NAME_EARTH_ELEMENTAL = 'Earth Elemental';

    public const string NAME_ELEMENTAL_ENCHANTRESS = 'Elemental Enchantress';

    public const string NAME_ELVEN_ARCHERS = 'Elven Archers';

    public const string NAME_ELVEN_LONGBOW = 'Elven Longbow';

    public const string NAME_EMPRESS = 'Empress';

    public const string NAME_GEM_OF_ORDER = 'Gem of Order';

    public const string NAME_LIGHT_CALVARY = 'Light Cavalry';

    public const string NAME_FIRE_ELEMENTAL = 'Fire Elemental';

    public const string NAME_FOREST = 'Forest';

    public const string NAME_FORGE = 'Forge';

    public const string NAME_FOUNTAIN_OF_LIFE = 'Fountain of Life';

    public const string NAME_GREAT_FLOOD = 'Great Flood';

    public const string NAME_HYDRA = 'Hydra';

    public const string NAME_ISLAND = 'Island';

    public const string NAME_KING = 'King';

    public const string NAME_LIGHTNING = 'Lightning';

    public const string NAME_MAGIC_WAND = 'Magic Wand';

    public const string NAME_MIRAGE = 'Mirage';

    public const string NAME_MOUNTAIN = 'Mountain';

    public const string NAME_NECROMANCER = 'Necromancer';

    public const string NAME_PRINCESS = 'Princess';

    public const string NAME_PROTECTION_RUNE = 'Protection Rune';

    public const string NAME_QUEEN = 'Queen';

    public const string NAME_RAINSTORM = 'Rainstorm';

    public const string NAME_RANGERS = 'Rangers';

    public const string NAME_SHAPESHIFTER = 'Shapeshifter';

    public const string NAME_SHIELD_OF_KETH = 'Shield of Keth';

    public const string NAME_SMOKE = 'Smoke';

    public const string NAME_SWAMP = 'Swamp';

    public const string NAME_SWORD_OF_KETH = 'Sword of Keth';

    public const string NAME_UNDERGROUND_CAVERNS = 'Underground Caverns';

    public const string NAME_UNICORN = 'Unicorn';

    public const string NAME_WAR_DIRIGIBLE = 'War Dirigible';

    public const string NAME_WARHORSE = 'Warhorse';

    public const string NAME_WARLOCK_LORD = 'Warlock Lord';

    public const string NAME_WARLORD = 'Warlord';

    public const string NAME_WARSHIP = 'Warship';

    public const string NAME_WATER_ELEMENTAL = 'Water Elemental';

    public const string NAME_WHIRLWIND = 'Whirlwind';

    public const string NAME_WILDFIRE = 'Wildfire';

    public const string NAME_WORLD_TREE = 'World Tree';

    public function __construct(private string $name, private int $suit, private int $base_strength, private array $bonus, private array $penalty)
    {
    }

    public static function fromConf(array $conf)
    {
        return new self($conf['name'], (int) $conf['suit'], (int) $conf['base_strength'], $conf['bonus'] ?? [], $conf['penalty'] ?? []);
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
        if (! empty($this->bonus)) {
            $bonusFunction = $this->bonus[0];
            $value += Bonus::$bonusFunction($hand, $this, $this->bonus[1]);
        }
        if (! empty($this->penalty)) {
            $penaltyFunction = $this->penalty[0];
            $value -= Penalty::$penaltyFunction($hand, $this, $this->penalty[1]);
        }

        return $value;
    }
}

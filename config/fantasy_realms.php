<?php

use App\FantasyRealms\Domain\Glossary;

return [
    'deck' => [
        'air_elemental' => [
            'name' => Glossary::CARD_AIR_ELEMENTAL,
            'suit' => Glossary::SUIT_WEATHER,
            'base_strength' => 4,
            'bonus' => [Glossary::ACTION_FOR_EACH, [15, [Glossary::SUIT_WEATHER]]],
        ],
        'basilisk' => [
            'name' => Glossary::CARD_BASILISK,
            'suit' => Glossary::SUIT_BEAST,
            'base_strength' => 35,
            //'penalty' => Blanks all Armies, Leaders, and other Beasts
        ],
        'bell_tower' => [
            'name' => Glossary::CARD_BELL_TOWER,
            'suit' => Glossary::SUIT_LAND,
            'base_strength' => 8,
            'bonus' => [Glossary::ACTION_WITH_ANY_ONE_SUIT, [15, Glossary::SUIT_WIZARD]],
        ],
        'book_of_changes' => [
            'name' => Glossary::CARD_BOOK_OF_CHANGES,
            'suit' => Glossary::SUIT_ARTIFACT,
            'base_strength' => 3,
            // 'bonus' => you may change the suit of one other card. Its name, bonuses and penalties remain the same.
        ],
        'candle' => [
            'name' => Glossary::CARD_CANDLE,
            'suit' => Glossary::SUIT_FLAME,
            'base_strength' => 2,
            //'bonus' => +100 with Book of Changes, Bell Tower, and any one Wizard
        ],
        'celestial_knights' => [
            'name' => Glossary::CARD_WARLOCK_LORD,
            'suit' => Glossary::SUIT_ARMY,
            'base_strength' => 20,
            'penalty' => [Glossary::ACTION_UNLESS_AT_LEAST, [8, Glossary::SUIT_LEADER]],
        ],
        'dragon' => [
            'name' => Glossary::CARD_DRAGON,
            'suit' => Glossary::SUIT_BEAST,
            'base_strength' => 30,
            'penalty' => [Glossary::ACTION_UNLESS_AT_LEAST, [40, Glossary::SUIT_WIZARD]],
        ],
        'dwarvish_infantry' => [
            'name' => Glossary::CARD_DWARVISH_INFANTRY,
            'suit' => Glossary::SUIT_ARMY,
            'base_strength' => 15,
            'penalty' => [Glossary::ACTION_WITH_CARD, [2, Glossary::SUIT_ARMY]],
        ],
        'earth_elemental' => [
            'name' => Glossary::CARD_EARTH_ELEMENTAL,
            'suit' => Glossary::SUIT_LAND,
            'base_strength' => 4,
            'bonus' => [Glossary::ACTION_FOR_EACH, [15, [Glossary::SUIT_LAND]]],
        ],
        'elemental_enchantress' => [
            'name' => Glossary::CARD_ELEMENTAL_ENCHANTRESS,
            'suit' => Glossary::SUIT_WIZARD,
            'base_strength' => 5,
            'bonus' => [Glossary::ACTION_FOR_EACH, [5, [Glossary::SUIT_LAND, Glossary::SUIT_WEATHER, Glossary::SUIT_FLOOD, Glossary::SUIT_FLAME]]],
        ],
        'elven_archers' => [
            'name' => Glossary::CARD_ELVEN_ARCHERS,
            'suit' => Glossary::SUIT_ARMY,
            'base_strength' => 10,
            //'bonus' => +5 if no Weather in hand
        ],
        'empress' => [
            'name' => Glossary::CARD_EMPRESS,
            'suit' => Glossary::SUIT_LEADER,
            'base_strength' => 10,
            'bonus' => [Glossary::ACTION_FOR_EACH, [10, [Glossary::SUIT_ARMY]]],
            'penalty' => [Glossary::ACTION_FOR_EACH, [5, [Glossary::SUIT_LEADER]]],
        ],
        'fire_elemental' => [
            'name' => Glossary::CARD_FIRE_ELEMENTAL,
            'suit' => Glossary::SUIT_FLAME,
            'base_strength' => 4,
            'bonus' => [Glossary::ACTION_FOR_EACH, [15, [Glossary::SUIT_FLAME]]],
        ],
        'gem_of_order' => [
            'name' => Glossary::CARD_GEM_OF_ORDER,
            'suit' => Glossary::SUIT_ARTIFACT,
            'base_strength' => 5,
            //  'bonus' => +10 for 3-card run, +30 for 4-card run, +60 for 5-card run, +100 for 6-card run, +150 for 7-card run
        ],
        'hydra' => [
            'name' => Glossary::CARD_HYDRA,
            'suit' => Glossary::SUIT_BEAST,
            'base_strength' => 12,
            'bonus' => [Glossary::ACTION_WITH_CARD, [28, Glossary::CARD_SWAMP]],
        ],
        'king' => [
            'name' => Glossary::CARD_KING,
            'suit' => Glossary::SUIT_LEADER,
            'base_strength' => 8,
            'bonus' => '+5 for each Army, +20 for each Army if in the same hand with Queen',
        ],
        'light_cavalry' => [
            'name' => Glossary::CARD_LIGHT_CALVARY,
            'suit' => Glossary::SUIT_ARMY,
            'base_strength' => 17,
            'penalty' => [Glossary::ACTION_WITH_CARD, [2, Glossary::SUIT_LAND]],
        ],
        'lightning' => [
            'name' => Glossary::CARD_LIGHTNING,
            'suit' => Glossary::SUIT_FLAME,
            'base_strength' => 11,
            'bonus' => [Glossary::ACTION_WITH_CARD, [30, Glossary::CARD_RAINSTORM]],
        ],
        'magic_wand' => [
            'name' => Glossary::CARD_MAGIC_WAND,
            'suit' => Glossary::SUIT_WEAPON,
            'base_strength' => 1,
            'bonus' => [Glossary::ACTION_WITH_ANY_ONE_SUIT, [25, Glossary::SUIT_WIZARD]],
        ],
        'mountain' => [
            'name' => Glossary::CARD_MOUNTAIN,
            'suit' => Glossary::SUIT_LAND,
            'base_strength' => 9,
            'bonus' => [
                '+50 with both Smoke and Wildfire',
                'Clears the Penalty on all Floods',
            ],
        ],
        'princess' => [
            'name' => Glossary::CARD_PRINCESS,
            'suit' => Glossary::SUIT_LEADER,
            'base_strength' => 2,
            'bonus' => [Glossary::ACTION_FOR_EACH, [8, [Glossary::SUIT_ARMY, Glossary::SUIT_WIZARD, Glossary::SUIT_LEADER]]],
        ],
        'protection_rune' => [
            'name' => Glossary::CARD_PROTECTION_RUNE,
            'suit' => Glossary::SUIT_ARTIFACT,
            'base_strength' => 1,
            'bonus' => [Glossary::ACTION_CLEARS_PENALTY, []],
        ],
        'queen' => [
            'name' => Glossary::CARD_QUEEN,
            'suit' => Glossary::SUIT_LEADER,
            'base_strength' => 6,
            'bonus' => '+5 for each Army, +20 for each Army if in the same hand with King',
        ],
        'rainstorm' => [
            'name' => Glossary::CARD_RAINSTORM,
            'suit' => Glossary::SUIT_WEATHER,
            'base_strength' => 8,
            'bonus' => [Glossary::ACTION_WITH_ANY_ONE_SUIT, [10, Glossary::SUIT_FLOOD]],
            //'penalty' => 'Blanks all Flames except Lightning',
        ],
        'rangers' => [
            'name' => Glossary::CARD_RANGERS,
            'suit' => Glossary::SUIT_ARMY,
            'base_strength' => 5,
            'bonus' => [Glossary::ACTION_FOR_EACH, [10, [Glossary::SUIT_LAND]]],
            //Clears the word Army from Penalty section of all cards in hand
        ],
        'shield_of_keth' => [
            'name' => Glossary::CARD_SHIELD_OF_KETH,
            'suit' => Glossary::SUIT_ARTIFACT,
            'base_strength' => 4,
            //'bonus' => +15 with any one Leader, +40 with both Leader and Sword of Keth
        ],
        'unicorn' => [
            'name' => Glossary::CARD_UNICORN,
            'suit' => Glossary::SUIT_BEAST,
            'base_strength' => 9,
            //'bonus' => +30 with Princess, +15 with Empress, Queen, or Elemental Enchantress
        ],
        'swamp' => [
            'name' => Glossary::CARD_SWAMP,
            'suit' => Glossary::SUIT_FLOOD,
            'base_strength' => 18,
            'penalty' => [Glossary::ACTION_FOR_EACH, [3, [Glossary::SUIT_ARMY, Glossary::SUIT_FLAME]]],
        ],
        'warlock_lord' => [
            'name' => Glossary::CARD_WARLOCK_LORD,
            'suit' => Glossary::SUIT_WIZARD,
            'base_strength' => 25,
            'penalty' => [Glossary::ACTION_FOR_EACH, [10, [Glossary::SUIT_LEADER, Glossary::SUIT_WIZARD]]],
        ],
        'warhorse' => [
            'name' => Glossary::CARD_WARHORSE,
            'suit' => Glossary::SUIT_BEAST,
            'base_strength' => 6,
            'bonus' => [Glossary::ACTION_WITH_ANY_ONE_SUIT, [14, [Glossary::SUIT_LEADER, Glossary::SUIT_WIZARD]]],
        ],
        'water_elemental' => [
            'name' => Glossary::CARD_WATER_ELEMENTAL,
            'suit' => Glossary::SUIT_FLOOD,
            'base_strength' => 4,
            'bonus' => [Glossary::ACTION_FOR_EACH, [15, [Glossary::SUIT_FLOOD]]],
        ],
        'world_tree' => [
            'name' => Glossary::CARD_WORLD_TREE,
            'suit' => Glossary::SUIT_ARTIFACT,
            'base_strength' => 2,
            //'bonus' => +50 if every active card in hand is a different suit
        ],


    ],
];

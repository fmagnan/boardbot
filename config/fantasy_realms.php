<?php

use App\FantasyRealms\Domain\Bonus;
use App\FantasyRealms\Domain\Card;
use App\FantasyRealms\Domain\Penalty;

return [
    'deck' => [
        'dragon' => [
            'name' => Card::NAME_DRAGON,
            'suit' => Card::SUIT_BEAST,
            'base_strength' => 30,
            'penalty' => [Penalty::UNLESS_AT_LEAST, [40, Card::SUIT_WIZARD]],
        ],
        'bell_tower' => [
            'name' => Card::NAME_BELL_TOWER,
            'suit' => Card::SUIT_LAND,
            'base_strength' => 8,
            'bonus' => [Bonus::WITH_ANY_ONE_SUIT, [15, Card::SUIT_WIZARD]],
        ],
        'mountain' => [
            'name' => Card::NAME_MOUNTAIN,
            'suit' => Card::SUIT_LAND,
            'base_strength' => 9,
            'bonus' => [
                '+50 with both Smoke and Wildfire',
                'Clears the Penalty on all Floods',
            ],
        ],
        'princess' => [
            'name' => Card::NAME_PRINCESS,
            'suit' => Card::SUIT_LEADER,
            'base_strength' => 2,
            'bonus' => [Bonus::FOR_EACH, [8, [Card::SUIT_ARMY, Card::SUIT_WIZARD, Card::SUIT_LEADER]]],
        ],
        'queen' => [
            'name' => Card::NAME_QUEEN,
            'suit' => Card::SUIT_LEADER,
            'base_strength' => 6,
            'bonus' => '+5 for each Army, +20 for each Army if in the same hand with King',
        ],
        'king' => [
            'name' => Card::NAME_KING,
            'suit' => Card::SUIT_LEADER,
            'base_strength' => 8,
            'bonus' => '+5 for each Army, +20 for each Army if in the same hand with Queen',
        ],
        'empress' => [
            'name' => Card::NAME_EMPRESS,
            'suit' => Card::SUIT_LEADER,
            'base_strength' => 10,
            'bonus' => [Bonus::FOR_EACH, [10, [Card::SUIT_ARMY]]],
            'penalty' => [Bonus::FOR_EACH, [5, [Card::SUIT_LEADER]]],
        ],
        'magic_wand' => [
            'name' => Card::NAME_MAGIC_WAND,
            'suit' => Card::SUIT_WEAPON,
            'base_strength' => 1,
            'bonus' => [Bonus::WITH_ANY_ONE_SUIT, [25, Card::SUIT_WIZARD]],
        ],
        'elemental_enchantress' => [
            'name' => Card::NAME_ELEMENTAL_ENCHANTRESS,
            'suit' => Card::SUIT_WIZARD,
            'base_strength' => 5,
            'bonus' => [Bonus::FOR_EACH, [5, [Card::SUIT_LAND, Card::SUIT_WEATHER, Card::SUIT_FLOOD, Card::SUIT_FLAME]]],
        ],
        'lightning' => [
            'name' => Card::NAME_LIGHTNING,
            'suit' => Card::SUIT_FLAME,
            'base_strength' => 11,
            'bonus' => [Bonus::WITH_CARD, [30, Card::NAME_RAINSTORM]],
        ],
        'rainstorm' => [
            'name' => Card::NAME_RAINSTORM,
            'suit' => Card::SUIT_WEATHER,
            'base_strength' => 8,
            'bonus' => [Bonus::WITH_ANY_ONE_SUIT, [10, Card::SUIT_FLOOD]],
            //'penalty' => 'Blanks all Flames except Lightning',
        ],
    ],
];

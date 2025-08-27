<?php

use App\FantasyRealms\Domain\Glossary;
use App\FantasyRealms\Domain\Penalty;

return [
    'deck' => [
        'dragon' => [
            'name' => Glossary::CARD_DRAGON,
            'suit' => Glossary::SUIT_BEAST,
            'base_strength' => 30,
            'penalty' => [Glossary::ACTION_UNLESS_AT_LEAST, [40, Glossary::SUIT_WIZARD]],
        ],
        'bell_tower' => [
            'name' => Glossary::CARD_BELL_TOWER,
            'suit' => Glossary::SUIT_LAND,
            'base_strength' => 8,
            'bonus' => [Glossary::ACTION_WITH_ANY_ONE_SUIT, [15, Glossary::SUIT_WIZARD]],
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
        'queen' => [
            'name' => Glossary::CARD_QUEEN,
            'suit' => Glossary::SUIT_LEADER,
            'base_strength' => 6,
            'bonus' => '+5 for each Army, +20 for each Army if in the same hand with King',
        ],
        'king' => [
            'name' => Glossary::CARD_KING,
            'suit' => Glossary::SUIT_LEADER,
            'base_strength' => 8,
            'bonus' => '+5 for each Army, +20 for each Army if in the same hand with Queen',
        ],
        'empress' => [
            'name' => Glossary::CARD_EMPRESS,
            'suit' => Glossary::SUIT_LEADER,
            'base_strength' => 10,
            'bonus' => [Glossary::ACTION_FOR_EACH, [10, [Glossary::SUIT_ARMY]]],
            'penalty' => [Glossary::ACTION_FOR_EACH, [5, [Glossary::SUIT_LEADER]]],
        ],
        'magic_wand' => [
            'name' => Glossary::CARD_MAGIC_WAND,
            'suit' => Glossary::SUIT_WEAPON,
            'base_strength' => 1,
            'bonus' => [Glossary::ACTION_WITH_ANY_ONE_SUIT, [25, Glossary::SUIT_WIZARD]],
        ],
        'elemental_enchantress' => [
            'name' => Glossary::CARD_ELEMENTAL_ENCHANTRESS,
            'suit' => Glossary::SUIT_WIZARD,
            'base_strength' => 5,
            'bonus' => [Glossary::ACTION_FOR_EACH, [5, [Glossary::SUIT_LAND, Glossary::SUIT_WEATHER, Glossary::SUIT_FLOOD, Glossary::SUIT_FLAME]]],
        ],
        'lightning' => [
            'name' => Glossary::CARD_LIGHTNING,
            'suit' => Glossary::SUIT_FLAME,
            'base_strength' => 11,
            'bonus' => [Glossary::ACTION_WITH_CARD, [30, Glossary::CARD_RAINSTORM]],
        ],
        'rainstorm' => [
            'name' => Glossary::CARD_RAINSTORM,
            'suit' => Glossary::SUIT_WEATHER,
            'base_strength' => 8,
            'bonus' => [Glossary::ACTION_WITH_ANY_ONE_SUIT, [10, Glossary::SUIT_FLOOD]],
            //'penalty' => 'Blanks all Flames except Lightning',
        ],
    ],
];

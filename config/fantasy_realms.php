<?php

use App\FantasyRealms\Domain\Card;

return [
    'deck' => [
        'dragon' => [
            'name' => Card::NAME_DRAGON,
            'suit' => Card::SUIT_BEAST,
            'base_strength' => 30,
            'penalty' => ['unlessAtLeast',40, Card::SUIT_WIZARD]
        ],
        'bell_tower' => [
            'name' => Card::NAME_BELL_TOWER,
            'suit' => Card::SUIT_LAND,
            'base_strength' => 8,
            'bonus' => ['withAnyOne',15, Card::SUIT_WIZARD]
        ],
        'mountain' => [
            'name' => Card::NAME_MOUNTAIN,
            'suit' => Card::SUIT_LAND,
            'base_strength' => 9,
            'bonus' => [
                '+50 with both Smoke and Wildfire',
                'Clears the Penalty on all Floods'
            ]
        ],
        'princess' => [
            'name' => Card::NAME_PRINCESS,
            'suit' => Card::SUIT_LEADER,
            'base_strength' => 2,
            'bonus' => '+8 for each Army, Wizard, and other Leader'
        ],
        'queen' => [
            'name' => Card::NAME_QUEEN,
            'suit' => Card::SUIT_LEADER,
            'base_strength' => 6,
            'bonus' => '+5 for each Army, +20 for each Army if in the same hand with King'
        ],
        'king' => [
            'name' => Card::NAME_KING,
            'suit' => Card::SUIT_LEADER,
            'base_strength' => 8,
            'bonus' => '+5 for each Army, +20 for each Army if in the same hand with Queen'
        ],
        'empress' => [
            'name' => Card::NAME_EMPRESS,
            'suit' => Card::SUIT_LEADER,
            'base_strength' => 10,
            'bonus' => '+10 for each Army',
            'penalty' => '-5 for each other leader'
        ],
        'magic_wand' => [
            'name' => Card::NAME_MAGIC_WAND,
            'suit' => Card::SUIT_WEAPON,
            'base_strength' => 1,
            'bonus' => ['withAnyOne',25, Card::SUIT_WIZARD]
        ]
    ],
];

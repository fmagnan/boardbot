<?php

use App\FantasyRealms\Domain\Glossary;

return [
    'deck' => [
        Glossary::CARD_AIR_ELEMENTAL => [
            'suit' => Glossary::SUIT_WEATHER,
            'base_strength' => 4,
            'bonus' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 15,
                'suits' => [Glossary::SUIT_WEATHER]
            ]
        ],
        Glossary::CARD_BASILISK => [
            'suit' => Glossary::SUIT_BEAST,
            'base_strength' => 35,
            'penalty' => [
                'action' => Glossary::ACTION_BLANKS,
                'suits' => [Glossary::SUIT_ARMY, Glossary::SUIT_LEADER, Glossary::SUIT_BEAST]
            ]
        ],
        Glossary::CARD_BEASTMASTER => [
            'suit' => Glossary::SUIT_WIZARD,
            'base_strength' => 9,
            'bonus' => [
                'and' => [
                    [
                        'action' => Glossary::ACTION_FOR_EACH,
                        'value' => 9,
                        'suits' => [Glossary::SUIT_BEAST]
                    ],
                    [
                        'action' => Glossary::ACTION_CLEARS_PENALTY,
                        'suits' => [Glossary::SUIT_BEAST]
                    ]
                ]
            ]
        ],
        Glossary::CARD_BELL_TOWER => [
            'suit' => Glossary::SUIT_LAND,
            'base_strength' => 8,
            'bonus' => [
                'action' => Glossary::ACTION_WITH_ANY_ONE_SUIT,
                'value' => 15,
                'suits' => [Glossary::SUIT_WIZARD]
            ],
        ],
        Glossary::CARD_BLIZZARD => [
            'suit' => Glossary::SUIT_WEATHER,
            'base_strength' => 30,
            'penalty' => [
                'and' => [
                    [
                        'action' => Glossary::ACTION_BLANKS,
                        'suits' => [Glossary::SUIT_FLOOD]
                    ],
                    ['action' => Glossary::ACTION_FOR_EACH,
                        'value' => 5,
                        'suits' => [Glossary::SUIT_ARMY, Glossary::SUIT_LEADER, Glossary::SUIT_BEAST, Glossary::SUIT_FLAME]
                    ]
                ],
            ]
        ],
        Glossary::CARD_BOOK_OF_CHANGES => [
            'suit' => Glossary::SUIT_ARTIFACT,
            'base_strength' => 3,
            'bonus' => [
                'action' => 'you may change the suit of one other card. Its name, bonuses and penalties remain the same.'
            ]
        ],
        Glossary::CARD_CANDLE => [
            'suit' => Glossary::SUIT_FLAME,
            'base_strength' => 2,
            'bonus' => [
                'action' => '+100 with Book of Changes, Bell Tower, and any one Wizard'
            ]
        ],
        Glossary::CARD_CELESTIAL_KNIGHTS => [
            'suit' => Glossary::SUIT_ARMY,
            'base_strength' => 20,
            'penalty' => [
                'action' => Glossary::ACTION_UNLESS_AT_LEAST,
                'value' => 8,
                'suits' => [Glossary::SUIT_LEADER]
            ],
        ],
        Glossary::CARD_COLLECTOR => [
            'suit' => Glossary::SUIT_WIZARD,
            'base_strength' => 7,
            'bonus' => [
                'action' => '+10 if three different cards in same suit, +40 if four different cards, +100 if five different cards'
            ]
        ],
        Glossary::CARD_DOPPELGANGER => [
            'suit' => Glossary::SUIT_WILD,
            'base_strength' => 0,
            'bonus' => [
                'action' => 'May duplicate the name, suit, base strength, and penalty but not bonus of any one other card in your hand'
            ]
        ],
        Glossary::CARD_DRAGON => [
            'suit' => Glossary::SUIT_BEAST,
            'base_strength' => 30,
            'penalty' => [
                'action' => Glossary::ACTION_UNLESS_AT_LEAST,
                'value' => 40,
                'suits' => [Glossary::SUIT_WIZARD]
            ],
        ],
        Glossary::CARD_DWARVISH_INFANTRY => [
            'suit' => Glossary::SUIT_ARMY,
            'base_strength' => 15,
            'penalty' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 2,
                'suits' => [Glossary::SUIT_ARMY]
            ],
        ],
        Glossary::CARD_EARTH_ELEMENTAL => [
            'suit' => Glossary::SUIT_LAND,
            'base_strength' => 4,
            'bonus' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 15,
                'suits' => [Glossary::SUIT_LAND]
            ],
        ],
        Glossary::CARD_ELEMENTAL_ENCHANTRESS => [
            'suit' => Glossary::SUIT_WIZARD,
            'base_strength' => 5,
            'bonus' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 5,
                'suits' => [Glossary::SUIT_LAND, Glossary::SUIT_WEATHER, Glossary::SUIT_FLOOD, Glossary::SUIT_FLAME]
            ],
        ],
        Glossary::CARD_ELVEN_ARCHERS => [
            'suit' => Glossary::SUIT_ARMY,
            'base_strength' => 10,
            'bonus' => [
                'action' => Glossary::ACTION_IF_NO,
                'value' => 5,
                'suits' => [Glossary::SUIT_WEATHER]
            ]
        ],
        Glossary::CARD_ELVEN_LONGBOW => [
            'suit' => Glossary::SUIT_WEAPON,
            'base_strength' => 3,
            'bonus' => [
                'action' => Glossary::ACTION_WITH_ANY_ONE_CARD,
                'value' => 30,
                'cards' => [Glossary::CARD_ELVEN_ARCHERS, Glossary::CARD_WARLORD, Glossary::CARD_BEASTMASTER]
            ],
        ],
        Glossary::CARD_EMPRESS => [
            'suit' => Glossary::SUIT_LEADER,
            'base_strength' => 10,
            'bonus' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 10,
                'suits' => [Glossary::SUIT_ARMY]
            ],
            'penalty' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 5,
                'suits' => [Glossary::SUIT_LEADER]
            ],
        ],
        Glossary::CARD_FIRE_ELEMENTAL => [
            'suit' => Glossary::SUIT_FLAME,
            'base_strength' => 4,
            'bonus' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 15,
                'suits' => [Glossary::SUIT_FLAME]
            ],
        ],
        Glossary::CARD_FOREST => [
            'suit' => Glossary::SUIT_LAND,
            'base_strength' => 7,
            'bonus' => [Glossary::ACTION_FOR_EACH, [12, [Glossary::SUIT_BEAST], [Glossary::CARD_ELVEN_ARCHERS]]],
        ],
        Glossary::CARD_FORGE => [
            'suit' => Glossary::SUIT_FLAME,
            'base_strength' => 9,
            'bonus' => [Glossary::ACTION_FOR_EACH, [9, [Glossary::SUIT_WEAPON, Glossary::SUIT_ARTIFACT]]],
        ],
        Glossary::CARD_FOUNTAIN_OF_LIFE => [
            'suit' => Glossary::SUIT_FLOOD,
            'base_strength' => 1,
            'bonus' => 'Add the base strength of any Weapon, Flood, Flame, Land, or Weather in your hand'
        ],
        Glossary::CARD_GEM_OF_ORDER => [
            'suit' => Glossary::SUIT_ARTIFACT,
            'base_strength' => 5,
            'bonus' => '+10 for 3-card run, +30 for 4-card run, +60 for 5-card run, +100 for 6-card run, +150 for 7-card run'
        ],
        Glossary::CARD_GREAT_FLOOD => [
            'suit' => Glossary::SUIT_FLOOD,
            'base_strength' => 32,
            'penalty' => [
                'action' => Glossary::ACTION_BLANKS,
                'targets' => [Glossary::SUIT_ARMY, Glossary::SUIT_LAND, Glossary::SUIT_FLAME],
                'excludes' => [
                    'cards' => [Glossary::CARD_MOUNTAIN, Glossary::CARD_LIGHTNING]
                ]
            ]
        ],
        Glossary::CARD_HYDRA => [
            'suit' => Glossary::SUIT_BEAST,
            'base_strength' => 12,
            'bonus' => [
                'action' => Glossary::ACTION_WITH_CARD,
                'value' => 28,
                'cards' => [Glossary::CARD_SWAMP]
            ],
        ],
        Glossary::CARD_KING => [
            'suit' => Glossary::SUIT_LEADER,
            'base_strength' => 8,
            'bonus' => [
                'or' => [
                    [
                        'action' => Glossary::ACTION_FOR_EACH,
                        'value' => 5,
                        'suits' => [Glossary::SUIT_ARMY]
                    ],
                    [
                        'action' => Glossary::ACTION_FOR_EACH,
                        'value' => 20,
                        'suits' => [Glossary::SUIT_ARMY],
                        'cards' => [Glossary::CARD_QUEEN]
                    ]
                ]
            ]
        ],
        Glossary::CARD_ISLAND => [
            'suit' => Glossary::SUIT_FLOOD,
            'base_strength' => 14,
            'bonus' => [
                'action' => Glossary::ACTION_CLEARS_PENALTY,
                'suits' => [Glossary::SUIT_FLOOD, Glossary::SUIT_FLAME]
            ]
        ],
        Glossary::CARD_LIGHT_CALVARY => [
            'suit' => Glossary::SUIT_ARMY,
            'base_strength' => 17,
            'penalty' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 2,
                'suits' => [Glossary::SUIT_LAND]
            ],
        ],
        Glossary::CARD_LIGHTNING => [
            'suit' => Glossary::SUIT_FLAME,
            'base_strength' => 11,
            'bonus' => [
                'action' => Glossary::ACTION_WITH_CARD,
                'value' => 30,
                'cards' => [Glossary::CARD_RAINSTORM]
            ],
        ],
        Glossary::CARD_MAGIC_WAND => [
            'suit' => Glossary::SUIT_WEAPON,
            'base_strength' => 1,
            'bonus' => [
                'action' => Glossary::ACTION_WITH_ANY_ONE_SUIT,
                'value' => 25,
                'suits' => [Glossary::SUIT_WIZARD]
            ],
        ],
        Glossary::CARD_MIRAGE => [
            'suit' => Glossary::SUIT_WILD,
            'base_strength' => 0,
            'bonus' => [
                'action' => 'May take on the name and suit of any Army, Land, Weather, Flood or Flame. Does not take bonus or penalty.'
            ]
        ],
        Glossary::CARD_MOUNTAIN => [
            'suit' => Glossary::SUIT_LAND,
            'base_strength' => 9,
            'bonus' => [
                'and' => [
                    [
                        'action' => Glossary::ACTION_WITH_BOTH_CARDS,
                        'value' => 50,
                        'cards' => [Glossary::CARD_SMOKE, Glossary::CARD_WILDFIRE]
                    ],
                    [
                        'action' => Glossary::ACTION_CLEARS_PENALTY,
                        'suits' => [Glossary::SUIT_FLOOD]
                    ]
                ]
            ]
        ],
        Glossary::CARD_NECROMANCER => [
            'suit' => Glossary::SUIT_WIZARD,
            'base_strength' => 3,
            'bonus' => [
                'action' => 'At the end of the game, you may take one Army, Leader, Wizard, or Beast from the discard pile and add it to your hand as an eighth card.'
            ]
        ],
        Glossary::CARD_PRINCESS => [
            'suit' => Glossary::SUIT_LEADER,
            'base_strength' => 2,
            'bonus' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 8,
                'suits' => [Glossary::SUIT_ARMY, Glossary::SUIT_WIZARD, Glossary::SUIT_LEADER]
            ],
        ],
        Glossary::CARD_PROTECTION_RUNE => [
            'suit' => Glossary::SUIT_ARTIFACT,
            'base_strength' => 1,
            'bonus' => [
                'action' => Glossary::ACTION_CLEARS_PENALTY,
                'suits' => [
                    Glossary::SUIT_ARMY,
                    Glossary::SUIT_ARTIFACT,
                    Glossary::SUIT_BEAST,
                    Glossary::SUIT_FLAME,
                    Glossary::SUIT_FLOOD,
                    Glossary::SUIT_LAND,
                    Glossary::SUIT_LEADER,
                    Glossary::SUIT_WEAPON,
                    Glossary::SUIT_WEATHER,
                    Glossary::SUIT_WILD,
                    Glossary::SUIT_WIZARD,
                ]
            ],
        ],
        Glossary::CARD_QUEEN => [
            'suit' => Glossary::SUIT_LEADER,
            'base_strength' => 6,
            'bonus' => [
                'or' => [
                    [
                        'action' => Glossary::ACTION_FOR_EACH,
                        'value' => 5,
                        'suits' => [Glossary::SUIT_ARMY]
                    ],
                    [
                        'action' => Glossary::ACTION_FOR_EACH,
                        'value' => 20,
                        'suits' => [Glossary::SUIT_ARMY],
                        'cards' => [Glossary::CARD_KING]
                    ]
                ]
            ]
        ],
        Glossary::CARD_RAINSTORM => [
            'suit' => Glossary::SUIT_WEATHER,
            'base_strength' => 8,
            'bonus' => [
                'action' => Glossary::ACTION_WITH_ANY_ONE_SUIT,
                'value' => 10,
                'suits' => [Glossary::SUIT_FLOOD]
            ],
            'penalty' => [
                'action' => Glossary::ACTION_BLANKS,
                'targets' => [
                    'suits' => [Glossary::SUIT_FLAME],
                ],
                'excludes' => [
                    'cards' => [Glossary::CARD_LIGHTNING]
                ]
            ]
        ],
        Glossary::CARD_RANGERS => [
            'suit' => Glossary::SUIT_ARMY,
            'base_strength' => 5,
            'bonus' => [
                'and' => [
                    [
                        'action' => Glossary::ACTION_FOR_EACH,
                        'value' => 10,
                        'suits' => [Glossary::SUIT_LAND]
                    ],
                    [
                        'action' => 'Clears the word Army from Penalty section of all cards in hand'
                    ]
                ]
            ]
        ],
        Glossary::CARD_SHAPESHIFTER => [
            'suit' => Glossary::SUIT_WILD,
            'base_strength' => 0,
            'bonus' => [
                'action' => 'May take on the name and suit of any Artifact, Leader, Wizard, Weapon or Beast. Does not take bonus or penalty.'
            ],
        ],
        Glossary::CARD_SHIELD_OF_KETH => [
            'suit' => Glossary::SUIT_ARTIFACT,
            'base_strength' => 4,
            'bonus' => [
                'or' => [
                    [
                        'action' => Glossary::ACTION_WITH_ANY_ONE_SUIT,
                        'value' => 15,
                        'suits' => [Glossary::SUIT_LEADER],
                    ],
                    [
                        'action' => Glossary::ACTION_WITH_BOTH_CARDS,
                        'value' => 40,
                        'suits' => [Glossary::SUIT_LEADER],
                        'cards' => [Glossary::CARD_SWORD_OF_KETH]
                    ]
                ]
            ]
        ],
        Glossary::CARD_SMOKE => [
            'suit' => Glossary::SUIT_WEATHER,
            'base_strength' => 27,
            'penalty' => [
                'action' => Glossary::ACTION_BLANKED_UNLESS,
                'suits' => [Glossary::SUIT_FLAME]
            ],
        ],
        Glossary::CARD_SWAMP => [
            'suit' => Glossary::SUIT_FLOOD,
            'base_strength' => 18,
            'penalty' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 3,
                'suits' => [Glossary::SUIT_ARMY, Glossary::SUIT_FLAME]
            ],
        ],
        Glossary::CARD_SWORD_OF_KETH => [
            'suit' => Glossary::SUIT_WEAPON,
            'base_strength' => 7,
            'bonus' => [
                'or' => [
                    [
                        'action' => Glossary::ACTION_WITH_ANY_ONE_SUIT,
                        'value' => 10,
                        'suits' => [Glossary::SUIT_LEADER],
                    ],
                    [
                        'action' => Glossary::ACTION_WITH_BOTH_CARDS,
                        'value' => 40,
                        'suits' => [Glossary::SUIT_LEADER],
                        'cards' => [Glossary::CARD_SHIELD_OF_KETH]
                    ]
                ]
            ]
        ],
        Glossary::CARD_UNDERGROUND_CAVERNS => [
            'suit' => Glossary::SUIT_LAND,
            'base_strength' => 6,
            'bonus' => [
                'and' => [
                    [
                        'action' => Glossary::ACTION_WITH_CARD,
                        'value' => 25,
                        'cards' => [Glossary::CARD_DRAGON, Glossary::CARD_DWARVISH_INFANTRY]
                    ],
                    [
                        'action' => Glossary::ACTION_CLEARS_PENALTY,
                        'suits' => [Glossary::SUIT_WEATHER]
                    ]
                ]
            ]
        ],
        Glossary::CARD_UNICORN => [
            'suit' => Glossary::SUIT_BEAST,
            'base_strength' => 9,
            'bonus' => [
                'or' => [
                    [
                        'action' => Glossary::ACTION_WITH_CARD,
                        'value' => 30,
                        'cards' => [Glossary::CARD_PRINCESS]
                    ],
                    [
                        'action' => Glossary::ACTION_WITH_CARD,
                        'value' => 15,
                        'cards' => [Glossary::CARD_EMPRESS, Glossary::CARD_QUEEN, Glossary::CARD_ELEMENTAL_ENCHANTRESS]
                    ]
                ]

            ]
        ],
        Glossary::CARD_WAR_DIRIGIBLE => [
            'suit' => Glossary::SUIT_WEAPON,
            'base_strength' => 25,
            'penalty' => [
                [
                    'action' => Glossary::ACTION_BLANKED_UNLESS,
                    'suits' => [Glossary::SUIT_ARMY]
                ],
                [
                    'action' => Glossary::ACTION_BLANKED_WITH,
                    'suits' => [Glossary::SUIT_WEATHER]
                ],
            ]
        ],
        Glossary::CARD_WARHORSE => [
            'suit' => Glossary::SUIT_BEAST,
            'base_strength' => 6,
            'bonus' => [
                'action' => Glossary::ACTION_WITH_ANY_ONE_SUIT,
                'value' => 14,
                'suits' => [Glossary::SUIT_LEADER, Glossary::SUIT_WIZARD]
            ]
        ],
        Glossary::CARD_WARLOCK_LORD => [
            'suit' => Glossary::SUIT_WIZARD,
            'base_strength' => 25,
            'penalty' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 10,
                'suits' => [Glossary::SUIT_LEADER, Glossary::SUIT_WIZARD]
            ],
        ],
        Glossary::CARD_WARSHIP => [
            'suit' => Glossary::SUIT_WEAPON,
            'base_strength' => 23,
            'penalty' => [
                'and' => [
                    [
                        'action' => Glossary::ACTION_BLANKED_UNLESS,
                        'suits' => [Glossary::SUIT_FLOOD],
                    ],
                    [
                        'action' => 'Clears the word Army from Penalty section of all Floods'
                    ]
                ]
            ]
        ],
        Glossary::CARD_WATER_ELEMENTAL => [
            'suit' => Glossary::SUIT_FLOOD,
            'base_strength' => 4,
            'bonus' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 15,
                'suits' => [Glossary::SUIT_FLOOD]
            ]
        ],
        Glossary::CARD_WHIRLWIND => [
            'suit' => Glossary::SUIT_WEATHER,
            'base_strength' => 13,
            'bonus' => [
                'action' => '+40 with Rainstorm and either Blizzard or Great Flood'
            ]
        ],
        Glossary::CARD_WILDFIRE => [
            'suit' => Glossary::SUIT_FLAME,
            'base_strength' => 40,
            'penalty' => [
                'action' => Glossary::ACTION_BLANKS,
                'targets' => [],
                'excludes' => [
                    'suits' => [
                        Glossary::SUIT_FLAME,
                        Glossary::SUIT_WEATHER,
                        Glossary::SUIT_WIZARD,
                        Glossary::SUIT_WEAPON,
                        Glossary::SUIT_ARTIFACT,
                    ],
                    'cards' => [
                        Glossary::CARD_GREAT_FLOOD,
                        Glossary::CARD_ISLAND,
                        Glossary::CARD_MOUNTAIN,
                        Glossary::CARD_UNICORN,
                        Glossary::CARD_DRAGON,
                    ]
                ]
            ]
        ],
        Glossary::CARD_WORLD_TREE => [
            'suit' => Glossary::SUIT_ARTIFACT,
            'base_strength' => 2,
            'bonus' => [
                'action' => '+50 if every active card in hand is a different suit'
            ],
        ],
    ]
];

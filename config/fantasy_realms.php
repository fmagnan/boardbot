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
                'suits' => [
                    Glossary::SUIT_WEATHER
                ]
            ]
        ],
        Glossary::CARD_BASILISK => [
            'suit' => Glossary::SUIT_BEAST,
            'base_strength' => 35,
            'penalty' => [
                'action' => Glossary::ACTION_BLANKS,
                'targets' => [
                    'suits' => [
                        Glossary::SUIT_ARMY,
                        Glossary::SUIT_LEADER,
                        Glossary::SUIT_BEAST
                    ]
                ]
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
                        'suits' => [
                            Glossary::SUIT_BEAST
                        ]
                    ],
                    [
                        'action' => Glossary::ACTION_CLEARS_PENALTY,
                        'suits' => [
                            Glossary::SUIT_BEAST
                        ]
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
                'suits' => [
                    Glossary::SUIT_WIZARD
                ]
            ],
        ],
        Glossary::CARD_BLIZZARD => [
            'suit' => Glossary::SUIT_WEATHER,
            'base_strength' => 30,
            'penalty' => [
                'and' => [
                    [
                        'action' => Glossary::ACTION_BLANKS,
                        'targets' => [
                            'suits' => [
                                Glossary::SUIT_FLOOD
                            ]
                        ]
                    ],
                    [
                        'action' => Glossary::ACTION_FOR_EACH,
                        'value' => 5,
                        'suits' => [
                            Glossary::SUIT_ARMY,
                            Glossary::SUIT_LEADER,
                            Glossary::SUIT_BEAST,
                            Glossary::SUIT_FLAME
                        ]
                    ]
                ],
            ]
        ],
        Glossary::CARD_BOOK_OF_CHANGES => [
            'suit' => Glossary::SUIT_ARTIFACT,
            'base_strength' => 3,
            'bonus' => [
                'action' => Glossary::ACTION_CHANGE_SUIT
            ]
        ],
        Glossary::CARD_CANDLE => [
            'suit' => Glossary::SUIT_FLAME,
            'base_strength' => 2,
            'bonus' => [
                'action' => Glossary::ACTION_WITH_BOTH_CARDS,
                'value' => 100,
                'cards' => [
                    Glossary::CARD_BOOK_OF_CHANGES,
                    Glossary::CARD_BELL_TOWER
                ],
                'suits' => [
                    Glossary::SUIT_WIZARD
                ]
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
                'or' => [
                    [
                        'action' => Glossary::ACTION_DIFFERENT_CARDS_IN_SAME_SUIT,
                        'value' => 100,
                        'cards' => 5
                    ],
                    [
                        'action' => Glossary::ACTION_DIFFERENT_CARDS_IN_SAME_SUIT,
                        'value' => 40,
                        'cards' => 4
                    ],
                    [
                        'action' => Glossary::ACTION_DIFFERENT_CARDS_IN_SAME_SUIT,
                        'value' => 10,
                        'cards' => 3
                    ],
                ]
            ]
        ],
        Glossary::CARD_DOPPELGANGER => [
            'suit' => Glossary::SUIT_WILD,
            'base_strength' => 0,
            'bonus' => [
                'action' => Glossary::ACTION_DUPLICATE
            ]
        ],
        Glossary::CARD_DRAGON => [
            'suit' => Glossary::SUIT_BEAST,
            'base_strength' => 30,
            'penalty' => [
                'action' => Glossary::ACTION_UNLESS_AT_LEAST,
                'value' => 40,
                'suits' => [
                    Glossary::SUIT_WIZARD
                ]
            ],
        ],
        Glossary::CARD_DWARVISH_INFANTRY => [
            'suit' => Glossary::SUIT_ARMY,
            'base_strength' => 15,
            'penalty' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 2,
                'suits' => [
                    Glossary::SUIT_ARMY
                ]
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
                'suits' => [
                    Glossary::SUIT_FLAME,
                    Glossary::SUIT_FLOOD,
                    Glossary::SUIT_LAND,
                    Glossary::SUIT_WEATHER,
                ]
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
                'cards' => [
                    Glossary::CARD_ELVEN_ARCHERS,
                    Glossary::CARD_WARLORD,
                    Glossary::CARD_BEASTMASTER
                ]
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
            'bonus' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 12,
                'suits' => [
                    Glossary::SUIT_BEAST
                ],
                'cards' => [
                    Glossary::CARD_ELVEN_ARCHERS
                ]
            ]
        ],
        Glossary::CARD_FORGE => [
            'suit' => Glossary::SUIT_FLAME,
            'base_strength' => 9,
            'bonus' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 9,
                'suits' => [
                    Glossary::SUIT_WEAPON,
                    Glossary::SUIT_ARTIFACT
                ]
            ],
        ],
        Glossary::CARD_FOUNTAIN_OF_LIFE => [
            'suit' => Glossary::SUIT_FLOOD,
            'base_strength' => 1,
            'bonus' => [
                'action' => Glossary::ACTION_ADD_BASE_STRENGTH_AMONG,
                'suits' => [
                    Glossary::SUIT_FLAME,
                    Glossary::SUIT_FLOOD,
                    Glossary::SUIT_LAND,
                    Glossary::SUIT_WEAPON,
                    Glossary::SUIT_WEATHER
                ]
            ]
        ],
        Glossary::CARD_GEM_OF_ORDER => [
            'suit' => Glossary::SUIT_ARTIFACT,
            'base_strength' => 5,
            'bonus' => [
                'or' => [
                    [
                        'action' => Glossary::ACTION_CARD_RUN,
                        'value' => 150,
                        'cards' => 7
                    ],
                    [
                        'action' => Glossary::ACTION_CARD_RUN,
                        'value' => 100,
                        'cards' => 6
                    ],
                    [
                        'action' => Glossary::ACTION_CARD_RUN,
                        'value' => 60,
                        'cards' => 5
                    ],
                    [
                        'action' => Glossary::ACTION_CARD_RUN,
                        'value' => 30,
                        'cards' => 4
                    ],
                    [
                        'action' => Glossary::ACTION_CARD_RUN,
                        'value' => 10,
                        'cards' => 3
                    ],
                ]
            ]
        ],
        Glossary::CARD_GREAT_FLOOD => [
            'suit' => Glossary::SUIT_FLOOD,
            'base_strength' => 32,
            'penalty' => [
                'action' => Glossary::ACTION_BLANKS,
                'targets' => [
                    'suits' => [
                        Glossary::SUIT_ARMY,
                        Glossary::SUIT_LAND,
                        Glossary::SUIT_FLAME
                    ],
                ],
                'excludes' => [
                    'cards' => [
                        Glossary::CARD_MOUNTAIN,
                        Glossary::CARD_LIGHTNING
                    ]
                ]
            ]
        ],
        Glossary::CARD_HYDRA => [
            'suit' => Glossary::SUIT_BEAST,
            'base_strength' => 12,
            'bonus' => [
                'action' => Glossary::ACTION_WITH_CARD,
                'value' => 28,
                'cards' => [
                    Glossary::CARD_SWAMP
                ]
            ],
        ],
        Glossary::CARD_KING => [
            'suit' => Glossary::SUIT_LEADER,
            'base_strength' => 8,
            'bonus' => [
                'or' => [
                    [
                        'action' => Glossary::ACTION_FOR_EACH,
                        'value' => 20,
                        'suits' => [
                            Glossary::SUIT_ARMY
                        ],
                        'cards' => [
                            Glossary::CARD_QUEEN
                        ]
                    ],
                    [
                        'action' => Glossary::ACTION_FOR_EACH,
                        'value' => 5,
                        'suits' => [
                            Glossary::SUIT_ARMY
                        ]
                    ]
                ]
            ]
        ],
        Glossary::CARD_ISLAND => [
            'suit' => Glossary::SUIT_FLOOD,
            'base_strength' => 14,
            'bonus' => [
                'action' => Glossary::ACTION_CLEARS_PENALTY,
                'suits' => [
                    Glossary::SUIT_FLOOD,
                    Glossary::SUIT_FLAME
                ]
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
                'action' => Glossary::ACTION_TAKE_ON_NAME_AND_SUIT,
                'suits' => [
                    Glossary::SUIT_ARMY,
                    Glossary::SUIT_LAND,
                    Glossary::SUIT_WEATHER,
                    Glossary::SUIT_FLOOD,
                    Glossary::SUIT_FLAME
                ]
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
                'action' => Glossary::ACTION_TAKE_ONE_MORE_CARD_AT_END,
                'suits' => [
                    Glossary::SUIT_ARMY,
                    Glossary::SUIT_LEADER,
                    Glossary::SUIT_WIZARD,
                    Glossary::SUIT_BEAST
                ]
            ]
        ],
        Glossary::CARD_PRINCESS => [
            'suit' => Glossary::SUIT_LEADER,
            'base_strength' => 2,
            'bonus' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 8,
                'suits' => [
                    Glossary::SUIT_ARMY,
                    Glossary::SUIT_WIZARD,
                    Glossary::SUIT_LEADER
                ]
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
                        'value' => 20,
                        'suits' => [
                            Glossary::SUIT_ARMY
                        ],
                        'cards' => [
                            Glossary::CARD_KING
                        ]
                    ],
                    [
                        'action' => Glossary::ACTION_FOR_EACH,
                        'value' => 5,
                        'suits' => [
                            Glossary::SUIT_ARMY
                        ]
                    ],
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
                        'action' => Glossary::ACTION_CLEARS_WORD_FROM_PENALTY,
                        'word' => Glossary::SUIT_ARMY
                    ]
                ]
            ]
        ],
        Glossary::CARD_SHAPESHIFTER => [
            'suit' => Glossary::SUIT_WILD,
            'base_strength' => 0,
            'bonus' => [
                'action' => Glossary::ACTION_TAKE_ON_NAME_AND_SUIT,
                'suits' => [Glossary::SUIT_ARTIFACT, Glossary::SUIT_LEADER, Glossary::SUIT_WIZARD, Glossary::SUIT_WEAPON, Glossary::SUIT_BEAST]
            ],
        ],
        Glossary::CARD_SHIELD_OF_KETH => [
            'suit' => Glossary::SUIT_ARTIFACT,
            'base_strength' => 4,
            'bonus' => [
                'or' => [
                    [
                        'action' => Glossary::ACTION_WITH_BOTH_CARDS,
                        'value' => 40,
                        'suits' => [
                            Glossary::SUIT_LEADER
                        ],
                        'cards' => [
                            Glossary::CARD_SWORD_OF_KETH
                        ]
                    ],
                    [
                        'action' => Glossary::ACTION_WITH_ANY_ONE_SUIT,
                        'value' => 15,
                        'suits' => [
                            Glossary::SUIT_LEADER
                        ],
                    ],
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
                        'action' => Glossary::ACTION_WITH_BOTH_CARDS,
                        'value' => 40,
                        'suits' => [
                            Glossary::SUIT_LEADER
                        ],
                        'cards' => [
                            Glossary::CARD_SHIELD_OF_KETH
                        ]
                    ],
                    [
                        'action' => Glossary::ACTION_WITH_ANY_ONE_SUIT,
                        'value' => 10,
                        'suits' => [
                            Glossary::SUIT_LEADER
                        ],
                    ],
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
                        'cards' => [
                            Glossary::CARD_PRINCESS
                        ]
                    ],
                    [
                        'action' => Glossary::ACTION_WITH_CARD,
                        'value' => 15,
                        'cards' => [
                            Glossary::CARD_EMPRESS,
                            Glossary::CARD_QUEEN,
                            Glossary::CARD_ELEMENTAL_ENCHANTRESS
                        ]
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
                'suits' => [
                    Glossary::SUIT_LEADER,
                    Glossary::SUIT_WIZARD
                ]
            ]
        ],
        Glossary::CARD_WARLOCK_LORD => [
            'suit' => Glossary::SUIT_WIZARD,
            'base_strength' => 25,
            'penalty' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 10,
                'suits' => [
                    Glossary::SUIT_LEADER,
                    Glossary::SUIT_WIZARD
                ]
            ],
        ],
        Glossary::CARD_WARSHIP => [
            'suit' => Glossary::SUIT_WEAPON,
            'base_strength' => 23,
            'bonus' => [
                'action' => Glossary::ACTION_CLEARS_WORD_FROM_PENALTY,
                'word' => Glossary::SUIT_ARMY,
                'suits' => [
                    Glossary::SUIT_FLOOD
                ]
            ],
            'penalty' => [
                'action' => Glossary::ACTION_BLANKED_UNLESS,
                'suits' => [
                    Glossary::SUIT_FLOOD
                ],
            ]
        ],
        Glossary::CARD_WATER_ELEMENTAL => [
            'suit' => Glossary::SUIT_FLOOD,
            'base_strength' => 4,
            'bonus' => [
                'action' => Glossary::ACTION_FOR_EACH,
                'value' => 15,
                'suits' => [
                    Glossary::SUIT_FLOOD
                ]
            ]
        ],
        Glossary::CARD_WHIRLWIND => [
            'suit' => Glossary::SUIT_WEATHER,
            'base_strength' => 13,
            'bonus' => [
                'action' => Glossary::ACTION_WITH_CARD_AND_EITHER,
                'value' => 40,
                'cards' => [Glossary::CARD_RAINSTORM],
                'either' => [Glossary::CARD_BLIZZARD, Glossary::CARD_GREAT_FLOOD]
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
                'action' => Glossary::ACTION_EACH_ACTIVE_CARD_IS_DIFFERENT_SUIT,
                'value' => 50
            ],
        ],
    ]
];

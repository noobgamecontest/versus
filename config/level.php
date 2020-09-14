<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Les différents palier d'elo
    |--------------------------------------------------------------------------
    |
    | Affecte la vitesse de gain d'elo.
    |
    */

    'levels' => [
        [
            'range' => range(0, 499),
            'speed' => 120,
            'name'  => 'iron',
        ],
        [
            'range' => range(500, 999),
            'speed' => 100,
            'name'  => 'bronze',
        ],
        [
            'range' => range(999, 1499),
            'speed' => 80,
            'name'  => 'silver',
        ],
        [
            'range' => range(1500, 1999),
            'speed' => 50,
            'name'  => 'gold',
        ],
        [
            'range' => range(2000, 2499),
            'speed' => 30,
            'name'  => 'platinum',
        ],
        [
            'range' => range(2499, 9999),
            'speed' => 20,
            'name'  => 'diamond',
        ],
    ],
];

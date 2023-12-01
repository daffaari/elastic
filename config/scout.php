<?php

return [

    'driver' => env('SCOUT_DRIVER', 'elasticsearch'),

    'elasticsearch' => [
        'index' => env('ELASTICSEARCH_INDEX', 'default'),
        'config' => [
            'hosts' => [
                env('ELASTICSEARCH_HOST', 'http://localhost:9200'),
            ],
        ],
    ],
    'queue' => true,

];

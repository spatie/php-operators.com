<?php

use App\Sheets\OperatorsContentParser;
use App\Sheets\OperatorsPathParser;

return [
    'default_collection' => 'operators',

    'collections' => [
        'operators' => [
            'disk' => 'content',
            'path_parser' => OperatorsPathParser::class,
            'content_parser' => OperatorsContentParser::class,
        ],
    ],
];

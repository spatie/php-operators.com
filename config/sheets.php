<?php

return [
    'default_collection' => 'operators',

    'collections' => [
        'operators' => [
            'disk' => 'content',
            'path_parser' => App\Sheets\OperatorsPathParser::class,
            'content_parser' => Spatie\Sheets\ContentParsers\MarkdownWithFrontMatterParser::class,
        ],
    ],
];

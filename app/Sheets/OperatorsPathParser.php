<?php

namespace App\Sheets;

use Exception;
use Spatie\Sheets\PathParser;

class OperatorsPathParser implements PathParser
{

    public function parse(string $path): array
    {
        $parts = explode('-', substr($path, 0, -3), 3);

        return [
            'category' => $parts[0],
            'index' => (int) ($parts[1] ?? throw new Exception('Invalid path: ' . $path)),
            'slug' => $parts[2] ?? throw new Exception('Missing slug: ' . $path),
        ];
    }
}

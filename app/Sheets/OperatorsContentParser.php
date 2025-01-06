<?php

namespace App\Sheets;

use Illuminate\Support\HtmlString;
use Spatie\Sheets\ContentParsers\MarkdownWithFrontMatterParser;
use Tempest\Highlight\Highlighter;

class OperatorsContentParser extends MarkdownWithFrontMatterParser
{
    public function parse(string $contents): array
    {
        $parsed = parent::parse($contents);

        $contents = $parsed['contents'] ?? '';

        $codePosition = strpos($contents, '<pre>');
        $contentsWithoutCode = substr($contents, 0, $codePosition);

        $code = resolve(Highlighter::class)->parse(strip_tags(substr($contents, $codePosition)), 'php');

        return [
            ...$parsed,
            'code' => new HtmlString($code),
            'contents' => new HtmlString($contentsWithoutCode),
        ];
    }
}

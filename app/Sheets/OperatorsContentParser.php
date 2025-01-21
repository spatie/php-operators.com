<?php

namespace App\Sheets;

use Exception;
use Illuminate\Support\HtmlString;
use Spatie\Sheets\ContentParsers\MarkdownWithFrontMatterParser;
use Tempest\Highlight\Highlighter;

class OperatorsContentParser extends MarkdownWithFrontMatterParser
{
    public function parse(string $contents): array
    {
        $parsed = parent::parse($contents);

        $contents = $parsed['contents'] ?? '';

        if (substr_count($contents, '<pre>') > 1) {
            throw new Exception('Invalid contents. Contents may only contain one code snippet. Contents: '.$contents);
        }

        $codePosition = strpos($contents, '<pre>');

        if ($codePosition === false) {
            return [
                ...$parsed,
                'code' => new HtmlString(''),
                'contents' => new HtmlString($contents),
            ];
        }

        $descriptionContents = substr($contents, 0, $codePosition);
        $codeContents = substr($contents, $codePosition);

        if (trim($codeContents) && ! str_ends_with(trim($codeContents), '</pre>')) {
            throw new Exception('Invalid contents. Contents must contain a description and end with a code snippet. Contents: '.$contents);
        }

        $highlightedCode = resolve(Highlighter::class)->parse(strip_tags($codeContents), 'php');

        return [
            ...$parsed,
            'code' => new HtmlString($highlightedCode),
            'contents' => new HtmlString($descriptionContents),
        ];
    }
}

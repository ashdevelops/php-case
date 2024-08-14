<?php

declare(strict_types=1);

namespace CaseConverter\Converters;

use CaseConverter\CaseType;

class DotCaseConverter implements ConverterInterface
{
    public function convert(string $string, CaseType $type): string
    {
        return match ($type) {
            CaseType::Camel => $this->convertFromCamel($string),
            CaseType::Pascal => $this->convertFromPascal($string),
            CaseType::Kebab => $this->convertFromKebab($string),
            CaseType::Snake => $this->convertFromSnake($string),
            default => $string
        };
    }

    public function convertFromCamel(string $string): string
    {
        $rebuiltString = '';

        foreach (str_split($string) as $piece) {
            $rebuiltString .= ctype_upper($piece) ? '.' . $piece : $piece;
        }

        return strtolower($rebuiltString);
    }

    public function convertFromPascal(string $string): string
    {
        $rebuiltString = '';

        foreach (str_split($string) as $key => $piece) {
            $rebuiltString .= (ctype_upper($piece) && $key > 0) ?
                '.' . $piece :
                $piece;
        }

        return strtolower($rebuiltString);
    }

    public function convertFromKebab(string $string): string
    {
        return str_replace('-', '.', $string);
    }

    public function convertFromSnake(string $string): string
    {
        return str_replace('_', '.', $string);
    }
}

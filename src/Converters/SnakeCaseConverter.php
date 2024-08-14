<?php

namespace CaseConverter\Converters;

use CaseConverter\CaseType;

class SnakeCaseConverter implements ConverterInterface
{
    public function convert(string $string, CaseType $type): string
    {
        return match($type) {
            CaseType::Camel => $this->convertFromCamel($string),
            CaseType::Pascal => $this->convertFromPascal($string),
            CaseType::Kebab => $this->convertFromKebab($string),
            CaseType::Dot => $this->convertFromDot($string),
            default => $string
        };
    }

    public function convertFromCamel(string $string) : string
    {
        $rebuiltString = '';

        foreach (str_split($string) as $piece) {
            $rebuiltString .= ctype_upper($piece) ? '_' . $piece : $piece;
        }

        return strtolower($rebuiltString);
    }

    public function convertFromPascal(string $string) : string
    {
        $rebuiltString = '';

        foreach (str_split($string) as $key => $piece) {
            $rebuiltString .= (ctype_upper($piece) && $key > 0) ? '_' . $piece : $piece;
        }

        return strtolower($rebuiltString);
    }

    public function convertFromKebab(string $string) : string
    {
        return str_replace('-', '_', $string);
    }

    public function convertFromDot(string $string) : string
    {
        return str_replace('.', '_', $string);
    }
}
<?php

namespace CaseConverter\Converters;

use CaseConverter\CaseType;

class KebabCaseConverter implements ConverterInterface
{
    public function convert(string $string, CaseType $type): string
    {
        return match ($type) {
            CaseType::Camel => $this->convertFromCamel($string),
            CaseType::Pascal => $this->convertFromPascal($string),
            CaseType::Snake => $this->convertFromSnake($string),
            CaseType::Dot => $this->convertFromDot($string),
            default => $string
        };
    }

    public function convertFromCamel(string $string): string
    {
        $rebuiltString = '';

        foreach (str_split($string) as $piece) {
            $rebuiltString .= ctype_upper($piece) ? '-' . $piece : $piece;
        }

        return strtolower($rebuiltString);
    }

    public function convertFromPascal(string $string): string
    {
        $rebuiltString = '';

        foreach (str_split($string) as $key => $piece) {
            $rebuiltString .= (ctype_upper($piece) && $key > 0) ?
                '-' . $piece :
                $piece;
        }

        return strtolower($rebuiltString);
    }

    public function convertFromSnake(string $string): string
    {
        return str_replace('.', '-', $string);
    }

    public function convertFromDot(string $string): string
    {
        return str_replace('.', '-', $string);
    }
}

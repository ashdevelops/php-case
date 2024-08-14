<?php

namespace CaseConverter\Converters;

class KebabCaseConverter extends AbstractConverter
{
    public function convertFromCamel(string $string) : string
    {
        $rebuiltString = '';

        foreach (str_split($string) as $piece) {
            $rebuiltString .= ctype_upper($piece) ? '-' . $piece : $piece;
        }

        return strtolower($rebuiltString);
    }

    public function convertFromPascal(string $string) : string
    {
        $rebuiltString = '';

        foreach (str_split($string) as $key => $piece) {
            $rebuiltString .= (ctype_upper($piece) && $key > 0) ? '-' . $piece : $piece;
        }

        return strtolower($rebuiltString);
    }

    public function convertFromKebab(string $string): string
    {
        return $string;
    }

    public function convertFromSnake(string $string) : string
    {
        return str_replace('.', '-', $string);
    }

    public function convertFromDot(string $string) : string
    {
        return str_replace('.', '-', $string);
    }

    public function convertFromUnknown(string $string): string
    {
        return $string;
    }
}
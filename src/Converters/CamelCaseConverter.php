<?php

namespace CaseConverter\Converters;

class CamelCaseConverter extends AbstractConverter
{
    public function convertFromCamel(string $string) : string
    {
        return $string;
    }

    public function convertFromPascal(string $string) : string
    {
        return strtolower($string[0]) . substr($string, 1);
    }

    public function convertFromKebab(string $string) : string
    {
        $rebuiltString = '';

        foreach (explode("-", $string) as $key => $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= $key > 0 ? ucfirst($piece) : $piece;
        }

        return $rebuiltString;
    }

    public function convertFromSnake(string $string) : string
    {
        $rebuiltString = '';

        foreach (explode("_", $string) as $key => $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= $key > 0 ? ucfirst($piece) : $piece;
        }

        return $rebuiltString;
    }

    public function convertFromDot(string $string) : string
    {
        $rebuiltString = '';

        foreach (explode(".", $string) as $key => $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= $key > 0 ? ucfirst($piece) : $piece;
        }

        return $rebuiltString;
    }

    public function convertFromUnknown(string $string) : string
    {
        return $string;
    }
}
<?php

namespace CaseConverter\Converters;

class PascalCaseConverter extends AbstractConverter
{
    public function convertFromCamel(string $string) : string
    {
        return strtoupper($string[0]) . substr($string, 1);
    }

    public function convertFromPascal(string $string): string
    {
        return $string;
    }

    public function convertFromKebab(string $string) : string
    {
        $rebuiltString = '';

        foreach (explode("-", $string) as $key => $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= ucfirst($piece);
        }

        return $rebuiltString;
    }

    public function convertFromSnake(string $string) : string
    {
        $rebuiltString = '';

        foreach (explode("_", $string) as $key => $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= ucfirst($piece);
        }

        return $rebuiltString;
    }

    public function convertFromDot(string $string) : string
    {
        $rebuiltString = '';

        foreach (explode(".", $string) as $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= ucfirst($piece);
        }

        return $rebuiltString;
    }

    public function convertFromUnknown(string $string): string
    {
        return $string;
    }
}
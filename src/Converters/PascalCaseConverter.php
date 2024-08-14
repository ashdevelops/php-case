<?php

namespace CaseConverter\Converters;

use CaseConverter\CaseType;

class PascalCaseConverter implements ConverterInterface
{
    public function convert(string $string, CaseType $type): string
    {
        return match ($type) {
            CaseType::Camel => $this->convertFromCamel($string),
            CaseType::Kebab => $this->convertFromKebab($string),
            CaseType::Snake => $this->convertFromSnake($string),
            CaseType::Dot => $this->convertFromDot($string),
            default => $string
        };
    }

    public function convertFromCamel(string $string): string
    {
        return strtoupper($string[0]) . substr($string, 1);
    }

    public function convertFromKebab(string $string): string
    {
        $rebuiltString = '';

        foreach (explode("-", $string) as $key => $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= ucfirst($piece);
        }

        return $rebuiltString;
    }

    public function convertFromSnake(string $string): string
    {
        $rebuiltString = '';

        foreach (explode("_", $string) as $key => $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= ucfirst($piece);
        }

        return $rebuiltString;
    }

    public function convertFromDot(string $string): string
    {
        $rebuiltString = '';

        foreach (explode(".", $string) as $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= ucfirst($piece);
        }

        return $rebuiltString;
    }
}

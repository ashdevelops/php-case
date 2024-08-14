<?php

namespace CaseConverter\Converters;

use CaseConverter\CaseType;

class CamelCaseConverter implements ConverterInterface
{
    public function convert(string $string, CaseType $type): string
    {
        return match ($type) {
            CaseType::Pascal => $this->convertFromPascal($string),
            CaseType::Kebab => $this->convertFromKebab($string),
            CaseType::Snake => $this->convertFromSnake($string),
            CaseType::Dot => $this->convertFromDot($string),
            default => $string
        };
    }

    private function convertFromPascal(string $string): string
    {
        return strtolower($string[0]) . substr($string, 1);
    }

    private function convertFromKebab(string $string): string
    {
        $rebuiltString = '';

        foreach (explode("-", $string) as $key => $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= $key > 0 ? ucfirst($piece) : $piece;
        }

        return $rebuiltString;
    }

    private function convertFromSnake(string $string): string
    {
        $rebuiltString = '';

        foreach (explode("_", $string) as $key => $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= $key > 0 ? ucfirst($piece) : $piece;
        }

        return $rebuiltString;
    }

    private function convertFromDot(string $string): string
    {
        $rebuiltString = '';

        foreach (explode(".", $string) as $key => $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= $key > 0 ? ucfirst($piece) : $piece;
        }

        return $rebuiltString;
    }
}

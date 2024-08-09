<?php

namespace CaseConverter\Encoders;

class PascalCaseEncoder extends AbstractEncoder
{
    public function encodeFromCamel(string $string) : string
    {
        return strtoupper($string[0]) . substr($string, 1);
    }

    public function encodeFromPascal(string $string): string
    {
        return $string;
    }

    public function encodeFromKebab(string $string) : string
    {
        $rebuiltString = '';

        foreach (explode("-", $string) as $key => $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= ucfirst($piece);
        }

        return $rebuiltString;
    }

    public function encodeFromSnake(string $string) : string
    {
        $rebuiltString = '';

        foreach (explode("_", $string) as $key => $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= ucfirst($piece);
        }

        return $rebuiltString;
    }

    public function encodeFromDot(string $string) : string
    {
        $rebuiltString = '';

        foreach (explode(".", $string) as $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= ucfirst($piece);
        }

        return $rebuiltString;
    }

    public function encodeFromUnknown(string $string): string
    {
        return $string;
    }
}
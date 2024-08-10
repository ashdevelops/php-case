<?php

namespace CaseConverter\Encoders;

class CamelCaseEncoder extends AbstractEncoder
{
    public function encodeFromCamel(string $string) : string
    {
        return $string;
    }

    public function encodeFromPascal(string $string) : string
    {
        return strtolower($string[0]) . substr($string, 1);
    }

    public function encodeFromKebab(string $string) : string
    {
        $rebuiltString = '';

        foreach (explode("-", $string) as $key => $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= $key > 0 ? ucfirst($piece) : $piece;
        }

        return $rebuiltString;
    }

    public function encodeFromSnake(string $string) : string
    {
        $rebuiltString = '';

        foreach (explode("_", $string) as $key => $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= $key > 0 ? ucfirst($piece) : $piece;
        }

        return $rebuiltString;
    }

    public function encodeFromDot(string $string) : string
    {
        $rebuiltString = '';

        foreach (explode(".", $string) as $key => $piece) {
            $piece = strtolower($piece);
            $rebuiltString .= $key > 0 ? ucfirst($piece) : $piece;
        }

        return $rebuiltString;
    }

    public function encodeFromUnknown(string $string) : string
    {
        return $string;
    }
}
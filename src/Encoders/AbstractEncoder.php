<?php

namespace CaseConverter\Encoders;

use CaseConverter\CaseType;

abstract class AbstractEncoder implements Encoder {
    public function encode(string $string, int $currentType): string
    {
        switch (CaseType::from($currentType)) {
            case CaseType::Camel:
                return $this->encodeFromCamel($string);
            case CaseType::Pascal:
                return $this->encodeFromPascal($string);
            case CaseType::Kebab:
                return $this->encodeFromKebab($string);
            case CaseType::Snake:
                return $this->encodeFromSnake($string);
            case CaseType::Dot:
                return $this->encodeFromDot($string);
            default:
                return $this->encodeFromUnknown($string);
        }
    }

    abstract function encodeFromCamel(string $string) : string;
    abstract function encodeFromPascal(string $string) : string;
    abstract function encodeFromKebab(string $string) : string;
    abstract function encodeFromSnake(string $string) : string;
    abstract function encodeFromDot(string $string) : string;
    abstract function encodeFromUnknown(string $string) : string;
}
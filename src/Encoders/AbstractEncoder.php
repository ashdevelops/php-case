<?php

namespace CaseConverter\Encoders;

use CaseConverter\CaseType;

abstract class AbstractEncoder implements Encoder {
    public function encode(string $string, int $currentType): string
    {
        return match (CaseType::from($currentType)) {
            CaseType::Camel => $this->encodeFromCamel($string),
            CaseType::Pascal => $this->encodeFromPascal($string),
            CaseType::Kebab => $this->encodeFromKebab($string),
            CaseType::Snake => $this->encodeFromSnake($string),
            CaseType::Dot => $this->encodeFromDot($string),
            default => $this->encodeFromUnknown($string),
        };
    }

    abstract function encodeFromCamel(string $string) : string;
    abstract function encodeFromPascal(string $string) : string;
    abstract function encodeFromKebab(string $string) : string;
    abstract function encodeFromSnake(string $string) : string;
    abstract function encodeFromDot(string $string) : string;
    abstract function encodeFromUnknown(string $string) : string;
}
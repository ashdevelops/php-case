<?php

namespace CaseConverter\Converters;

use CaseConverter\CaseType;

abstract class AbstractConverter implements ConverterInterface
{
    public function convert(string $string, int $currentType): string
    {
        return match (CaseType::from($currentType)) {
            CaseType::Camel => $this->convertFromCamel($string),
            CaseType::Pascal => $this->convertFromPascal($string),
            CaseType::Kebab => $this->convertFromKebab($string),
            CaseType::Snake => $this->convertFromSnake($string),
            CaseType::Dot => $this->convertFromDot($string),
            default => $this->convertFromUnknown($string),
        };
    }

    abstract function convertFromCamel(string $string) : string;
    abstract function convertFromPascal(string $string) : string;
    abstract function convertFromKebab(string $string) : string;
    abstract function convertFromSnake(string $string) : string;
    abstract function convertFromDot(string $string) : string;
    abstract function convertFromUnknown(string $string) : string;
}
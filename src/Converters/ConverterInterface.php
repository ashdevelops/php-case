<?php

namespace CaseConverter\Converters;

interface ConverterInterface
{
    public function convert(string $string, int $currentType) : string;
}
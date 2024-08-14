<?php

declare(strict_types=1);

namespace CaseConverter\Converters;

use CaseConverter\CaseType;

interface ConverterInterface
{
    public function convert(string $string, CaseType $type): string;
}

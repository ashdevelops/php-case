<?php

declare(strict_types=1);

namespace CaseConverter\Validators;

use CaseConverter\CaseType;

class SnakeCaseValidator implements ValidatorInterface
{
    public const CASE = CaseType::Snake;

    public function isValid(string $string): bool
    {
        return str_contains($string, '_') &&
            containsCharsOtherThan($string, '_') &&
            substr($string, 0, strlen($string)) != '_' &&
            substr($string, - strlen($string)) != '_';
    }
}

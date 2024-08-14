<?php

namespace CaseConverter\Validators;

use CaseConverter\CaseType;

class SnakeCaseValidator implements ValidatorInterface
{
    const CASE = CaseType::Snake;

    public function isValid(string $string): bool
    {
        return str_contains($string, '_') &&
            containsCharsOtherThan($string, '_') &&
            substr($string, 0, strlen($string)) != '_' &&
            substr($string, - strlen($string)) != '_';
    }
}
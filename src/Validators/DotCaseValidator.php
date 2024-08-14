<?php

namespace CaseConverter\Validators;

use CaseConverter\CaseType;

class DotCaseValidator implements ValidatorInterface
{
    const CASE = CaseType::Dot;

    public function isValid(string $string): bool
    {
        return str_contains($string, '.') &&
            containsCharsOtherThan($string, '.') &&
            substr($string, 0, strlen($string)) != '.' &&
            substr($string, - strlen($string)) != '.';
    }
}
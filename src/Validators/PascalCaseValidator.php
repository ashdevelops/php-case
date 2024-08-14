<?php

namespace CaseConverter\Validators;

use CaseConverter\CaseType;

class PascalCaseValidator implements ValidatorInterface
{
    const CASE = CaseType::Pascal;

    public function isValid(string $string): bool
    {
        return ctype_upper($string[0]) &&
            !repeatsUppercaseChars($string) &&
            hasLowerChars($string) &&
            !ctype_upper(substr($string, strlen($string) - 1));
    }
}
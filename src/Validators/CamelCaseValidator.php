<?php

declare(strict_types=1);

namespace CaseConverter\Validators;

use CaseConverter\CaseType;

class CamelCaseValidator implements ValidatorInterface
{
    public const CASE = CaseType::Camel;

    public function isValid(string $string): bool
    {
        return !ctype_upper($string[0])
            && !repeatsUppercaseChars($string)
            && hasUpperChars($string)
            && !ctype_upper(substr($string, strlen($string) - 1));
    }
}

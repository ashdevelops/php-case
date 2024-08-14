<?php

declare(strict_types=1);

namespace CaseConverter\Validators;

use CaseConverter\CaseType;

interface ValidatorInterface
{
    public const CASE = CaseType::Unknown;
    public function isValid(string $string): bool;
}

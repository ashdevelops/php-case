<?php

namespace CaseConverter\Validators;

use CaseConverter\CaseType;

interface ValidatorInterface
{
    const CASE = CaseType::Unknown;
    public function isValid(string $string): bool;
}
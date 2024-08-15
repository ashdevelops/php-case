<?php

declare(strict_types=1);

namespace CaseConverter;

function containsCharsOtherThan(string $string, string $needle): bool
{
    return preg_match('/[' . preg_quote($needle) . ']/', $string) === 1;
}

function hasLowerChars(string $string): bool
{
    return preg_match('/[a-z]/', $string) === 1;
}

function hasUpperChars(string $string): bool
{
    return preg_match('/[A-Z]/', $string) === 1;
}

function repeatsUppercaseChars(string $string): bool
{
    return preg_match('/[A-Z]{2,}/', $string) === 1;
}

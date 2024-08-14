<?php

function isCamelCase(string $string) : bool
{
    return !ctype_upper($string[0]) &&
        !repeatsUppercaseChars($string) &&
        hasUpperChars($string) &&
        !ctype_upper(substr($string, strlen($string) - 1));
}

function isPascalCase(string $string) : bool
{
    return ctype_upper($string[0]) &&
        !repeatsUppercaseChars($string) &&
        hasLowerChars($string) &&
        !ctype_upper(substr($string, strlen($string) - 1));
}

function isKebabCase(string $string) : bool
{
    return str_contains($string, '-') &&
        containsCharsOtherThan($string, '-') &&
        substr($string, 0, strlen($string)) != '-' &&
        substr($string, - strlen($string)) != '-';
}

function isSnakeCase(string $string) : bool
{
    return str_contains($string, '_') &&
        containsCharsOtherThan($string, '_') &&
        substr($string, 0, strlen($string)) != '_' &&
        substr($string, - strlen($string)) != '_';
}

function isDotCase(string $string) : bool
{
    return str_contains($string, '.') &&
        containsCharsOtherThan($string, '.') &&
        substr($string, 0, strlen($string)) != '.' &&
        substr($string, - strlen($string)) != '.';
}

function containsCharsOtherThan(string $string, string $needle) : bool
{
    return preg_match('/[^' . $needle . ']/', $string);
}

function hasLowerChars(string $string) : bool
{
    return preg_match('/[a-z]/', $string);
}

function hasUpperChars(string $string) : bool
{
    return preg_match('/[A-Z]/', $string);
}

function repeatsUppercaseChars(string $string) : bool
{
    $foundUppercaseLast = false;

    foreach (str_split($string) as $character) {
        if (ctype_upper($character)) {
            if ($foundUppercaseLast) {
                return true;
            }

            $foundUppercaseLast = true;
        } else {
            $foundUppercaseLast = false;
        }
    }

    return false;
}
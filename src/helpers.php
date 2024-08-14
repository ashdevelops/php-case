<?php

function containsCharsOtherThan(string $string, string $needle): false|int
{
    return preg_match('/[^' . $needle . ']/', $string);
}

function hasLowerChars(string $string): false|int
{
    return preg_match('/[a-z]/', $string);
}

function hasUpperChars(string $string): false|int
{
    return preg_match('/[A-Z]/', $string);
}

function repeatsUppercaseChars(string $string): bool
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

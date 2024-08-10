<?php

function is_camel_case(string $string) : bool
{
    return !ctype_upper($string[0]) &&
        !repeats_uppercase_chars($string) &&
        has_upper_chars($string) &&
        !ctype_upper(substr($string, strlen($string) - 1));
}

function is_pascal_case(string $string) : bool
{
    return ctype_upper($string[0]) &&
        !repeats_uppercase_chars($string) &&
        has_lower_chars($string) &&
        !ctype_upper(substr($string, strlen($string) - 1));
}

function is_kebab_case(string $string) : bool
{
    return str_contains($string, '-') &&
        contains_chars_other_than($string, '-') &&
        substr($string, 0, strlen($string)) != '-' &&
        substr($string, - strlen($string)) != '-';
}

function is_snake_case(string $string) : bool
{
    return str_contains($string, '_') &&
        contains_chars_other_than($string, '_') &&
        substr($string, 0, strlen($string)) != '_' &&
        substr($string, - strlen($string)) != '_';
}

function is_dot_case(string $string) : bool
{
    return str_contains($string, '.') &&
        contains_chars_other_than($string, '.') &&
        substr($string, 0, strlen($string)) != '.' &&
        substr($string, - strlen($string)) != '.';
}

function contains_chars_other_than(string $string, string $needle) : bool
{
    return preg_match('/[^' . $needle . ']/', $string);
}

function has_lower_chars(string $string) : bool
{
    return preg_match('/[a-z]/', $string);
}

function has_upper_chars(string $string) : bool
{
    return preg_match('/[A-Z]/', $string);
}

function repeats_uppercase_chars(string $string) : bool {
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
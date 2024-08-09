<?php

namespace CaseConverter;

class Helpers {
    public static function isCamelCase(string $string) : bool
    {
        return !ctype_upper($string[0]) &&
            !self::hasRepeatedUppercaseLetters($string) &&
            self::containsUppercaseCharacters($string) &&
            !ctype_upper(substr($string, strlen($string) - 1));
    }

    public static function isPascalCase(string $string) : bool
    {
        return ctype_upper($string[0]) &&
            !self::hasRepeatedUppercaseLetters($string) &&
            self::containsLowercaseCharacters($string) &&
            !ctype_upper(substr($string, strlen($string) - 1));
    }

    public static function isKebabCase(string $string) : bool
    {
        return str_contains($string, '-') &&
            self::containsCharacterOtherThan($string, '-') &&
            substr($string, 0, strlen($string)) != '-' &&
            substr($string, - strlen($string)) != '-';
    }

    public static function isSnakeCase(string $string) : bool
    {
        return str_contains($string, '_') &&
            self::containsCharacterOtherThan($string, '_') &&
            substr($string, 0, strlen($string)) != '_' &&
            substr($string, - strlen($string)) != '_';
    }

    public static function isDotCase(string $string) : bool
    {
        return str_contains($string, '.') &&
            self::containsCharacterOtherThan($string, '.') &&
            substr($string, 0, strlen($string)) != '.' &&
            substr($string, - strlen($string)) != '.';
    }

    private static function containsCharacterOtherThan(string $string, string $needle) : bool
    {
        return preg_match('/[^' . $needle . ']/', $string);
    }

    private static function containsLowercaseCharacters(string $string) : bool
    {
        return preg_match('/[a-z]/', $string);
    }

    private static function containsUppercaseCharacters(string $string) : bool
    {
        return preg_match('/[a-z]/', $string);
    }

    private static function hasRepeatedUppercaseLetters(string $string) : bool {
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
}
<?php

namespace CaseConverter;

class CaseDetector
{
    public static function detect(string $s) : CaseType
    {
        return match(true) {
            isKebabCase($s) => CaseType::Kebab,
            isSnakeCase($s) => CaseType::Snake,
            isDotCase($s) => CaseType::Dot,
            isCamelCase($s) => CaseType::Camel,
            isPascalCase($s) => CaseType::Pascal,
            default => CaseType::Unknown
        };
    }
}
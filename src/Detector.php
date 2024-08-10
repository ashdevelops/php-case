<?php

namespace CaseConverter;

class Detector {
    public static function detect(string $s) : CaseType {
        return match(true) {
            Helpers::isKebabCase($s) => CaseType::Kebab,
            Helpers::isSnakeCase($s) => CaseType::Snake,
            Helpers::isDotCase($s) => CaseType::Dot,
            Helpers::isCamelCase($s) => CaseType::Camel,
            Helpers::isPascalCase($s) => CaseType::Pascal,
            default => CaseType::Unknown
        };
    }
}
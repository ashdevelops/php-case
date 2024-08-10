<?php

namespace CaseConverter;

class Detector {
    public static function detect(string $s) : CaseType {
        return match(true) {
            is_kebab_case($s) => CaseType::Kebab,
            is_snake_case($s) => CaseType::Snake,
            is_dot_case($s) => CaseType::Dot,
            is_camel_case($s) => CaseType::Camel,
            is_pascal_case($s) => CaseType::Pascal,
            default => CaseType::Unknown
        };
    }
}
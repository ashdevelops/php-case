<?php

namespace CaseConverter;

class Detector {
    public static function detect(string $s) : CaseType {
        if (Helpers::isKebabCase($s)) {
            return CaseType::Kebab;
        } else if (Helpers::isSnakeCase($s)) {
            return CaseType::Snake;
        } else if (Helpers::isDotCase($s)) {
            return CaseType::Dot;
        } else if (Helpers::isCamelCase($s)) {
            return CaseType::Camel;
        } else if (Helpers::isPascalCase($s)) {
            return CaseType::Pascal;
        }

        return CaseType::Unknown;
    }
}
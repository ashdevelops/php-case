<?php

namespace CaseConverter\Converters;

use stdClass;

class CaseConverterFactory {
    public function __construct(private readonly array $converters) {
    }

    public function get(mixed $class): ConverterInterface {
        return $this->converters[$class];
    }
}
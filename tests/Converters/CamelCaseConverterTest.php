<?php

namespace Converters;

use CaseConverter\CaseType;
use CaseConverter\Converters\CamelCaseConverter;
use PHPUnit\Framework\TestCase;

final class CamelCaseConverterTest extends TestCase
{
    private CamelCaseConverter $converter;

    public function setUp(): void
    {
        $this->converter = new CamelCaseConverter();
    }

    public function testConvertFromPascal(): void
    {
        $this->assertEquals(
            'pascalCase',
            $this->converter->convert('PascalCase', CaseType::Pascal)
        );
    }

    public function testConvertFromSnake(): void
    {
        $this->assertEquals(
            'snakeCase',
            $this->converter->convert('snake_case', CaseType::Snake)
        );
    }

    public function testConvertFromKebab(): void
    {
        $this->assertEquals(
            'kebabCase',
            $this->converter->convert('kebab-case', CaseType::Kebab)
        );
    }

    public function testConvertFromDot(): void
    {
        $this->assertEquals(
            'dotCase',
            $this->converter->convert('dot.case', CaseType::Dot)
        );
    }
}

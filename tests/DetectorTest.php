<?php

declare(strict_types=1);

use CaseConverter\CaseDetector;
use CaseConverter\CaseType;
use CaseConverter\Validators\CamelCaseValidator;
use CaseConverter\Validators\DotCaseValidator;
use CaseConverter\Validators\KebabCaseValidator;
use CaseConverter\Validators\PascalCaseValidator;
use CaseConverter\Validators\SnakeCaseValidator;
use PHPUnit\Framework\TestCase;

final class DetectorTest extends TestCase
{
    private CaseDetector $detector;

    public function setUp(): void
    {
        $this->detector = new CaseDetector(
            new PascalCaseValidator(),
            new CamelCaseValidator(),
            new DotCaseValidator(),
            new SnakeCaseValidator(),
            new KebabCaseValidator()
        );
    }

    public function testCamelDetection(): void
    {
        $this->assertSame(
            $this->detector->detect('camelString'),
            CaseType::Camel
        );
    }

    public function testPascalDetection(): void
    {
        $this->assertSame(
            $this->detector->detect('PascalString'),
            CaseType::Pascal
        );
    }

    public function testSnakeDetection(): void
    {
        $this->assertSame(
            $this->detector->detect('snake_string'),
            CaseType::Snake
        );
    }

    public function testKebabDetection(): void
    {
        $this->assertSame(
            $this->detector->detect('kebab-string'),
            CaseType::Kebab
        );
    }

    public function testDotDetection(): void
    {
        $this->assertSame(
            $this->detector->detect('dot.string'),
            CaseType::Dot
        );
    }
}

<?php

use CaseConverter\CaseType;
use CaseConverter\CaseDetector;
use PHPUnit\Framework\TestCase;

final class DetectorTest extends PHPUnit\Framework\TestCase
{
    public function testCamelDetection() : void
    {
        $this->assertSame(CaseDetector::detect('camelString'), CaseType::Camel);
    }

    public function testPascalDetection() : void
    {
        $this->assertSame(CaseDetector::detect('PascalString'), CaseType::Pascal);
    }

    public function testSnakeDetection() : void
    {
        $this->assertSame(CaseDetector::detect('snake_string'), CaseType::Snake);
    }

    public function testKebabDetection() : void
    {
        $this->assertSame(CaseDetector::detect('kebab-string'), CaseType::Kebab);
    }

    public function testDotDetection() : void
    {
        $this->assertSame(CaseDetector::detect('dot.string'), CaseType::Dot);
    }

    public function testUnknownDetection() : void
    {
        $this->assertSame(CaseDetector::detect('unknown'), CaseType::Unknown);
    }
}
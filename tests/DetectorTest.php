<?php

use CaseConverter\CaseType;
use CaseConverter\Detector;
use PHPUnit\Framework\TestCase;

final class DetectorTest extends PHPUnit\Framework\TestCase
{
    public function testCamelDetection() : void
    {
        $this->assertSame(Detector::detect('camelString'), CaseType::Camel); 
    }

    public function testPascalDetection() : void
    {
        $this->assertSame(Detector::detect('PascalString'), CaseType::Pascal); 
    }

    public function testSnakeDetection() : void
    {
        $this->assertSame(Detector::detect('snake_string'), CaseType::Snake); 
    }

    public function testKebabDetection() : void
    {
        $this->assertSame(Detector::detect('kebab-string'), CaseType::Kebab); 
    }

    public function testDotDetection() : void
    {
        $this->assertSame(Detector::detect('dot.string'), CaseType::Dot); 
    }

    public function testUnknownDetection() : void
    {
        $this->assertSame(Detector::detect('unknown'), CaseType::Unknown); 
    }
}
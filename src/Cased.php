<?php

namespace CaseConverter;

use CaseConverter\Encoders\CamelCaseEncoder;
use CaseConverter\Encoders\DotCaseEncoder;
use CaseConverter\Encoders\Encoder;
use CaseConverter\Encoders\KebabCaseEncoder;
use CaseConverter\Encoders\PascalCaseEncoder;
use CaseConverter\Encoders\SnakeCaseEncoder;
use Exception;

class Cased
{
    private $s;
    private array $encoders;

    public function __construct($s)
    {
        $this->s = $s;
        $this->assignEncoders();
    }

    public static function from(string $str): Cased
    {
        return new Cased($str);
    }

    private function assignEncoders()
    {
        $this->registerEncoder('camel', new CamelCaseEncoder());
        $this->registerEncoder('pascal', new PascalCaseEncoder());
        $this->registerEncoder('kebab', new KebabCaseEncoder());
        $this->registerEncoder('snake', new SnakeCaseEncoder());
        $this->registerEncoder('dot', new DotCaseEncoder());
    }

    public function registerEncoder(string $name, Encoder $encoder)
    {
        $this->encoders[$name] = $encoder;
    }

    public function detectCaseType(string $s) : CaseType
    {
        return CaseDetector::detect($s);
    }

    private function isAllowedMagicMethod($methodName)
    {
        return substr($methodName, 0, 2) === "to" &&
            substr($methodName, strlen($methodName) - 4, 4) === "Case" &&
            strlen($methodName) > 6;
    }

    private function getEncoderNameFromMethodName($methodName)
    {
        return str_replace(
            'case', '', strtolower(
                substr($methodName, 2)
            )
        );
    }

    public function __call($name, $arguments)
    {
        return $this->isAllowedMagicMethod($name) ? $this->encodingWith(
            $this->s,
            $this->getEncoderNameFromMethodName($name)
        ) : null;
    }

    /**
     * @throws Exception
     */
    private function encodingWith(string $string, string $encoder) : string
    {
        if (!array_key_exists($encoder, $this->encoders)) {
            throw new Exception("Failed to resolve encoder for '" . $encoder . "'");
        }

        $type = $this->detectCaseType($string);

        return $this->encoders[$encoder]->encode($string, $type->value);
    }
}
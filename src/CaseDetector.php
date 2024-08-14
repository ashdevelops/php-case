<?php

namespace CaseConverter;

use CaseConverter\Validators\ValidatorInterface;

class CaseDetector
{
    private array $validators;

    public function __construct(ValidatorInterface ...$validators) {
        $this->validators = $validators;
    }

    public function detect(string $string): CaseType
    {
        $case = CaseType::Unknown;

        foreach ($this->validators as $validator) {
            $validatorInstance = new $validator;
            if ($validatorInstance->isValid($string)) {
                $case = $validatorInstance::CASE;
                break;
            }
        }

        return $case;
    }
}
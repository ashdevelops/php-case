<?php

namespace CaseConverter;

use CaseConverter\Validators\ValidatorInterface;

class CaseDetector
{
    public function __construct(private ValidatorInterface $validators) {
    }

    public function addValidator(ValidatorInterface $validator): void
    {
        $this->validators[] = $validator;
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
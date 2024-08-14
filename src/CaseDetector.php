<?php

namespace CaseConverter;

use CaseConverter\Validators\ValidatorInterface;

class CaseDetector
{
    public function __construct(private array $validators) {
    }

    public function addValidator(ValidatorInterface $validator): void
    {
        $this->validators[] = $validator;
    }

    public function detect(string $string): CaseType
    {
        $case = CaseType::Unknown;

        foreach ($this->validators as $validator) {
            if ($validator->isValid($string)) {
                $case = $validator::CASE;
                break;
            }
        }

        return $case;
    }
}
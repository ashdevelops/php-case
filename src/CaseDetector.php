<?php

declare(strict_types=1);

namespace CaseConverter;

use CaseConverter\Validators\ValidatorInterface;

class CaseDetector
{
    /**
     * @var array<ValidatorInterface> $validators
     */
    private array $validators;

    public function __construct(ValidatorInterface ...$validators)
    {
        $this->validators = $validators;
    }

    public function detect(string $string): CaseType
    {
        $case = CaseType::Unknown;

        foreach ($this->validators as $validator) {
            $validatorInstance = new $validator();
            if ($validatorInstance->isValid($string)) {
                $case = $validatorInstance::CASE;
                break;
            }
        }

        return $case;
    }
}

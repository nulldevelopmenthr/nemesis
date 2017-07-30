<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see SetUpMethodSpec
 * @see SetUpMethodTest
 */
class SetUpMethod extends SimpleTestMethod implements Method
{
    /** @var ImprovedClassSource */
    private $subjectUnderTest;

    public function __construct(ImprovedClassSource $subjectUnderTest)
    {
        $this->subjectUnderTest = $subjectUnderTest;
    }

    public function getMethodName(): string
    {
        return 'setUp';
    }

    public function getSubjectUnderTest(): ImprovedClassSource
    {
        return $this->subjectUnderTest;
    }

    public function getSubjectUnderTestName(): string
    {
        return $this->subjectUnderTest->getName();
    }

    public function getSubjectUnderTestConstuctorParameters(): array
    {
        return $this->subjectUnderTest->getConstructorParameters();
    }

    public function getSubjectUnderTestConstuctorParametersAsClassTypes(): array
    {
        $result = [];
        foreach ($this->subjectUnderTest->getConstructorParameters() as $param) {
            if (true === $param->hasType()) {
                $result[] = $param->getType();
            }
        }

        return $result;
    }
}
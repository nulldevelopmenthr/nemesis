<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see TestNothingMethodSpec
 * @see TestNothingMethodTest
 */
class TestNothingMethod implements Method
{
    /** @var ImprovedClassSource */
    private $subjectUnderTest;

    public function __construct(ImprovedClassSource $subjectUnderTest)
    {
        $this->subjectUnderTest = $subjectUnderTest;
    }

    public function getParamsAsClassTypes(): array
    {
        return [];
    }

    public function getVisibility(): string
    {
        return 'public';
    }

    public function isStatic(): bool
    {
        return false;
    }

    public function getMethodName(): string
    {
        return 'testNothing';
    }

    public function getMethodParameters(): array
    {
        return [];
    }

    public function hasMethodReturnType(): bool
    {
        return false;
    }

    public function getMethodReturnType(): string
    {
        throw new \Exception("Err 15125124: PHPUnit TestNothingMethod doesn't use return types.");
    }

    public function getSubjectUnderTest(): ImprovedClassSource
    {
        return $this->subjectUnderTest;
    }

    public function getSubjectUnderTestName(): string
    {
        return $this->subjectUnderTest->getName();
    }
}

<?php

declare(strict_types=1);

namespace NullDev\Nemesis\Xxx\PHPUnit\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see SetUpMethodSpec
 * @see SetUpMethodTest
 */
class SetUpMethod implements Method
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
        return 'setUp';
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
        throw new \Exception("Err 235236: PHPUnit SetUpMethod doesn't use return types.");
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

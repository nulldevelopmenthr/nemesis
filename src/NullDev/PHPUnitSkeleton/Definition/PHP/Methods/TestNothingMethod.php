<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Source\ImprovedClassSource;

/**
 * @see TestNothingMethodSpec
 * @see TestNothingMethodTest
 */
class TestNothingMethod extends SimpleTestMethod implements Method
{
    /** @var ImprovedClassSource */
    private $subjectUnderTest;

    public function __construct(ImprovedClassSource $subjectUnderTest)
    {
        $this->subjectUnderTest = $subjectUnderTest;
    }

    public function getMethodName(): string
    {
        return 'testNothing';
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

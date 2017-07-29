<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Methods\Method;

/**
 * @see TestGetterMethodSpec
 * @see TestGetterMethodTest
 */
class TestGetterMethod extends SimpleTestMethod implements Method
{
    /** @var GetterMethod */
    private $methodUnderTest;
    /** @var string */
    private $subjectUnderTestPropertyName;

    public function __construct(GetterMethod $methodUnderTest, string $subjectUnderTestPropertyName)
    {
        $this->methodUnderTest              = $methodUnderTest;
        $this->subjectUnderTestPropertyName = $subjectUnderTestPropertyName;
    }

    public function getMethodName(): string
    {
        return 'test'.ucfirst($this->methodUnderTest->getMethodName());
    }

    public function getGetterMethodName(): string
    {
        return $this->methodUnderTest->getMethodName();
    }

    public function getParameterName(): string
    {
        return $this->methodUnderTest->getPropertyName();
    }

    public function getSubjectUnderTestPropertyName(): string
    {
        return $this->subjectUnderTestPropertyName;
    }
}

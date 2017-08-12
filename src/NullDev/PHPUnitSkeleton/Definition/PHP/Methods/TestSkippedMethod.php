<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\Method;

/**
 * @see TestSkippedMethodSpec
 * @see TestSkippedMethodTest
 */
class TestSkippedMethod extends SimpleTestMethod implements Method
{
    /**
     * @var string
     */
    private $methodUnderTestName;

    public function __construct(string $methodUnderTestName)
    {
        $this->methodUnderTestName = $methodUnderTestName;
    }

    public function getMethodName(): string
    {
        return 'test'.ucfirst($this->methodUnderTestName);
    }
}

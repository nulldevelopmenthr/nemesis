<?php

namespace tests\NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestSkippedMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestSkippedMethod
 * @group  todo
 */
class TestSkippedMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $methodUnderTestName;
    /** @var TestSkippedMethod */
    private $sut;

    public function setUp()
    {
        $this->methodUnderTestName = 'methodUnderTestName';
        $this->sut                 = new TestSkippedMethod($this->methodUnderTestName);
    }

    public function testGetMethodName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetParamsAsClassTypes()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetVisibility()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testIsStatic()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetMethodParameters()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasMethodReturnType()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetMethodReturnType()
    {
        $this->markTestSkipped('Skipping');
    }
}

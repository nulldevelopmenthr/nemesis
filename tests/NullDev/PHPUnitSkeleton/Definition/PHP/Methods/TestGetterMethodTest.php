<?php

declare(strict_types=1);

namespace tests\NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestGetterMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestGetterMethod
 * @group  todo
 */
class TestGetterMethodTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var \Mockery\MockInterface|GetterMethod */
    private $methodUnderTest;
    /** @var string */
    private $subjectUnderTestPropertyName;
    /** @var TestGetterMethod */
    private $testGetterMethod;

    public function setUp()
    {
        $this->methodUnderTest              = Mockery::mock(GetterMethod::class);
        $this->subjectUnderTestPropertyName = 'subjectUnderTestPropertyName';
        $this->testGetterMethod             = new TestGetterMethod($this->methodUnderTest, $this->subjectUnderTestPropertyName);
    }

    public function testGetMethodName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetGetterMethodName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetParameterName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetSubjectUnderTestPropertyName()
    {
        self::assertEquals($this->subjectUnderTestPropertyName, $this->testGetterMethod->getSubjectUnderTestPropertyName());
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

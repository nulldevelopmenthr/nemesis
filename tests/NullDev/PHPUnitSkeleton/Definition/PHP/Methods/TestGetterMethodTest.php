<?php

declare(strict_types=1);

namespace Tests\NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestGetterMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestGetterMethod
 * @group  todo
 */
class TestGetterMethodTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|GetterMethod */
    private $methodUnderTest;
    /** @var string */
    private $subjectUnderTestPropertyName;
    /** @var TestGetterMethod */
    private $sut;

    public function setUp()
    {
        $this->methodUnderTest              = Mockery::mock(GetterMethod::class);
        $this->subjectUnderTestPropertyName = 'subjectUnderTestPropertyName';
        $this->sut                          = new TestGetterMethod($this->methodUnderTest, $this->subjectUnderTestPropertyName);
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
        self::assertEquals($this->subjectUnderTestPropertyName, $this->sut->getSubjectUnderTestPropertyName());
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

<?php

namespace tests\NullDev\Skeleton\Source;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedTestSource;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\Source\ImprovedTestSource
 * @group  todo
 */
class ImprovedTestSourceTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassType */
    private $classType;
    /** @var ImprovedTestSource */
    private $sut;

    public function setUp()
    {
        $this->classType = Mockery::mock(ClassType::class);
        $this->sut       = new ImprovedTestSource($this->classType);
    }

    public function testGetClassType()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasNamespace()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetNamespace()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetFullName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testAddDocComment()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetDocComments()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testAddParent()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasParent()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetParent()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetParentName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetParentFullName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testAddInterface()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasInterfaces()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetInterfaces()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testAddTrait()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasTraits()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetTraits()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasConstructorMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testAddConstructorMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetConstructorMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetConstructorParameters()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasConstructorParameterNamed()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testAddProperty()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetProperties()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasPropertyNamed()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetPropertyNamed()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testAddGetterMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testAddMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetMethods()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testAddImports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testAddImport()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetImports()
    {
        $this->markTestSkipped('Skipping');
    }
}

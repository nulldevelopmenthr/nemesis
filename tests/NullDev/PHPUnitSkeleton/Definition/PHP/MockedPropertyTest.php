<?php

declare(strict_types=1);

namespace tests\NullDev\PHPUnitSkeleton\Definition\PHP;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\PHPUnitSkeleton\Definition\PHP\MockedProperty;
use NullDev\Skeleton\Definition\PHP\Types\Type;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\PHPUnitSkeleton\Definition\PHP\MockedProperty
 * @group  todo
 */
class MockedPropertyTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $name;
    /** @var MockInterface|Type */
    private $type;
    /** @var MockedProperty */
    private $sut;

    public function setUp()
    {
        $this->name = 'name';
        $this->type = Mockery::mock(Type::class);
        $this->sut  = new MockedProperty($this->name, $this->type);
    }

    public function testGetTypeForDocBlock()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromParameter()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetType()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetTypeShortName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetTypeFullName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testHasType()
    {
        $this->markTestSkipped('Skipping');
    }
}

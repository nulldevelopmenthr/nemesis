<?php

namespace tests\NullDev\BroadwaySkeleton\Definition\PHP;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory
 * @group  todo
 */
class DefinitionFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var DefinitionFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new DefinitionFactory();
    }

    public function testCreateConstructorMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateDeserializeMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateSerializeMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateBroadwayModelCreateMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateBroadwayModelAggregateRootIdGetterMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateBroadwayModelRepositoryConstructorMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateReadModelIdGetterMethod()
    {
        $this->markTestSkipped('Skipping');
    }
}

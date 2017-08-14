<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Definition\PHP;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory
 * @group  todo
 */
class DefinitionFactoryTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var DefinitionFactory */
    private $definitionFactory;

    public function setUp()
    {
        $this->definitionFactory = new DefinitionFactory();
    }

    public function testCreateParameter()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateConstructorMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateDeserializeMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateGetterMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateSerializeMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateToStringMethod()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateUuidCreateMethod()
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

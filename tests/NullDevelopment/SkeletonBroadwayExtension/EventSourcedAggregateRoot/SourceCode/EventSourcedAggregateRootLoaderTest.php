<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCode;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCode\EventSourcedAggregateRootLoader;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\ConstructorMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\MethodCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\TraitNameCollectionFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\EventSourcedAggregateRoot\SourceCode\EventSourcedAggregateRootLoader
 * @group  todo
 */
class EventSourcedAggregateRootLoaderTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|InterfaceNameCollectionFactory */
    private $interfaceNameCollectionFactory;

    /** @var MockInterface|TraitNameCollectionFactory */
    private $traitNameCollectionFactory;

    /** @var MockInterface|ConstantCollectionFactory */
    private $constantCollectionFactory;

    /** @var MockInterface|ConstructorMethodFactory */
    private $constructorMethodFactory;

    /** @var MockInterface|PropertyCollectionFactory */
    private $propertyCollectionFactory;

    /** @var MockInterface|MethodCollectionFactory */
    private $methodCollectionFactory;

    /** @var EventSourcedAggregateRootLoader */
    private $sut;

    public function setUp()
    {
        $this->interfaceNameCollectionFactory = Mockery::mock(InterfaceNameCollectionFactory::class);
        $this->traitNameCollectionFactory     = Mockery::mock(TraitNameCollectionFactory::class);
        $this->constantCollectionFactory      = Mockery::mock(ConstantCollectionFactory::class);
        $this->constructorMethodFactory       = Mockery::mock(ConstructorMethodFactory::class);
        $this->propertyCollectionFactory      = Mockery::mock(PropertyCollectionFactory::class);
        $this->methodCollectionFactory        = Mockery::mock(MethodCollectionFactory::class);
        $this->sut                            = new EventSourcedAggregateRootLoader(
            $this->interfaceNameCollectionFactory,
            $this->traitNameCollectionFactory,
            $this->constantCollectionFactory,
            $this->constructorMethodFactory,
            $this->propertyCollectionFactory,
            $this->methodCollectionFactory
        );
    }

    public function testSupports()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testLoad()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetDefaultValues()
    {
        $this->markTestSkipped('Skipping');
    }
}

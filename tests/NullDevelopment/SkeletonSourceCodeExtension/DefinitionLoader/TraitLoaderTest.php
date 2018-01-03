<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\MethodCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\TraitNameCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\TraitLoader;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\TraitLoader
 * @group  todo
 */
class TraitLoaderTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|TraitNameCollectionFactory */
    private $traitNameCollectionFactory;

    /** @var MockInterface|ConstantCollectionFactory */
    private $constantCollectionFactory;

    /** @var MockInterface|PropertyCollectionFactory */
    private $propertyCollectionFactory;

    /** @var MockInterface|MethodCollectionFactory */
    private $methodCollectionFactory;

    /** @var TraitLoader */
    private $sut;

    public function setUp()
    {
        $this->traitNameCollectionFactory = Mockery::mock(TraitNameCollectionFactory::class);
        $this->constantCollectionFactory  = Mockery::mock(ConstantCollectionFactory::class);
        $this->propertyCollectionFactory  = Mockery::mock(PropertyCollectionFactory::class);
        $this->methodCollectionFactory    = Mockery::mock(MethodCollectionFactory::class);
        $this->sut                        = new TraitLoader(
            $this->traitNameCollectionFactory,
            $this->constantCollectionFactory,
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

<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionLoader;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\MethodCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\TraitNameCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\TraitLoader;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionLoader\TraitLoader
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

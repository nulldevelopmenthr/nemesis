<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\MethodCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\InterfaceLoader;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\InterfaceLoader
 * @group  todo
 */
class InterfaceLoaderTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|ConstantCollectionFactory */
    private $constantCollectionFactory;

    /** @var MockInterface|MethodCollectionFactory */
    private $methodCollectionFactory;

    /** @var InterfaceLoader */
    private $sut;

    public function setUp()
    {
        $this->constantCollectionFactory = Mockery::mock(ConstantCollectionFactory::class);
        $this->methodCollectionFactory   = Mockery::mock(MethodCollectionFactory::class);
        $this->sut                       = new InterfaceLoader($this->constantCollectionFactory, $this->methodCollectionFactory);
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

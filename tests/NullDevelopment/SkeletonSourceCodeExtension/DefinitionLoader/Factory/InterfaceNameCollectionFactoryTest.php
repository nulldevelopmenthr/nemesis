<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\InterfaceNameCollectionFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\InterfaceNameCollectionFactory
 * @group  unit
 */
class InterfaceNameCollectionFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var InterfaceNameCollectionFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new InterfaceNameCollectionFactory();
    }

    public function testCreate()
    {
        $input = [
            'MyVendor\SomeInterface',
            'MyVendor\AnotherInterface',
        ];

        $resultCollection = $this->sut->create($input);

        self::assertCount(2, $resultCollection);

        self::assertContainsOnlyInstancesOf(InterfaceName::class, $resultCollection);
    }
}

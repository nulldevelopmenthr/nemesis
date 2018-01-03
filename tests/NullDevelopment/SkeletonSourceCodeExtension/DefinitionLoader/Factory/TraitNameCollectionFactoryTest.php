<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory;

use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\TraitNameCollectionFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\TraitNameCollectionFactory
 * @group  unit
 */
class TraitNameCollectionFactoryTest extends TestCase
{
    /** @var TraitNameCollectionFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new TraitNameCollectionFactory();
    }

    public function testCreate()
    {
        $input = [
            'MyVendor\SomeTrait',
            'MyVendor\AnotherTrait',
        ];

        $resultCollection = $this->sut->create($input);

        self::assertCount(2, $resultCollection);

        self::assertContainsOnlyInstancesOf(TraitName::class, $resultCollection);
    }
}

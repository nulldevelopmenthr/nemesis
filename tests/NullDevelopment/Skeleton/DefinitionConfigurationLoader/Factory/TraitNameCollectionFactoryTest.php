<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory;

use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\TraitNameCollectionFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\TraitNameCollectionFactory
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
            'MyCompany\\SomeTrait',
            'MyCompany\\AnotherTrait',
        ];

        $resultCollection = $this->sut->create($input);

        self::assertCount(2, $resultCollection);

        self::assertContainsOnlyInstancesOf(TraitName::class, $resultCollection);
    }
}

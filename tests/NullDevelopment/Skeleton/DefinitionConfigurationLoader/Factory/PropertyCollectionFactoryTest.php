<?php

namespace tests\NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\PropertyCollectionFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\PropertyCollectionFactory
 * @group  unit
 */
class PropertyCollectionFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var PropertyCollectionFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new PropertyCollectionFactory();
    }

    public function testCreate()
    {
        $input = [
            'id'        => [
                'name' => 'integer',
            ],
            'name'      => [
                'name' => 'string',
            ],
            'something' => [
                'name'       => 'integer',
                'nullable'   => true,
                'hasDefault' => false,
                'default'    => null,
                'visibility' => Visibility::PRIVATE,
            ],
            'another'   => [
                'name'       => 'integer',
                'nullable'   => false,
                'hasDefault' => true,
                'default'    => 7,
                'visibility' => Visibility::PRIVATE,
            ],
        ];

        $resultCollection = $this->sut->create($input);

        self::assertCount(4, $resultCollection);

        self::assertContainsOnlyInstancesOf(Property::class, $resultCollection);
    }
}

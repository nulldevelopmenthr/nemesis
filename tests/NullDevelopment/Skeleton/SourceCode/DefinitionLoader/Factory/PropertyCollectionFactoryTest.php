<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\PropertyCollectionFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\PropertyCollectionFactory
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
            'id' => [
                'instanceOf' => 'int',
            ],
            'name' => [
                'instanceOf' => 'string',
            ],
            'something' => [
                'instanceOf' => 'int',
                'nullable'   => true,
                'hasDefault' => false,
                'default'    => null,
                'visibility' => Visibility::PRIVATE,
            ],
            'another' => [
                'instanceOf' => 'int',
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

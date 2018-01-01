<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionLoader;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\SimpleCollectionLoader;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionLoader\SimpleCollectionLoader
 * @group  integration
 */
class SimpleCollectionLoaderTest extends SfTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SimpleCollectionLoader */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SimpleCollectionLoader::class);
    }

    /** @dataProvider provideInputs */
    public function testSupports(array $input)
    {
        self::assertTrue($this->sut->supports($input));
    }

    /** @dataProvider provideInputs */
    public function testLoad(array $input, SimpleCollection $expected)
    {
        self::assertEquals($expected, $this->sut->load($input));
    }

    public function testGetDefaultValues()
    {
        $expected = [
            'type'        => 'SimpleCollection',
            'instanceOf'  => null,
            'parent'      => null,
            'interfaces'  => [],
            'traits'      => [],
            'constants'   => [],
            'properties'  => [],
            'methods'     => [],
            'constructor' => [],
        ];

        $this->assertEquals($expected, $this->sut->getDefaultValues());
    }

    public function provideInputs(): array
    {
        $elements = new Property('elements', ClassName::create('array'), false, true, [], new Visibility('private'));

        return [
            [
                [
                    'type'        => 'SimpleCollection',
                    'instanceOf'  => 'MyVendor\UserCollection',
                    'constructor' => [
                        'elements' => [
                            'instanceOf' => 'array',
                            'nullable'   => false,
                            'hasDefault' => true,
                            'default'    => [],
                        ],
                    ],
                    'properties'   => [],
                    'collectionOf' => [
                        'instanceOf' => 'MyVendor\UserEntity',
                        'accessor'   => 'getId',
                        'has'        => 'MyVendor\User\UserId',
                    ],
                ],
                new SimpleCollection(
                    ClassName::create('MyVendor\UserCollection'),
                    null,
                    [],
                    [],
                    [],
                    [$elements],
                    [
                        new ConstructorMethod([$elements]),
                    ],
                    new CollectionOf(
                        ClassName::create('MyVendor\UserEntity'),
                        'getId',
                        ClassName::create('MyVendor\User\UserId')
                    )
                ),
            ],
        ];
    }
}

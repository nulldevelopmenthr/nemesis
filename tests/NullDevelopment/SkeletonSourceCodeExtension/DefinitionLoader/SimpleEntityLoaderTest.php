<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SimpleEntity;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\SimpleEntityLoader;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DeserializeMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\SerializeMethod;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\SimpleEntityLoader
 * @group  integration
 */
class SimpleEntityLoaderTest extends SfTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SimpleEntityLoader */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SimpleEntityLoader::class);
    }

    /** @dataProvider provideInputs */
    public function testSupports(array $input)
    {
        self::assertTrue($this->sut->supports($input));
    }

    /** @dataProvider provideInputs */
    public function testLoad(array $input, SimpleEntity $expected)
    {
        self::assertEquals($expected, $this->sut->load($input));
    }

    public function testGetDefaultValues()
    {
        $expected = [
            'type'        => 'SimpleEntity',
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
        $nameProperty = Fixtures::nameProperty();
        $idProperty   = Fixtures::integerIdProperty();

        return [
            [
                [
                    'type'        => 'SimpleEntity',
                    'instanceOf'  => 'MyVendor\User\Username',
                    'constructor' => ['name' => ['instanceOf' => 'string', 'examples' => ['John Smith']]],
                    'properties'  => [],
                ],
                new SimpleEntity(
                    ClassName::create('MyVendor\User\Username'),
                    null,
                    [],
                    [],
                    [],
                    [$nameProperty],
                    [
                        new ConstructorMethod([$nameProperty]),
                        new GetterMethod('getName', $nameProperty),
                        new SerializeMethod(ClassName::create('MyVendor\User\Username'), [$nameProperty]),
                        new DeserializeMethod(ClassName::create('MyVendor\User\Username'), [$nameProperty]),
                    ]
                ),
            ],
            [
                [
                    'type'        => 'SimpleEntity',
                    'instanceOf'  => 'MyVendor\User\Username',
                    'parent'      => null,
                    'interfaces'  => [],
                    'traits'      => [],
                    'constructor' => [
                        'name' => [
                            'instanceOf' => 'string',
                            'nullable'   => false,
                            'hasDefault' => false,
                            'default'    => false,
                            'examples'   => ['John Smith'],
                        ],
                    ],
                    'properties' => ['name' => ['instanceOf' => 'string', 'examples' => ['John Smith']]],
                ],
                new SimpleEntity(
                    ClassName::create('MyVendor\User\Username'),
                    null,
                    [],
                    [],
                    [],
                    [$nameProperty],
                    [
                        new ConstructorMethod([$nameProperty]),
                        new GetterMethod('getName', $nameProperty),
                        new SerializeMethod(ClassName::create('MyVendor\User\Username'), [$nameProperty]),
                        new DeserializeMethod(ClassName::create('MyVendor\User\Username'), [$nameProperty]),
                    ]
                ),
            ],
            [
                [
                    'type'        => 'SimpleEntity',
                    'instanceOf'  => 'MyVendor\User\Username',
                    'parent'      => null,
                    'interfaces'  => [],
                    'traits'      => [],
                    'constructor' => ['id' => ['instanceOf' => 'int', 'examples' => [99]]],
                    'properties'  => [],
                ],
                new SimpleEntity(
                    ClassName::create('MyVendor\User\Username'),
                    null,
                    [],
                    [],
                    [],
                    [$idProperty],
                    [
                        new ConstructorMethod([$idProperty]),
                        new GetterMethod('getId', $idProperty),
                        new SerializeMethod(ClassName::create('MyVendor\User\Username'), [$idProperty]),
                        new DeserializeMethod(ClassName::create('MyVendor\User\Username'), [$idProperty]),
                    ]
                ),
            ],
        ];
    }
}

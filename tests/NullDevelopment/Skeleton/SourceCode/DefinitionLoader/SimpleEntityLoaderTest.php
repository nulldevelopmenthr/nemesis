<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionLoader;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleEntity;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\SimpleEntityLoader;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\ToStringMethod;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionLoader\SimpleEntityLoader
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
            'properties'  => [],
            'methods'     => [],
            'constructor' => [],
        ];

        $this->assertEquals($expected, $this->sut->getDefaultValues());
    }

    public function provideInputs(): array
    {
        $nameProperty  = Fixtures::nameProperty();
        $idProperty    = Fixtures::integerIdProperty();

        return [
            [
                [
                    'type'        => 'SimpleEntity',
                    'instanceOf'  => 'MyVendor\User\Username',
                    'constructor' => ['name' => ['instanceOf' => 'string']],
                    'properties'  => [],
                ],
                new SimpleEntity(
                    ClassName::create('MyVendor\User\Username'),
                    null,
                    [],
                    [],
                    [$nameProperty],
                    [
                        new ConstructorMethod([$nameProperty]),
                        new GetterMethod('getName', $nameProperty),
                        new ToStringMethod($nameProperty),
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
                            'default'    => null,
                        ],
                    ],
                    'properties'  => ['name' => ['instanceOf' => 'string']],
                ],
                new SimpleEntity(
                    ClassName::create('MyVendor\User\Username'),
                    null,
                    [],
                    [],
                    [$nameProperty],
                    [
                        new ConstructorMethod([$nameProperty]),
                        new GetterMethod('getName', $nameProperty),
                        new ToStringMethod($nameProperty),
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
                    'constructor' => ['id' => ['instanceOf' => 'int']],
                    'properties'  => [],
                ],
                new SimpleEntity(
                    ClassName::create('MyVendor\User\Username'),
                    null,
                    [],
                    [],
                    [$idProperty],
                    [
                        new ConstructorMethod([$idProperty]),
                        new GetterMethod('getId', $idProperty),
                        new ToStringMethod($idProperty),
                        new SerializeMethod(ClassName::create('MyVendor\User\Username'), [$idProperty]),
                        new DeserializeMethod(ClassName::create('MyVendor\User\Username'), [$idProperty]),
                    ]
                ),
            ],
        ];
    }
}

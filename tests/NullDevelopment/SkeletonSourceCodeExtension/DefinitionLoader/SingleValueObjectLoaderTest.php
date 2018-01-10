<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\SingleValueObject;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\SingleValueObjectLoader;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DeserializeMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\SerializeMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ToStringMethod;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\SingleValueObjectLoader
 * @group  integration
 */
class SingleValueObjectLoaderTest extends SfTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SingleValueObjectLoader */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SingleValueObjectLoader::class);
    }

    /** @dataProvider provideInputs */
    public function testSupports(array $input)
    {
        self::assertTrue($this->sut->supports($input));
    }

    /** @dataProvider provideInputs */
    public function testLoad(array $input, SingleValueObject $expected)
    {
        self::assertEquals($expected, $this->sut->load($input));
    }

    public function testGetDefaultValues()
    {
        $expected = [
            'type'        => 'SingleValueObject',
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
        $nameProperty  = Fixtures::nameProperty();
        $valueProperty = new Property(
            'value', ClassName::create('string'), false, false, null, new Visibility('private')
        );

        return [
            [
                [
                    'type'        => 'SingleValueObject',
                    'instanceOf'  => 'MyVendor\User\Username',
                    'constructor' => ['name' => ['instanceOf' => 'string', 'examples' => ['John Smith']]],
                    'properties'  => [],
                ],
                new SingleValueObject(
                    ClassName::create('MyVendor\User\Username'),
                    null,
                    [],
                    [],
                    [],
                    [$nameProperty],
                    [
                        new ConstructorMethod([$nameProperty]),
                        new GetterMethod('getName', $nameProperty),
                        new GetterMethod('getValue', $nameProperty),
                        new ToStringMethod($nameProperty),
                        new SerializeMethod(ClassName::create('MyVendor\User\Username'), [$nameProperty]),
                        new DeserializeMethod(ClassName::create('MyVendor\User\Username'), [$nameProperty]),
                    ]
                ),
            ],
            [
                [
                    'type'        => 'SingleValueObject',
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
                            'examples'   => ['John Smith'],
                        ],
                    ],
                    'properties' => ['name' => ['instanceOf' => 'string', 'examples' => ['John Smith']]],
                ],
                new SingleValueObject(
                    ClassName::create('MyVendor\User\Username'),
                    null,
                    [],
                    [],
                    [],
                    [$nameProperty],
                    [
                        new ConstructorMethod([$nameProperty]),
                        new GetterMethod('getName', $nameProperty),
                        new GetterMethod('getValue', $nameProperty),
                        new ToStringMethod($nameProperty),
                        new SerializeMethod(ClassName::create('MyVendor\User\Username'), [$nameProperty]),
                        new DeserializeMethod(ClassName::create('MyVendor\User\Username'), [$nameProperty]),
                    ]
                ),
            ],
            [
                [
                    'type'        => 'SingleValueObject',
                    'instanceOf'  => 'MyVendor\User\Username',
                    'parent'      => ['instanceOf' => 'ThirdParty\User\Username', 'alias' => 'BaseUsername'],
                    'interfaces'  => ['MyVendor\SomeInterface', 'AnotherInterface' => 'ThirdParty\SomeInterface'],
                    'constructor' => ['value' => ['instanceOf' => 'string']],
                ],
                new SingleValueObject(
                    ClassName::create('MyVendor\User\Username'),
                    ClassName::create('ThirdParty\User\Username', 'BaseUsername'),
                    [
                        InterfaceName::create('MyVendor\SomeInterface'),
                        InterfaceName::create('ThirdParty\SomeInterface', 'AnotherInterface'),
                    ],
                    [],
                    [],
                    [$valueProperty],
                    [
                        new ConstructorMethod([$valueProperty]),
                        new GetterMethod('getValue', $valueProperty),
                        new GetterMethod('getValue', $valueProperty),
                        new ToStringMethod($valueProperty),
                        new SerializeMethod(ClassName::create('MyVendor\User\Username'), [$valueProperty]),
                        new DeserializeMethod(ClassName::create('MyVendor\User\Username'), [$valueProperty]),
                    ]
                ),
            ],
        ];
    }
}

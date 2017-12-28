<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionLoader;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SingleValueObject;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\SingleValueObjectLoader;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\ToStringMethod;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionLoader\SingleValueObjectLoader
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
            'properties'  => [],
            'methods'     => [],
            'constructor' => [],
        ];

        $this->assertEquals($expected, $this->sut->getDefaultValues());
    }

    public function provideInputs(): array
    {
        $nameProperty  = Fixtures::nameProperty();
        $valueProperty = new Property('value', ClassName::create('string'), false, false, null, new Visibility('private'));

        return [
            [
                [
                    'type'        => 'SingleValueObject',
                    'instanceOf'  => 'MyVendor\User\Username',
                    'constructor' => ['name' => ['instanceOf' => 'string']],
                    'properties'  => [],
                ],
                new SingleValueObject(
                    ClassName::create('MyVendor\User\Username'),
                    null,
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
                        ],
                    ],
                    'properties'  => ['name' => ['instanceOf' => 'string']],
                ],
                new SingleValueObject(
                    ClassName::create('MyVendor\User\Username'),
                    null,
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
                    'constructor' => ['value' => ['instanceOf' => 'string']],
                    'properties'  => [],
                ],
                new SingleValueObject(
                    ClassName::create('MyVendor\User\Username'),
                    null,
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

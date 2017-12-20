<?php

namespace tests\NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use NullDevelopment\Skeleton\Definition\SimpleValueObject;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\ConstructorMethodFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\TraitNameCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\SimpleValueObjectLoader;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\DefinitionConfigurationLoader\SimpleValueObjectLoader
 * @group  unit
 */
class SimpleValueObjectLoaderTest extends TestCase
{
    /** @var InterfaceNameCollectionFactory */
    private $interfaceNameCollectionFactory;
    /** @var TraitNameCollectionFactory */
    private $traitNameCollectionFactory;
    /** @var ConstructorMethodFactory */
    private $constructorMethodFactory;
    /** @var PropertyCollectionFactory */
    private $propertyCollectionFactory;
    /** @var SimpleValueObjectLoader */
    private $sut;

    public function setUp()
    {
        $this->interfaceNameCollectionFactory = new InterfaceNameCollectionFactory();
        $this->traitNameCollectionFactory     = new TraitNameCollectionFactory();
        $this->constructorMethodFactory       = new ConstructorMethodFactory();
        $this->propertyCollectionFactory      = new PropertyCollectionFactory();

        $this->sut = new SimpleValueObjectLoader(
            $this->interfaceNameCollectionFactory,
            $this->traitNameCollectionFactory,
            $this->constructorMethodFactory,
            $this->propertyCollectionFactory
        );
    }

    /** @dataProvider provideInputs */
    public function testSupports(array $input)
    {
        self::assertTrue($this->sut->supports($input));
    }

    /** @dataProvider provideInputs */
    public function testLoad(array $input)
    {
        self::assertInstanceOf(SimpleValueObject::class, $this->sut->load($input));
    }

    public function testGetDefaultValues()
    {
        $expected = [
            'type'        => 'SimpleValueObject',
            'instanceOf'  => null,
            'parent'      => null,
            'interfaces'  => [],
            'traits'      => [],
            'constructor' => [],
            'properties'  => [],
        ];

        $this->assertEquals($expected, $this->sut->getDefaultValues());
    }

    public function provideInputs(): array
    {
        return [
            [
                [
                    'type'        => 'SimpleValueObject',
                    'instanceOf'  => 'MyCompany\User\UserName',
                    'constructor' => [
                        'name' => [
                            'instanceOf' => 'string',
                        ],
                    ],
                ],
            ],
            [
                [
                    'type'        => 'SimpleValueObject',
                    'instanceOf'  => 'MyCompany\User\UserName',
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
                ],
            ],
        ];
    }
}

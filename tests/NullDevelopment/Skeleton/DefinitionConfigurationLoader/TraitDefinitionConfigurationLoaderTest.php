<?php

namespace tests\NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use NullDevelopment\PhpStructure\Type\TraitDefinition;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\MethodCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\TraitNameCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\TraitDefinitionConfigurationLoader;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\DefinitionConfigurationLoader\TraitDefinitionConfigurationLoader
 * @group  unit
 */
class TraitDefinitionConfigurationLoaderTest extends TestCase
{
    /** @var TraitNameCollectionFactory */
    private $traitNameCollectionFactory;
    /** @var ConstantCollectionFactory */
    private $constantCollectionFactory;
    /** @var PropertyCollectionFactory */
    private $propertyCollectionFactory;
    /** @var MethodCollectionFactory */
    private $methodCollectionFactory;
    /** @var TraitDefinitionConfigurationLoader */
    private $sut;

    public function setUp()
    {
        $this->traitNameCollectionFactory = new TraitNameCollectionFactory();
        $this->constantCollectionFactory  = new ConstantCollectionFactory();
        $this->propertyCollectionFactory  = new PropertyCollectionFactory();
        $this->methodCollectionFactory    = new MethodCollectionFactory();

        $this->sut = new TraitDefinitionConfigurationLoader(
            $this->traitNameCollectionFactory,
            $this->constantCollectionFactory,
            $this->propertyCollectionFactory,
            $this->methodCollectionFactory
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
        self::assertInstanceOf(TraitDefinition::class, $this->sut->load($input));
    }

    public function testGetDefaultValues()
    {
        $expected = [
            'type'       => 'Trait',
            'name'       => null,
            'traits'     => [],
            'constants'  => [],
            'properties' => [],
            'methods'    => [],
        ];

        $this->assertEquals($expected, $this->sut->getDefaultValues());
    }

    public function provideInputs(): array
    {
        return [
            [
                [
                    'type'       => 'Trait',
                    'name'       => 'MyCompany\\SomeTrait',
                    'traits'     => [],
                    'constants'  => [],
                    'properties' => [],
                    'methods'    => [],
                ],
            ],
        ];
    }
}

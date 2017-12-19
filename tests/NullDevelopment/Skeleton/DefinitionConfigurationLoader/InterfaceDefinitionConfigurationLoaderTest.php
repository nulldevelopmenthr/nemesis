<?php

namespace tests\NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use NullDevelopment\PhpStructure\Type\InterfaceDefinition;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\MethodCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\InterfaceDefinitionConfigurationLoader;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\DefinitionConfigurationLoader\InterfaceDefinitionConfigurationLoader
 * @group  unit
 */
class InterfaceDefinitionConfigurationLoaderTest extends TestCase
{
    /** @var ConstantCollectionFactory */
    private $constantCollectionFactory;
    /** @var MethodCollectionFactory */
    private $methodCollectionFactory;
    /** @var InterfaceDefinitionConfigurationLoader */
    private $sut;

    public function setUp()
    {
        $this->constantCollectionFactory = new ConstantCollectionFactory();
        $this->methodCollectionFactory   = new MethodCollectionFactory();
        $this->sut                       = new InterfaceDefinitionConfigurationLoader(
            $this->constantCollectionFactory,
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
        self::assertInstanceOf(InterfaceDefinition::class, $this->sut->load($input));
    }

    public function testGetDefaultValues()
    {
        $expected = [
            'type'      => 'Interface',
            'name'      => null,
            'parent'    => null,
            'constants' => [],
            'methods'   => [],
        ];

        $this->assertEquals($expected, $this->sut->getDefaultValues());
    }

    public function provideInputs(): array
    {
        return [
            [
                [
                    'type'      => 'Interface',
                    'name'      => 'MyCompany\\SomeInterface',
                    'parent'    => null,
                    'constants' => [],
                    'methods'   => [],
                ],
            ],
            [
                [
                    'type'      => 'Interface',
                    'name'      => 'MyCompany\\SomeInterface',
                    'parent'    => 'MyCompany\\BaseInterface',
                    'constants' => [],
                    'methods'   => [],
                ],
            ],
        ];
    }
}

<?php

namespace tests\NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory;

use NullDevelopment\PhpStructure\Behaviour\Method\ConstructorMethod;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\ConstructorMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\ConstructorMethodFactory
 * @group  unit
 */
class ConstructorMethodFactoryTest extends TestCase
{
    /** @var ConstructorMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new ConstructorMethodFactory();
    }

    public function testCreate()
    {
        $input = [
            'name'      => [
                'className'  => 'string',
                'nullable'   => false,
                'hasDefault' => false,
                'default'    => null,
            ],
            'something' => [
                'className' => 'string',
            ],
            'another'   => [
                'className'  => 'string',
                'nullable'   => true,
                'hasDefault' => false,
                'default'    => null,
            ],
            'more'      => [
                'className'  => 'string',
                'nullable'   => false,
                'hasDefault' => true,
                'default'    => null,
            ],
        ];

        self::assertInstanceOf(ConstructorMethod::class, $this->sut->create($input));
    }
}

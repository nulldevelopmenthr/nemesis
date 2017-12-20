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
                'instanceOf'  => 'string',
                'nullable'    => false,
                'hasDefault'  => false,
                'default'     => null,
            ],
            'something' => [
                'instanceOf' => 'string',
            ],
            'another'   => [
                'instanceOf'  => 'string',
                'nullable'    => true,
                'hasDefault'  => false,
                'default'     => null,
            ],
            'more'      => [
                'instanceOf'  => 'string',
                'nullable'    => false,
                'hasDefault'  => true,
                'default'     => null,
            ],
        ];

        self::assertInstanceOf(ConstructorMethod::class, $this->sut->create($input));
    }
}

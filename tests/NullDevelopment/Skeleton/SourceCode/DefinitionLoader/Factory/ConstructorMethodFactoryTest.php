<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory;

use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\ConstructorMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\ConstructorMethodFactory
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
            'name' => [
                'instanceOf' => 'string',
                'nullable'   => false,
                'hasDefault' => false,
                'default'    => null,
            ],
            'something' => [
                'instanceOf' => 'string',
            ],
            'another' => [
                'instanceOf' => 'string',
                'nullable'   => true,
                'hasDefault' => false,
                'default'    => null,
            ],
            'more' => [
                'instanceOf' => 'string',
                'nullable'   => false,
                'hasDefault' => true,
                'default'    => null,
            ],
        ];

        self::assertInstanceOf(ConstructorMethod::class, $this->sut->create($input));
    }
}

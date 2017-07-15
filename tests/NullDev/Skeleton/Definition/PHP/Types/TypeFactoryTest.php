<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Definition\PHP\Types;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\TypeDeclaration;
use NullDev\Skeleton\Definition\PHP\Types\TypeFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Definition\PHP\Types\TypeFactory
 * @group  unit
 */
class TypeFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var TypeFactory */
    private $typeFactory;

    public function setUp(): void
    {
        $this->typeFactory = new TypeFactory();
    }

    /**
     * @dataProvider provideStaticTypes
     */
    public function testStaticTypes(string $name, TypeDeclaration $expectedType): void
    {
        self::assertEquals($expectedType, $this->typeFactory->createFromName($name));
    }

    public function provideStaticTypes(): array
    {
        return [
            ['string', new StringType()],
            ['array', new ArrayType()],
            ['int', new IntType()],
            ['float', new FloatType()],
            ['bool', new BoolType()],
        ];
    }

    /**
     * @expectedException \Exception
     */
    public function testParamsWithoutNameAreNotSupported(): void
    {
        $this->typeFactory->createFromName('');
    }

    /**
     * @dataProvider provideClassNames
     */
    public function testItWillCreateClassTypeForEverythingElse(string $name): void
    {
        self::assertInstanceOf(ClassType::class, $this->typeFactory->createFromName($name));
    }

    public function provideClassNames(): array
    {
        return [
            ['\DateTime'],
            [self::class],
        ];
    }
}

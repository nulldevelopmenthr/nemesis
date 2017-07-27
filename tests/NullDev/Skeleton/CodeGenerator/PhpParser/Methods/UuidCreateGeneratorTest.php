<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\UuidCreateGenerator;
use NullDev\Skeleton\Definition\PHP\Methods\UuidCreateMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpParser\BuilderFactory;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\Methods\UuidCreateGenerator
 * @covers \NullDev\Skeleton\Definition\PHP\Methods\UuidCreateMethod
 * @group  integration
 */
class UuidCreateGeneratorTest extends BaseOutputGeneratorTestCase
{
    public function getGenerator(): UuidCreateGenerator
    {
        return new UuidCreateGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     */
    public function testOutput(ClassType $classType, string $fileName): void
    {
        $method = new UuidCreateMethod($classType);

        $this->assertOutputMatches($method, $fileName);
    }

    public function provideParameters(): array
    {
        return [
            [
                ClassType::createFromFullyQualified('Vendor\Namespace\SomeId'),
                '0-type-param',
            ],
        ];
    }
}

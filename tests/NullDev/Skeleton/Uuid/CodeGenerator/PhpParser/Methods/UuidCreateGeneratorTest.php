<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Uuid\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Uuid\CodeGenerator\PhpParser\Methods\UuidCreateGenerator;
use NullDev\Skeleton\Uuid\Definition\PHP\Methods\UuidCreateMethod;
use PhpParser\BuilderFactory;
use Tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods\BaseOutputGeneratorTestCase;

/**
 * @covers \NullDev\Skeleton\Uuid\CodeGenerator\PhpParser\Methods\UuidCreateGenerator
 * @covers \NullDev\Skeleton\Uuid\Definition\PHP\Methods\UuidCreateMethod
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

        $this->assertMethodOutputMatches($method, $fileName);
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

    protected function getBasePath(): string
    {
        $fullName = explode('\\', get_class($this));

        $currentTestClassName = array_pop($fullName);

        return __DIR__.'/sample-output/'.$currentTestClassName;
    }
}

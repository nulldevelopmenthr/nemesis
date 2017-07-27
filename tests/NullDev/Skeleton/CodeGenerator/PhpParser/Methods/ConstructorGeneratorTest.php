<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\ConstructorGenerator;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpParser\BuilderFactory;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\Methods\ConstructorGenerator
 * @covers \NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod
 * @group  integration
 */
class ConstructorGeneratorTest extends BaseOutputGeneratorTestCase
{
    public function getGenerator(): ConstructorGenerator
    {
        return new ConstructorGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     */
    public function testOutput(array $parameters, string $fileName): void
    {
        $method = new ConstructorMethod($parameters);

        $this->assertOutputMatches($method, $fileName);
    }

    public function provideParameters(): array
    {
        return [
            [
                [],
                '0-no-params',
            ],
            [
                [
                    new Parameter('first'),
                ],
                '1-one-no-type-param',
            ],
            [
                [
                    new Parameter('first'),
                    new Parameter('second'),
                    new Parameter('third'),
                ],
                '2-multiple-no-type-params',
            ],
            [
                [
                    new Parameter('first', ClassType::createFromFullyQualified('Vendor\Namespace\FirstName')),
                ],
                '3-one-type-param',
            ],
            [
                [
                    new Parameter('first', ClassType::createFromFullyQualified('Vendor\Namespace\FirstName')),
                    new Parameter('second', ClassType::createFromFullyQualified('Vendor\Namespace\SecondName')),
                    new Parameter('last', ClassType::createFromFullyQualified('Vendor\Namespace\LastName')),
                ],
                '4-multiple-type-params',
            ],
        ];
    }
}

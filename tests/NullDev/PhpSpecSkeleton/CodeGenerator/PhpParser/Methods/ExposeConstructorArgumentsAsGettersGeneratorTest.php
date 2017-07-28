<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\ExposeConstructorArgumentsAsGettersGenerator;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeConstructorArgumentsAsGettersMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\ExposeConstructorArgumentsAsGettersGenerator
 * @group  integration
 */
class ExposeConstructorArgumentsAsGettersGeneratorTest extends PHPUnit_Framework_TestCase
{
    use OutputGeneratorTestTrait;

    public function getGenerator(): ExposeConstructorArgumentsAsGettersGenerator
    {
        return new ExposeConstructorArgumentsAsGettersGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     */
    public function testOutput(array $parameters, string $fileName): void
    {
        $method = new ExposeConstructorArgumentsAsGettersMethod($parameters);

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

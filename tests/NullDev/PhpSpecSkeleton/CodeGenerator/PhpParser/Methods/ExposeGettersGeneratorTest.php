<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\ExposeGettersGenerator;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeGettersMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\ExposeGettersGenerator
 * @group  integration
 */
class ExposeGettersGeneratorTest extends PHPUnit_Framework_TestCase
{
    use OutputGeneratorTestTrait;

    public function getGenerator(): ExposeGettersGenerator
    {
        return new ExposeGettersGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     */
    public function testOutput(array $parameters, string $fileName): void
    {
        $method = new ExposeGettersMethod($parameters);

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
            [
                [
                    new Parameter('id', new IntType()),
                    new Parameter('name', new StringType()),
                    new Parameter('price', new FloatType()),
                    new Parameter('smart', new BoolType()),
                    new Parameter('tags', new ArrayType()),
                    new Parameter('randomValue'),
                ],
                '5-multiple-type-params',
            ],
        ];
    }
}

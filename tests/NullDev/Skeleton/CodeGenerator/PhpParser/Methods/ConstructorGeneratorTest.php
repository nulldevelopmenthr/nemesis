<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\ConstructorGenerator;
use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
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
                    Parameter::create('first'),
                ],
                '1-one-no-type-param',
            ],
            [
                [
                    Parameter::create('first'),
                    Parameter::create('second'),
                    Parameter::create('third'),
                ],
                '2-multiple-no-type-params',
            ],
            [
                [
                    Parameter::create('first', 'Vendor\Namespace\FirstName'),
                ],
                '3-one-type-param',
            ],
            [
                [
                    Parameter::create('first', 'Vendor\Namespace\FirstName'),
                    Parameter::create('second', 'Vendor\Namespace\SecondName'),
                    Parameter::create('last', 'Vendor\Namespace\LastName'),
                ],
                '4-multiple-type-params',
            ],
        ];
    }
}

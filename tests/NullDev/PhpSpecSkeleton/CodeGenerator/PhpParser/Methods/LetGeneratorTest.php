<?php

declare(strict_types=1);

namespace Tests\NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\LetGenerator;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\LetMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use PhpParser\BuilderFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\LetGenerator
 * @group  integration
 */
class LetGeneratorTest extends TestCase
{
    use OutputGeneratorTestTrait;

    public function getGenerator(): LetGenerator
    {
        return new LetGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     */
    public function testOutput(array $parameters, string $fileName): void
    {
        $method = new LetMethod($parameters);

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
            [
                [
                    Parameter::create('id', 'int'),
                    Parameter::create('name', 'string'),
                    Parameter::create('price', 'float'),
                    Parameter::create('smart', 'bool'),
                    Parameter::create('tags', 'array'),
                    Parameter::create('randomValue'),
                ],
                '5-multiple-type-params',
            ],
        ];
    }
}

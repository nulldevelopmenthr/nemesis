<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\ExposeGettersGenerator;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeGettersMethod;
use NullDev\Skeleton\Definition\PHP\Property;
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
                    Property::create('first'),
                ],
                '1-one-no-type-param',
            ],
            [
                [
                    Property::create('first'),
                    Property::create('second'),
                    Property::create('third'),
                ],
                '2-multiple-no-type-params',
            ],
            [
                [
                    Property::create('first', 'Vendor\Namespace\FirstName'),
                ],
                '3-one-type-param',
            ],
            [
                [
                    Property::create('first', 'Vendor\Namespace\FirstName'),
                    Property::create('second', 'Vendor\Namespace\SecondName'),
                    Property::create('last', 'Vendor\Namespace\LastName'),
                ],
                '4-multiple-type-params',
            ],
            [
                [
                    Property::create('id', 'int'),
                    Property::create('name', 'string'),
                    Property::create('price', 'float'),
                    Property::create('smart', 'bool'),
                    Property::create('tags', 'array'),
                    Property::create('randomValue'),
                ],
                '5-multiple-type-params',
            ],
        ];
    }
}

<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\GetterGenerator;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Property;
use PhpParser\BuilderFactory;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\Methods\GetterGenerator
 * @covers \NullDev\Skeleton\Definition\PHP\Methods\GetterMethod
 * @group  integration
 */
class GetterGeneratorTest extends BaseOutputGeneratorTestCase
{
    public function getGenerator(): GetterGenerator
    {
        return new GetterGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     */
    public function testOutput(Property $property, string $fileName): void
    {
        $method = GetterMethod::create($property);
        $this->assertOutputMatches($method, $fileName);
    }

    public function provideParameters(): array
    {
        return [
            [
                Property::create('first'),
                '0-no-type-param',
            ],
            [
                Property::create('first', 'Vendor\Namespace\FirstName'),
                '1-type-param',
            ],
        ];
    }
}

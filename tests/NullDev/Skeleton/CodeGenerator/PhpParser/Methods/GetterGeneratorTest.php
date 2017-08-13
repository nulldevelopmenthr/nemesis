<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\GetterGenerator;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
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
    public function testOutput(Parameter $parameter, string $fileName): void
    {
        $method = GetterMethod::create($parameter);
        $this->assertOutputMatches($method, $fileName);
    }

    public function provideParameters(): array
    {
        return [
            [
                Parameter::create('first'),
                '0-no-type-param',
            ],
            [
                Parameter::create('first', 'Vendor\Namespace\FirstName'),
                '1-type-param',
            ],
        ];
    }
}

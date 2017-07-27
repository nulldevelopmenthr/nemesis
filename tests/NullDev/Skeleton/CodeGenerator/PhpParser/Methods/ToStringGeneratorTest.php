<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\ToStringGenerator;
use NullDev\Skeleton\Definition\PHP\Methods\ToStringMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpParser\BuilderFactory;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParser\Methods\ToStringGenerator
 * @covers \NullDev\Skeleton\Definition\PHP\Methods\ToStringMethod
 * @group  integration
 */
class ToStringGeneratorTest extends BaseOutputGeneratorTestCase
{
    public function getGenerator(): ToStringGenerator
    {
        return new ToStringGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     */
    public function testOutput(Parameter $parameter, string $fileName): void
    {
        $method = new ToStringMethod($parameter);

        $this->assertOutputMatches($method, $fileName);
    }

    public function provideParameters(): array
    {
        return [
            [
                new Parameter('first'),
                '0-no-type-param',
            ],
            [
                new Parameter('first', ClassType::createFromFullyQualified('Vendor\Namespace\FirstName')),
                '1-type-param',
            ],
        ];
    }
}
